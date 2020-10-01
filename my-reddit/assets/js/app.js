import '../css/app.css';
import 'bulma/css/bulma.css';

document.addEventListener('DOMContentLoaded', () => {

    /**
     * Bulma .navbar-burger init
     */
    (document.querySelectorAll('.navbar-burger') || []).forEach(navburger => {
        navburger.addEventListener('click', () => {
            navburger.classList.toggle('is-active');
            document.getElementById(navburger.dataset.target).classList.toggle('is-active');
        });
    });

    /**
     * Bulma .notification .delete init
     */
    (document.querySelectorAll('.notification .delete') || []).forEach(cross => {
        cross.addEventListener('click', () => {
            cross.parentNode.parentNode.removeChild(cross.parentNode);
        });
    });

});
