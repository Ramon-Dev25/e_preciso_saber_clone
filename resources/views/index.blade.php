<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>É Preciso Saber</title>
    <link rel="stylesheet" href="{{ asset('css/index2.css') }}">
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
                        <a href="#about">Quem Somos?</a>
                        <a href="#product">Produtos</a>
                        <a href="#events">Eventos</a>
                        <a href="https://sodilivros.com.br/" target="_blank">Sodilivros</a>
                    </nav>

                    <div class="header-actions">

                        <a href="#contact" class="btn btn-primary">Contato!</a>

                        <button class="mobile-menu-toggle" id="mobile-menu-toggle">
                            <i class="fa-solid fa-bars"></i>
                        </button>

                    </div>
                </div>
            </div>
        </header>
    </div>

    <main>

        <!-- BOTÃO FLUTUANTE WhatsApp -->
        <a id="wa-button" class="floating-button-whats" aria-label="Link do WhastApp para mais informações" 
            href="https://wa.me/5511947507946?text=Olá! Gostaria de mais informações sobre o projeto É Preciso Saber."
            target="_blank">
            <i class="fa-brands fa-whatsapp"></i>
        </a>

        {{-- Exibir mensagens de erro --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Exibir mensagem de sucesso --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Hero Section -->
        <section id="hero" class="hero">
            <div class="container">
                <div class="hero-content">
                    <div class="hero-text">
                        <span class="subheading"><b>É Preciso Saber</b></span>
                        <h1><b>Histórias que</b> Educam, Encantam e Transformam!</h1>
                        <p>
                            Nascido da Editora B2B, o É Preciso Saber surgiu com o propósito de integrar tecnologia,
                            incentivo, gamificação e educação em uma experiência de aprendizagem significativa e
                            envolvente.
                        </p>
                    </div>
                    <div class="hero-image">
                        <img src="{{ asset('img/background/crianca-com-livro.png') }}" alt="">
                    </div>
                </div>
            </div>

            <div class="clouds-top">
                <img src="{{ asset('img/design/nuvens_transicao.png') }}" alt="">
            </div>
        </section>

        <!-- SOBRE -->
        <section id="about" class="team">
            <div class="container">
                <div class="team-content">
                    <div class="team-image">
                        <img src="{{ asset('img/background/bg-quem-somos.png') }}"
                            alt="Criança com Livro e Theo (o Golden Retriever">
                    </div>
                    <div class="team-text">
                        <span class="subheading accent">Quem Somos?</span>
                        <h2><b>É Preciso Saber</b> - Porque aprender também pode ser uma aventura.</h2>

                        <p>
                            Nascido da Editora B2B, o É Preciso Saber surgiu com o propósito de integrar tecnologia,
                            incentivo, gamificação e educação em uma experiência de aprendizagem significativa e
                            envolvente.
                        </p>

                        <p>
                            Baseamos nossos serviços na metodologia Blended Learning (Aprendizagem Híbrida), que combina
                            o ensino presencial com o remoto e também contempla o EAD (Educação a Distância). Mais do
                            que um modelo, acreditamos em uma abordagem flexível, que valoriza a diversidade, a
                            pluralidade e a conectividade como caminhos para despertar o interesse em aprender e
                            ensinar.
                        </p>

                        <p>
                            Além dos kits de livros com temas transversais alinhados à BNCC, oferecemos também jogos de
                            tabuleiro, cartas educativas e, mais recentemente, uma plataforma AVA (Ambiente Virtual de
                            Aprendizagem) moderna e interativa, criada para potencializar o aprendizado de forma
                            acessível e dinâmica.
                        </p>

                        <!-- <p>
                            Nosso objetivo vai além de distribuir livros — queremos construir uma base sólida para o desenvolvimento integral das crianças, promovendo não apenas a alfabetização, mas também o pensamento crítico, a criatividade e os valores essenciais para a formação de cidadãos conscientes, empáticos e preparados para o futuro.
                        </p> -->

                    </div>
                </div>
            </div>
        </section>

        <div class="saturn-container">
            <div class="planet-saturn">
                <img src="{{ asset('img/planet/saturno.png') }}" alt="Planeta Saturno">
            </div>
        </div>

        <!-- PRODUTOS -->
        <section id="product" class="services">
            <div class="container">
                <div class="section-header text-center">
                    <span class="subheading accent" style="color: white;">Nossos Produtos</span>
                    <h2 class="subtitle-services">Muito Mais que Livros!</h2>
                </div>

                <div class="services-body">

                    <div class="group-info-services">
                        <a href="{{ route('web.productsProjects') }}" class="box-info-services">
                            <img src="{{asset('img/icon/icon-book.png')}}" alt="">
                            <div class="text-box-info-services">
                                <h3>Livros / Projetos</h3>
                                <p>Livros alinhados à BNCC que educam, envolvem e desenvolvem competências para a vida.
                                </p>
                            </div>
                        </a>
                    </div>

                    <div class="services-img-children">
                        <div class="container-services-img">
                            <img src="{{asset('img/avatar/ihan_dancando.png')}}" alt="Meio Ambiente">
                        </div>
                    </div>

                    <div class="group-info-services">
                        <a href="{{ route('web.ava') }}" class="box-info-services">
                            <img src="{{asset('img/icon/icon-ava.png')}}" alt="">
                            <div class="text-box-info-services">
                                <h3>AVA</h3>
                                <p>Aprendizado híbrido e flexível que une presencial e EAD para conectar, engajar e
                                    transformar.!</p>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Theo -->
                <div class="theo-correndo">
                    <img src="{{ asset(('img/avatar/theo-correndo.png')) }}" alt="">
                </div>

            </div>
        </section>
        
        <div class="wave-bottom">
            <img src="{{ asset('img/design/onda_azul.png') }}" alt="">
        </div>

        <!-- EVENTOS -->
        <section id="events" class="events">

            <div class="container">
                @if ($events && count($events) > 0)
                    <div class="section-header text-center">
                        <span class="subheading accent">Eventos</span>
                        <h2>Conheça os Nossos Eventos!</h2>
                    </div>
                @endif

                <div class="events-grid">
                    @php
                        $sortedEvents = $events->sortByDesc('id')->take(2);
                    @endphp

                    @forelse($sortedEvents as $event)
                        @php
                            $img = asset('storage/' . $event->image_file);
                            $excerpt = \Illuminate\Support\Str::limit($event->synopsis ?? $event->description ?? '', 150);
                        @endphp

                        <div class="events-card">
                            <div class="events-image">
                                <img src="{{ $img }}" alt="{{ $event->name }}">
                            </div>

                            <div class="events-content">
                                <span class="date">{{ $event->days }}</span>
                                
                                <h3>{{ $event->name }}</h3>
                                <p style="margin-bottom: 0.2rem;">{{ $excerpt }}</p>                                
                                
                                <span class="address">
                                    <i class="fa-solid fa-map-location-dot"></i>
                                    {{ $event->address }}
                                </span>
                                <a href="{{ route('web.eventsManager', $event->id) }}" class="link-with-arrow">
                                    Venha Participar!
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="events-grid">
                            <div class="btn-card-find-out-more">
                                <p>
                                    <b style="color: #1c7ec2;">Em Breve,</b> novos eventos para você!
                                </p>

                                <img src="{{ asset('img/avatar/capitao_mais_coruja.png') }}"
                                    alt="Capitão mais coruja Durval - Eventos">
                            </div>
                        </div>
                    @endforelse

                    @if ($events->count() > 2)
                        <div class="btn-card-find-out-more">
                            <p>
                                <b style="color: #1c7ec2;">Reviva nossos eventos</b> anteriores e prepare-se para as
                                próximas experiências.
                            </p>

                            <img src="{{ asset('img/avatar/capitao_mais_coruja.png') }}"
                                alt="Capitão mais coruja Durval - Eventos">

                            <a href="#" class="btn-find-out-more">
                                <i class="fa-solid fa-circle-plus"></i>
                                Saiba Mais!
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </section>

        <!-- CONTATO -->
        <section id="contact" class="contact">

            <div class="container">
                <div class="img-info-contact">
                    <h3>Nos envie uma mensagem por aqui ou pelo <b>WhatsApp</b></h3>
                </div>

                <div class="from-group-contact">
                    <div class="info-contact">
                        <form id="contactForm" class="contact-form" action="{{ route('web.formContact') }}"
                            method="POST">
                            <div class="form-row">
                                <div class="form-group-contact">
                                    <label for="nome" class="form-label">Nome <b style="color:red;">*</b></label>
                                    <input type="text" id="nome" name="name" class="form-input" required>

                                    @error('name')
                                        <small class="message-error">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group-contact">
                                    <label for="email" class="form-label">E-mail <b style="color:red;">*</b></label>
                                    <input type="email" id="email" name="email" class="form-input" required>

                                    @error('email')
                                        <small class="message-error">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group-contact">
                                    <label for="telefone" class="form-label">Telefone <b
                                            style="color:red;">*</b></label>
                                    <input type="number" id="telefone" name="phone" class="form-input" required>

                                    @error('phone')
                                        <small class="message-error">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group-contact">
                                    <label for="instituicao" class="form-label">Instituição</label>
                                    <input type="text" id="instituicao" name="institution" class="form-input">

                                    @error('institution')
                                        <small class="message-error">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group-contact">
                                <label for="mensagem" class="form-label">Mensagem <b style="color:red;">*</b></label>
                                <textarea name="message" id="message" rows="4" class="form-textarea" required></textarea>

                                @error('message')
                                    <small class="message-error">{{ $message }}</small>
                                @enderror
                            </div>

                            <div id="formMessages"></div>

                            <button type="submit" class="btn-submit">
                                <input type="hidden" name="type" value="precisoSaber">
                                @csrf
                                <i class="fas fa-paper-plane"></i>
                                Enviar Mensagem
                            </button>
                        </form>
                    </div>

                    <div class="img-info-contact">
                        <img src="{{ asset('img/ava/todos-juntos.png') }}" alt="Todo os Personagens Juntos">

                        <a href="https://wa.me/5511947507946?text=Olá! Gostaria de mais informações sobre o projeto É Preciso Saber."
                            class="whats-circle" target="_blank">
                            <i class="fa-brands fa-whatsapp"></i> (11) 94750-7946
                        </a>
                    </div>

                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <div class="footer-content">

                <div class="footer-img">
                    <img src="{{ asset('img/logo_e_preciso_saber.png') }}" alt="Logo É Preciso Saber">
                </div>

                <div class="footer-about">
                    <h3>Nos sigam nas Redes!</h3>
                    <div class="social-links">
                        <a href="#" class="social-link" target="_blank" aria-label="Link para o Instagram É Preciso Saber"><i class="fa-brands fa-instagram"></i> </a>

                        <a href="#" class="social-link" target="_blank" aria-label="Link para o Facebook do É Preciso Saber"><i class="fa-brands fa-facebook-f"></i> </a>

                        <a class="social-link" target="_blank" aria-label="Link para o WhatsApp do É Preciso Saber"
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
                    <a href="https://www.linkedin.com/in/ramon-fernandes-cabral-6a6169336/" target="_blank" aria-label="Link para o LinkedIn do desenvolvedor do site">
                        <i class="fa-brands fa-linkedin"></i> 
                        Ramon Cabral
                    </a>
                </p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <script src="{{ asset('js/index.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const buttons = document.querySelectorAll('.tabs-header .tab-button');
            const contents = document.querySelectorAll('.tab-content');

            function activateTab(targetId, buttonEl) {
                buttons.forEach(b => b.classList.remove('active'));
                contents.forEach(c => c.classList.remove('active'));

                if (buttonEl) buttonEl.classList.add('active');
                const target = document.getElementById(targetId);
                if (target) target.classList.add('active');
            }

            buttons.forEach(btn => {
                btn.addEventListener('click', function () {
                    const tab = this.dataset.tab;
                    activateTab(tab, this);
                });
            });

            // suporte para navegação por teclado (opcional)
            document.querySelector('.tabs-header')?.addEventListener('keydown', function (e) {
                if (e.key === 'ArrowRight' || e.key === 'ArrowLeft') {
                    const activeIndex = Array.from(buttons).findIndex(b => b.classList.contains('active'));
                    let next = activeIndex;
                    if (e.key === 'ArrowRight') next = Math.min(buttons.length - 1, activeIndex + 1);
                    if (e.key === 'ArrowLeft') next = Math.max(0, activeIndex - 1);
                    if (next !== activeIndex && buttons[next]) {
                        buttons[next].click();
                        buttons[next].focus();
                    }
                }
            });
        });
    </script>
</body>

</html>