import './bootstrap';

document.addEventListener("DOMContentLoaded", () => {
    const reveals = document.querySelectorAll(".reveal");

    if (!reveals.length) return;

    reveals.forEach((element) => {
        element.classList.add("hidden-reveal");
    });

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("active");
                    entry.target.classList.remove("hidden-reveal");
                }
            });
        },
        {
            threshold: 0.15,
        }
    );

    reveals.forEach((element) => {
        observer.observe(element);
    });
});