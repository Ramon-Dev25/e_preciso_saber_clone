<!-- LAYOUT BÁSICO DA TELA -->
@extends('adm.layouts.adm')

<!-- DEFINE O NOME DA PÁGINA -->
@section('page-title', 'Kits / Cadastro / Itens')

@section('content')
    <div class="container-fluid py-0">
        <div class="row">
            <div class="col-12 mb-0">
                <h4 class="text-bolder">Kit: {{$kit->name}}</h4>
            </div>
            <div class="col-12 mb-3">
                <div class="card">
                    <div class="card-header bg-gradient-success pt-3 pb-2">
                        <h6 class="text-bolder text-white">Inserir Itens</h6>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('adm.kits.addingProducts') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <!-- Item -->
                                <div class="col-md-6 mb-2">
                                    <label class="form-label">
                                        Selecione um Livro <b class="text-danger">*</b>
                                    </label>

                                    <select class="form-select select2" name="product" required>
                                        <option value="" hidden>Selecione...</option>

                                        @foreach($products as $product)
                                            <option value="{{ $product->id }}">{{ '(' . $product->isbn . ') ' .  $product->title }}</option>
                                        @endforeach

                                    </select>

                                    @error('product')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-3 mb-2">
                                    <label class="form-label">
                                        Quantidade no Kit <b class="text-danger">*</b>
                                    </label>

                                    <input type="number" class="form-control" name="quantity" required
                                        value="1">

                                    @error('quantity')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-3 align-content-end">
                                    <br>
                                    <input type="text" name="kit_id" value="{{ $kit->id }}" hidden>
                                    <button type="submit" class="btn bg-gradient-success w-100">
                                        <i class="fa-solid fa-plus"></i>
                                        Inserir
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12 mb-3">
                <div class="card z-index-2 h-100 mb-4">
                    <div class="card-header bg-gradient-primary pt-3 pb-2">
                        <h6 class="text-bolder text-white">Itens do Kit</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive px-3 pt-3 pb-0">
                            <table id="table_products" class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-dark text-xxs font-weight-bolder ps-2">
                                            ISBN
                                        </th>

                                        <th class="text-uppercase text-dark text-xxs font-weight-bolder ps-2">
                                            Título
                                        </th>

                                        <th class="text-uppercase text-dark text-xxs font-weight-bolder ps-2">
                                            Qtd.
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
    <div class="modal fade" id="viewProduct" tabindex="-1" aria-labelledby="viewProduct" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-gradient-info">
                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Fechar">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4 d-flex justify-content-center mb-2">
                            <img id="product-image" src="" alt="Capa do livro" class="img-fluid rounded shadow">
                        </div>

                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="text-bolder">
                                        Título: <span id="product-title"></span>
                                    </h4>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>ISBN:</strong> <span id="product-isbn"></span></p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Edtora:</strong> <span id="product-publisher"></span></p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Tipo:</strong> <span id="product-type"></span></p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Faixa Etária:</strong> <span id="product-age_group"></span></p>
                                </div>

                                <div class="col-md-3">
                                    <p><strong>Alt.:</strong> <span id="product-height"></span>cm</p>
                                </div>
                                <div class="col-md-3">
                                    <p><strong>Larg.:</strong> <span id="product-width"></span>cm</p>
                                </div>
                                <div class="col-md-3">
                                    <p><strong>Comp.:</strong> <span id="product-length"></span>cm</p>
                                </div>
                                <div class="col-md-3">
                                    <p><strong>Peso:</strong> <span id="product-weight"></span>g</p>
                                </div>

                                <div class="col-md-12">
                                    <p><strong>Sinopse:</strong> <span id="product-synopsis"></span></p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

<!-- HEAD PERSONALIZADO DA TELA -->
@section(section: 'head')
    <title> Kits / Cadastro / Itens</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

<!-- SCRIPT PERSONALIZADO DA TELA -->
@section('scripts')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        window.kitConfig = {
            id: {{ $kit->id }},
            link: "{{ route('adm.kits.listProductsKit', ['id' => $kit->id]) }}"
        };
    </script>

    <script src="{{ asset('js/control/addProductsKit.js') }}"></script>
@endsection