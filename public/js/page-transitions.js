// Page fade-in au chargement
window.addEventListener('load', function() {
    document.body.classList.add('page-loaded');
});

// Transition entre les pages avec animation de colombe
document.addEventListener('DOMContentLoaded', function () {
    const transitionEl = document.getElementById('page-transition');
    const links = document.querySelectorAll('a[href^="' + window.location.origin + '"], a[href^="/"]');

    links.forEach(link => {
        link.addEventListener('click', function (e) {
            // Conditions : pas Ctrl/Cmd, pas bouton du milieu, pas target _blank
            if (
                e.defaultPrevented ||
                e.button !== 0 ||
                e.metaKey || e.ctrlKey || e.shiftKey || e.altKey ||
                this.target === '_blank'
            ) {
                return;
            }

            const href = this.getAttribute('href');

            // Ne pas réanimer si on reste sur la même URL
            if (!href || href === window.location.pathname) {
                return;
            }

            e.preventDefault();

            // Activer l'overlay
            transitionEl.classList.add('active');

            // Attendre la fin de l'anim avant de changer de page
            setTimeout(function () {
                window.location.href = href;
            }, 3000); // Ajuste selon ta durée d'animation CSS
        });
    });
});