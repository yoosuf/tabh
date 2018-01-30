
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// require('./components/Example');




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




$(function () {

    let addressCities = $("#address_city");
    let addressPostcode = $('#address_postcode');

    addressCities.attr('disabled','disabled');
    addressPostcode.attr('disabled','disabled');

    $('#address_province').change(function () {

        let currentDistrict = $(this).val();

        addressCities.parent().parent('div').addClass('is-loading');
        addressCities.attr('disabled','disabled');
        addressPostcode.attr('disabled','disabled');

        axios.get(`/api/v1/districts/${currentDistrict}/areas`)
            .then(function (res) {
                addressCities.empty();
                $.each(res.data.data, function(key, value) {
                    addressCities
                        .append($("<option></option>")
                            .attr("value",value.id)
                            .text(value.name));
                });
                addressCities.parent().parent('div').removeClass('is-loading');
                addressCities.removeAttr('disabled');
                addressPostcode.removeAttr('disabled');
            })
            .catch(function (error) {
                console.log(error);
            });
    });
});