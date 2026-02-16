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
                        <a href="{{ route('web.index') }}">Voltar</a>
                        <a href="#projects">Projetos</a>
                        <a href="#books">Catálogo</a>
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
        <a id="wa-button" class="floating-button-whats"
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

        <section id="projects">
            <div class="container">
                <div class="projects-container">
                    <div class="text">
                        <h1>Projetos</h1>
                        <p>Conheça os nossos projetos!</p>
                    </div>
    
                    <div class="cards-projects">
                        <div class="card-project-50">
                            <div class="animation-card">
                                <div class="info-card-project">
                                    <div class="new">
                                        <i class="fa-solid fa-star"></i>
                                        Novidade!
                                    </div>
                                    <img src="{{ asset('img/cads-projects/bem-estar-animal.png') }}" alt="Banner - Projeto Bem-Estar Animal">   
                                </div>
    
                                <a class="btn-card-project" target="_blank"
                                href="https://wa.me/5511947507946?text=Olá! Gostaria de mais informações sobre o projeto do Bem-Estar Animal.">
                                    <img src="{{ asset('img/cads-projects/bem-estar-animal-info.png') }}" alt="Banner - Projeto Bem-Estar Animal">                            
                                </a>
                            </div>
                        </div>

                        <div class="card-project-50">
                            <div class="animation-card">
                                <div class="info-card-project">
                                    <div class="new">
                                        <i class="fa-solid fa-star"></i>
                                        Novidade!
                                    </div>
                                    <img src="{{ asset('img/cads-projects/dengue.png') }}" alt="Banner - Projeto Dengue">   
                                </div>
    
                                <a class="btn-card-project" target="_blank"
                                href="https://wa.me/5511947507946?text=Olá! Gostaria de mais informações sobre o projeto da Dengue.">
                                    <img src="{{ asset('img/cads-projects/dengue-info.png') }}" alt="Banner - Combate à Dengue">                            
                                </a>
                            </div>
                        </div>
                    </div>
    
                    <div class="cards-projects">

                        <div class="card-project-30">
                            <div class="animation-card">
                                <div class="info-card-project">
                                    <img src="{{ asset('img/cads-projects/socioemocional.png') }}" alt="Banner - Projeto Socioemocional capa">   
                                </div>
    
                                <a class="btn-card-project" target="_blank"
                                href="https://wa.me/5511947507946?text=Olá! Gostaria de mais informações sobre o material do Socioemocional.">
                                    <img src="{{ asset('img/cads-projects/socioemocional-info.png') }}" alt="Banner - Socioemocional Informativo">                            
                                </a>
                            </div>
                        </div>

                        <div class="card-project-30">
                            <div class="animation-card">
                                <div class="info-card-project">
                                    <img src="{{ asset('img/cads-projects/educacao-financeira.png') }}" alt="Banner - Educação Financeira capa">   
                                </div>
    
                                <a class="btn-card-project" target="_blank"
                                href="https://wa.me/5511947507946?text=Olá! Gostaria de mais informações sobre o material do Educação Financeira">
                                    <img src="{{ asset('img/cads-projects/educacao-financeira-info.png') }}" alt="Banner - Educação Financeira informativo">                            
                                </a>
                            </div>
                        </div>

                        <div class="card-project-30">
                            <div class="animation-card">
                                <div class="info-card-project">
                                    <img src="{{ asset('img/cads-projects/transversais.png') }}" alt="Banner - Temas Transversais capa">   
                                </div>
    
                                <a class="btn-card-project" target="_blank"
                                href="https://wa.me/5511947507946?text=Olá! Gostaria de mais informações sobre o material dos Temas Transversais">
                                    <img src="{{ asset('img/cads-projects/transversais-info.png') }}" alt="Banner - Temas Transversais informativo">                            
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="btn-project">                        
                        <a href="https://wa.me/5511947507946?text=Olá! Gostaria de mais informações sobre os projetos do É Preciso Saber." class="btn btn-white" target="_blank">
                            <i class="fa-brands fa-whatsapp"></i>
                            Saiba Mais!
                        </a>
                    </div>
                </div>
            </div>

            <div class="clouds-top">
                <img src="{{ asset('img/design/nuvens_transicao.png') }}" alt="">
            </div>
        </section>

        <section id="books">
            <div class="container">
                <h2 style="color: #1c7ec2; margin-bottom: 0;">Explore nosso Catálogo</h2>
                <p>Encontre o livro perfeito para você!</p>

                <div class="book-store-section">
                    <div class="store-container">
                        
                        <div class="filter-row">
                            <div class="search-wrapper">
                                <i class="fa-solid fa-magnifying-glass search-icon"></i>
                                <input type="text" placeholder="Buscar pelo nome..." class="store-input">
                            </div>

                            <div class="tags-wrapper">
                                <button class="store-tag-btn active" data-tab="all">Todos</button>

                                @forelse($kits as $kit)
                                    <button class="store-tag-btn" data-tab="tab-{{ $kit->id }}">
                                        {{ $kit->name }}
                                    </button>
                                @empty
                                @endforelse
                            </div>
                        </div>

                        <div class="store-meta-info">
                            <p>Mostrando <b></b> Itens</p>
                        </div>

                        <div id="grids-wrapper">
                            @forelse($kits as $kit)
                                <div class="books-grid" id="tab-{{ $kit->id }}" >
                                    @forelse($kit->products as $kp)
                                        @php
                                            $p = $kp->product;
                                            $img = $p->image_file
                                                ? asset('storage/' . $p->image_file)
                                                : ($p->image_url ?? asset('img/capa-defaut.png'));
                                            $excerpt = \Illuminate\Support\Str::limit($p->synopsis ?? $p->description ?? '', 100);
                                        @endphp
    
                                        <article class="book-unit" role="button" tabindex="0" onclick="openBookPopup({{ $p->id }})"
                                                onkeypress="if(event.key === 'Enter'){ openBookPopup({{ $p->id }}) }">
                                            <div class="unit-cover">
                                                <img src="{{ $img }}" alt="{{ e($p->title) }}" loading="lazy">
                                            </div>
                                            <div class="unit-body">
    
                                                <h3 class="unit-title">{{ $p->title }}</h3>
                                                <p class="unit-author" title="{{ $p->synopsis }}">
                                                    {{ \Illuminate\Support\Str::limit($p->synopsis, 100) }}
                                                </p>
                                                <span class="unit-badge">{{ $kit->name }}</span>
                                            </div>
                                        </article>                                    
                                    @empty
                                    @endforelse
                                </div>
                            @empty
                            @endforelse
                        </div>

                        <div id="pagination-controls" class="store-pagination"></div>

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
                    <a href="https://www.linkedin.com/in/ramon-fernandes-cabral-6a6169336/" target="_blank">
                        <i class="fa-brands fa-linkedin"></i>
                        Ramon Cabral
                    </a>
                </p>
            </div>
        </div>
    </footer>

    <!-- POP-UP'S -->
    <div id="bookPopup" class="book-popup">
        <div class="book-popup-content">
            <div class="book-popup-group">

                <div class="close-button-container">
                    <span class="close-button" onclick="closeBookPopup()">
                        <i class="fa-solid fa-xmark"></i>
                    </span>
                </div>

                <div class="from-group-book">
                    <div class="info-book">
                        <div class="text-title-book">
                            <h2></h2>
                            <h3></h3>
                        </div>
                        <div class="text-info-book">
                            <p></p>
                        </div>

                        <div class="info-book-icons">
                            <p><i class="fa-regular fa-calendar-check"></i></p>
                            <p><i class="fa-solid fa-pen-to-square"></i></p>
                            <p><i class="fa-solid fa-children"></i></p>
                        </div>
                    </div>

                    <div class="img-info-book" id="imgBook">
                        <div class="img-book">
                            <img src="" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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