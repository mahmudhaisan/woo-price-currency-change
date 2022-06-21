jQuery(document).ready(function($) {





    $("#myForm input").on('change', function() {

        var radioValue = $("[type='radio']:checked").val();
        $.ajax({
            type: "post",
            url: my_ajax_object.ajax_url,
            data: {
                'action': 'price_cahnage_cb',
                'radio-value': radioValue
            },
            success: function(msg) {
                console.log(msg);
            }

        });

    });
});