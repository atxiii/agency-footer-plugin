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
	 * The Custom CORS Sites.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $custom_sites  The Custom CORS Sites.  
	 */
	private $custom_sites;

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
		$this->custom_sites = get_option('af_mrcat_sites');

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
		add_submenu_page('tools.php','AF MrCat', 'MrCat Agency Footer','manage_options','af-mrcat',array($this,'af_mrcat_page'));
	}

	public function af_mrcat_page(){
		require_once 'partials/af_mrcat-panel-page.php';
	}

	public function af_mrcat_load_media($page){
		if($page == 'tools.php') wp_enqueue_media();
		
	}

	public function af_mrcat_register_setting(){
		register_setting('af_mrcat_setting', 'af_mrcat_text');
		register_setting('af_mrcat_setting', 'af_mrcat_logo');
		register_setting('af_mrcat_setting','af_mrcat_sites');
		register_setting('af_mrcat_setting','af_mrcat_rel');
		register_setting('af_mrcat_setting','af_mrcat_target');
		register_setting('af_mrcat_setting','af_mrcat_width_image');
		register_setting('af_mrcat_setting','af_mrcat_alt_image');
		register_setting('af_mrcat_setting','af_mrcat_delay');
		register_setting('af_mrcat_setting','af_mrcat_cors');
	}

	public static function cors_mode(){
		$cors = get_option('af_mrcat_cors');
		if($cors == 'af_mrcat_cors_all') return 'all';
		if($cors == 'af_mrcat_cors_custom') return 'custom';
		return $cors;
	}

	public static function cors_mode_all(){
		$lines = array();
			
		$lines[] = '<IfModule mod_headers.c>
				<IfModule mod_setenvif.c>
					SetEnvIf Origin "^(.+)$" CORS=$0
				</IfModule>
				Header set Access-Control-Allow-Origin %{CORS}e env=CORS
				Header set Access-Control-Allow-Credentials "true" env=CORS
				<FilesMatch "\.(php|html)$">
				</FilesMatch>
			</IfModule>';
			
		return insert_with_markers(get_home_path().'.htaccess', "httpHeader" , $lines );
		
	}

	public static function disable_cors_mode_all(){
		return insert_with_markers(get_home_path().'.htaccess', "httpHeader" , array() );	
	}

	public static function cors_mode_custom(){
		
		$sites = explode('\n', $this->custom_sites);
		if(is_array($sites) && in_array( get_http_origin(), $sites)){
			header(sprintf("Access-Control-Allow-Origin: %s",get_http_origin()));
			header( 'Access-Control-Allow-Credentials: true' );
			header("Vary: Origin", false);
		}

		if (empty($sites)) {
			header(sprintf("%s: *", $key));
			header(sprintf("Access-Control-Allow-Origin: %s",get_http_origin()));
		}
	}

}
