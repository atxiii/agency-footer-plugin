<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://mrcatdev.com
 * @since      1.0.0
 *
 * @package    Af_mrcat
 * @subpackage Af_mrcat/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Af_mrcat
 * @subpackage Af_mrcat/admin
 * @author     hossein shourabi <shurabihosein@gmail.com>
 */
class Af_mrcat_Admin {

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
		 * defined in Af_mrcat_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Af_mrcat_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/af_mrcat-admin.css', array(), $this->version, 'all' );

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
		 * defined in Af_mrcat_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Af_mrcat_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/af_mrcat-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function af_mrcat_menu(){
		add_submenu_page('tools.php','AF MrCat', 'Agency Footer MrCat','manage_options','af-mrcat',array($this,'af_mrcat_page'));
	}

	public function af_mrcat_page(){
		require_once 'partials/af_mrcat-panel-page.php';
	}
}
