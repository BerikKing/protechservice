// Mobile menu functionality
const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
const navLinks = document.querySelector('.nav-links');
const body = document.body;

mobileMenuBtn.addEventListener('click', () => {
    mobileMenuBtn.classList.toggle('active');
    navLinks.classList.toggle('active');
    body.classList.toggle('menu-open');
});

// Close mobile menu when clicking outside
document.addEventListener('click', (event) => {
    const isClickInsideNav = event.target.closest('.nav');
    if (!isClickInsideNav && navLinks.classList.contains('active')) {
        mobileMenuBtn.classList.remove('active');
        navLinks.classList.remove('active');
        body.classList.remove('menu-open');
    }
});

// Close mobile menu when clicking on a link
navLinks.querySelectorAll('a').forEach((link) => {
    link.addEventListener('click', () => {
        mobileMenuBtn.classList.remove('active');
        navLinks.classList.remove('active');
        body.classList.remove('menu-open');
    });
});
// Show more brands functionality
const showMoreBrandsBtn = document.querySelector('.show-more-brands');
const hiddenBrands = document.querySelectorAll('.brand.hidden');
let brandsVisible = false;

showMoreBrandsBtn.addEventListener('click', () => {
    hiddenBrands.forEach((brand) => {
        brand.classList.toggle('hidden');
    });

    brandsVisible = !brandsVisible;
    showMoreBrandsBtn.textContent = brandsVisible ? 'Показать меньше' : 'Показать больше';
});
// Modal functionality
// const modal = document.getElementById('modal');
const requestBtn = document.getElementById('requestBtn');
const closeBtn = document.querySelector('.close');

requestBtn.addEventListener('click', () => {
    modal.style.display = 'block';
});

closeBtn.addEventListener('click', () => {
    modal.style.display = 'none';
});

window.addEventListener('click', (event) => {
    if (event.target === modal) {
        modal.style.display = 'none';
    }
});
// Form submission functionality
const forms = ['requestForm', 'contactForm'];
const thankYouModal = document.getElementById('thankYouModal');
const modal = document.getElementById('modal');

forms.forEach((formId) => {
    const form = document.getElementById(formId);
    if (!form) return;

    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        const formData = new FormData(form);
        const submitButton = form.querySelector('button[type="submit"]');

        // Блокируем кнопку, чтобы не кликали много раз
        submitButton.disabled = true;
        const originalText = submitButton.textContent;
        submitButton.textContent = 'Отправка...';

        try {
            const response = await fetch('send.php', {
                method: 'POST',
                body: formData,
            });

            const result = await response.json();

            if (result.status === 'success') {
                form.reset();
                thankYouModal.style.display = 'block';

                if (formId === 'requestForm') {
                    modal.style.display = 'none';
                }
            } else {
                alert('Ошибка: ' + result.message);
            }
        } catch (error) {
            alert('Произошла ошибка при отправке формы.');
        } finally {
            // Возвращаем кнопку в исходное состояние
            submitButton.disabled = false;
            submitButton.textContent = originalText;
        }
    });
});

const phoneInputs = document.querySelectorAll('input[name="phone"]');

phoneInputs.forEach((input) => {
    IMask(input, {
        mask: '+{7} (000) 000-00-00',
    });
});
// Закрытие модального окна "Спасибо"
document.addEventListener('click', function (e) {
    if (
        e.target.classList.contains('close') ||
        e.target.classList.contains('close-modal') ||
        e.target === thankYouModal
    ) {
        thankYouModal.style.display = 'none';
    }
});

// Header scroll effect
const header = document.querySelector('.header');
let lastScroll = 0;

window.addEventListener('scroll', () => {
    const currentScroll = window.pageYOffset;

    if (currentScroll > lastScroll && currentScroll > 100) {
        header.style.transform = 'translateY(-100%)';
    } else {
        header.style.transform = 'translateY(0)';
    }

    lastScroll = currentScroll;
});
// FAQ functionality
const faqItems = document.querySelectorAll('.faq-item');

faqItems.forEach((item) => {
    const question = item.querySelector('.faq-question');

    question.addEventListener('click', () => {
        const isActive = item.classList.contains('active');

        // Close all FAQ items
        faqItems.forEach((faqItem) => {
            faqItem.classList.remove('active');
        });

        // Open clicked item if it wasn't active
        if (!isActive) {
            item.classList.add('active');
        }
    });
});
const toTopBtn = document.getElementById('toTopBtn');

window.addEventListener('scroll', () => {
    if (window.scrollY > 300) {
        toTopBtn.classList.add('show');
    } else {
        toTopBtn.classList.remove('show');
    }
});

toTopBtn.addEventListener('click', () => {
    window.scrollTo({
        top: 0,
        behavior: 'smooth',
    });
});
const swiper = new Swiper('.swiper', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,
    autoplay: {
        delay: 5000, // Время между слайдами (в мс)
        disableOnInteraction: false, // не отключать после ручного переключения
    },

    // If we need pagination
    pagination: {
        el: '.swiper-pagination',
    },

    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },

    // And if we need scrollbar
    scrollbar: {
        el: '.swiper-scrollbar',
    },
});
