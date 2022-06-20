jQuery(document).ready(function($) {

    $("#myForm input").on('change', function() {

        var radioValue = $("[type='radio']:checked").val();
        console.log(radioValue);

    });







});