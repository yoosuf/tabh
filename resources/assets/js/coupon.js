$(function() {

    let discuntCode = $('#order_discunt_code')
    let applyDiscuntCode = $('#applyDiscuntCode');

    applyDiscuntCode.on('click', function(e) {
        e.preventDefault();

        axios.post('/api/v1/coupon', {
            order_discunt_code: discuntCode.val()
        }).then((response) => {
            discuntCode.addClass('is-info');
            console.log(response);
            
            }).catch((error) => {
                discuntCode.addClass('is-danger');
                $.alert({
                    title: error.response.data.message,
                    content: error.response.data.errors.order_discunt_code[0]
                });
                console.log(error);
            });
    });
});