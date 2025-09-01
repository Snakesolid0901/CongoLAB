// Service Worker para Country Group GWM
// Mejora la experiencia offline y velocidad de carga

const CACHE_NAME = 'countrygroupgwm-v1.0.0';
const STATIC_CACHE = 'countrygroupgwm-static-v1';
const DYNAMIC_CACHE = 'countrygroupgwm-dynamic-v1';

// Archivos para cachear inmediatamente
const STATIC_FILES = [
    '/',
    '/assets/css/styles.css',
    '/assets/js/main.js',
    '/assets/img/hero-gwm.jpg',
    '/assets/fonts/avantgarde/AvantGarde-Book.woff2',
    '/assets/fonts/avantgarde/AvantGarde-Demi.woff2',
    '/assets/fonts/avantgarde/AvantGarde-Bold.woff2',
    '/assets/img/icons/whatsapp.svg',
    '/assets/img/icons/facebook.svg',
    '/assets/img/icons/instagram.svg'
];

// Archivos críticos que siempre deben funcionar offline
const FALLBACK_PAGE = '/';
const OFFLINE_IMAGE = '/assets/img/offline-placeholder.jpg';

// Instalar Service Worker
self.addEventListener('install', event => {
    console.log('[SW] Installing Service Worker...');
    
    event.waitUntil(
        caches.open(STATIC_CACHE)
            .then(cache => {
                console.log('[SW] Caching static files');
                return cache.addAll(STATIC_FILES);
            })
            .then(() => {
                console.log('[SW] Static files cached successfully');
                return self.skipWaiting();
            })
            .catch(error => {
                console.error('[SW] Error caching static files:', error);
            })
    );
});

// Activar Service Worker
self.addEventListener('activate', event => {
    console.log('[SW] Activating Service Worker...');
    
    event.waitUntil(
        Promise.all([
            // Limpiar caches antiguos
            caches.keys().then(cacheNames => {
                return Promise.all(
                    cacheNames.map(cacheName => {
                        if (cacheName !== STATIC_CACHE && cacheName !== DYNAMIC_CACHE) {
                            console.log('[SW] Deleting old cache:', cacheName);
                            return caches.delete(cacheName);
                        }
                    })
                );
            }),
            // Tomar control inmediatamente
            self.clients.claim()
        ])
    );
});

// Interceptar requests
self.addEventListener('fetch', event => {
    const { request } = event;
    const url = new URL(request.url);
    
    // Solo manejar requests del mismo origen
    if (url.origin !== location.origin) return;
    
    // Estrategia para diferentes tipos de recursos
    if (request.destination === 'image') {
        event.respondWith(handleImageRequest(request));
    } else if (request.destination === 'document') {
        event.respondWith(handleDocumentRequest(request));
    } else if (request.destination === 'style' || request.destination === 'script' || request.destination === 'font') {
        event.respondWith(handleStaticRequest(request));
    } else {
        event.respondWith(handleDefaultRequest(request));
    }
});

// Manejar requests de imágenes con cache first
async function handleImageRequest(request) {
    try {
        // Buscar en cache primero
        const cachedResponse = await caches.match(request);
        if (cachedResponse) {
            return cachedResponse;
        }
        
        // Si no está en cache, buscar en red
        const networkResponse = await fetch(request);
        
        // Cachear para futuras requests
        if (networkResponse.ok) {
            const cache = await caches.open(DYNAMIC_CACHE);
            cache.put(request, networkResponse.clone());
        }
        
        return networkResponse;
    } catch (error) {
        console.log('[SW] Image request failed, serving fallback');
        // Servir imagen placeholder si está disponible
        return caches.match(OFFLINE_IMAGE) || new Response('Image unavailable', {
            status: 503,
            statusText: 'Service Unavailable'
        });
    }
}

// Manejar requests de documentos HTML
async function handleDocumentRequest(request) {
    try {
        // Network first para HTML (contenido dinámico)
        const networkResponse = await fetch(request);
        
        // Cachear páginas exitosas
        if (networkResponse.ok) {
            const cache = await caches.open(DYNAMIC_CACHE);
            cache.put(request, networkResponse.clone());
        }
        
        return networkResponse;
    } catch (error) {
        console.log('[SW] Document request failed, trying cache');
        
        // Intentar servir desde cache
        const cachedResponse = await caches.match(request);
        if (cachedResponse) {
            return cachedResponse;
        }
        
        // Fallback a página principal
        return caches.match(FALLBACK_PAGE) || new Response('Page unavailable offline', {
            status: 503,
            statusText: 'Service Unavailable',
            headers: { 'Content-Type': 'text/html' }
        });
    }
}

