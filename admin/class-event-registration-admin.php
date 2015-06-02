<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://www.e-colori.com
 * @since      1.0.0
 *
 * @package    wp-event-registration
 * @subpackage wp-event-registration/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    wp-event-registration
 * @subpackage wp-event-registration/admin
 * @author     Tobias Fritz - www.e-colori.com
 */
class Event_Registration_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	protected $plugin_slug = 'wpecr_';

	/**
	 * Instance of this class.
	 *
	 * @since    1.0.0
	 *
	 * @var      object
	 */	
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/event-registration-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/plugin-name-admin.js', array( 'jquery' ), $this->version, false );

	}


	/**
	 * Register the admin menu for this plugin into the WordPress menu below options.
	 *
	 * @since    1.0.0
	 */
	public function add_plugin_admin_menu() {

		$this->plugin_screen_hook_suffix = true;
		add_submenu_page( 'options-general.php', __( 'Event Registration', 'wpecr' ), __( 'Event Registration', 'wpecr' ), 'manage_options', 'wpecr_options', array( $this, 'wpecr_options_page' ) );

	}
	/**
	 * Render the settings page for this plugin.
	 *
	 * @since    1.0.0
	 */
	public function wpecr_options_page() {
		$options = maybe_unserialize( get_option( $this->plugin_slug.'options' ) );
		//echo '<pre>' . print_r( $options, true ) . '</pre>';

		include_once( plugin_dir_path( __FILE__ ) . '/partials/event-registration-admin-display.php' );
	}

	/**
	 * save the settings for this plugin.
	 *
	 * @since    1.0.0
	 */
	public function save_options() {
		if( empty( $_POST['options'] ) ) return false;
		$options = $_POST['options'];
		update_option( $this->plugin_slug.'options', maybe_serialize( $options ) );
		
		$url =  $_POST['_wp_http_referer'];
		wp_safe_redirect( $url );
    exit;
	}

	


}
