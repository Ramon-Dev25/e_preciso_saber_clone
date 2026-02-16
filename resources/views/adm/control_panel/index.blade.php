<!-- LAYOUT BÁSICO DA TELA -->
@extends('adm.layouts.adm')

<!-- DEFINE O NOME DA PÁGINA -->
@section('page-title', 'Contatos')

@section('content')
<div class="container-fluid py-0">
    <div class="row">
        <div class="col-12 mb-3">
            <div class="card z-index-2 h-100 mb-4">
                <div class="card-header bg-gradient-info pt-3 pb-2">
                    <h6 class="text-bolder text-white">Contatos via site É Preciso Saber</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive px-3 pt-3 pb-0">
                        <table id="table_preciso_saber" class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-dark text-xxs font-weight-bolder ps-2">
                                        Data
                                    </th>

                                    <th class="text-uppercase text-dark text-xxs font-weight-bolder ps-2">
                                        Nome
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

        <div class="col-12 mb-3">
            <div class="card z-index-2 h-100 mb-4">
                <div class="card-header bg-gradient-primary pt-3 pb-2">
                    <h6 class="text-bolder text-white">Contatos via site AVA - É Preciso Saber</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive px-3 pt-3 pb-0">
                        <table id="table_ava" class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-dark text-xxs font-weight-bolder ps-2">
                                        Data
                                    </th>

                                    <th class="text-uppercase text-dark text-xxs font-weight-bolder ps-2">
                                        Nome
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

<!-- Modal Visualizar Contato -->
<div class="modal fade" id="viewContactModal" tabindex="-1" aria-labelledby="viewContactLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-gradient-info">
                <h5 class="modal-title text-bolder text-white m-0" id="viewContactLabel">Detalhes do Contato</h5>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Fechar">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <p><strong>Site:</strong> <span id="contact-site"></span></p>
                    </div>
                    
                    <div class="col-12">
                        <p><strong>Nome:</strong> <span id="contact-name"></span></p>
                    </div>

                    <div class="col-12 col-sm-6">
                        <p><strong>E-mail:</strong> <span id="contact-email"></span></p>
                    </div>

                    <div class="col-12 col-sm-6">
                        <p><strong>Telefone:</strong> <span id="contact-phone"></span></p>
                    </div>

                    <div class="col-12 col-sm-6">
                        <p><strong>Instituição:</strong> <span id="contact-institution"></span></p>
                    </div>

                    <div class="col-12 col-sm-6">
                        <p><strong>Segmento de Ensino:</strong> <span id="contact-segment"></span></p>
                    </div>

                    <div class="col-12">
                        <p class="message-popup"><strong>Mensagem:</strong> <span id="contact-message"></span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

<!-- HEAD PERSONALIZADO DA TELA -->
@section('head')
<title> Contatos </title>

<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

<!-- SCRIPT PERSONALIZADO DA TELA -->
@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="{{ asset('js/control/viewAll.js') }}"></script>

@endsection