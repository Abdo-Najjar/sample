require('./bootstrap');

document.querySelectorAll('.slide-images').forEach(element => {
    element.addEventListener('click', function () {
        document.querySelector('.img-preview').src = element.src;
    });
});

document.querySelectorAll('.color-circle').forEach(element => {
    element.addEventListener('click', function () {
        document.querySelector('.img-preview').src = element.getAttribute('data-color');
    });
});
