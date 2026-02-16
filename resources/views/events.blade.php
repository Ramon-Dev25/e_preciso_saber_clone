<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Descubra eventos únicos de aprendizado, networking e crescimento. Workshops, palestras, cursos e meetups para inspirar e conectar pessoas.">
    <meta name="author" content="Eventos">
    <title>É Preciso Saber</title>
    <link rel="stylesheet" href="{{ asset('css/index2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/events.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/fontawesome-free-6.5.2-web/css/all.min.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon-96x96.png') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- IMPORTANT: DO NOT REMOVE THIS SCRIPT TAG OR THIS VERY COMMENT! -->
    <script src="https://cdn.gpteng.co/gptengineer.js" type="module"></script>
</head>

<body>
    <div class="header-aling">
        <header id="header">
            <div class="container">
                <div class="header-content">
                    <a href="{{ route('web.index') }}" class="logo">
                        <img src="{{ asset('img/logo_e_preciso_saber.png') }}" alt="Logo É Preciso Saber">
                    </a>

                    <nav id="nav">
                        <a href="#hero">Home</a>
                        <a href="#eventos">Eventos</a>
                        <a href="{{ route('web.index') }}">É Preciso</a>
                        <!-- <a href="{{ route('web.bibliotecaCertaIndex') }}" id="biblioteca_certa">Biblioteca Certa</a> -->
                        <a href="https://sodilivros.com.br/" target="_blank">Sodilivros</a>
                    </nav>

                    <div class="header-actions">

                        <button class="mobile-menu-toggle" id="mobile-menu-toggle">
                            <i class="fa-solid fa-bars"></i>
                        </button>

                    </div>
                </div>
            </div>
        </header>
    </div>

    <!-- Hero Section -->
    <section id="hero" class="hero-section">
        <div class="container">
            <div class="hero-content-events">
                <h1 class="hero-title">
                    Eventos que <span class="accent-text">Transformam</span> e <span class="accent-text">Conectam</span>
                </h1>

                <p class="hero-description">
                    Descubra experiências únicas de aprendizado, networking e crescimento.
                    Participe dos nossos eventos e faça parte de uma comunidade inspiradora!
                </p>

                <div class="hero-buttons">
                    <a href="#eventos" class="btn btn-primary">Ver Próximos Eventos</a>
                    <a href="#contato" class="btn btn-outline">Saiba Mais</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Events Section -->
    <section id="eventos" class="events-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Próximos Eventos</h2>
                <p class="section-description">
                    Explore nossa seleção de eventos e encontre a experiência perfeita para você
                </p>
            </div>

            <!-- Event Filters -->
            <div class="event-filters">
                <button class="filter-btn active" data-filter="todos">Todos os Eventos</button>
                <button class="filter-btn" data-filter="workshop">Workshops</button>
                <button class="filter-btn" data-filter="palestra">Palestras</button>
                <button class="filter-btn" data-filter="curso">Cursos</button>
                <button class="filter-btn" data-filter="meetup">Meetups</button>
            </div>

            <!-- Event Grid -->
            <div class="event-grid"></div>

            <!-- Empty State -->
            <div class="empty-state hidden">
                <p>Nenhum evento encontrado nesta categoria.</p>
            </div>
        </div>
    </section>

    <!-- Wave Divider (Flipped) -->
    <div class="wave-divider flip">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z"
                opacity=".25" fill="hsl(215, 95%, 28%)" />
            <path
                d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z"
                opacity=".5" fill="hsl(215, 95%, 28%)" />
            <path
                d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z"
                fill="hsl(215, 95%, 28%)" />
        </svg>
    </div>



    <footer>
        <div class="container">
            <div class="footer-content">

                <div class="footer-img">
                    <img src="{{ asset('img/logo_e_preciso_saber.png') }}" alt="Logo É Preciso Saber">
                </div>

                <div class="footer-about">
                    <h3>Nos sigam nas Redes!</h3>
                    <div class="social-links">
                        <a href="#" class="social-link" target="_blank"><i class="fa-brands fa-instagram"></i> </a>

                        <a href="#" class="social-link" target="_blank"><i class="fa-brands fa-facebook-f"></i> </a>

                        <a class="social-link" target="_blank"
                            href="https://wa.me/5511947507946?text=Olá! Gostaria de mais informações sobre o projeto É Preciso Saber.">
                            <i class="fa-brands fa-whatsapp"></i>
                        </a>
                    </div>
                </div>

                <div class="footer-contact">
                    <h3>Informações para Contato</h3>
                    <ul>
                        <li>
                            <span><i class="fa-regular fa-envelope"></i> alexbarbosa@bbservicos.com.br</span>
                        </li>

                        <li>
                            <span><i class="fa-brands fa-whatsapp"></i> (11) 94750-7946</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <p><b>© <span id="current-year"></span> É Preciso Saber.</b> Todos direitos reservados.</p>
                <p>Site desenvolvido por 
                    <a href="https://www.linkedin.com/in/ramon-fernandes-cabral-6a6169336/"  target="_blank">
                        <i class="fa-brands fa-linkedin"></i> 
                        Ramon Cabral
                    </a>
                </p>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src={{ asset('js/events.js') }}></script>
</body>

</html>