<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://mrcatdev.com
 * @since      1.0.0
 *
 * @package    Af_mrcat
 * @subpackage Af_mrcat/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Af_mrcat
 * @subpackage Af_mrcat/public
 * @author     hossein shourabi <shurabihosein@gmail.com>
 */
class Af_mrcat_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		// wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/af_mrcat-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		// wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/af_mrcat-public.js', array( 'jquery' ), $this->version, false );

	}

	public function af_mrcat_data(){
		$data = [
			'domain'=>site_url(),
			'rel'=> get_option('af_mrcat_rel')? get_option('af_mrcat_rel'): 'nofollow',
			'target'=>get_option('af_mrcat_target')? get_option('af_mrcat_target'): '_blank',
			'logo'=> get_option('af_mrcat_logo') ? get_option('af_mrcat_logo') : '',
			'text'=> get_option('af_mrcat_text') ? get_option('af_mrcat_text') : '',
			'widthOfImage' => get_option('af_mrcat_width_image') ? get_option('af_mrcat_width_image') : '100px',
			'altOfImage' => get_option('af_mrcat_alt_image') ? get_option('af_mrcat_alt_image') : '',
			'delay'=>get_option('af_mrcat_delay') ? get_option('af_mrcat_delay') : '',
			'entery'=>get_option('af_mrcat_sites')
		];

		wp_send_json($data);
	}
}