// Manejar recursos estáticos (CSS, JS, Fonts)
async function handleStaticRequest(request) {
    try {
        // Cache first para recursos estáticos
        const cachedResponse = await caches.match(request);
        if (cachedResponse) {
            return cachedResponse;
        }
        
        // Si no está en cache, buscar en red
        const networkResponse = await fetch(request);
        
        // Cachear recursos estáticos
        if (networkResponse.ok) {
            const cache = await caches.open(STATIC_CACHE);
            cache.put(request, networkResponse.clone());
        }
        
        return networkResponse;
    } catch (error) {
        console.log('[SW] Static resource failed:', request.url);
        return new Response('Resource unavailable', {
            status: 503,
            statusText: 'Service Unavailable'
        });
    }
}

// Manejar otras requests (APIs, formularios)
async function handleDefaultRequest(request) {
    try {
        // Para POST requests (formularios), siempre usar red
        if (request.method === 'POST') {
            return await fetch(request);
        }
        
        // Para otros requests, intentar red primero
        const networkResponse = await fetch(request);
        
        // Cachear responses exitosas de GET
        if (networkResponse.ok && request.method === 'GET') {
            const cache = await caches.open(DYNAMIC_CACHE);
            cache.put(request, networkResponse.clone());
        }
        
        return networkResponse;
    } catch (error) {
        // Para GET requests, intentar cache
        if (request.method === 'GET') {
            const cachedResponse = await caches.match(request);
            if (cachedResponse) {
                return cachedResponse;
            }
        }
        
        return new Response(JSON.stringify({
            error: 'Network unavailable',
            offline: true
        }), {
            status: 503,
            headers: { 'Content-Type': 'application/json' }
        });
    }
}

// Manejar mensajes del cliente
self.addEventListener('message', event => {
    const { action, data } = event.data;
    
    switch (action) {
        case 'SKIP_WAITING':
            self.skipWaiting();
            break;
            
        case 'CACHE_URLS':
            if (data && data.urls) {
                cacheUrls(data.urls);
            }
            break;
            
        case 'CLEAR_CACHE':
            clearAllCaches();
            break;
            
        case 'GET_CACHE_SIZE':
            getCacheSize().then(size => {
                event.ports[0].postMessage({ size });
            });
            break;
    }
});

// Función para cachear URLs específicas
async function cacheUrls(urls) {
    try {
        const cache = await caches.open(DYNAMIC_CACHE);
        await cache.addAll(urls);
        console.log('[SW] URLs cached successfully:', urls);
    } catch (error) {
        console.error('[SW] Error caching URLs:', error);
    }
}

// Función para limpiar todos los caches
async function clearAllCaches() {
    try {
        const cacheNames = await caches.keys();
        await Promise.all(cacheNames.map(name => caches.delete(name)));
        console.log('[SW] All caches cleared');
    } catch (error) {
        console.error('[SW] Error clearing caches:', error);
    }
}

// Función para obtener tamaño del cache
async function getCacheSize() {
    try {
        let totalSize = 0;
        const cacheNames = await caches.keys();
        
        for (const cacheName of cacheNames) {
            const cache = await caches.open(cacheName);
            const requests = await cache.keys();
            
            for (const request of requests) {
                const response = await cache.match(request);
                if (response && response.headers.get('content-length')) {
                    totalSize += parseInt(response.headers.get('content-length'));
                }
            }
        }
        
        return totalSize;
    } catch (error) {
        console.error('[SW] Error calculating cache size:', error);
        return 0;
    }
}

// Manejo de actualizaciones del Service Worker
self.addEventListener('updatefound', () => {
    console.log('[SW] New Service Worker version found');
});

// Limpiar caches periódicamente para evitar que crezcan demasiado
setInterval(async () => {
    try {
        const cache = await caches.open(DYNAMIC_CACHE);
        const requests = await cache.keys();
        
        // Si hay más de 50 items en cache dinámico, eliminar los más antiguos
        if (requests.length > 50) {
            const requestsToDelete = requests.slice(0, requests.length - 40);
            await Promise.all(requestsToDelete.map(request => cache.delete(request)));
            console.log('[SW] Cleaned old cache entries');
        }
    } catch (error) {
        console.error('[SW] Error cleaning cache:', error);
    }
}, 300000); // Cada 5 minutos

// Notificar cuando hay una nueva versión disponible
self.addEventListener('controllerchange', () => {
    // Notificar al cliente que hay una nueva versión
    self.clients.matchAll().then(clients => {
        clients.forEach(client => {
            client.postMessage({
                type: 'SW_UPDATED',
                message: 'Nueva versión disponible. Recarga la página para actualizar.'
            });
        });
    });
});

console.log('[SW] Service Worker registered for Country Group GWM');