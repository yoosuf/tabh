$(function ($) {
    const cart = $('#cart');
    const cartMini = $('#cart_mini');
    // const cart_progress_bar = $('#cart_progress_bar');


    $('.item-form').on('submit', function (e) {
        e.preventDefault();
        const button = $(this).find('.item-button');
        const id = $(this).find('.item-id').val();
        button.addClass('is-loading');
        // console.log(id);
        // cart_progress_bar.css('visibility', 'visible');

        axios.post('/cart/add', {
            id: id
        }).then(function (response) {
            cart.load(document.URL + ' #cart', function () {
                // cart_progress_bar.css('visibility', 'hidden');
            });
            cartMini.load(document.URL + ' #cart_mini', function () {
                button.removeClass('is-loading');
            });
        }).catch(function (error) {
            button.removeClass('is-loading');
            // console.log(error);
        });
    });

    $('.cart-plus-item-form').on('submit', function (e) {
        e.preventDefault();
        const button = $(this).find('.item-button');
        const id = $(this).find('.item-id').val();
        button.addClass('is-loading');
        // console.log(id);

        axios.post('/cart/add', {
            id: id
        }).then(function (response) {
            cart.load(document.URL + ' #cart');
            cartMini.load(document.URL + ' #cart_mini', function () {
                button.removeClass('is-loading');
            });
        }).catch(function (error) {
            button.removeClass('is-loading');
            // console.log(error);
        });
    });

    $('.cart-minus-item-form').on('submit', function (e) {
        e.preventDefault();
        const button = $(this).find('.item-button');
        const id = $(this).find('.item-id').val();
        button.addClass('is-loading');
        // console.log(id);

        axios.post('/cart/remove', {
            id: id
        }).then(function (response) {
            cart.load(document.URL + ' #cart');
            cartMini.load(document.URL + ' #cart_mini', function () {
                button.removeClass('is-loading');
            });
        }).catch(function (error) {
            button.removeClass('is-loading');
            // console.log(error);
        });
    });
});
