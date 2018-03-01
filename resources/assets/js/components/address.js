
$(function () {

    let addressProvince = $('#address_province');
    let addressCities = $("#address_city");
    let addressPostcode = $('#address_postcode');

    // addressCities.attr('disabled', 'disabled');
    // addressPostcode.attr('disabled', 'disabled');

    addressCities.change(function () {
        addressPostcode.val("");
    });


    addressProvince.change(function () {

        let currentDistrict = $(this).val();

        addressCities.parent().parent('div').addClass('is-loading');
        addressCities.attr('disabled', 'disabled');
        addressPostcode.attr('disabled', 'disabled');

        axios.get(`/districts/${currentDistrict}/areas`)
            .then(function (res) {
                addressCities.empty();
                $.each(res.data.data, function (key, value) {
                    addressCities
                        .append($("<option></option>")
                            .attr("value", value.id)
                            .text(value.name));
                });
                addressCities.parent().parent('div').removeClass('is-loading');
                addressCities.removeAttr('disabled');
                addressPostcode.removeAttr('disabled');
                addressPostcode.val("");
            })
            .catch(function (error) {
                console.error(error);
            });
    });



    // if (addressProvince.val()) {
    //     console.log( "Demo " + addressProvince.val());
    // } else {
    //
    //
    // }



});
