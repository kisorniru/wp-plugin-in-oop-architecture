<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

class OOP_Architecture_Class_Carbon_Fields {

    function __construct( ) {
        
        require_once( plugin_dir_path( __DIR__ ) . '/vendor/autoload.php');
        add_action( 'plugins_loaded',  array( $this, 'load_carbon_fields' )  );
        add_action( 'carbon_fields_register_fields', array( $this, 'crb_attach_theme_options') );

    }
    
    function load_carbon_fields() {
        \Carbon_Fields\Carbon_Fields::boot();
    }

    public function crb_attach_theme_options()
    {
        Container::make( 'theme_options', __( 'Theme Options', 'crb' ) )
        ->add_fields( array(
            Field::make( 'text', 'crb_text', 'Text Field' ),
            ) );
    }

}

$wpTest = new OOP_Architecture_Class_Carbon_Fields();
