<?php

class OOP_Architecture_Class_D {

    public $public = '*** This is a public property from class D. Class members declared public can be accessed everywhere.';
    
    public function __construct() {

        // echo "<br>-- class d --";
    	// Add Title in back-end footer display
        
        // Add Title in back-end footer display
        add_action( 'wp_footer',  array( $this, 'callback' ) );

      }

    public function callback() {

        echo "<p style='color:green;'>".$this->public."</p>";
        
    }

}
