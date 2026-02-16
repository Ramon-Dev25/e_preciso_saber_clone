document.addEventListener('DOMContentLoaded', function () {
    // Header scroll effect
    const header = document.getElementById('header');
    const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
    const nav = document.getElementById('nav');

    function handleScroll() {
        if (window.scrollY > 20) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    }

    window.addEventListener('scroll', handleScroll);
    handleScroll(); // Initialize on page load

    // Mobile menu toggle
    if (mobileMenuToggle) {
        mobileMenuToggle.addEventListener('click', function () {
            nav.classList.toggle('active');
            header.classList.toggle('mobile');
        });
    }

    // LIVROS GRID
    // --- ELEMENTOS ---
    const tabButtons = document.querySelectorAll('.store-tag-btn');
    const tabContents = document.querySelectorAll('.books-grid');
    const allBooks = document.querySelectorAll('.book-unit');
    const gridsWrapper = document.getElementById('grids-wrapper');
    const searchInput = document.querySelector('.store-input');
    const counterLabel = document.querySelector('.store-meta-info b');
    const paginationContainer = document.getElementById('pagination-controls');

    // --- CONFIGURAÇÕES ---
    const itemsPerPage = 9;
    
    // --- ESTADO ---
    let currentTab = 'all';
    let searchTerm = '';
    let currentPage = 1;
    let matchedBooks = []; // Armazena os livros que passaram no filtro

    // --- 1. FILTRAGEM (Busca + Categoria) ---
    function applyFilters() {
        // Reseta a lista de encontrados
        matchedBooks = [];

        // Lógica de Abas (Visual das Grids)
        if (currentTab === 'all') {
            if(gridsWrapper) gridsWrapper.classList.add('view-all');
            tabContents.forEach(grid => grid.classList.add('active'));
        } else {
            if(gridsWrapper) gridsWrapper.classList.remove('view-all');
            tabContents.forEach(grid => {
                grid.classList.toggle('active', grid.id === currentTab);
            });
        }

        // Percorre todos os livros para saber quem passa no filtro
        allBooks.forEach(book => {
            const title = book.querySelector('.unit-title').innerText.toLowerCase();
            const parentGridId = book.closest('.books-grid').id;
            
            const matchesTab = (currentTab === 'all') || (parentGridId === currentTab);
            const matchesSearch = title.includes(searchTerm);

            if (matchesTab && matchesSearch) {
                matchedBooks.push(book); // Adiciona à lista de "aprovados"
            } else {
                book.classList.add('book-hidden'); // Esconde imediatamente quem não passou
            }
        });

        // Atualiza contador total
        updateCounter(matchedBooks.length);

        // Sempre que filtrar, volta para a página 1 e renderiza
        currentPage = 1;
        renderPage();
    }

    // --- 2. PAGINAÇÃO (Mostrar apenas 10) ---
    function renderPage() {
        const totalItems = matchedBooks.length;
        const totalPages = Math.ceil(totalItems / itemsPerPage);

        // Calcula índices de início e fim para a página atual
        const startIndex = (currentPage - 1) * itemsPerPage;
        const endIndex = startIndex + itemsPerPage;

        // Percorre os livros "aprovados" e mostra só os da página atual
        matchedBooks.forEach((book, index) => {
            if (index >= startIndex && index < endIndex) {
                book.classList.remove('book-hidden');
            } else {
                book.classList.add('book-hidden');
            }
        });

        // Gera os botões lá embaixo
        renderPaginationControls(totalPages);
    }

    function renderPaginationControls(totalPages) {
        paginationContainer.innerHTML = ''; // Limpa botões antigos

        // Se tiver apenas 1 página (ou 0), não mostra paginação
        if (totalPages <= 1) return;

        // Botão Anterior
        const prevBtn = document.createElement('button');
        prevBtn.innerText = '<';
        prevBtn.classList.add('page-btn');
        prevBtn.disabled = currentPage === 1;
        prevBtn.onclick = () => changePage(currentPage - 1);
        paginationContainer.appendChild(prevBtn);

        // Botões Numéricos
        // Lógica simplificada: mostra todos. Se tiver MUITAS páginas, precisaria de "..."
        for (let i = 1; i <= totalPages; i++) {
            const btn = document.createElement('button');
            btn.innerText = i;
            btn.classList.add('page-btn');
            if (i === currentPage) btn.classList.add('active');
            btn.onclick = () => changePage(i);
            paginationContainer.appendChild(btn);
        }

        // Botão Próximo
        const nextBtn = document.createElement('button');
        nextBtn.innerText = '>';
        nextBtn.classList.add('page-btn');
        nextBtn.disabled = currentPage === totalPages;
        nextBtn.onclick = () => changePage(currentPage + 1);
        paginationContainer.appendChild(nextBtn);
    }

    function changePage(newPage) {
        currentPage = newPage;
        renderPage();
        // Rola suavemente para o topo da lista ao mudar de página (opcional)
        gridsWrapper.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }

    function updateCounter(count) {
        if (counterLabel) counterLabel.innerText = count;
    }

    // --- EVENT LISTENERS ---
    
    // Clique nas Abas
    tabButtons.forEach(button => {
        button.addEventListener('click', function () {
            const tabId = this.getAttribute('data-tab');
            if (!tabId) return;

            tabButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');

            currentTab = tabId;
            applyFilters(); // Refaz o filtro e reseta paginação
        });
    });

    // Digitação na Busca
    if (searchInput) {
        searchInput.addEventListener('input', function (e) {
            searchTerm = e.target.value.toLowerCase().trim();
            applyFilters();
        });
    }

    // --- INICIALIZAÇÃO ---
    const activeBtn = document.querySelector('.store-tag-btn.active') || document.querySelector('.store-tag-btn[data-tab="all"]');
    if (activeBtn) {
        currentTab = activeBtn.getAttribute('data-tab');
        applyFilters();
    }

    // --------------------- FIM ---------------------

    const subscribeForm = document.getElementById('subscribeForm');
    if (subscribeForm) {
        subscribeForm.addEventListener('submit', function (e) {
            e.preventDefault();
            showToast('Success!', 'You\'ve successfully subscribed to our newsletter.');
            this.reset();
        });
    }

    // Simple toast notification
    function showToast(title, message) {
        // Create toast element
        const toast = document.createElement('div');
        toast.className = 'toast';
        toast.innerHTML = `
      <div class="toast-header">
        <strong>${title}</strong>
        <button type="button" class="toast-close">&times;</button>
      </div>
      <div class="toast-body">${message}</div>
    `;

        // Add styles
        toast.style.position = 'fixed';
        toast.style.bottom = '20px';
        toast.style.right = '20px';
        toast.style.backgroundColor = 'white';
        toast.style.borderLeft = '4px solid var(--primary-color)';
        toast.style.borderRadius = 'var(--radius)';
        toast.style.boxShadow = '0 4px 12px rgba(0,0,0,0.15)';
        toast.style.minWidth = '300px';
        toast.style.maxWidth = '400px';
        toast.style.zIndex = '9999';
        toast.style.overflow = 'hidden';
        toast.style.animation = 'slideIn 0.3s ease-out forwards';

        const header = toast.querySelector('.toast-header');
        header.style.display = 'flex';
        header.style.justifyContent = 'space-between';
        header.style.padding = '10px 15px';
        header.style.borderBottom = '1px solid #eee';

        const body = toast.querySelector('.toast-body');
        body.style.padding = '10px 15px';

        const closeButton = toast.querySelector('.toast-close');
        closeButton.style.background = 'none';
        closeButton.style.border = 'none';
        closeButton.style.fontSize = '1.5rem';
        closeButton.style.cursor = 'pointer';
        closeButton.style.marginLeft = '10px';

        // Add to DOM
        document.body.appendChild(toast);

        // Add CSS animation for slide-in effect
        const style = document.createElement('style');
        style.textContent = `
      @keyframes slideIn {
        from {
          transform: translateX(100%);
        }
        to {
          transform: translateX(0);
        }
      }
      
      @keyframes fadeOut {
        from {
          opacity: 1;
        }
        to {
          opacity: 0;
        }
      }
    `;
        document.head.appendChild(style);

        // Close toast on button click
        closeButton.addEventListener('click', function () {
            toast.style.animation = 'fadeOut 0.3s ease-out forwards';
            setTimeout(() => {
                if (document.body.contains(toast)) {
                    document.body.removeChild(toast);
                }
            }, 300);
        });

        // Auto-close after 5 seconds
        setTimeout(() => {
            if (document.body.contains(toast)) {
                toast.style.animation = 'fadeOut 0.3s ease-out forwards';
                setTimeout(() => {
                    if (document.body.contains(toast)) {
                        document.body.removeChild(toast);
                    }
                }, 300);
            }
        }, 5000);
    }

    // Smooth scroll for navigation links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');

            // If it's a real anchor link (not just "#")
            if (href !== "#") {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    window.scrollTo({
                        top: target.offsetTop - 80, // Adjust for header height
                        behavior: 'smooth'
                    });

                    // Close mobile menu if open
                    if (nav.classList.contains('active')) {
                        nav.classList.remove('active');
                    }
                }
            }
        });
    });
});

