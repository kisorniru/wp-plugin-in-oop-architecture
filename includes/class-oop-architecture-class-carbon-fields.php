<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

class OOP_Architecture_Class_Carbon_Fields {

    function __construct( ) {
        
        require_once( plugin_dir_path( __DIR__ ) . '/vendor/autoload.php');
        add_action( 'plugins_loaded',  array( $this, 'load_carbon_fields' )  );
    }
    
    function load_carbon_fields() {
        \Carbon_Fields\Carbon_Fields::boot();
        add_action( 'carbon_fields_register_fields', array( $this, 'crb_attach_theme_options') );
    }

    public function crb_attach_theme_options()
    {
        Container::make( 'theme_options', __( 'Smart Scheduler', 'gsg-scheduler' ) )
            ->set_page_menu_position( 10 )
            ->set_page_menu_title( 'Smart Scheduler' ) 
            ->set_icon( 'dashicons-carrot' )
            ->add_fields( array(Field::make( 'text', 'quad_id', 'Quadrant ID' )));
    }

}

// public static function instance() {
// if ( ! isset( self::$instance ) && ! ( self::$instance instanceof GSG_Scheduler ) ) {

// self::$instance = new GSG_Scheduler();

// self::$dir = plugin_dir_path(__FILE__);

// self::$url = plugin_dir_url(__FILE__);

// /*
// * Register our autoloader
// */
// spl_autoload_register( array( self::$instance, 'autoloader' ) );

// // include admin class to handle all backend functions
// if( is_admin() ){
// update_option( 'wc_extenstion_boiler_plate_version', self::VERSION );
// self::$instance->admin = new GSG_Scheduler_Admin();
// self::$instance->quadrants = new GSG_Scheduler_Quadrants();
// self::$instance->carbon = new GSG_Scheduler_Carbon_Fields();
// }

// // include the front-end functions
// if ( ! is_admin() ) {
// self::$instance->display = new GSG_Scheduler_Display();
// self::$instance->user = new GSG_Scheduler_User();

// }

// // for compatibility with other extensions
// self::$instance->compat = new GSG_Scheduler_Compatibility();

// }
// return self::$instance;
// }

// // $wpTest = new OOP_Architecture_Class_Carbon_Fields();
