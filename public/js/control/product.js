// DADOS DAS TABELAS
$(document).ready(function () {
    // DataTable para #table_products
    $('#table_products').DataTable({
        ajax: {
            url: "/painel/produtos/listar",
            dataSrc: 'data'
        },

        order: false,

        columns: [{
            data: 'checkbox',
            class: 'text-xs font-weight-bold mb-0'
        },
        {
            data: 'isbn',
            class: 'text-xs font-weight-bold mb-0'
        },
        {
            data: 'name',
            class: 'text-xs font-weight-bold mb-0'
        },
        {
            data: 'publisher',
            class: 'text-xs font-weight-bold mb-0'
        },
        {
            data: 'actions',
            class: 'text-xs font-weight-bold mb-0'
        }
        ],

        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json',
            search: "Pesquisar:",
            lengthMenu: "Mostrar _MENU_ registros",
            info: "_START_ até _END_ de _TOTAL_ registros",
            paginate: {
                first: "Primeira",
                last: "Última",
                next: ">",
                previous: "<"
            }
        },
        lengthChange: true,
        ordering: true,
        searching: true,
        info: true,
        responsive: true,
        drawCallback: function () {
            // aplica cor
            $(this).closest('.dataTables_wrapper')
                .find('.dataTables_paginate ul.pagination')
                .addClass('pagination-success pagination-sm');
        }
    });
});

// POP-UP DE VISUALIZAÇÃO DO PRODUTO
$(document).on('click', '.btn-view', function(e) {
    e.preventDefault();
    const id = $(this).data('id');

    $.ajax({
        url: '/painel/produtos/visualizar/' + id, // rota que retorna detalhes
        type: 'GET',
        success: function(product) {
            // preenche os campos do modal
            $('#product-isbn').text(product.isbn);
            $('#product-title').text(product.title);
            $('#product-subtitle').text(product.subtitle);
            $('#product-publisher').text(product.publisher);
            $('#product-age_group').text(product.age_group);
            $('#product-height').text(formatNumber(product.height));
            $('#product-width').text(formatNumber(product.width));
            $('#product-length').text(formatNumber(product.length));
            $('#product-weight').text(formatNumber(product.weight));
            $('#product-type').text(product.type);
            $('#product-synopsis').text(product.synopsis);
            $('#product-created_at').text(product.created_at);

            // imagem
            $('#product-image').attr('src', product.image);

            // abre o modal
            let modal = new bootstrap.Modal(document.getElementById('viewProduct'));
            modal.show();

            // 🔄 força atualização da tabela após abrir o modal
            $('#table_preciso_saber').DataTable().ajax.reload(null, false); 
            $('#table_ava').DataTable().ajax.reload(null, false); 
        },
        error: function() {
            Swal.fire('Erro', 'Não foi possível carregar os dados do produto.', 'error');
        }
    });
});

const formatNumber = (value) => {
    const num = parseFloat(value);
    return Number.isInteger(num)
        ? num.toString()
        : new Intl.NumberFormat('pt-BR', { maximumFractionDigits: 2 }).format(num);
};

// DELETE UM PRODUTO
$(document).on('click', '.btn-delete', function (e) {
    e.preventDefault();
    const id = $(this).data('id');
    // chama seu sweetalert
    Swal.fire({
        title: 'Você tem certeza?',
        text: "Essa ação não pode ser desfeita!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#0f8d2fff',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, excluir!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            // Faz a chamada AJAX (usar POST se sua rota aceita POST)
            $.ajax({
                url: '/painel/produtos/deletar/' + id,
                type: 'DELETE', // ou 'DELETE' se sua rota for DELETE
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    Swal.fire('Excluído!', response.message || 'Registro removido.', 'success');
                    $('#table_products').DataTable().ajax.reload();
                },
                error: function (xhr) {
                    Swal.fire('Erro', xhr.responseJSON?.message || 'Erro ao deletar', 'error');
                }
            });
        }
    });
});

// POP-UP DE EDIÇÃO DO PRODUTO
$(document).on('click', '.btn-edit', function(e) {
    e.preventDefault();
    const id = $(this).data('id');

    $.ajax({
        url: '/painel/produtos/visualizar/' + id, // rota que retorna detalhes
        type: 'GET',
        success: function(product) {
            // preenche os inputs do modal
            $('input[name="isbn"]').val(product.isbn);
            $('input[name="title"]').val(product.title);
            $('input[name="subtitle"]').val(product.subtitle);
            $('input[name="image_url"]').val(product.image_url);
            $('select[name="age_group"]').val(product.age_group);
            $('input[name="publisher"]').val(product.publisher);
            $('select[name="type"]').val(product.type);
            $('input[name="author"]').val(product.author);
            
            $('input[name="height"]').val(product.height);
            $('input[name="width"]').val(product.width);
            $('input[name="length"]').val(product.length);
            $('input[name="weight"]').val(product.weight);
            
            $('textarea[name="synopsis"]').val(product.synopsis);

            // imagem
            $('#product-image-edit').attr('src', product.image);

            // abre o modal
            let modal = new bootstrap.Modal(document.getElementById('editProduct'));
            modal.show();

            // 🔄 força atualização da tabela após abrir o modal
            $('#table_user').DataTable().ajax.reload(null, false); 
        },
        error: function() {
            Swal.fire('Erro', 'Não foi possível carregar os dados do produto.', 'error');
        }
    });
});