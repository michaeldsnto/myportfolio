import './bootstrap';
import AOS from 'aos';
import 'aos/dist/aos.css';

function initAOS() {
    AOS.init({
        duration: 800,
        easing: 'ease-in-out',
        once: true,
        offset: 80,
    });
}

document.addEventListener('DOMContentLoaded', initAOS);
window.addEventListener('load', initAOS);