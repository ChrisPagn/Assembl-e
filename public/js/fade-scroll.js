// Fade-in on scroll script
document.addEventListener("DOMContentLoaded", () => {
    const elements = document.querySelectorAll('.fade-scroll');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, {
        threshold: 0.2
    });

    elements.forEach(el => observer.observe(el));
});