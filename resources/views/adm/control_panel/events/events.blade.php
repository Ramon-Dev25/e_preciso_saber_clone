<!-- LAYOUT BÁSICO DA TELA -->
@extends('adm.layouts.adm')

<!-- DEFINE O NOME DA PÁGINA -->
@section('page-title', 'Eventos')

@section('content')
    <div class="container-fluid py-0">
        <div class="row">
            <div class="col-12 mb-0 d-flex gap-2 justify-content-end">
                <a href="{{ route('adm.events.eventsRegistration') }}"
                    class="btn bg-gradient-primary" title="Cadastrar novo Kit">
                    <i class="fa-solid fa-plus"></i>
                    Novo Eventos
                </a>
            </div>

            <div class="col-12 mb-3">
                <div class="card z-index-2 h-100 mb-4">
                    <div class="card-header bg-gradient-warning pt-3 pb-2">
                        <h6 class="text-bolder text-white">Eventos Cadastrados</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive px-3 pt-3 pb-0">
                            <table id="table_events" class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-dark text-xxs font-weight-bolder ps-2">
                                            Dias
                                        </th>

                                        <th class="text-uppercase text-dark text-xxs font-weight-bolder ps-2">
                                            Nome
                                        </th>

                                        <th class="text-uppercase text-dark text-xxs font-weight-bolder ps-2">
                                            Local
                                        </th>

                                        <th class="text-uppercase text-dark text-xxs font-weight-bolder ps-2">
                                            Status
                                        </th>

                                        <th class="text-uppercase text-dark text-xxs font-weight-bolder ps-2">
                                            Ações
                                        </th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

<!-- HEAD PERSONALIZADO DA TELA -->
@section('head')
    <title> Eventos </title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

<!-- SCRIPT PERSONALIZADO DA TELA -->
@section('scripts')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{ asset('js/control/events.js') }}"></script>

@endsection