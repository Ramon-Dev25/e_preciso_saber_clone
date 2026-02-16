document.addEventListener('DOMContentLoaded', function () {
    // Mobile menu toggle
    const mobileToggle = document.getElementById('mobileToggle');
    const navMenu = document.getElementById('navMenu');

    if (mobileToggle && navMenu) {
        mobileToggle.addEventListener('click', function () {
            navMenu.style.display = navMenu.style.display === 'flex' ? 'none' : 'flex';
        });
    }

    // Smooth scrolling for navigation links
    const navLinks = document.querySelectorAll('.nav-link');
    navLinks.forEach(link => {
        link.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href.startsWith('#')) {
                e.preventDefault();
                const target = document.querySelector(href);
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });

                    // Close mobile menu if open
                    if (window.innerWidth <= 768) {
                        navMenu.style.display = 'none';
                    }
                }
            }
        });
    });

    // Header background on scroll
    const header = document.querySelector('.header');
    window.addEventListener('scroll', function () {
        if (window.scrollY > 100) {
            header.style.background = 'rgba(255, 255, 255, 0.15)';
        } else {
            header.style.background = 'rgba(255, 255, 255, 0.1)';
        }
    });

    // Intersection Observer for animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function (entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';

                // Special animation for stat cards
                if (entry.target.classList.contains('stat-card')) {
                    const delay = Array.from(entry.target.parentNode.children).indexOf(entry.target) * 200;
                    setTimeout(() => {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0) scale(1)';
                    }, delay);
                }

                // Special animation for segment items
                if (entry.target.classList.contains('segment-item')) {
                    const delay = Array.from(entry.target.parentNode.children).indexOf(entry.target) * 100;
                    setTimeout(() => {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateX(0)';
                    }, delay);
                }

                // Special animation for segment pilar card
                if (entry.target.classList.contains('pilar-card')) {
                    const delay = Array.from(entry.target.parentNode.children).indexOf(entry.target) * 100;
                    setTimeout(() => {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateX(0)';
                    }, delay);
                }
            }
        });
    }, observerOptions);

    // Apply initial animation states and observe elements
    const animatedElements = document.querySelectorAll('.stat-card, .segment-item, .pilar-card, .contact-form-wrapper, .contact-img');
    animatedElements.forEach(el => {
        // Initial state
        el.style.opacity = '0';

        if (el.classList.contains('stat-card')) {
            el.style.transform = 'translateY(30px) scale(0.9)';

        } else if (el.classList.contains('segment-item')) {
            el.style.transform = 'translateX(-30px)';

        } else if (el.classList.contains('pilar-card')) {
            el.style.transform = 'translateX(-30px)';

        } else {
            el.style.transform = 'translateY(30px)';
        }

        el.style.transition = 'all 0.6s cubic-bezier(0.4, 0, 0.2, 1)';

        // Observe for intersection
        observer.observe(el);
    });

    // Parallax effect for decorative elements
    window.addEventListener('scroll', function () {
        const scrolled = window.pageYOffset;
        const parallaxElements = document.querySelectorAll('.decoration, .floating-element');

        parallaxElements.forEach((el, index) => {
            const speed = 0.5 + (index % 3) * 0.2;
            const yPos = -(scrolled * speed);
            el.style.transform = `translateY(${yPos}px)`;
        });
    });

    // Add hover effects to interactive elements
    const interactiveElements = document.querySelectorAll('.btn-hero, .btn-login, .btn-submit, .social-link');

    interactiveElements.forEach(el => {
        el.addEventListener('mouseenter', function () {
            this.style.transform = this.style.transform + ' scale(1.05)';
        });

        el.addEventListener('mouseleave', function () {
            this.style.transform = this.style.transform.replace(' scale(1.05)', '');
        });
    });

    // Add floating animation to new elements dynamically
    function addFloatingAnimation() {
        const floatingElements = document.querySelectorAll('.rocket-icon, .astronaut-img, .decoration');
        floatingElements.forEach((el, index) => {
            el.style.animationDelay = `${index * 0.5}s`;
        });
    }

    addFloatingAnimation();

    // Responsive mobile menu styles
    function updateMobileMenu() {
        if (window.innerWidth <= 768) {
            navMenu.style.position = 'absolute';
            navMenu.style.top = '100%';
            navMenu.style.left = '0';
            navMenu.style.right = '0';
            navMenu.style.background = '#1c7ec2';
            navMenu.style.backdropFilter = 'blur(10px)';
            navMenu.style.flexDirection = 'column';
            navMenu.style.padding = '1rem';
            navMenu.style.borderRadius = '0 0 1rem 1rem';
            navMenu.style.border = '1px solid rgba(255, 255, 255, 0.2)';
            navMenu.style.display = 'none';
        } else {
            navMenu.style.position = 'static';
            navMenu.style.background = 'none';
            navMenu.style.backdropFilter = 'none';
            navMenu.style.flexDirection = 'row';
            navMenu.style.padding = '0';
            navMenu.style.borderRadius = '0';
            navMenu.style.border = 'none';
            navMenu.style.display = 'flex';
        }
    }

    // Update mobile menu on resize
    window.addEventListener('resize', updateMobileMenu);
    updateMobileMenu();

    // Add typing effect to hero title (optional enhancement)
    function addTypingEffect() {
        const heroTitle = document.querySelector('.hero-title');
        if (!heroTitle) return;

        const text = heroTitle.textContent;
        heroTitle.textContent = '';
        heroTitle.style.borderRight = '2px solid var(--coral-orange-dark)';

        let i = 0;
        const timer = setInterval(() => {
            if (i < text.length) {
                heroTitle.textContent += text.charAt(i);
                i++;
            } else {
                clearInterval(timer);
                setTimeout(() => {
                    heroTitle.style.borderRight = 'none';
                }, 1000);
            }
        }, 50);
    }

    // Uncomment to enable typing effect
    // setTimeout(addTypingEffect, 1000);

    // Add particle effect on button hover (optional enhancement)
    function createParticle(x, y) {
        const particle = document.createElement('div');
        particle.style.position = 'fixed';
        particle.style.left = x + 'px';
        particle.style.top = y + 'px';
        particle.style.width = '4px';
        particle.style.height = '4px';
        particle.style.background = 'var(--coral-orange-dark)';
        particle.style.borderRadius = '50%';
        particle.style.pointerEvents = 'none';
        particle.style.zIndex = '9999';
        particle.style.animation = 'particle-float 1s ease-out forwards';

        document.body.appendChild(particle);

        setTimeout(() => {
            particle.remove();
        }, 1000);
    }

    // Add particle CSS animation
    const style = document.createElement('style');
    style.textContent = `
        @keyframes particle-float {
            0% {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
            100% {
                opacity: 0;
                transform: translateY(-50px) scale(0.5);
            }
        }
    `;
    document.head.appendChild(style);

    // Add particle effect to hero button
    const heroBtn = document.querySelector('.btn-hero');
    if (heroBtn) {
        heroBtn.addEventListener('mousemove', function (e) {
            if (Math.random() > 0.8) { // Only create particles occasionally
                createParticle(e.clientX, e.clientY);
            }
        });
    }

    console.log('Ava É Preciso Saber acessado com Sucesso!');
});

document.getElementById("contactFormAva").addEventListener("submit", async function (e) {
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

        // Show loading state


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
                const alert = document.querySelector('.alert-danger');
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
        }, 1000);
        
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