function openVideoPopup(videoUrl) {
    const popup = document.getElementById("videoPopup");
    const iframe = document.getElementById("videoFrame");
    iframe.src = videoUrl + "?autoplay=1";
    popup.classList.add("active");
}

function closeVideoPopup() {
    const popup = document.getElementById("videoPopup");
    const iframe = document.getElementById("videoFrame");
    iframe.src = "";
    popup.classList.remove("active");
}

function openBookPopup(id) {
    // Faz requisição AJAX para buscar o produto
    fetch(`/visualizar/produto/${id}`)
        .then(response => response.json())
        .then(product => {
            // Verifica se veio algo válido
            if (!product || !product.title) {
                console.error('Produto não encontrado');
                return;
            }

            // Preenche os campos do pop-up
            document.querySelector('#bookPopup h2').textContent = product.title || 'Sem título';
            document.querySelector('#bookPopup h3').textContent = product.subtitle || '';
            document.querySelector('#bookPopup .text-info-book p').textContent =
                product.synopsis || product.description || 'Sem descrição disponível.';

            document.querySelector('#bookPopup .info-book-icons').innerHTML = `
                <p><i class="fa-regular fa-calendar-check"></i> ${product.year || '2025'}</p>
                <p><i class="fa-solid fa-pen-to-square"></i> ${product.edition || '1'}º Edição</p>
                <p><i class="fa-solid fa-children"></i> ${product.age_group || '—'} anos</p>
            `;

            // Atualiza imagem do carrossel (somente a capa)
            const carouselTrack = document.getElementById('imgBook');
            carouselTrack.innerHTML = `
                <div class="img-book">
                    <img src="${product.image}" alt="Capa do Livro ${product.title}">
                </div>
            `;

            // Exibe o pop-up
            const popup = document.getElementById('bookPopup');
            popup.classList.add('active');
        })
        .catch(error => {
            console.error('Erro ao carregar produto:', error);
        });
}

