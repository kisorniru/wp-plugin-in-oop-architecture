<?php

class ClassB extends ClassA
{
    // We can redeclare the public and protected properties, but not private
    
    public $public = '*** This is a public property from class B. Class members declared public can be accessed everywhere.';
    // Class members declared public can be accessed everywhere.
    
    public function __construct() {

    	// Add Title in back-end footer display
        add_action('wp_footer', array($this,'visibility_from_class_b'));

      }

    function visibility_from_class_b()
    {
        // These lines allow you to print and test property visibility (public / private / protected)
        
        echo "<p style='color:green;'>".$this->public."</p>"; // will generate class b value
        echo "<p style='color:yellow;'>".$this->protected."</p>"; // will generate class a value
        // echo "<p style='color:pink;'>".$this->private."</p>"; // will generate error
    }
}

$objectB = new ClassB();