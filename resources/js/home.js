// Slider
let currentIndex = 0;

function slideImages() {
    const slides = document.querySelector(".slides");
    const totalSlides = document.querySelectorAll(".slides img").length;

    currentIndex++;
    if (currentIndex >= totalSlides) {
        currentIndex = 0;
    }

    slides.style.transform = `translateX(-${currentIndex * 100}%)`;
}

// Tự động cuộn sau mỗi 2 giây
setInterval(slideImages, 3000);
