<!--
=========================================================
* Argon Dashboard 3 - v2.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2024 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="pt-br">

@include('adm.layouts.snippets.head')

@php
function isActive($routes)
{
return request()->routeIs($routes) ? 'active' : ' ';
}
@endphp

<body
    class="g-sidenav-show bg-gray-200 {{ auth()->check() && auth()->user()->theme === 'dark' ? 'dark-version' : '' }}">

    <aside
        class="sidenav bg-gradient-nav navbar navbar-vertical navbar-expand-xs border-0 fixed-start"
        id="sidenav-main">

        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>

            <a class="navbar-brand m-0" href="{{ asset('web.index') }}" target="_blank">
                <img src="{{ asset('img/logo_e_preciso_saber.png') }}" class="navbar-brand-img" alt="main_logo">
            </a>
        </div>

        <hr class="horizontal dark mt-0">

        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link {{ isActive('controlPanel.index') }}" href="{{ route('controlPanel.index') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-comments text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1 text-white">
                            Contatos
                        </span>

                        @if ($contacts_open)                        
                            <div class=" icon-shape icon-sm mx-2 bg-gradient-warning shadow text-center text-white">
                                <span class="badge p-0">{{ $contacts_open ?? 0 }}</span>
                            </div>
                        @endif

                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link {{ isActive('adm.product.*') }}" href="{{ route('adm.product.index') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-book text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1 text-white">Produtos</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ isActive('adm.kits.*') }}" href="{{ route('adm.kits.index') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-layer-group text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1 text-white">Kits</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link {{ isActive('adm.events.*') }}" href="{{ route('adm.events.index') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-calendar-check text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1 text-white">Eventos</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ isActive('user.users') }}" href="{{ route('user.users') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-users text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1 text-white">Usuários</span>
                    </a>
                </li>

            </ul>
        </div>

    </aside>

    <main class="main-content position-relative border-radius-lg ">

        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-1 shadow-none border-radius-xl " id="navbarBlur"
            data-scroll="false">
            <div class="container-fluid py-1 px-3">

                <nav aria-label="breadcrumb">
                    <h6 class="text-dark mb-0">@yield('page-title')</h6>
                </nav>

                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">

                    <ul class="navbar-nav  justify-content-end">

                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-dark p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line bg-dark"></i>
                                    <i class="sidenav-toggler-line bg-dark"></i>
                                    <i class="sidenav-toggler-line bg-dark"></i>
                                </div>
                            </a>
                        </li>

                        <li class="nav-item px-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-dark p-0">
                                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                            </a>
                        </li>

                        <!-- NOTIFICAÇÕES -->
                        <!-- <li class="nav-item dropdown pe-2 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-bell cursor-pointer"></i>
                            </a>
                            <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4"
                                aria-labelledby="dropdownMenuButton">
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex py-1">
                                            <div class="my-auto">
                                                <img src="../assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    <span class="font-weight-bold">New message</span> from Laur
                                                </h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    <i class="fa fa-clock me-1"></i>
                                                    13 minutes ago
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex py-1">
                                            <div class="my-auto">
                                                <img src="../assets/img/small-logos/logo-spotify.svg"
                                                    class="avatar avatar-sm bg-gradient-dark  me-3 ">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    <span class="font-weight-bold">New album</span> by Travis Scott
                                                </h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    <i class="fa fa-clock me-1"></i>
                                                    1 day
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex py-1">
                                            <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                                                <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <title>credit-card</title>
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <g transform="translate(-2169.000000, -745.000000)"
                                                            fill="#FFFFFF" fill-rule="nonzero">
                                                            <g transform="translate(1716.000000, 291.000000)">
                                                                <g transform="translate(453.000000, 454.000000)">
                                                                    <path class="color-background"
                                                                        d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"
                                                                        opacity="0.593633743"></path>
                                                                    <path class="color-background"
                                                                        d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
                                                                    </path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    Payment successfully completed
                                                </h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    <i class="fa fa-clock me-1"></i>
                                                    2 days
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li> -->

                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->

        @yield('content')

    </main>

    <!-- BARRA DE CONFIGURAÇÕES -->
    <div class="fixed-plugin">
        <div class="card shadow-lg">
            <div class="card-header bg-transparent pb-0 pt-3 ">
                <div class="float-start">
                    <h5 class="mt-3 mb-0">Configurações</h5>
                </div>
                <div class="float-end mt-4">
                    <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                        <i class="fa fa-close"></i>
                    </button>
                </div>
                <!-- End Toggle Button -->
            </div>

            <hr class="horizontal dark my-1">
            <div class="card-body pt-sm-3 pt-0 overflow-auto">

                <div class="my-2 d-flex">
                    <div class="float-start">
                        <p><b class="mb-0 text-bolder">Usuário:</b> {{ $user->name }}</p>
                    </div>
                </div>

                <hr class="horizontal dark my-1">

                <div class="mt-2 mb-5 d-flex">
                    <p class="mb-0 text-bolder">Tema: Light / Dark</p>
                    <div class="form-check form-switch ps-0 ms-auto my-auto">
                        <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version"
                            onclick="darkMode(this)" {{ auth()->check() && auth()->user()->theme === 'dark' ? 'checked' : '' }}>
                    </div>
                </div>

            </div>

            <hr class="horizontal dark my-1">

            <button class="btn bg-gradient-info w-100">
                <i class="fa-solid fa-key"></i>
                Alterar Senha
            </button>

            <form id="formLogout" class="my-2" action="{{ route('user.logout') }}" method="POST">
                <button type="submit" class="btn bg-gradient-danger w-100">
                    @csrf
                    <i class="fa-solid fa-right-from-bracket"></i>
                    Sair
                </button>
            </form>

        </div>
    </div>

    @include('adm.layouts.snippets.scripts')

</body>

</html>