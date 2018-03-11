/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */



require('./bootstrap');
require('jquery-confirm');
require('./components/address');
require('./components/cart');
require('./components/type-ahead');


$(function() {



    if ($("#prescription").length) {
        const file = document.getElementById("prescription");
        file.onchange = function () {
            if (file.files.length > 0) {
                document.getElementById('imagename').innerHTML = file.files[0].name;
            }
        };
    }

    /**
     *                             <a href="#" onclick="" class="">Delete</a>

     */

    $('.droppable').on("click", function (e) {
        // e.preventDefault();

        let choice = confirm($(this).attr('data-confirm'));

        if (choice) {
            // window.location.href = $(this).attr('href');
            $(this).closest('form').submit();
        }
    });

});

// var FB = require('fb');

/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */



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

