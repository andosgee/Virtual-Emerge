const prevButton = document.querySelector('.carousel_button.prev');
const nextButton = document.querySelector('.carousel_button.next');
const images = document.querySelectorAll('.carousel_image');
const overlays = document.querySelectorAll('.text_overlay');
let currentIndex = 0;
const intervalTime = 5000;

function showImage(index) {
    images.forEach((img, i) => {
        img.classList.toggle('active', i === index);
        overlays[i].style.display = i === index ? 'block' : 'none';
    });
}

prevButton.addEventListener('click', () => {
    currentIndex = (currentIndex > 0) ? currentIndex - 1 : images.length - 1;
    showImage(currentIndex);
});

nextButton.addEventListener('click', () => {
    currentIndex = (currentIndex < images.length - 1) ? currentIndex + 1 : 0;
    showImage(currentIndex);
});

// Auto-scroll functionality
setInterval(() => {
    currentIndex = (currentIndex < images.length - 1) ? currentIndex + 1 : 0;
    showImage(currentIndex);
}, intervalTime);

// Initialize
showImage(currentIndex);
