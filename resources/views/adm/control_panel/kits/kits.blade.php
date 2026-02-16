<!-- LAYOUT BÁSICO DA TELA -->
@extends('adm.layouts.adm')

<!-- DEFINE O NOME DA PÁGINA -->
@section('page-title', 'Kits')

@section('content')
    <div class="container-fluid py-0">
        <div class="row">
            <div class="col-12 mb-0 d-flex gap-2 justify-content-end">
                <button type="button" data-bs-toggle="modal" data-bs-target="#registering-kits-modal"
                    class="btn bg-gradient-info" title="Cadastrar novo Kit">
                    <i class="fa-solid fa-plus"></i>
                    Cadastrar Kits
                </button>
            </div>

            <div class="col-12 mb-3">
                <div class="card z-index-2 h-100 mb-4">
                    <div class="card-header bg-gradient-primary pt-3 pb-2">
                        <h6 class="text-bolder text-white">Kits Cadastrados</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive px-3 pt-3 pb-0">
                            <table id="table_kits" class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-dark text-xxs font-weight-bolder ps-2">
                                            Código
                                        </th>

                                        <th class="text-uppercase text-dark text-xxs font-weight-bolder ps-2">
                                            Nome
                                        </th>

                                        <th class="text-uppercase text-dark text-xxs font-weight-bolder ps-2">
                                            Qtd. de Itens
                                        </th>

                                        <th class="text-uppercase text-dark text-xxs font-weight-bolder ps-2">
                                            Projeto
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
    <div class="modal fade" id="registering-kits-modal" tabindex="-1" aria-labelledby="registeringKitsModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-gradient-info">
                    <h5 class="modal-title text-bolder text-white m-0">Criar Kits</h5>

                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Fechar">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('adm.kits.registeringKits') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <!-- Nome -->
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Nome <b class="text-danger">*</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>

                            <!-- Code -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Código <b class="text-danger">*</b></label>
                                <input type="text" class="form-control" name="code" required>
                            </div>

                            <!-- Tipo -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Projeto <b class="text-danger">*</b></label>
                                <select class="form-select" name="project" required>
                                    <option value="preciso_saber" selected {{ old('project') == 'preciso_saber' ? 'selected' : '' }}>
                                        É Preciso Saber
                                    </option>
                                </select>

                                @error('project')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Sinopse -->
                            <div class="col-12 mb-0">
                                <button type="submit" class="btn bg-gradient-success w-100">
                                    <i class="fa-solid fa-plus"></i>
                                    Cadastrar Kit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<!-- HEAD PERSONALIZADO DA TELA -->
@section('head')
    <title> Kits </title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

<!-- SCRIPT PERSONALIZADO DA TELA -->
@section('scripts')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{ asset('js/control/kits.js') }}"></script>

@endsection