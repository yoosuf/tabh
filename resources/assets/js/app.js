
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

require('./bootstrap');

// var FB = require('fb');

/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

require('./components/Search');

require('typeahead.js');

let Bloodhound = require('bloodhound-js');


document.addEventListener('DOMContentLoaded', function () {

    // Get all "navbar-burger" elements
    let $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

    // Check if there are any navbar burgers
    if ($navbarBurgers.length > 0) {

        // Add a click event on each of them
        $navbarBurgers.forEach(function ($el) {
            $el.addEventListener('click', function () {

                // Get the target from the "data-target" attribute
                let target = $el.dataset.target;
                let $target = document.getElementById(target);

                // Toggle the class on both the "navbar-burger" and the "navbar-menu"
                $el.classList.toggle('is-active');
                $target.classList.toggle('is-active');

            });
        });
    }

});


function toggleModalClasses(event) {
    var modalId = event.currentTarget.dataset.modalId;
    var modal = $(modalId);
    modal.toggleClass('is-active');
    $('html').toggleClass('is-clipped');
};



// FB.init({
//     appId      : '1917322048296717',
//     cookie     : true,
//     version    : 'v2.10'
// });


$(function() {
    $('.open-modal').click(toggleModalClasses);

    $('.close-modal').click(toggleModalClasses);


    $('#newAddress').on('click', function () {
        alert('sdsds');
        $( "<div class=\"media js-media\">Hello </div>" ).prependTo( "#addressList" );
    })


})



const cart  = $('#cart');
const cartMini = $('#cart_mini');
const product_list = $('#product_list');


$('.item-form').on('submit', function (e) {
    e.preventDefault();
    const button = $(this).find('.item-button');
    const id = $(this).find('.item-id').val();
    button.addClass('is-loading');
    console.log(id);

    axios.post('/cart/add', {
            id: id
        }).then(function (response) {
            cart.load(document.URL + ' #cart');
            cartMini.load(document.URL + ' #cart_mini');
            button.removeClass('is-loading');
        }).catch(function (error) {
            button.removeClass('is-loading');
            console.log(error);
        });
});

$('.cart-plus-item-form').on('submit', function (e) {
    e.preventDefault();
    const button = $(this).find('.item-button');
    const id = $(this).find('.item-id').val();
    button.addClass('is-loading');
    console.log(id);

    axios.post('/cart/add', {
        id: id
    }).then(function (response) {
        cart.load(document.URL + ' #cart');
        cartMini.load(document.URL + ' #cart_mini');
        button.removeClass('is-loading');
    }).catch(function (error) {
        button.removeClass('is-loading');
        console.log(error);
    });
});

$('.cart-minus-item-form').on('submit', function (e) {
    e.preventDefault();
    const button = $(this).find('.item-button');
    const id = $(this).find('.item-id').val();
    button.addClass('is-loading');
    console.log(id);

    axios.post('/cart/remove', {
        id: id
    }).then(function (response) {
        cart.load(document.URL + ' #cart');
        cartMini.load(document.URL + ' #cart_mini');
        button.removeClass('is-loading');
    }).catch(function (error) {
        button.removeClass('is-loading');
        console.log(error);
    });
});

let products = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.whitespace,
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    prefetch: '/products?type=pharmaceutical',
    remote: {
        url: '/products?type=pharmaceutical&q=%QUERY',
        wildcard: '%QUERY'
    }
});

$('#remote .typeahead').typeahead(
    {
        hint: true,
        highlight: true,
        minLength: 1
    },
    {
        name: 'Products',
        source: products
    }
);

// $('#remote .typeahead').bind('typeahead:selected', function(obj, datum, name) {
//     console.log(obj);
//     console.log(datum);
//     console.log('/search?type=pharmaceutical&q=' + datum);
//     axios.get('/search?type=pharmaceutical',
//         {params: {
//         q: datum
//     }}
//     ).then(function (response) {
//         // cart.load(document.URL + ' #cart');
//         // cartMini.load(document.URL + ' #cart_mini');
//         console.log(response);
//         product_list.load(document.URL + ' #product_list');
//     }).catch(function (error) {
//             console.error(error);
//         });
// });

$('.media .button').on('click', function(e) {
    // alert('sdsd') ;
});
