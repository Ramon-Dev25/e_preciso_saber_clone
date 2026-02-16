<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AVA - É Preciso Saber</title>

    <meta name="description"
        content="Liberte o potencial das crianças com um aprendizado que é divertido e envolvente. Nossa plataforma virtual transforma a educação, tornando-a uma jornada cativante.">
    <meta name="author" content="AVA É Preciso Saber">

    <meta name="twitter:site" content="@avaeprecisosaber">

    <link rel="icon" type="image/png" href="{{ asset('img/ava/favicon-ava/favicon-32x32.png') }}">

    <!-- FontAwesome 6.7.2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ asset('css/ava.css') }}">
</head>

<body>
    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="nav-content">
                <div class="logo">
                    <img src="{{ asset('img/ava/logo-ava-branco.png') }}" alt="AVA É Preciso Saber - Logo" class="logo-img">
                </div>

                <nav class="nav-menu" id="navMenu">
                    <a href="#home" class="nav-link">AVA</a>
                    <a href="#sobre" class="nav-link">Sobre</a>
                    <a href="#pilares" class="nav-link">Pilares</a>
                    <a href="#contato" class="nav-link">Contato</a>
                    <a href="{{ route('web.index') }}" class="nav-link">É Preciso Saber</a>
                </nav>

                <div class="nav-actions">
                    <a href="https://wa.me/5511947507946?text=Olá! Gostaria de mais informações sobre o AVA É Preciso Saber." target="_blank" class="btn-login" aria-label="Link para o WhatsApp do É Preciso Saber">
                        <i class="fa-brands fa-whatsapp"></i>
                        WhatsApp
                    </a>
                    <button class="mobile-toggle" id="mobileToggle">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero-section" id="home">
        <!-- Background elements -->
        <div class="hero-bg">
            <div class="floating-element planet-1"></div>
            <div class="floating-element planet-2"></div>
        </div>

        <div class="container">
            <div class="hero-content">
                <!-- Left side - Text content -->
                <div class="hero-text">
                    <h1 class="hero-title">
                        Tecnologia que conecta e transforma a
                        <b class="hero-title-highlight">Educação Brasileira</b>
                    </h1>

                    <p class="hero-description">
                        Transformando o aprendizado em uma jornada inesquecível. Nossa tecnologia é a chave para despertar o potencial das crianças com uma aprendizagem divertida, interativa e cheia de criatividade.
                    </p>

                    <a href="https://edu.avaensinodigital.com.br/bbaprender/login" class="btn-hero" target="_blank">Transforme Seu Aprendizado</a>
                </div>

                <!-- Right side - Astronaut with orbiting planets -->
                <div class="hero-visual">
                    <div class="astronaut-container">
                        <!-- Central astronaut -->
                        <div class="astronaut-wrapper">
                            <img src="{{ asset('img/ava/ava-hero-bg.png') }}" alt="Ihan e Theo com o Logo - Flutuando" class="astronaut-img">
                        </div>

                        <!-- Orbiting elements -->
                        <div class="orbit-container">
                            <!-- Orbit circle -->
                            <div class="orbit-circle"></div>

                            <!-- Stars -->
                            <div class="star star-1">
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="star star-2">
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="star star-3">
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <!-- Rocket icon -->
        <div class="stats-rocket">
            <div class="rocket-icon">
                <i class="fas fa-rocket"></i>
            </div>
        </div>

        <!-- ATIVAR QUANDO TIVER NÚMEROS RELEVANTES PARA APRESENTAR -->
        <!-- <div class="container">
            <div class="stats-header">
                <h2 class="stats-title">É Preciso Saber em números</h2>
                <p class="stats-subtitle">
                    Há 5 anos aprimorando o aprendizado, em qualquer lugar.
                </p>
            </div>

            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-school"></i>
                    </div>
                    <h3 class="stat-number">+ 2 mil</h3>
                    <p class="stat-label">Instituições</p>
                </div>

                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="stat-number">+ 800 mil</h3>
                    <p class="stat-label">Usuários</p>
                </div>

                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                    <h3 class="stat-number">+ 30 mil</h3>
                    <p class="stat-label">Educadores</p>
                </div>

                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-gamepad"></i>
                    </div>
                    <h3 class="stat-number">+ 8 mil</h3>
                    <p class="stat-label">Desafios Gamificados</p>
                </div>
            </div>
        </div> -->

        <!-- Decorative elements -->
        <div class="stats-decorations">
            <div class="decoration decoration-1"></div>
            <div class="decoration decoration-2"></div>
            <div class="decoration decoration-3">
                <i class="fas fa-star"></i>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about-section" id="sobre">
        <!-- Cloud decorations -->
        <div class="about-clouds">
            <div class="cloud cloud-1">
                <div class="cloud-main"></div>
                <div class="cloud-small"></div>
            </div>
            <div class="cloud cloud-2">
                <div class="cloud-main"></div>
                <div class="cloud-small"></div>
            </div>
        </div>

        <div class="container">
            <div class="about-content">
                <div class="about-text">
                    <h2 class="about-title">
                        Unimos Tecnologia e Educação para criar uma Experiência de <b class="about-title-highlight">Aprendizado Inovadora e Envolvente.</b>
                    </h2>

                    <p class="about-description">
                        Nosso Ambiente Virtual de Aprendizagem (AVA) foi criado para ir além da sala de aula. Ele potencializa as interações entre professores e alunos, transformando a experiência de aprendizado com materiais dinâmicos e atrativos. Assim, estimulamos educadores e estudantes a se desenvolverem e a se prepararem para os desafios do mundo moderno.
                    </p>
                </div>

                <div class="segments-section">
                    <h3 class="segments-title">Segmentos atendidos:</h3>

                    <div class="segments-grid">
                        <div class="segment-item">
                            <div class="segment-dot"></div>
                            <span class="segment-text">Educação Infantil</span>
                        </div>
                        <div class="segment-item">
                            <div class="segment-dot"></div>
                            <span class="segment-text">Ensino Fundamental - Anos Iniciais</span>
                        </div>
                        <div class="segment-item">
                            <div class="segment-dot"></div>
                            <span class="segment-text">Ensino Fundamental - Anos Finais</span>
                        </div>
                        <div class="segment-item">
                            <div class="segment-dot"></div>
                            <span class="segment-text">Ensino Médio</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Decorative planets -->
        <div class="about-decorations">
            <div class="decoration decoration-4"></div>
            <div class="decoration decoration-5"></div>
        </div>
    </section>
    
    <!-- PILARES DO AVA -->
    <section id="pilares" class="pilares section">
        
        <div class="container">
            <div class="stats-rocket">
                <div class="rocket-icon">
                    <i class="fa-solid fa-microchip"></i>
                </div>
            </div>

            <!-- Decorative elements -->
            <div class="stats-decorations">
                <div class="decoration decoration-1"></div>
                <div class="decoration decoration-2"></div>
                <div class="decoration decoration-3">
                    <i class="fas fa-star"></i>
                </div>
            </div>

            <h2 class="section-title">Pilares do A<b>V</b>A É Preciso Saber</h2>

            <div class="pilares-grid">
                <!-- Item -->
                <div class="pilar-card">
                    <div class="pilar-stat-icon">
                        <img src="{{ asset('img/ava/pilares/gamificacao.png') }}" alt="Gamificação" class="pilar-icon">
                    </div>                    
                    <h3>Gamificação, Ludicidade e Conteúdo</h3>
                    <p>Aprendizagem envolvente com jogos, desafios, moedas virtuais e personagens que estimulam criatividade, curiosidade e autonomia do aluno.</p>
                </div>

                <div class="pilar-card">
                    <div class="pilar-stat-icon">
                        <img src="{{ asset('img/ava/pilares/bncc.png') }}" alt="BNCC Logo" class="pilar-icon">
                    </div>
                    <h3>Alinhamento à BNCC e Materiais Didáticos</h3>
                    <p>Compatível com material próprio, PNLD e editores, o AVA garante aderência à BNCC, fortalecendo as competências e habilidades previstas na base.</p>
                </div>

                <div class="pilar-card">
                    <div class="pilar-stat-icon">
                        <img src="{{ asset('img/ava/pilares/metodologias.png') }}" alt="Metodologias Ativas" class="pilar-icon">
                    </div>
                    <h3>Avaliação Continuada e Metodologias Ativas</h3>
                    <p>Oferece recursos que facilitam a aplicação de metodologias ativas e avaliações contínuas, com o apoio da Taxonomia de Bloom.</p>
                </div>

                <div class="pilar-card">
                    <div class="pilar-stat-icon">
                        <img src="{{ asset('img/ava/pilares/multiacesso.png') }}" alt="Gestão Inteligente" class="pilar-icon">
                    </div>
                    <h3>Multiacesso e Gestão Inteligente</h3>
                    <p>Acesso por múltiplos perfis, dashboards de gestão e relatórios analíticos com integração a outros sistemas via APIs e SSO.</p>
                </div>

                <div class="pilar-card">
                    <div class="pilar-stat-icon">
                        <img src="{{ asset('img/ava/pilares/responsivo.png') }}" alt="Responsividade" class="pilar-icon">
                    </div>
                    <h3>Imersão Digital e Responsividade Total</h3>
                    <p>Funciona em celulares, tablets, PCs e lousas digitais, permitindo acesso em diferentes dispositivos com design responsivo.</p>
                </div>

                <div class="pilar-card">
                    <div class="pilar-stat-icon">
                        <img src="{{ asset('img/ava/pilares/acessibilidade.png') }}" alt="Inclusão" class="pilar-icon">
                    </div>
                    <h3>Acessibilidade e Inclusão</h3>
                    <p>Inclui recursos como Libras, leitura em voz alta, contraste, fonte ampliada e suporte a usuários com limitações visuais e cognitivas.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section" id="contato">
        <!-- Cloud decorations -->
        <div class="about-clouds">
            <div class="cloud cloud-1">
                <div class="cloud-main"></div>
                <div class="cloud-small"></div>
            </div>
            <div class="cloud cloud-2">
                <div class="cloud-main"></div>
                <div class="cloud-small"></div>
            </div>
        </div>

        <div class="container">
            <div class="contact-content">
                <div class="contact-header">
                    <h2 class="contact-title">Entre em <b>Contato</b></h2>
                    <p class="contact-subtitle">
                        Quer saber mais sobre nossas soluções? Entre em contato conosco!
                    </p>
                </div>

                <div class="contact-body">
                    <div class="contact-img">
                        <img src="{{ asset('img/ava/apresentacao-ava.png') }}" alt="Todos os Personagens Juntos">
                    </div>

                    <div class="contact-form-wrapper">
                        <form id="contactFormAva" class="contact-form" action="{{ route('web.formContactAva') }}"
                            method="POST">
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="nome" class="form-label">Nome <b style="color:red;">*</b></label>
                                    <input type="text" id="nome" name="name" class="form-input" required>

                                    @error('name')
                                        <small class="message-error">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email" class="form-label">E-mail <b style="color:red;">*</b></label>
                                    <input type="email" id="email" name="email" class="form-input" required>

                                    @error('email')
                                        <small class="message-error">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">

                                <div class="form-group">
                                    <label for="telefone" class="form-label">Telefone <b style="color:red;">*</b></label>
                                    <input type="number" id="telefone" name="phone" class="form-input" required>
    
                                    @error('phone')
                                        <small class="message-error">{{ $message }}</small>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="instituicao" class="form-label">Instituição</label>
                                    <input type="text" id="instituicao" name="institution" class="form-input">
    
                                    @error('institution')
                                        <small class="message-error">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="segmento" class="form-label">Segmento de Ensino</label>
                                <select id="segment" name="segment" class="form-select">
                                    <option value="">Selecione um segmento</option>
                                    <option value="educacao-infantil">Educação Infantil</option>
                                    <option value="fundamental-anos-iniciais">Ensino Fundamental - Anos Iniciais</option>
                                    <option value="fundamental-anos-finais">Ensino Fundamental - Anos Finais</option>
                                    <option value="ensino-medio">Ensino Médio</option>
                                    <option value="todos">Todos</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="mensagem" class="form-label">Mensagem <b style="color:red;">*</b></label>
                                <textarea name="message" id="mensagem" rows="4" class="form-textarea" required></textarea>

                                @error('message')
                                    <small class="message-error">{{ $message }}</small>
                                @enderror
                            </div>

                            <div id="formMessages"></div>

                            <button type="submit" class="btn-submit">
                                <input type="hidden" name="type" value="ava">
                                @csrf
                                <i class="fas fa-paper-plane"></i>
                                Enviar Mensagem
                            </button>
                        </form>  
                    </div>
                </div>
            </div>
        </div>

        <!-- Decorative elements -->
        <div class="contact-decorations">
            <div class="decoration decoration-6"></div>
            <div class="decoration decoration-7"></div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <!-- Logo and description -->
                <div class="footer-main">
                    <div class="footer-logo">
                        <img src="{{ asset('img/ava/logo-ava-eprecisosaber-branco.png') }}" alt="AVA É Preciso Saber" class="footer-logo-img">
                    </div>

                    <p class="footer-description">
                        Acelerando a educação no Brasil, unimos o poder da tecnologia com a paixão pelo aprendizado para liberar o potencial de cada criança.
                    </p>
                </div>

                <!-- Contact Info -->
                <div class="footer-contact">
                    <h4 class="footer-contact-title">Contato</h4>
                    <div class="footer-contact-list">
                        <div class="contact-item">
                            <i class="fas fa-envelope"></i>
                            <span>alexbarbosa@bbservicos.com.br</span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-phone"></i>
                            <span>(11) 94750-7946</span>
                        </div>
                        <div class="footer-social">
                            <a href="#" class="social-link"  aria-label="Link para o Facebook do É Preciso Saber">
                                <i class="fab fa-facebook"></i>
                            </a>
                            <a href="#" class="social-link" aria-label="Link para o Instagram É Preciso Saber">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="https://wa.me/5511947507946?text=Olá! Gostaria de mais informações sobre o AVA É Preciso Saber." target="_blank" class="social-link" aria-label="Link para o WhatsApp do É Preciso Saber sobre o AVA">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom bar -->
            <div class="footer-bottom">
                <div class="footer-bottom-content">
                    <p class="footer-copyright">
                        <b>© AVA É Preciso Saber.</b> Todos os direitos reservados.
                    </p>
                    <div class="footer-bottom-links">
                        <p class="footer-text-link">Site desenvolvido por</p>
                        <a href="https://www.linkedin.com/in/ramon-fernandes-cabral-6a6169336/" class="footer-bottom-link" target="_blank">
                            <i class="fab fa-linkedin"></i> Ramon Cabral
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Decorative elements -->
        <div class="footer-decorations">
            <div class="decoration decoration-8"></div>
            <div class="decoration decoration-9"></div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="{{ asset('js/ava.js') }}"></script>
</body>

</html>