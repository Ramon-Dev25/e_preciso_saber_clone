<!-- LAYOUT BÁSICO DA TELA -->
@extends('adm.layouts.adm')

<!-- DEFINE O NOME DA PÁGINA -->
@section('page-title', 'Usuários')

@section('content')
    <div class="container-fluid py-0">
        <div class="row">
            <div class="col-12 mb-0 d-flex gap-2 justify-content-end">
                <a href="{{ route('user.register') }}" class="btn  bg-gradient-info" title="Cadastrar novo item"
                    target="_blank">
                    <i class="fa-solid fa-plus"></i>
                    Cadastrar Usuário
                </a>
            </div>

            <div class="col-12 mb-3">
                <div class="card z-index-2 h-100 mb-4">
                    <div class="card-header bg-gradient-info pt-3 pb-2">
                        <h6 class="text-bolder text-white">Usuários Cadastrados</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive px-3 pt-3 pb-0">
                            <table id="table_user" class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-dark text-xxs font-weight-bolder ps-2">
                                            Criado em
                                        </th>

                                        <th class="text-uppercase text-dark text-xxs font-weight-bolder ps-2">
                                            Nome
                                        </th>

                                        <th class="text-uppercase text-dark text-xxs font-weight-bolder ps-2">
                                            E-mail
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

    <!-- Modal Visualizar de Produtos -->
    <div class="modal fade" id="editUser" tabindex="-1" aria-labelledby="editUser" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header bg-gradient-info">
                    <h5 class="modal-title text-white m-0"><b>Editar Usuário </b></h5>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Fechar">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('user.editUser') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <!-- Nome -->
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Nome <b class="text-danger">*</b></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>

                            <!-- E-mail -->
                            <div class="col-md-12 mb-3">
                                <label class="form-label">E-mail <b class="text-danger">*</b></label>
                                <input type="email" class="form-control" name="email" required>
                            </div>

                            <!-- Senha -->
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Alterar senha?</label>
                                <input type="password" class="form-control" name="password"
                                    placeholder="Digite para alterar">
                            </div>

                            <!-- Senha -->
                            <div class="col-md-12 mb-1">
                                <input type="text" name="id" hidden>
                                <button type="submit" class="btn bg-gradient-success w-100 m-0">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    Editar
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
    <title> Usuários </title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

<!-- SCRIPT PERSONALIZADO DA TELA -->
@section('scripts')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{ asset('js/control/user.js') }}"></script>

    <script>
        $(document).on('submit', 'form[action="{{ route('user.editUser') }}"]', function (e) {
            e.preventDefault(); // evita o reload da página

            const form = $(this);
            const formData = new FormData(this);

            $.ajax({
                url: form.attr('action'),
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Sucesso!',
                            text: response.message,
                            timer: 1500,
                            showConfirmButton: false
                        });

                        setTimeout(() => {
                            location.reload();
                        }, 1500);
                    }
                },
                error: function (xhr) {
                    if (xhr.status === 422) {
                        // erros de validação
                        const errors = xhr.responseJSON.errors;
                        let errorMessage = '';

                        for (const field in errors) {
                            errorMessage += `• ${errors[field][0]}\n`;
                        }

                        Swal.fire({
                            icon: 'warning',
                            title: 'Verifique os campos:',
                            text: errorMessage
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Erro',
                            text: 'Não foi possível atualizar o usuário.'
                        });
                    }
                }
            });
        });

    </script>

@endsection