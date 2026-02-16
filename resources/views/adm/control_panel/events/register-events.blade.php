<!-- LAYOUT BÁSICO DA TELA -->
@extends('adm.layouts.adm')

<!-- DEFINE O NOME DA PÁGINA -->
@section('page-title', 'Eventos / Cadastro')

@section('content')
    <div class="container-fluid py-0">
        <div class="row">
            <div class="col-12 mb-0">
                <div class="card">
                    <div class="card-header bg-gradient-primary pt-3 pb-2">
                        <h6 class="text-bolder text-white">Cadastro de Eventos</h6>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <form action="{{ route('adm.events.registeringEvents') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">
                                        <!-- Nome -->
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">Nome do Evento <b class="text-danger">*</b></label>
                                            <input type="text" class="form-control" name="name" required
                                                value="{{ old('name') }}">

                                            @error('name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <!-- Upload da imagem -->
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">Imagem de Capa <i style="font-weight: 400;">(tamanho
                                                    máximo de 2MB)</i> <b class="text-danger">*</b></label></label>
                                            <input type="file" class="form-control" name="image_file" accept="image/*"
                                                value="{{ old('image_file') }}" required>

                                            @error('image_file')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <!-- Data do Início do Evento -->
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">
                                                Início do Evento
                                                <i style="font-weight: 400;">(para lembrete)</i>
                                                <b class="text-danger">*</b>
                                            </label>
                                            <input type="date" class="form-control" name="start_day"
                                                value="{{ old('start_day') }}" placeholder="Ex: 29 e 30 Outubro de 2025"
                                                required>

                                            @error('start_day')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <!-- Descrição dos Dias -->
                                        <div class="col-md-8 mb-3">
                                            <label class="form-label">
                                                Dias do Evento
                                                <i style="font-weight: 400;">ex: 29, 30 e 31 de Outubro de 2025</i>
                                                <b class="text-danger">*</b>
                                            </label>
                                            <input type="text" class="form-control" name="days" value="{{ old('days') }}"
                                                placeholder="Ex: 29 e 30 Outubro de 2025" required>

                                            @error('days')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <!-- Endereço -->
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">
                                                Endereço Completo<b class="text-danger"> *</b>
                                            </label>
                                            <input type="text" class="form-control" name="address"
                                                value="{{ old('address') }}" placeholder="Endereço Completo" required>

                                            @error('address')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <!-- Sinopse -->
                                        <div class="col-12 mb-3">
                                            <label class="form-label">Descrição <b class="text-danger">*</b> <i
                                                    style="font-weight: 400;">(mínimo 50, máximo 250 caracteres)</i></label>
                                            <textarea class="form-control" name="description" id="description" rows="3"
                                                minlength="50" maxlength="250" required>{{ old('description') }}</textarea>

                                            <small id="charCount" class="text-muted">0 / 250 caracteres</small><br>

                                            @error('description')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn bg-gradient-success">
                                            <i class="fa-solid fa-plus"></i>
                                            Adicionar Evento
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<!-- HEAD PERSONALIZADO DA TELA -->
@section('head')
    <title> Eventos / Cadastro</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

<!-- SCRIPT PERSONALIZADO DA TELA -->
@section('scripts')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const textarea = document.getElementById('description');
            const counter = document.getElementById('charCount');

            textarea.addEventListener('input', function () {
                const length = textarea.value.length;
                counter.textContent = `${length} / 250 caracteres`;

                // Reseta estilo
                counter.classList.remove('text-danger', 'text-success', 'text-muted');

                if (length < 50) {
                    counter.classList.add('text-danger');
                    counter.textContent += ' (mínimo não atingido)';
                } else if (length > 250) {
                    counter.classList.add('text-danger');
                    counter.textContent += ' (máximo ultrapassado)';
                } else {
                    counter.classList.add('text-success');
                    counter.textContent += ' (ok)';
                }
            });
        });
    </script>

@endsection