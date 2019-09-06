<?php

require plugin_dir_path( __DIR__ ) . '/vendor/autoload.php';

use Automattic\WooCommerce\Client;
use Automattic\WooCommerce\HttpClient\HttpClientException;

class OOP_Architecture_Class_Woo_Com_API_Connect {

    public $woocommerce;

    public function __construct() {

        $this->woocommerce = new Client(
            site_url(), // Your store URL
            'ck_3ea8d9829431ad18028fcc019025d57ff9e2faa1', // Your consumer key
            'cs_b83e999a2cb7b7d752d5aa501c7b66cb15004ada', // Your consumer secret
            [
                'wp_api' => true,
                'version' => 'wc/v3',
                'verify_ssl' => false,
                // 'query_string_auth' => true
                // 'timeout' => 500
            ]
        );

        add_action('wp_head', array($this,'create_product'));
    }

    function create_product() {
        
        $results = $this->woocommerce->get('');
        var_dump($results);
        // try {
        //     // Array of response results.
        //     // $results = $woocommerce->get('products');
        //     // Example: ['customers' => [[ 'id' => 8, 'created_at' => '2015-05-06T17:43:51Z', 'email' => ...
        //     // var_dump($results);

        // } catch (HttpClientException $e) {
        //     echo '<pre><code>' . print_r( $e->getMessage(), true ) . '</code><pre>'; // Error message.
        //     echo '<pre><code>' . print_r( $e->getRequest(), true ) . '</code><pre>'; // Last request data.
        //     echo '<pre><code>' . print_r( $e->getResponse(), true ) . '</code><pre>'; // Last response data.
        // }

    }

}
