$(function() {

    let discuntCode = $('#order_discunt_code')
    let applyDiscuntCode = $('#applyDiscuntCode');

    applyDiscuntCode.on('click', function(e) {
        e.preventDefault();

        axios.get('/api/v1/coupon', {
            order_discunt_code: discuntCode.val()
        }).then((response) => {
                console.log(response);
            }).catch((error) => {
                discuntCode.addClass('is-danger');
                
                console.log(error);
            });
    });
});