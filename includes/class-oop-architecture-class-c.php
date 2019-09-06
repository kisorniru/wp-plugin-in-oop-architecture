<?php


require_once( plugin_dir_path( __DIR__ ).'wp-plugin-in-oop-architecture.php');

class OOP_Architecture_Class_C extends ClassA
{
    // We can redeclare the public and protected properties, but not private
    
    public $public = '*** This is a public property from class C. Class members declared public can be accessed everywhere.';
    // Class members declared public can be accessed everywhere.
    
    public function __construct() {

        // echo "<br>-- class c --";
        // echo "<br>".$this->public;
        // echo "<br>".$this->protected;
        
    	// Add Title in back-end footer display
        add_action( 'wp_footer',  array( $this, 'visibility_from_class_c' ) );

      }

    function visibility_from_class_c()
    {
        // These lines allow you to print and test property visibility (public / private / protected)
        
        echo "<h2 style='color:green;'>".$this->public."</h2>"; // will generate class b value
        echo "<h2 style='color:yellow;'>".$this->protected."</h2>"; // will generate class a value
        // echo "<p style='color:pink;'>".$this->private."</p>"; // will generate error
    }
}