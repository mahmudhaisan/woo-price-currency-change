<?php


add_action('wp_ajax_price_cahnage_cb', 'price_cahnage_cb');
add_action('wp_ajax_nopriv_price_cahnage_cb', 'price_cahnage_cb');



function price_cahnage_cb() {
    $radio_value = $_POST['radio-value'];
    echo $radio_value;
    wp_die();
}
