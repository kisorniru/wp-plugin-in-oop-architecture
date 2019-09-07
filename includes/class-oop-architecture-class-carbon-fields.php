<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

class OOP_Architecture_Class_Carbon_Fields {

    function __construct( ) {
        require_once( plugin_dir_path( __DIR__ ) . '/vendor/autoload.php'); 
        add_action( 'plugins_loaded',  array( $this, 'load_carbon_fields' )  );
        add_action( 'plugins_loaded',  array( $this, 'load_admin' )  );
    }

    function load_admin() {
        add_action( 'carbon_fields_register_fields', array( $this, 'register_carbon_fields' ));
    }
    
    function load_carbon_fields() {
        \Carbon_Fields\Carbon_Fields::boot();
    }

    function register_carbon_fields() { 
        Container::make( 'theme_options',  __( 'Smart Scheduler', 'gsg-scheduler' ) )->set_page_menu_position( 10 )
              ->set_page_menu_title( 'Smart Scheduler' )    
                ->set_icon( 'dashicons-carrot' )
                    ->set_page_file( 'smart-scheduler' )
                    ->add_tab( __( 'Service Area / Availability' ), array(
                            Field::make( 'complex','ss_quad_field', 'Smart Scheduler Quadrants' )
                                            ->set_layout( 'tabbed-vertical' )
                                            ->set_duplicate_groups_allowed( true )
                                ->add_fields( array(
                                                    Field::make( 'text', 'quad_id', 'Quadrant ID' )->set_width( 50 ),
                                    Field::make( 'text', 'quad_name', 'Quadrant Name' )->set_width( 50 ),
                                    Field::make( 'complex', 'quad_area', 'Quadrant Area' )->set_width( 100 )
                                                            ->set_duplicate_groups_allowed( -1 )
                                        ->add_fields( array(
                                                                    Field::make( 'text', 'quad_zip', 'Quadrant Zip Code' ),
                                        ))
                                                            ->set_header_template( '
                                                                <% if (quad_zip) { %>
                                                                    Zipcode: <%- quad_zip %>
                                                                <% } %>
                                                            ' ),
                                    Field::make( 'complex', 'quad_availability', 'Quadrant Availability Dates' )->set_width( 100 )
                                                            ->set_duplicate_groups_allowed( -1 )
                                                            ->set_collapsed( true )
                                                            ->set_layout( 'grid' )
                                        ->add_fields( array(
                                                                    Field::make( 'date', 'quad_date', __( 'Service Date' ) )
                                                                            ->set_input_format( 'm-d-Y', 'm-d-Y' )
                                                                            ->set_storage_format( 'm-d-Y' ),
                                            Field::make( 'text', 'quad_date_slots', 'Number of time slots available on this day' )
                                                                        
                                        ))
                                                            ->set_header_template( '
                                                                    <% if (quad_date) { %>
                                                                            <%- quad_date %>
                                                                    <% } %>
                                                            ' )
                                ))
                                            ->set_header_template( '
                                                <% if (quad_name) { %>
                                                    <%- quad_name %>
                                                <% } %>
                                            ' ),
                                        ))
                    /*->add_tab( __( 'Pool Openings' ), array(
                        
                    ) )
                    ->add_tab( __( 'Pool Closings' ), array(
                        
                    ) )*/
                    ->add_tab( __( 'Setup / Build Product' ), array(
                            Field::make( 'separator', 'crb_separator', __( 'Setup Product Data for WooCommerce' ) ),
                            Field::make( 'text', 'ss_product_name', __( 'Name of Product' ) )->set_width(50),
                            Field::make( 'text', 'ss_product_slug', __( 'Product Slug' ) )->set_width(50),
                            Field::make( 'text', 'ss_product_price', __( 'Starting price of service, without additional fees.' ) )->set_width(50),
                        
                            Field::make( 'html', 'ss_button' )
                                     ->set_html( array( $this, 'sync_quadrants_html')),
                            Field::make( 'html', 'ss_sync_atts_button' )
                                     ->set_html( array( $this, 'sync_att_btn_html')),
                        
                    ) )
            ->add_tab( __( 'Woocommerce REST' ), array(
                Field::make( 'text', 'ss_woo_ck_key', __( 'Woo Rest API Client Key' ) )
                    ->set_width(50)
                    ->set_attribute( 'placeholder', 'ck_aff1xxxx' ),
                Field::make( 'text', 'ss_woo_cs_key', __( 'Woo Rest API Client Secret' ) )
                    ->set_width(50)
                    ->set_attribute( 'placeholder', 'cs_1872xxxx' ),
            ) );
                    
    }

}