function closeBookPopup() {
    const popup = document.getElementById("bookPopup");
    popup.classList.remove("active");
}

function openContactPopup() {
    const popup = document.getElementById("contact_pop_up");
    popup.classList.add("active");
}

function closeContactPopup() {
    const popup = document.getElementById("contact_pop_up");
    popup.classList.remove("active");
}

// ENVIO DO FORMULÁRIO PARA CONTATO
document.getElementById("contactForm").addEventListener("submit", async function (e) {
    e.preventDefault(); // impede reload da página

    let form = e.target;
    let formData = new FormData(form);

    // limpa mensagens anteriores
    document.querySelectorAll(".message-error").forEach(el => el.remove());
    document.getElementById("formMessages").innerHTML = "";

    const submitBtn = this.querySelector('.btn-submit');
    const originalText = submitBtn.innerHTML;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Enviando...';
    submitBtn.disabled = true;


    try {
        let response = await fetch(form.action, {
            method: "POST",
            body: formData,
            headers: {
                "X-Requested-With": "XMLHttpRequest"
            }
        });

        let data = await response.json();

        if (response.ok) {
            // sucesso
            setTimeout(() => {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            }, 1000);

            document.getElementById("formMessages").innerHTML =
                `<div class="alert-success">${data.message}</div>`;
            form.reset();

            setTimeout(() => {
                const alert = document.querySelector('.alert-success');
                if (alert) {
                    alert.classList.add('alert-hide');
                    setTimeout(() => alert.remove(), 800);
                }
            }, 2000);

        } else {
            // erros de validação
            setTimeout(() => {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            }, 1000);

            Object.keys(data.errors).forEach(field => {
                let input = document.querySelector(`[name="${field}"]`);
                if (input) {
                    let error = document.createElement("small");
                    error.classList.add("message-error");
                    error.innerText = data.errors[field][0];
                    input.insertAdjacentElement("afterend", error);
                }
            });
        }
    } catch (err) {
        setTimeout(() => {
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
        }, 1500);

        console.error(err);
        document.getElementById("formMessages").innerHTML =
            `<div class="alert-danger">Erro inesperado. Tente novamente.</div>`;

        setTimeout(() => {
            const alert = document.querySelector('.alert-danger');
            if (alert) {
                alert.classList.add('alert-hide');
                setTimeout(() => alert.remove(), 800);
            }
        }, 2000);
    }
});
