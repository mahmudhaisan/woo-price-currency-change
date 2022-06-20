<?php


/**
 * Plugin Name: Woo Pricing Currency
 * Plugin URI: http://mahmudhaisan.com/
 * Description: Change currecny on select options
 * Version: 1.0
 * Author: Mahmud haisan
 * Author URI: https://github.com/mahmudhaisan
 * Developer: Mahmud Haisan
 * Developer URI: https://github.com/mahmudhaisan
 * Text Domain: random493
 * Domain Path: /languages
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 */


if (!defined('ABSPATH')) {
    die;
}


/**
 * Defining Constants
 */
define("PLUGINS_PATH_ASSETS", plugin_dir_url(__FILE__) . 'assets/');
define("PLUGINS_PATH", plugin_dir_path(__FILE__));


/**
 * Register Enqueue SCripts
 *
 * @return void
 */
function load_plugin_scripts() {
    wp_enqueue_style('woo_currency_bootstrap', PLUGINS_PATH_ASSETS . 'css/style.css');
    wp_enqueue_script('woo_currency_script',  PLUGINS_PATH_ASSETS . 'js/script.js');
}
add_action('init', 'load_plugin_scripts');


/**
 * Single product summary hook callback
 *
 * @return void
 */
function woo_single_page_before_title_callback() {

    global $product;
    $product_id = $product->get_id();
    $product = wc_get_product($product_id);
    $product_price_usd =  $product->get_regular_price();
    $product_price_euro =  $product_price_usd * 0.95;
    $product_price_aud =  $product_price_usd * 1.44;

?>

    <form id="myForm">
        <div id="">
            <input type="radio" id="usd" name="currency" value="<?php echo $product_price_usd; ?>">
            <label for="usd"><?php echo '$ ' . $product_price_usd; ?></label>

            <input type="radio" id="euro" name="currency" value="<?php echo $product_price_euro; ?>">
            <label for="euro"><?php echo '€ ' . $product_price_euro; ?></label>

            <input type="radio" id="aud" name="currency" value="<?php echo $product_price_aud; ?>">
            <label for="aud"><?php echo 'AUD$ ' . $product_price_aud; ?></label>
        </div>
    </form>

<?php }

add_action('woocommerce_single_product_summary', 'woo_single_page_before_title_callback');
