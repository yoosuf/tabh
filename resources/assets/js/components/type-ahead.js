require('typeahead.js');
let Bloodhound = require('bloodhound-js');

$(function ($) {
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
