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

document.querySelector('#total').innerHTML = parseInt(document.querySelector('.product-info').getAttribute('data-price'));

document.querySelectorAll('.extra').forEach(element => {
    element.addEventListener('click', function () {
        let totalPrice = parseInt(element.getAttribute('data-price')) + parseInt(document.querySelector('.product-info').getAttribute('data-price'));
        document.querySelector('#total').innerHTML = totalPrice;
    });
});

