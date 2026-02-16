// Event Data
const events = [
    {
        id: 1,
        title: "Workshop de Inovação Digital",
        description: "Aprenda as melhores práticas de transformação digital e inovação tecnológica com especialistas do mercado.",
        date: "15 de Novembro, 2025",
        location: "São Paulo - SP",
        capacity: "100 vagas",
        image: "/images/event-workshop.jpg",
        category: "Workshop",
        filterCategory: "workshop",
    },
    {
        id: 2,
        title: "Palestra: Futuro da Educação",
        description: "Uma visão inspiradora sobre como a tecnologia está moldando o futuro da educação e do aprendizado.",
        date: "22 de Novembro, 2025",
        location: "Rio de Janeiro - RJ",
        capacity: "250 vagas",
        image: "/images/event-palestra.jpg",
        category: "Palestra",
        filterCategory: "palestra",
    },
    {
        id: 3,
        title: "Curso Intensivo de UX Design",
        description: "Domine os fundamentos de UX Design em uma semana intensiva com projetos práticos e mentoria individual.",
        date: "1 de Dezembro, 2025",
        location: "Online",
        capacity: "50 vagas",
        image: "/images/event-curso.jpg",
        category: "Curso",
        filterCategory: "curso",
    },
    {
        id: 4,
        title: "Meetup de Tecnologia",
        description: "Networking e troca de experiências com profissionais de tecnologia em um ambiente descontraído.",
        date: "8 de Dezembro, 2025",
        location: "Belo Horizonte - MG",
        capacity: "80 vagas",
        image: "/images/event-meetup.jpg",
        category: "Meetup",
        filterCategory: "meetup",
    },
    {
        id: 5,
        title: "Workshop de Liderança",
        description: "Desenvolva habilidades essenciais de liderança e gestão de equipes com dinâmicas práticas.",
        date: "12 de Dezembro, 2025",
        location: "Curitiba - PR",
        capacity: "60 vagas",
        image: "/images/event-team.jpg",
        category: "Workshop",
        filterCategory: "workshop",
    },
    {
        id: 6,
        title: "Seminário de Marketing Digital",
        description: "Estratégias avançadas de marketing digital, redes sociais e growth hacking para empresas.",
        date: "18 de Dezembro, 2025",
        location: "Brasília - DF",
        capacity: "150 vagas",
        image: "/images/event-seminar.jpg",
        category: "Palestra",
        filterCategory: "palestra",
    },
];

// State
let activeFilter = "todos";

// Initialize
document.addEventListener("DOMContentLoaded", function () {
    initStars();
    initFilters();
    renderEvents();
    initContactForm();
});

// Generate random stars
function initStars() {
    const heroSection = document.querySelector(".hero-section");
    const starsCount = 30;

    for (let i = 0; i < starsCount; i++) {
        const star = document.createElement("div");
        star.className = "star-decoration";
        star.style.left = `${Math.random() * 100}%`;
        star.style.top = `${Math.random() * 100}%`;
        star.style.animationDelay = `${Math.random() * 3}s`;
        heroSection.appendChild(star);
    }
}

// Initialize filter buttons
function initFilters() {
    const filterButtons = document.querySelectorAll(".filter-btn");

    filterButtons.forEach((button) => {
        button.addEventListener("click", function () {
            // Remove active class from all buttons
            filterButtons.forEach((btn) => btn.classList.remove("active"));

            // Add active class to clicked button
            this.classList.add("active");

            // Update active filter
            activeFilter = this.getAttribute("data-filter");

            // Render filtered events
            renderEvents();
        });
    });
}

// Render events based on active filter
function renderEvents() {
    const eventGrid = document.querySelector(".event-grid");
    const emptyState = document.querySelector(".empty-state");

    // Filter events
    const filteredEvents =
        activeFilter === "todos"
            ? events
            : events.filter((event) => event.filterCategory === activeFilter);

    // Clear grid
    eventGrid.innerHTML = "";

    // Show/hide empty state
    if (filteredEvents.length === 0) {
        emptyState.classList.remove("hidden");
        return;
    } else {
        emptyState.classList.add("hidden");
    }

    // Render events
    filteredEvents.forEach((event) => {
        const card = createEventCard(event);
        eventGrid.appendChild(card);
    });
}

// Create event card HTML
function createEventCard(event) {
    const card = document.createElement("div");
    card.className = "event-card";

    card.innerHTML = `
    <div class="event-image">
      <img src="${event.image}" alt="${event.title}">
      <div class="event-category">${event.category}</div>
    </div>
    <div class="event-content">
      <h3 class="event-title">${event.title}</h3>
      <p class="event-description">${event.description}</p>
      <div class="event-details">
        <div class="event-detail">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
            <line x1="16" y1="2" x2="16" y2="6"></line>
            <line x1="8" y1="2" x2="8" y2="6"></line>
            <line x1="3" y1="10" x2="21" y2="10"></line>
          </svg>
          <span>${event.date}</span>
        </div>
        <div class="event-detail">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
            <circle cx="12" cy="10" r="3"></circle>
          </svg>
          <span>${event.location}</span>
        </div>
        <div class="event-detail">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
            <circle cx="9" cy="7" r="4"></circle>
            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
          </svg>
          <span>${event.capacity}</span>
        </div>
      </div>
      <button class="btn btn-primary" onclick="handleEventRegistration('${event.title}')">
        Inscrever-se
      </button>
    </div>
  `;

    return card;
}

// Handle event registration
function handleEventRegistration(eventTitle) {
    showToast(`Inscrição registrada para: ${eventTitle}`);
}

// Initialize contact form
function initContactForm() {
    const form = document.getElementById("contactForm");

    form.addEventListener("submit", function (e) {
        e.preventDefault();

        // Get form data
        const formData = {
            name: document.getElementById("name").value,
            email: document.getElementById("email").value,
            phone: document.getElementById("phone").value,
            message: document.getElementById("message").value,
        };

        // Simple validation
        if (!formData.name || !formData.email || !formData.message) {
            showToast("Por favor, preencha todos os campos obrigatórios.", "error");
            return;
        }

        // Show success message
        showToast("Mensagem enviada com sucesso! Entraremos em contato em breve.");

        // Reset form
        form.reset();
    });
}

// Show toast notification
function showToast(message, type = "success") {
    // Remove existing toast if any
    const existingToast = document.querySelector(".toast");
    if (existingToast) {
        existingToast.remove();
    }

    // Create new toast
    const toast = document.createElement("div");
    toast.className = `toast ${type}`;
    toast.innerHTML = `
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
      <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
      <polyline points="22 4 12 14.01 9 11.01"></polyline>
    </svg>
    <span>${message}</span>
  `;

    document.body.appendChild(toast);

    // Remove toast after 5 seconds
    setTimeout(() => {
        toast.style.animation = "slideIn 0.3s ease reverse";
        setTimeout(() => toast.remove(), 300);
    }, 5000);
}

// Smooth scroll for hero buttons (if needed)
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute("href"));
        if (target) {
            target.scrollIntoView({ behavior: "smooth" });
        }
    });
});
