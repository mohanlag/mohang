let slideIndex = 0;
showSlides(slideIndex);

// Function to change slide
function changeSlide(n) {
    showSlides(slideIndex += n);
}

// Function to show specific slide
function showSlides(n) {
    const slides = document.querySelectorAll(".slider-container img");
    if (n >= slides.length) slideIndex = 0; // Wrap around to the first image
    if (n < 0) slideIndex = slides.length - 1; // Wrap around to the last image

    slides.forEach(slide => slide.style.display = "none"); // Hide all slides
    slides[slideIndex].style.display = "block"; // Show current slide
}
