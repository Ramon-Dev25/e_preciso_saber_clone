// DELETE UM CONTATO
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
                url: '/painel/contatos/deletar/' + id,
                type: 'DELETE', // ou 'DELETE' se sua rota for DELETE
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    Swal.fire('Excluído!', response.message || 'Registro removido.', 'success');
                    $('#table_preciso_saber, #table_ava').DataTable().ajax.reload();
                },
                error: function (xhr) {
                    Swal.fire('Erro', xhr.responseJSON?.message || 'Erro ao deletar', 'error');
                }
            });
        }
    });
});

// POP-UP DE VISUALIZAÇÃO DOS CONTATOS
$(document).on('click', '.btn-view', function(e) {
    e.preventDefault();
    const id = $(this).data('id');

    $.ajax({
        url: '/painel/contatos/visualizar/' + id, // rota que retorna detalhes
        type: 'GET',
        success: function(contact) {
            // preenche os campos do modal
            $('#contact-date').text(contact.created_at);
            $('#contact-site').text(contact.type);
            $('#contact-name').text(contact.name);
            $('#contact-email').text(contact.email);
            $('#contact-phone').text(contact.phone);
            $('#contact-message').text(contact.message);
            $('#contact-institution').text(contact.institution);
            $('#contact-segment').text(contact.segment);

            // abre o modal
            let modal = new bootstrap.Modal(document.getElementById('viewContactModal'));
            modal.show();

            // 🔄 força atualização da tabela após abrir o modal
            $('#table_preciso_saber').DataTable().ajax.reload(null, false); 
            $('#table_ava').DataTable().ajax.reload(null, false); 
        },
        error: function() {
            Swal.fire('Erro', 'Não foi possível carregar os dados do contato.', 'error');
        }
    });
});


// DADOS DAS TABELAS
$(document).ready(function () {
    // DataTable para #table_preciso_saber
    $('#table_preciso_saber').DataTable({
        ajax: {
            url: "/painel/contatos/listar/eprecisosaber",
            dataSrc: 'data'
        },

        order: false,

        columns: [{
            data: 'date',
            class: 'text-xs font-weight-bold mb-0'
        },
        {
            data: 'name',
            class: 'text-xs font-weight-bold mb-0'
        },
        {
            data: 'status',
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
                .addClass('pagination-info pagination-sm');
        }
    });

    // DataTable para #table_ava
    $('#table_ava').DataTable({
        ajax: {
            url: "/painel/contatos/listar/ava",
            dataSrc: 'data'
        },

        order: false,

        columns: [{
            data: 'date',
            class: 'text-xs font-weight-bold mb-0'
        },
        {
            data: 'name',
            class: 'text-xs font-weight-bold mb-0'
        },
        {
            data: 'status',
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
                .addClass('pagination-primary pagination-sm');
        }
    });
});

