<?php
session_start();

// Generar CSRF token
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Country Group GWM | Concesionario Oficial GWM</title>
    <meta name="description" content="Country Group, concesionario oficial GWM. Encuentra los mejores vehículos GWM: TANK 500, H7, JOLION, ORA 03 y más. Atención personalizada y financiación.">
    <meta name="keywords" content="GWM, Country Group, vehículos, TANK 500, JOLION, H7, concesionario, carros nuevos">
    <meta name="author" content="Country Group">
    
    <!-- Open Graph -->
    <meta property="og:title" content="Country Group GWM | Concesionario Oficial">
    <meta property="og:description" content="Descubre la gama completa de vehículos GWM en Country Group. Modelos innovadores con tecnología híbrida.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://countrygroupgwm.com">
    <meta property="og:image" content="assets/img/og-image.jpg">
    <meta property="og:site_name" content="Country Group GWM">
    
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Country Group GWM | Concesionario Oficial">
    <meta name="twitter:description" content="Descubre la gama completa de vehículos GWM en Country Group.">
    <meta name="twitter:image" content="assets/img/og-image.jpg">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico">
    
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/styles.css">
    
    <!-- JSON-LD LocalBusiness -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "AutomotiveBusiness",
        "name": "Country Group GWM",
        "description": "Concesionario oficial GWM especializado en venta de vehículos nuevos",
        "url": "https://countrygroupgwm.com",
        "telephone": "+57-1-234-5678",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "Carrera 15 #123-45",
            "addressLocality": "Bogotá",
            "addressRegion": "Cundinamarca",
            "postalCode": "110111",
            "addressCountry": "CO"
        },
        "openingHoursSpecification": [
            {
                "@type": "OpeningHoursSpecification",
                "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
                "opens": "08:00",
                "closes": "18:00"
            },
            {
                "@type": "OpeningHoursSpecification",
                "dayOfWeek": "Saturday",
                "opens": "08:00",
                "closes": "17:00"
            }
        ],
        "sameAs": [
            "https://www.facebook.com/countrygroupgwm",
            "https://www.instagram.com/countrygroupgwm"
        ]
    }
    </script>
