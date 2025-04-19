//Lazy load images and videos with IntersectionObserver API
document.addEventListener("DOMContentLoaded", function () {
    // Select all images and videos with the 'lazy' class
    let lazyElements = document.querySelectorAll(".lazy");

    // IntersectionObserver setup to observe when elements enter the viewport
    let observer = new IntersectionObserver((entries, observer) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                let element = entry.target;

                // Check if it's an image
                if (element.tagName === "IMG" && element.dataset.src) {
                    element.src = element.dataset.src;
                    element.onload = function () {
                        // Add a class for styling.
                        element.classList.add("loaded");
                        element
                            .closest(".shimmer-wrapper")
                            .classList.add("loaded");
                    };
                }

                // Check if it's a video
                if (element.tagName === "VIDEO" && element.dataset.src) {
                    let sources = element.querySelectorAll("source");
                    sources.forEach((source) => {
                        if (source.dataset.src) {
                            source.src = source.dataset.src;
                        }
                    });
                    element.load();
                    element.onloadeddata = function () {
                        // Add a class for styling.
                        element.classList.add("loaded");
                        element
                            .closest(".shimmer-wrapper")
                            .classList.add("loaded");
                    };
                }

                observer.unobserve(element);
            }
        });
    });

    // Start observing each lazy element (both images and videos)
    lazyElements.forEach((element) => observer.observe(element));
});

window.addEventListener("resize", () => {
    document.querySelectorAll(".showcase-grid").forEach((grid) => {
        grid.style.display = "none";
        setTimeout(() => (grid.style.display = "grid"), 50);
    });
});

function toggleDescription(id) {
    const desc = document.getElementById(id);
    const button = desc.nextElementSibling;
    desc.classList.toggle("expanded");
    button.textContent = desc.classList.contains("expanded") ? "Less" : "More";
}
