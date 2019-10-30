/**
 * @param {Element} $container
 * @returns {NodeList}
 */
function getNavbars($container) {
    let $navbars = $container.querySelectorAll(
        '[data-role="navbar"]'
    );

    return $navbars;
}


/**
 * @param {Element} $navbar
 */
function registerNavbarEventListeners($navbar) {
    let $navbarBurgerButton = $navbar.querySelector(
        '[data-role="navbar-burger-button"]'
    );

    let $navbarMenu = $navbar.querySelector(
        '[data-role="navbar-menu"]'
    );

    $navbarBurgerButton.addEventListener('click', function (event) {
        $navbarBurgerButton.classList.toggle('is-active');
        $navbarMenu.classList.toggle('is-active');
    })
}


document.addEventListener('DOMContentLoaded', function (event) {
    let $navbars = getNavbars(document.body);

    for (const $navbar of $navbars) {
        registerNavbarEventListeners($navbar, document.body);
    }
});
