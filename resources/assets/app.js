/*
* This is the main JavaScript used by Vite to build the app.js file.
*/

document.querySelectorAll('[data-navigation]').forEach((navigation) => {
    const toggle = navigation.querySelector('[data-navigation-toggle]');
    const menu = navigation.querySelector('[data-navigation-menu]');
    const openIcon = navigation.querySelector('[data-navigation-open-icon]');
    const closeIcon = navigation.querySelector('[data-navigation-close-icon]');

    if (!toggle || !menu) return;

    const close = () => {
        menu.hidden = true;
        toggle.setAttribute('aria-expanded', 'false');
        openIcon?.classList.remove('hidden');
        closeIcon?.classList.add('hidden');
    };

    const open = () => {
        menu.hidden = false;
        toggle.setAttribute('aria-expanded', 'true');
        openIcon?.classList.add('hidden');
        closeIcon?.classList.remove('hidden');
    };

    toggle.addEventListener('click', () => {
        menu.hidden ? open() : close();
    });

    menu.querySelectorAll('[data-navigation-link]').forEach((link) => {
        link.addEventListener('click', close);
    });

    navigation.addEventListener('click', (event) => {
        if (!menu.hidden && !menu.contains(event.target) && event.target !== toggle && !toggle.contains(event.target)) {
            close();
        }
    });

    window.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && !menu.hidden) {
            close();
            toggle.focus();
        }
    });
});
