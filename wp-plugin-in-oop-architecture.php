<?php

/**
 * Plugin Name: WP Plugin In OOP Architecture
 * Plugin URI:  https://github.com/kisorniru/wp-plugin-in-oop-architecture
 * Description: This is a plugin, development based on OOP architecture. This is a learing project, please put constructive comments to help me. 
 * Version:     1.0.4
 * Author:      Noor-A-Alam Siddique
 * Author URI:  https://nasiddique.com
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 * Requires at least: 4.0.0
 * Tested up to: 4.4.0
 * WC requires at least: 3.0.0
 * WC tested up to: 3.5.0   
 */

// TODO: Change the class name to something unique. I use classA so that I can understand this is a class and A for first / main one.
// You will still need to take care of checking whether the name of the class you want is already taken but the rest will be taken care of by PHP.
if ( !class_exists( 'ClassA' ) ) {
  
  class ClassA {

      const VERSION = '1.0.4';
      const PREFIX  = 'OOP_Architecture';
      const REQUIRED_WC = '3.0.0.0';

      /**
       * @var OOP_Architecture - the single instance of the class
       * @since 1.0.0
       */
      protected static $instance = null;

      // Property Visibility (public / private / protected)
      // https://www.php.net/manual/en/language.oop5.visibility.php

      public $public = '*** This is a public property from class A. Class members declared public can be accessed everywhere.';
      // Class members declared public can be accessed everywhere.
      protected $protected = '*** This is a protected property from class A. Class members declared protected can be accessed only within the class itself and by inheriting and parent classes.';
      // Class members declared protected can be accessed only within the class itself and by inheriting and parent classes.
      private $private = '*** This is a private property from class A. Class members declared as private may only be accessed by the class that defines the member.';
      // Class members declared as private may only be accessed by the class that defines the member.

    	// Put all your add_action, add_shortcode, add_filter functions in __construct()
    	// For the callback name, use this: array($this,'<function name>')
    	// <function name> is the name of the function within this class, so need not be globally unique
    	// Some sample commonly used functions are included below

      /**
       * Main OOP_Architecture Instance
       *
       * Ensures only one instance of OOP_Architecture is loaded or can be loaded.
       *
       * @static
       * @see OOP_Architecture()
       * @return OOP_Architecture - Main instance
       * @since 1.0.0
       */
      public static function instance() {
        if ( ! isset( self::$instance ) && ! ( self::$instance instanceof ClassA ) ) {

          self::$instance = new ClassA();

          /*
           * Register our autoloader
           */
          spl_autoload_register( array( self::$instance, 'autoloader' ) );

          // for compatibility with other extensions
          self::$instance->classC = new OOP_Architecture_Class_C();
          self::$instance->classD = new OOP_Architecture_Class_D();

        }
        return self::$instance;
      }
      
      public function __construct() {

    		// TODO: Edit the calls here to only include the ones you want, or add more

          // Add Title in front-end footer display
          add_action('wp_footer', array($this,'na_add_title'));

          // Add Title in back-end footer display
          add_action('admin_footer', array($this,'na_add_title'));

          // Add Title in back-end footer display
          add_action('wp_footer', array($this,'na_property_visibility'));

          // Load another class when this ClassA is called / object is created
          spl_autoload_register( array( $this, 'autoloader' ) );
          $this->classB = new OOP_Architecture_Class_B();

      }

      // public static function template_includes(){
      //   require_once( 'includes/class-oop-architecture-class-b.php' );
      // }

      /**
       * Load Classes
       *
       * @return      void
       * @since       1.0.0
       */
      public function autoloader( $class_name ){
        if ( class_exists( $class_name ) ) {
          return;
        }

        if ( false === strpos( $class_name, self::PREFIX ) ) {
          return;
        }

        $class_name = 'class-' . strtolower( $class_name );
        $classes_dir = realpath( plugin_dir_path( __FILE__ ) ) . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR;

        $class_file = str_replace( '_', '-', $class_name ) . '.php';
        // echo $class_file;
        if ( file_exists( $classes_dir . $class_file ) ){
          require_once $classes_dir . $class_file;
        }
        
      }

      /* ENQUEUE SCRIPTS AND STYLES */
      // This is an example of enqueuing a Javascript file and a CSS file for use on the editor 
      
      public function na_add_title() {
      	
      	// These lines allow you to show a text slider
      	echo "<marquee style='color:red;'> Hello Mr. Siddique! How are you ? </marquee>";

      }

      public function na_property_visibility() {
        
        // These lines allow you to print and test property visibility (public / private / protected)
        echo "<p style='color:green;'>".$this->public."</p>";
        echo "<p style='color:yellow;'>".$this->protected."</p>";
        echo "<p style='color:pink;'>".$this->private."</p>";

      }

  }
  
}

// TODO: Replace these with a variable named appropriately and the class name above
// If you need this available beyond our initial creation, you can create it as a global
// global $objectA;

// Create an instance / object of our class to kick off the whole thing
// $objectA = new ClassA();


/**
 * Returns the main instance of OOP_Architecture to prevent the need to use globals.
 *
 * @since  2.0
 * @return OOP_Architecture
 */
function class_object() {
  // echo "<br>Out of constructor<br>";
  // echo "<pre>";
  // var_dump(ClassA::instance()->classC);
  // echo "</pre>";
  // return ClassA::instance()->classC;
  // return ClassA::instance()->classD->callback();
  return ClassA::instance();
}

// Launch the whole plugin
add_action( 'wp_loaded', 'class_object' );