document.addEventListener("DOMContentLoaded", function () {
    if (document.querySelector(".product-carousel2")) {
        new Glide(".product-carousel2", {
            type: "carousel",
            perView: 4,
            gap: 20,
            autoplay: 3000,
            breakpoints: {
                1024: {
                    perView: 3
                },
                768: {
                    perView: 2
                },
                480: {
                    perView: 1
                }
            }
        }).mount();
    }
});