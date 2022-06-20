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


?>

    <form>
        <div>
            <input type="radio" id="aud" name="aud" value="AUD">
            <label for="aud">AUD</label>

            <input type="radio" id="euro" name="euro" value="EURO">
            <label for="euro">EURO</label>

            <input type="radio" id="usd" name="usd" value="USD">
            <label for="usd">USD</label>
        </div>
    </form>

<?php }

add_action('woocommerce_single_product_summary', 'woo_single_page_before_title_callback');
