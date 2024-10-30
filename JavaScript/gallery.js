document.addEventListener('DOMContentLoaded', function() {
    const mainImage = document.getElementById('bigImage');
    const thumbnails = document.querySelectorAll('.thumbnail');

    thumbnails.forEach(thumbnail => {
        thumbnail.addEventListener('click', function() {
            mainImage.src = this.src;
        });
    });
});