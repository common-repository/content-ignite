<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.linkedin.com/in/jamiedruce/
 * @since      1.0.0
 *
 * @package    Content_Ignite
 * @subpackage Content_Ignite/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Content_Ignite
 * @subpackage Content_Ignite/admin
 * @author     Jamie Druce <jamie@contentignite.com>
 */
class Content_Ignite_Admin {

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
		 * defined in Content_Ignite_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Content_Ignite_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/content-ignite-admin.css', array(), $this->version, 'all' );

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
		 * defined in Content_Ignite_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Content_Ignite_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/content-ignite-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function validate_settings($input) {
		return $input;
	}

	public function register_settings() {
    register_setting( 'ci_options', 'ci_options', array( $this, 'validate_settings' ) );
	}

	function action_links($links, $file) {
			
		if (current_user_can('manage_options')) {
			
			$settings = '<a href="'. admin_url('options-general.php?page=content-ignite') .'">'. esc_html__('Settings', 'content-ignite') .'</a>';
			array_unshift($links, $settings);
			
		}

		return $links;
		
	}

	// Create the Plugin Name menu page with add_menu_page();
	public function add_admin_page() {
		add_menu_page(
			'Content Ignite',
			'Content Ignite',
			'manage_options',
			$this->plugin_name,
			array( $this, 'load_admin_page_content' ), // Calls function to require the partial
			'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzYiIGhlaWdodD0iMzYiIHZpZXdCb3g9IjAgMCAzNiAzNiIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBkPSJNMTgsMCBDMjcuOTU0LDAgMzYsOC4wNDYgMzYsMTggQzM2LDI3Ljk1NCAyNy45NTQsMzYgMTgsMzYgQzguMDQ2LDM2IDAsMjcuOTU0IDAsMTggQzAsOC4wNDYgOC4wNDYsMCAxOCwwIFogTTIzLjI4OTg5MDIsMTAuMzc1NDUyNCBDMjIuNjQzMzQyNyw1LjcwMDc3NDQyIDE5LjE2Mjc2MjIsMi4xNiAxOS4xNjI3NjIyLDIuMTYgQzE5LjE2Mjc2MjIsMi4xNiAyMC42NDk4MjE0LDYuMzEwNTE1MDMgMTkuMDExOTAxMiw4LjA1NDE1OTIzIEMxOS4wMTE5MDEyLDguMDU0MTU5MjMgMTguNjY3MDc1OCw2LjExNzk2NTM3IDE3LjU3ODcyMDksNS40MjI2NDcxMyBDMTcuNTc4NzIwOSw1LjQyMjY0NzEzIDE3Ljk2NjY0OTQsNS43NjQ5NTc2NCAxNy45ODgyMDEsNi4yNDYzMzE4MSBDMTguMDA5NzUyNiw2Ljk1MjM0NzI1IDE3Ljc5NDIzNjgsNy41MTkyOTkwNSAxNi45MzIxNzM1LDguOTUyNzI0MzQgQzE1LjkxOTI0OTEsMTAuNjMyMTg1MyAxNS4wMDMzMDY5LDEyLjM1NDQzNTEgMTMuODI4NzQ1NywxMy43OTg1NTc2IEMxMS43NTk3OTM4LDE2LjMyMzA5NzcgMTAuMjYxOTU4OSwxOC45MTE4MjEgMTAuOTgzOTM2OSwyMi4xNTMwNzM3IEMxMS41MTE5NTA2LDI0LjUyNzg1MjkgMTIuOTQ1MTMwOCwyNi43MjA3Nzk3IDE1LjIyOTU5ODUsMjcuNTg3MjUzMiBDMTYuMjk2NDAxOCwyNy44MzMyODg5IDE2Ljk3NTI3NjYsMjguMTQzNTA3OCAxNy43MDgwMzA0LDI4LjA2ODYyNzMgQzE2LjI1MzI5ODYsMjcuMTA1ODc5IDE1LjUzMTMyMDYsMjMuNTc1ODAxOCAxNi4zNzE4MzIzLDIyLjAyNDcwNzMgQzE2LjQzNjQ4NzEsMjEuODk2MzQwOCAxNi43NDg5ODUsMjQuMzM1MzAzMyAxNy41Njc5NDUyLDI1LjUzMzM5MDEgQzE3LjYxNzAzNDksMjUuNjA5NDU5MSAxNy42NjkwNTEzLDI1LjY4OTIyNTkgMTcuNzIyNjQ5NCwyNS43NzA3NTM1IEwxNy44ODY4NDM1LDI2LjAxODY4MjEgQzE4LjI3NDc1NzIsMjYuNjAwNDY5MSAxOC42NzQyNTk3LDI3LjE3MzYyOCAxOC42MjM5NzI3LDI3LjA3Mzc4NzQgQzE4LjYwMzI4MzIsMjYuOTMzNDQwMSAxOC42NTEwMDcsMjYuNTk4MTEyNyAxOC43Mzc4MzY4LDI2LjE0NTYyMiBMMTguODA5ODMzNSwyNS43ODU1MDE4IEMxOC45MTQzODQ2LDI1LjI3OTI5MyAxOS4wNTA3MTQ3LDI0LjY3NTM3NTEgMTkuMTg5NTE2NSwyNC4wNTE1NjQ4IEwxOS4yOTM2MjM0LDIzLjU4MTE5MzIgQzE5LjM4MDAwMjIsMjMuMTg4MTM1MSAxOS40NjQ0ODQ0LDIyLjc5NDkwNTkgMTkuNTM5OTE0OSwyMi40MjA1MDM4IEMxOS42NjkyMjQ0LDIxLjg1MzU1MiAyMC4xOTcyMzgyLDIwLjA4ODUxMzQgMjAuMjYxODkyOSwyMC43NzMxMzQ0IEMyMC4xOTcyMzgyLDIxLjA4MzM1MzMgMjAuOTczMDk1MSwyMi4zMzQ5MjYyIDIxLjEwMjQwNDYsMjMuMjc2MjgwMSBDMjEuMjk2MzY4OSwyNC4zOTk0ODY1IDIxLjI5NjM2ODksMjUuMjEyNDc0IDIxLjEwMjQwNDYsMjYuMjE4MDExMSBDMjAuOTczMDk1MSwyNi43MjA3Nzk3IDIxLjAzNzc0OTksMjcuMDMwOTk4NiAyMC41OTU5NDI0LDI3Ljk3MjM1MjUgQzIwLjQ2NjYzMjksMjguMjE4Mzg4MiAyMS44NTY3MSwyNi43ODQ5NjI5IDIyLjQ4MTcwNTksMjUuOTcxOTc1NCBDMjIuOTIzNTEzMywyNS40MDUwMjM2IDIzLjExNzQ3NzUsMjUuMDMwNjIxNSAyMy40Mjk5NzU1LDI0LjQxMDE4MzcgQzIzLjkzNjQzNzcsMjMuNDY4ODI5OCAyNC42MjYwODgzLDIwLjk2NTY4NDEgMjQuNDk2Nzc4OCwyMS44NDI4NTQ4IEMyNC40OTY3Nzg4LDIyLjQ2MzI5MjYgMjQuMTE5NjI2MSwyNC42NTYyMTk0IDI0LjMwMjgxNDYsMjQuNDEwMTgzNyBDMjUuMTg2NDI5NCwyMi45NjYwNjEyIDI1LjQ5ODkyNzQsMjIuNTM4MTczIDI1Ljc1NzU0NjQsMjEuMTU4MjMzOCBDMjYuMzA3MTExNywxOC44MjYyNDM0IDI1LjM4MDM5MzcsMTYuNjU0NzExIDI0LjIwNTgzMjQsMTQuNjg2NDI1NSBDMjQuNDczMjY4LDEyLjMzNzkwMzEgMjQuNTkzNDI3LDkuODcyNDE4NjQgMjMuNzIyODE2Myw4LjE1NTIyNTEgTDIzLjYwMzQ0OTUsNy45Mzg0NjMwNyBDMjMuNjg5NjExNyw4LjExNTA3MzM5IDI0LjE5MjAzOTQsOS4yNjMzNzExNCAyMy4yODk4OTAyLDEwLjM3NTQ1MjQgWiIgZmlsbD0iI0ZGRiIgZmlsbC1ydWxlPSJldmVub2RkIi8+PC9zdmc+',
			6
		);
	}

	// Load the plugin admin page partial.
	public function load_admin_page_content() {
		require_once plugin_dir_path( __FILE__ ). 'partials/content-ignite-admin-display.php';
	}

}