</head>
<body>
    <!-- Header -->
    <header class="header" role="banner">
        <div class="container">
            <div class="header__content">
                <div class="header__logo">
                    <a href="/" aria-label="Country Group GWM - Inicio">Country Group GWM</a>
                </div>
                <button class="header__menu-toggle" aria-label="Abrir menú de navegación" aria-expanded="false">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <nav class="header__nav" role="navigation">
                    <ul class="header__nav-list">
                        <li><a href="#inicio" class="header__nav-link">Inicio</a></li>
                        <li><a href="#modelos" class="header__nav-link">Modelos</a></li>
                        <li><a href="#servicios" class="header__nav-link">Servicios</a></li>
                        <li><a href="#contacto" class="header__nav-link">Contacto</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        <!-- Hero Section -->
        <section id="inicio" class="hero" role="banner">
            <div class="hero__background">
                <img src="assets/img/hero-gwm.webp" alt="Vehículos GWM en Country Group" loading="eager" width="1920" height="1080">
            </div>
            <div class="container">
                <div class="hero__content">
                    <h1 class="hero__title">Descubre la Nueva Era de los Vehículos GWM</h1>
                    <p class="hero__description">Tecnología híbrida, diseño innovador y calidad superior en cada modelo. Country Group te ofrece la mejor experiencia automotriz.</p>
                    <a href="#modelos" class="hero__cta btn btn--primary">Conoce los modelos GWM en Country Group</a>
                </div>
            </div>
        </section>

        <!-- Modelos Section -->
        <section id="modelos" class="models" role="main">
            <div class="container">
                <header class="section__header">
                    <h2 class="section__title">Nuestros Modelos GWM</h2>
                    <p class="section__description">Explora nuestra completa gama de vehículos con tecnología híbrida y diseño vanguardista</p>
                </header>

                <div class="models__grid">
                    <!-- TANK 500 HEV -->
                    <article class="model-card">
                        <div class="model-card__image">
                            <img src="assets/img/models/tank500.avif" alt="GWM TANK 500 HEV" loading="lazy" width="400" height="250">
                        </div>
                        <div class="model-card__content">
                            <h3 class="model-card__title">TANK 500 HEV</h3>
                            <p class="model-card__description">SUV híbrido de lujo con capacidad off-road excepcional</p>
                            <button class="model-card__btn btn btn--secondary" data-model="TANK 500 HEV">Me interesa</button>
                        </div>
                    </article>

                    <!-- TANK 300 HEV -->
                    <article class="model-card">
                        <div class="model-card__image">
                            <img src="assets/img/models/tank300.webp" alt="GWM TANK 300 HEV" loading="lazy" width="400" height="250">
                        </div>
                        <div class="model-card__content">
                            <h3 class="model-card__title">TANK 300 HEV</h3>
                            <p class="model-card__description">Todo terreno compacto con tecnología híbrida avanzada</p>
                            <button class="model-card__btn btn btn--secondary" data-model="TANK 300 HEV">Me interesa</button>
                        </div>
                    </article>

                    <!-- NUEVO H7 -->
                    <article class="model-card">
                        <div class="model-card__image">
                            <img src="assets/img/models/nuevoh7.webp" alt="GWM NUEVO H7" loading="lazy" width="400" height="250">
                        </div>
                        <div class="model-card__content">
                            <h3 class="model-card__title">NUEVO H7</h3>
                            <p class="model-card__description">SUV familiar de 7 plazas con máximo confort</p>
                            <button class="model-card__btn btn btn--secondary" data-model="NUEVO H7">Me interesa</button>
                        </div>
                    </article>

                    <!-- H6 HEV -->
                    <article class="model-card">
                        <div class="model-card__image">
                            <img src="assets/img/models/h6.webp" alt="GWM H6 HEV" loading="lazy" width="400" height="250">
                        </div>
                        <div class="model-card__content">
                            <h3 class="model-card__title">H6 HEV</h3>
                            <p class="model-card__description">SUV híbrido con excelente rendimiento de combustible</p>
                            <button class="model-card__btn btn btn--secondary" data-model="H6 HEV">Me interesa</button>
                        </div>
                    </article>

                    <!-- JOLION PRO HEV -->
                    <article class="model-card">
                        <div class="model-card__image">
                            <img src="assets/img/models/holion pro.webp" alt="GWM JOLION PRO HEV" loading="lazy" width="400" height="250">
                        </div>
                        <div class="model-card__content">
                            <h3 class="model-card__title">JOLION PRO HEV</h3>
                            <p class="model-card__description">SUV compacto híbrido con tecnología inteligente</p>
                            <button class="model-card__btn btn btn--secondary" data-model="JOLION PRO HEV">Me interesa</button>
                        </div>
                    </article>

                    <!-- JOLION HEV -->
                    <article class="model-card">
                        <div class="model-card__image">
                            <img src="assets/img/models/jolion.webp" alt="GWM JOLION HEV" loading="lazy" width="400" height="250">
                        </div>
                        <div class="model-card__content">
                            <h3 class="model-card__title">JOLION HEV</h3>
                            <p class="model-card__description">Crossover híbrido urbano eficiente y moderno</p>
                            <button class="model-card__btn btn btn--secondary" data-model="JOLION HEV">Me interesa</button>
                        </div>
                    </article>

                    <!-- POER PASSENGER -->
                    <article class="model-card">
                        <div class="model-card__image">
                            <img src="assets/img/models/poer passegner.webp" alt="GWM POER PASSENGER" loading="lazy" width="400" height="250">
                        </div>
                        <div class="model-card__content">
                            <h3 class="model-card__title">POER PASSENGER</h3>
                            <p class="model-card__description">Pickup de pasajeros con capacidad y confort</p>
                            <button class="model-card__btn btn btn--secondary" data-model="POER PASSENGER">Me interesa</button>
                        </div>
                    </article>

                    <!-- POER COMERCIAL -->
                    <article class="model-card">
                        <div class="model-card__image">
                            <img src="assets/img/models/gwm_co_version_nuevo_poer_passenger_2_4_4x4_deluxe_negro.webp" alt="GWM POER COMERCIAL" loading="lazy" width="400" height="250">
                        </div>
                        <div class="model-card__content">
                            <h3 class="model-card__title">POER COMERCIAL</h3>
                            <p class="model-card__description">Pickup comercial robusta para trabajo pesado</p>
                            <button class="model-card__btn btn btn--secondary" data-model="POER COMERCIAL">Me interesa</button>
                        </div>
                    </article>

                    <!-- WINGLE 7 -->
                    <article class="model-card">
                        <div class="model-card__image">
                            <img src="assets/img/models/wingle.webp" alt="GWM WINGLE 7" loading="lazy" width="400" height="250">
                        </div>
                        <div class="model-card__content">
                            <h3 class="model-card__title">WINGLE 7</h3>
                            <p class="model-card__description">Pickup versátil para trabajo y aventura</p>
                            <button class="model-card__btn btn btn--secondary" data-model="WINGLE 7">Me interesa</button>
                        </div>
                    </article>

                    <!-- WINGLE 5 -->
                    <article class="model-card">
                        <div class="model-card__image">
                            <img src="assets/img/models/wingle5.webp" alt="GWM WINGLE 5" loading="lazy" width="400" height="250">
                        </div>
                        <div class="model-card__content">
                            <h3 class="model-card__title">WINGLE 5</h3>
                            <p class="model-card__description">Pickup confiable con excelente relación precio-valor</p>
                            <button class="model-card__btn btn btn--secondary" data-model="WINGLE 5">Me interesa</button>
                        </div>
                    </article>

                    <!-- ORA 03 GT -->
                    <article class="model-card">
                        <div class="model-card__image">
                            <img src="assets/img/models/ora3.webp" alt="GWM ORA 03 GT" loading="lazy" width="400" height="250">
                        </div>
                        <div class="model-card__content">
                            <h3 class="model-card__title">ORA 03 GT</h3>
                            <p class="model-card__description">Hatchback eléctrico deportivo y eficiente</p>
                            <button class="model-card__btn btn btn--secondary" data-model="ORA 03 GT">Me interesa</button>
                        </div>
                    </article>

                    <!-- ORA 03 -->
                    <article class="model-card">
                        <div class="model-card__image">
                            <img src="assets/img/models/ora2.webp" alt="GWM ORA 03" loading="lazy" width="400" height="250">
                        </div>
                        <div class="model-card__content">
                            <h3 class="model-card__title">ORA 03</h3>
                            <p class="model-card__description">Sedán eléctrico urbano con diseño futurista</p>
                            <button class="model-card__btn btn btn--secondary" data-model="ORA 03">Me interesa</button>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <!-- Servicios Section -->
        <section id="servicios" class="services">
            <div class="container">
                <header class="section__header">
                    <h2 class="section__title">Nuestros Servicios</h2>
                    <p class="section__description">Ofrecemos una experiencia completa para tu vehículo GWM</p>
                </header>

                <div class="services__grid">
                    <article class="service-card">
                        <div class="service-card__icon">
                            <img src="assets/img/icons/sales.svg" alt="Ventas" width="60" height="60">
                        </div>
                        <h3 class="service-card__title">Venta de Vehículos Nuevos</h3>
                        <p class="service-card__description">Amplio inventario de modelos GWM con financiación flexible</p>
                    </article>

                    <article class="service-card">
                        <div class="service-card__icon">
                            <img src="assets/img/icons/service.svg" alt="Servicio" width="60" height="60">
                        </div>
                        <h3 class="service-card__title">Servicio Técnico Autorizado</h3>
                        <p class="service-card__description">Mantenimiento especializado con repuestos originales</p>
                    </article>

                    <article class="service-card">
                        <div class="service-card__icon">
                            <img src="assets/img/icons/warranty.svg" alt="Garantía" width="60" height="60">
                        </div>
                        <h3 class="service-card__title">Garantía Extendida</h3>
                        <p class="service-card__description">Protección adicional para tu inversión</p>
                    </article>

                    <article class="service-card">
                        <div class="service-card__icon">
                            <img src="assets/img/icons/finance.svg" alt="Financiación" width="60" height="60">
                        </div>
                        <h3 class="service-card__title">Financiación</h3>
                        <p class="service-card__description">Opciones de crédito adaptadas a tu presupuesto</p>
                    </article>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contacto" class="contact">
            <div class="container">
                <header class="section__header">
                    <h2 class="section__title">Contáctanos</h2>
                    <p class="section__description">Estamos aquí para ayudarte a encontrar tu vehículo ideal</p>
                </header>

                <div class="contact__content">
                    <div class="contact__info">
                        <div class="contact__item">
                            <h3>Dirección</h3>
                            <p>Carrera 15 #123-45<br>Bogotá, Colombia</p>
                        </div>
                        <div class="contact__item">
                            <h3>Teléfono</h3>
                            <p><a href="tel:+5712345678">+57 1 234-5678</a></p>
                        </div>
                        <div class="contact__item">
                            <h3>Email</h3>
                            <p><a href="mailto:info@countrygroupgwm.com">info@countrygroupgwm.com</a></p>
                        </div>
                        <div class="contact__item">
                            <h3>Horarios</h3>
                            <p>Lun - Vie: 8:00 AM - 6:00 PM<br>Sáb: 8:00 AM - 5:00 PM</p>
                        </div>
                    </div>

                    <form class="contact__form" id="contactForm" method="POST" action="php/save_contact.php">
                        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                        
                        <div class="form__group">
                            <label for="nombre" class="form__label">Nombre completo *</label>
                            <input type="text" id="nombre" name="nombre" class="form__input" required aria-required="true">
                        </div>

                        <div class="form__group">
                            <label for="telefono" class="form__label">Teléfono *</label>
                            <input type="tel" id="telefono" name="telefono" class="form__input" required aria-required="true">
                        </div>

                        <div class="form__group">
                            <label for="email" class="form__label">Correo electrónico *</label>
                            <input type="email" id="email" name="email" class="form__input" required aria-required="true">
                        </div>

                        <div class="form__group">
                            <label for="mensaje" class="form__label">Mensaje</label>
                            <textarea id="mensaje" name="mensaje" class="form__textarea" rows="5" placeholder="Cuéntanos cómo podemos ayudarte"></textarea>
                        </div>

                        <button type="submit" class="btn btn--primary">Enviar mensaje</button>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="footer" role="contentinfo">
        <div class="container">
            <div class="footer__content">
                <div class="footer__section">
                    <h3 class="footer__title">Country Group GWM</h3>
                    <p class="footer__description">Tu concesionario oficial GWM de confianza</p>
                    <div class="footer__social">
                        <a href="https://www.facebook.com/countrygroupgwm" aria-label="Síguenos en Facebook" target="_blank" rel="noopener">
                            <img src="assets/img/icons/facebook.svg" alt="Facebook" width="24" height="24">
                        </a>
                        <a href="https://www.instagram.com/countrygroupgwm" aria-label="Síguenos en Instagram" target="_blank" rel="noopener">
                            <img src="assets/img/icons/instagram.svg" alt="Instagram" width="24" height="24">
                        </a>
                    </div>
                </div>

                <div class="footer__section">
                    <h3 class="footer__title">Enlaces útiles</h3>
                    <ul class="footer__links">
                        <li><a href="https://www.gwm.com.co/" target="_blank" rel="noopener">GWM Colombia</a></li>
                        <li><a href="#modelos">Nuestros modelos</a></li>
                        <li><a href="#servicios">Servicios</a></li>
                        <li><a href="#contacto">Contacto</a></li>
                    </ul>
                </div>

                <div class="footer__section">
                    <h3 class="footer__title">Contacto</h3>
                    <address class="footer__address">
                        <p>Carrera 15 #123-45<br>Bogotá, Colombia</p>
                        <p><a href="tel:+5712345678">+57 1 234-5678</a></p>
                        <p><a href="mailto:info@countrygroupgwm.com">info@countrygroupgwm.com</a></p>
                    </address>
                </div>
            </div>

            <div class="footer__bottom">
                <p>&copy; <?php echo date('Y'); ?> Country Group GWM. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <!-- WhatsApp Float Button -->
    <button class="whatsapp-float" aria-label="Contactar por WhatsApp" id="whatsappBtn">
        <img src="assets/img/icons/whatsapp.svg" alt="WhatsApp" width="32" height="32">
    </button>

    <!-- Modal WhatsApp -->
    <div class="modal" id="whatsappModal" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
        <div class="modal__overlay"></div>
        <div class="modal__content">
            <header class="modal__header">
                <h2 id="modalTitle" class="modal__title">¿Te interesa un modelo GWM?</h2>
                <button class="modal__close" aria-label="Cerrar modal">&times;</button>
            </header>
            
            <form class="modal__form" id="whatsappForm" method="POST" action="php/save_lead.php">
                <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                
                <div class="form__group">
                    <label for="modalNombre" class="form__label">Nombre completo *</label>
                    <input type="text" id="modalNombre" name="nombre" class="form__input" required aria-required="true">
                </div>

                <div class="form__group">
                    <label for="modalTelefono" class="form__label">Teléfono *</label>
                    <input type="tel" id="modalTelefono" name="telefono" class="form__input" required aria-required="true">
                </div>

                <div class="form__group">
                    <label for="modalVehiculo" class="form__label">Vehículo de interés *</label>
                    <select id="modalVehiculo" name="vehiculo" class="form__select" required aria-required="true">
                        <option value="">Selecciona un modelo</option>
                        <option value="TANK 500 HEV">TANK 500 HEV</option>
                        <option value="TANK 300 HEV">TANK 300 HEV</option>
                        <option value="NUEVO H7">NUEVO H7</option>
                        <option value="H6 HEV">H6 HEV</option>
                        <option value="JOLION PRO HEV">JOLION PRO HEV</option>
                        <option value="JOLION HEV">JOLION HEV</option>
                        <option value="POER PASSENGER">POER PASSENGER</option>
                        <option value="POER COMERCIAL">POER COMERCIAL</option>
                        <option value="WINGLE 7">WINGLE 7</option>
                        <option value="WINGLE 5">WINGLE 5</option>
                        <option value="ORA 03 GT">ORA 03 GT</option>
                        <option value="ORA 03">ORA 03</option>
                    </select>
                </div>

                <button type="submit" class="btn btn--primary">Enviar información</button>
            </form>
        </div>
    </div>

    <!-- Toast Notification -->
    <div class="toast" id="toast" role="alert" aria-live="polite"></div>

    <!-- JavaScript -->
    <script src="assets/js/main.js"></script>
</body>
</html>