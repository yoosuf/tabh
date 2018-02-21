/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */



require('./bootstrap');
require('jquery-confirm');
// require('./coupon');


require('./address');

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




Dropzone.options.uploadWidget = {
    paramName: 'file',
    maxFilesize: 2, // MB
    maxFiles: 1,
    dictDefaultMessage: 'Drag an image here to upload, or click to select one',
    headers: {
        'x-csrf-token': document.querySelectorAll('meta[name=csrf-token]')[0].getAttributeNode('content').value,
    },
    acceptedFiles: 'image/*',
    init: function() {
        this.hiddenFileInput.removeAttribute('multiple');

        this.on('success', function( file, resp ){
            console.log( file );
            console.log( resp );
        });

        this.on('addedfile', function(file) {
            if (this.files.length > 1) {
                this.removeFile(this.files[0]);
            }
        });
    },
    accept: function(file, done) {
        file.acceptDimensions = done;
        file.rejectDimensions = function() {
            done('The image must be at least 640 x 480px')
        };
    }
};


// var myAwesomeDropzone = new Dropzone("div#temp", { url: "/order/upload"});
// Dropzone.options = {
//     paramName: 'file',
//     maxFilesize: 4, // MB
//     maxFiles: 1,
//     dictDefaultMessage: 'Drag an image here to upload, or click to select one',
//     headers: {
//         'x-csrf-token': document.querySelectorAll('meta[name=csrf-token]')[0].getAttributeNode('content').value,
//     },
//     acceptedFiles: 'image/*',
//     init: function() {
//         this.on('success', function( file, resp ){
//             console.log( file );
//             console.log( resp );
//         });
//
//         this.on("maxfilesexceeded", function(file) {
//             this.removeAllFiles();
//             this.addFile(file);
//         });
//     },
//     accept: function(file, done) {
//
//     }
// };
//



// FB.init({
//     appId      : '1917322048296717',
//     cookie     : true,
//     version    : 'v2.10'
// });


$(function ($) {


    const cart = $('#cart');
    const cartMini = $('#cart_mini');
    const cart_progress_bar = $('#cart_progress_bar');


    $('.item-form').on('submit', function (e) {
        e.preventDefault();
        const button = $(this).find('.item-button');
        const id = $(this).find('.item-id').val();
        button.addClass('is-loading');
        // console.log(id);
        cart_progress_bar.css('visibility', 'visible');

        axios.post('/cart/add', {
            id: id
        }).then(function (response) {
            cart.load(document.URL + ' #cart', function() {
                cart_progress_bar.css('visibility', 'hidden');
            });
            cartMini.load(document.URL + ' #cart_mini', function() {
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
            cartMini.load(document.URL + ' #cart_mini', function() {
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
            cartMini.load(document.URL + ' #cart_mini', function() {
                button.removeClass('is-loading');
            });
        }).catch(function (error) {
            button.removeClass('is-loading');
            // console.log(error);
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

    $('#remote .typeahead').bind('typeahead:selected', function (obj, datum, name) {
        console.log(obj);
        console.log(datum);
        console.log('/search?type=pharmaceutical&q=' + datum);

        $('#cart-search-form').submit();
        
        // axios.get('/search?type=pharmaceutical',
        //     {
        //         params: {
        //             q: datum
        //         }
        //     }
        // ).then(function (response) {
        //     // cart.load(document.URL + ' #cart');
        //     // cartMini.load(document.URL + ' #cart_mini');
        //     console.log(response);
        //     product_list.load(document.URL + ' #product_list');
        // }).catch(function (error) {
        //     console.error(error);
        // });
    });






});




