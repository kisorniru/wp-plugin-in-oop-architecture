<?php

require plugin_dir_path( __DIR__ ) . '/vendor/autoload.php';

use Automattic\WooCommerce\Client;
use Automattic\WooCommerce\HttpClient\HttpClientException;

class OOP_Architecture_Class_Woo_Com_API_Connect {

    public function __construct() {

        add_action('wp_head', array($this,'visibility_from_class_b'));

    }

    function visibility_from_class_b()
    {
        $woocommerce = new Client(
            'http://wp-plugin-dev.local/', // Your store URL
            'ck_a617102d9e1ef21cbd1b4f2ff4321c31adb22bc6', // Your consumer key
            'cs_69507527d2f0178e12317ec61932332242f872d0', // Your consumer secret
            [
                'wp_api' => true, // Enable the WP REST API integration
                'version' => 'wc/v3', // WooCommerce WP REST API version
                'verify_ssl' => false,
                // 'timeout' => 40000
            ]
        );
        var_dump(count($woocommerce->get('products')));
        return $woocommerce;
    }

}
