// ABRE E FECHA O BOTÃO FLUTUANTE
document.addEventListener("DOMContentLoaded", function () {
    const toggleButton = document.getElementById("floating-button");
    const menuItems = document.querySelectorAll(".btn-open-menu-items");
    const bgOverlay = document.getElementById("insolation-gray-bg");

    toggleButton.addEventListener("click", () => {
        menuItems.forEach(item => {
            item.classList.toggle("btn-open-menu-items-true");
        });

        if (bgOverlay.style.display === "block") {
            bgOverlay.style.display = "none";
        } else {
            bgOverlay.style.display = "block";
        }
    });
});

// ABRE E FECHA O MENU DO USUÁRIO
document.addEventListener("DOMContentLoaded", function () {
    const imgUser = document.getElementById("img-user");
    const iconUser = document.getElementById("icon-user");
    const menuProfile = document.querySelector(".container-menu-profile");

    function toggleMenuProfile() {
        const isVisible = menuProfile.style.opacity === "1";
        if (isVisible) {
            menuProfile.style.opacity = "0";
            menuProfile.style.visibility = "hidden";
        } else {
            menuProfile.style.opacity = "1";
            menuProfile.style.visibility = "visible";
        }
    }

    imgUser.addEventListener("click", toggleMenuProfile);
    iconUser.addEventListener("click", toggleMenuProfile);
});

// FECHA O MAPA
document.addEventListener("DOMContentLoaded", function () {
    const closeBtn = document.getElementById("close-map");
    const mapContainer = document.querySelector(".map-arandopolis");
    const allMapButtons = document.querySelectorAll(".btn-map");
    const mapSection = document.querySelector(".map-section");
    const backBtn = document.querySelector(".btn-back-map");
    const bgBackBtn = document.querySelector(".bg-btn-back-map");

    // Esconde o botão voltar inicialmente
    backBtn.style.display = "none";
    bgBackBtn.style.display = "none";

    closeBtn.addEventListener("click", function () {
        // Oculta mapa com transição
        mapContainer.style.opacity = "0";
        allMapButtons.forEach(btn => btn.style.opacity = "0");
        mapSection.classList.add("map-hidden");

        setTimeout(() => {
            mapContainer.style.display = "none";
            allMapButtons.forEach(btn => btn.style.display = "none");

            // Exibe o botão voltar
            backBtn.style.display = "block";
            bgBackBtn.style.display = "flex";
        }, 500);
    });

    backBtn.addEventListener("click", function () {
        // Oculta o botão voltar
        backBtn.style.display = "none";
        bgBackBtn.style.display = "none";

        // Mostra o mapa novamente
        mapContainer.style.display = "flex";
        allMapButtons.forEach(btn => btn.style.display = "flex");

        setTimeout(() => {
            mapContainer.style.opacity = "1";
            allMapButtons.forEach(btn => btn.style.opacity = "1");
        }, 10);

        // Restaura o fundo escurecido
        mapSection.classList.remove("map-hidden");
    });
});

// ABRE E FECHA O BOTÃO FLUTUANTE DE EXPORTAÇÃO EM EXCEL
document.addEventListener("DOMContentLoaded", function () {
    const exportContainer = document.getElementById('dropdown-item-export');
    const dropdown = exportContainer.querySelector('.button-dropdown-container');

    exportContainer.addEventListener('mouseenter', () => {
        dropdown.style.visibility = 'visible';
    });

    exportContainer.addEventListener('mouseleave', () => {
        dropdown.style.visibility = 'hidden';
    });
});

// ALTERA AS ABAS DE TAREFAS PARA NOTAS
document.addEventListener("DOMContentLoaded", function () {
    const btnAtividades = document.getElementById('card-ativities');
    const btnNotas = document.getElementById('card-note');

        // Seleciona os containers
    const atividadesContainer = document.querySelector('.card-body-ativities-container');
    const notasContainer = document.querySelector('.card-body-note-container');
    const exportContainer = document.querySelector('.btn-print-our-export-container');
    const categoryStatus = document.getElementById('category-status');

      // Clique em "Notas"
    btnNotas.addEventListener('click', () => {
        // Altera exibição dos containers
        atividadesContainer.style.display = 'none';
        notasContainer.style.display = 'block';
        exportContainer.style.display = 'flex';
        categoryStatus.style.display = 'none';

        // Atualiza classes ativas
        btnAtividades.classList.remove('nav-bar-ativities-active-true');
        btnNotas.classList.add('nav-bar-ativities-active-true');
    });

    // Clique em "Atividades"
    btnAtividades.addEventListener('click', () => {
        atividadesContainer.style.display = 'block';
        notasContainer.style.display = 'none';
        exportContainer.style.display = 'none';
        categoryStatus.style.display = 'flex';

        btnAtividades.classList.add('nav-bar-ativities-active-true');
        btnNotas.classList.remove('nav-bar-ativities-active-true');
    });
});

