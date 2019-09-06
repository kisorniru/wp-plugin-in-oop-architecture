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
        
        $data = [
            'name' => 'Premium Quality - 2',
            'type' => 'simple',
            'regular_price' => '21.99',
            'description' => 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.',
            'short_description' => 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.',
            'categories' => [
                [
                    'id' => 9
                ],
                [
                    'id' => 14
                ]
            ],
            'images' => [
                [
                    'src' => 'http://demo.woothemes.com/woocommerce/wp-content/uploads/sites/56/2013/06/T_2_front.jpg'
                ],
                [
                    'src' => 'http://demo.woothemes.com/woocommerce/wp-content/uploads/sites/56/2013/06/T_2_back.jpg'
                ]
            ]
        ];

        $this->woocommerce->post('products', $data);

        $results = $this->woocommerce->get('products');
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
