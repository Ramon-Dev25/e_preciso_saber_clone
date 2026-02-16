<!-- LAYOUT BÁSICO DA TELA -->
@extends('adm.layouts.adm')

<!-- DEFINE O NOME DA PÁGINA -->
@section('page-title', 'Produtos / Cadastro')

@section('content')
<div class="container-fluid py-0">
    <div class="row">
        <div class="col-12 mb-0">
            <div class="card">
                <div class="card-header bg-gradient-success pt-3 pb-2">
                    <h6 class="text-bolder text-white">Cadastro de Livros</h6>
                </div>

                <div class="card-body">
                    <form action="{{ route('adm.product.registeringProduct') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <!-- ISBN -->
                            <div class="col-md-4 mb-3">
                                <label class="form-label">ISBN <b class="text-danger">*</b></label>
                                <input type="text" class="form-control" name="isbn" required
                                    value="{{ old('isbn') }}">

                                @error('isbn')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Título -->
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Título <b class="text-danger">*</b></label>
                                <input type="text" class="form-control" name="title" required
                                    value="{{ old('title') }}">

                                @error('title')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Subtítulo -->
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Subtítulo</label>
                                <input type="text" class="form-control" name="subtitle" value="{{ old('subtitle') }}">

                                @error('subtitle')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Upload da imagem -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Imagem de Capa <i style="font-weight: 400;">(tamanho máximo de 2MB)</i></label>
                                <input type="file" class="form-control" name="image_file" accept="image/*" value="{{ old('image_file') }}">

                                @error('image_file')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Link da imagem -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Ou cole o link da Imagem (link)</label>
                                <input type="url" class="form-control" name="image_url" placeholder="https://..." value="{{ old('image_url') }}">
                            </div>

                            <!-- Faixa etária -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Faixa Etária <b class="text-danger">*</b></label>
                                <select class="form-select" name="age_group" required>
                                    <option value="" hidden>Selecione...</option>

                                    <option value="0-2" {{ old('age_group') == '0-2' ? 'selected' : '' }}>0 a 2 anos (Bebês)</option>
                                    <option value="3-5" {{ old('age_group') == '3-5' ? 'selected' : '' }}>3 a 5 anos (Pré-escolar)</option>
                                    <option value="6-8" {{ old('age_group') == '6-8' ? 'selected' : '' }}>6 a 8 anos (Leitores Iniciantes)</option>
                                    <option value="9-12" {{ old('age_group') == '9-12' ? 'selected' : '' }}>9 a 12 anos (Middle Grade)</option>
                                    <option value="13-17" {{ old('age_group') == '13-17' ? 'selected' : '' }}>13 a 17 anos (Young Adult - YA)</option>
                                    <option value="18-25" {{ old('age_group') == '18-25' ? 'selected' : '' }}>18 a 25 anos (New Adult - NA)</option>
                                    <option value="25+" {{ old('age_group') == '25+' ? 'selected' : '' }}>Mais de 25 anos (Literatura Adulta)</option>
                                </select>

                                @error('age_group')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Editora -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Editora <b class="text-danger">*</b></label>
                                <input type="text" class="form-control" name="publisher" required value="{{ old('publisher') }}">

                                @error('publisher')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Tipo -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tipo <b class="text-danger">*</b></label>
                                <select class="form-select" name="type" required>
                                    <option value="livro" {{ old('type') == 'livro' ? 'selected' : '' }}>Livro</option>
                                    <option value="kit" {{ old('type') == 'kit' ? 'selected' : '' }}>Kit</option>
                                    <option value="folder" {{ old('type') == 'folder' ? 'selected' : '' }}>Folder</option>
                                    <option value="revista" {{ old('type') == 'revista' ? 'selected' : '' }}>Revista</option>
                                    <option value="outro" {{ old('type') == 'outro' ? 'selected' : '' }}>Outro</option>
                                </select>


                                @error('type')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Autor -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Autor</label>
                                <input type="text" class="form-control" name="author"
                                    value="{{ old('author') }}">
                            </div>

                            <!-- Altura -->
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Altura (cm)</label>
                                <input type="number" step="0.01" class="form-control" name="height"
                                    value="{{ old('height') }}">
                            </div>

                            <!-- Largura -->
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Largura (cm)</label>
                                <input type="number" step="0.01" class="form-control" name="width"
                                    value="{{ old('width') }}">
                            </div>

                            <!-- Comprimento -->
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Comprimento (cm)</label>
                                <input type="number" step="0.01" class="form-control" name="length"
                                    value="{{ old('length') }}">
                            </div>

                            <!-- Gramatura -->
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Gramatura (gramas)</label>
                                <input type="number" step="0.01" class="form-control" name="weight" value="{{ old('weight') }}">
                            </div>

                            <!-- Sinopse -->
                            <div class="col-12 mb-3">
                                <label class="form-label">Sinopse <b class="text-danger">*</b> <i style="font-weight: 400;">(mínimo 50 caracteres)</i></label>
                                <textarea class="form-control" name="synopsis" rows="5" minlength="50"
                                    required>{{ old('synopsis') }}</textarea>

                                @error('synopsis')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn bg-gradient-success">
                                <i class="fa-solid fa-plus"></i>
                                Cadastrar Livro
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- HEAD PERSONALIZADO DA TELA -->
@section('head')
<title> Produtos / Cadastro</title>

<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

<!-- SCRIPT PERSONALIZADO DA TELA -->
@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="{{ asset('js/control/product.js') }}"></script>

@endsection