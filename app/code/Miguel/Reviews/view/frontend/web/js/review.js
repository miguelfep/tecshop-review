document.addEventListener("DOMContentLoaded", function() {
    const stars = document.querySelectorAll(".star-rating .star");
    const ratingInput = document.getElementById("rating");

    stars.forEach(star => {
        star.addEventListener("click", function() {
            let value = this.getAttribute("data-value");
            ratingInput.value = value;

            stars.forEach(s => {
                if (s.getAttribute("data-value") <= value) {
                    s.style.color = "#ff0";
                } else {
                    s.style.color = "#ccc";
                }
            });
        });
    });
});
