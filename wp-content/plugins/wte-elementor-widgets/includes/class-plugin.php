<?php
namespace WPTRAVELENGINEEB;

/**
 * Main Plugin File.
 *
 * @since 1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Main Class.
 *
 * @since 1.0.0
 */
final class Plugin {

	/**
	 * Singleton instance.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var null|Plugin
	 */
	protected static $instance = null;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		$this->version = WPTRAVELENGINEEB_VERSION;

		/**
		 * Deinfe constants.
		 */
		$this->define_constants();

		/**
		 * Includes.
		 */
		$this->includes();

		/**
		 * Init hooks.
		 */
		$this->init_hooks();
	}

	/**
	 * Returns instance of the Class.
	 *
	 * @since 1.0.0
	 * @return Plugin
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Define constants
	 *
	 * @since 1.0.0
	 */
	public function define_constants() {

	}

	/**
	 * Include files.
	 *
	 * @since 1.0.0
	 */
	public function includes() {
		// include_once WPTRAVELENGINEEB_PATH . 'includes/class-widget.php';
		include_once WPTRAVELENGINEEB_PATH . 'includes/class-widgets.php';
	}

	/**
	 * Initialize hooks.
	 *
	 * @since 1.0.0
	 */
	public function init_hooks() {
		add_action( 'wpte_save_and_continue_additional_meta_data', array( $this, 'update_has_sale_meta' ) );
		add_action( 'save_post_' . WP_TRAVEL_ENGINE_POST_TYPE, array( $this, 'update_has_sale_meta' ) );

		add_action( 'elementor/frontend/after_register_scripts', array( $this, 'register_scripts' ), 9999 );
		add_action( 'elementor/frontend/before_enqueue_styles', array( $this, 'register_styles' ), 20 );
		add_action( 'elementor/editor/before_enqueue_styles', array( $this, 'register_styles' ) );

		add_action( 'elementor/controls/register', array( $this, 'register_controls' ) );
	}

	/**
	 * Registers custom controls.
	 */
	public function register_controls( $controls_manager ) {
		require_once WPTRAVELENGINEEB_PATH . 'includes/controls/class-trip-selector-control.php';
		$controls_manager->register( new \WPTRAVELENGINEEB\Controls\Trip_Selector_Control() );
	}

	/**
	 * Register Scripts.
	 */
	public function register_scripts() {
		wp_register_script(
			'wptravelengineeeb-trips',
			plugin_dir_url( WPTRAVELENGINEEB_FILE__ ) . 'dist/frontend.js',
			array(),
			filemtime( plugin_dir_path( WPTRAVELENGINEEB_FILE__ ) . 'dist/frontend.js' ),
			true
		);
	}

	/**
	 * Register Styles.
	 */
	public function register_styles() {
		wp_register_style( 'wte-elementor-widget-styles', plugin_dir_url( WPTRAVELENGINEEB_FILE__ ) . 'dist/wte-elementor-widgets.css', array(), WPTRAVELENGINEEB_VERSION );
		wp_enqueue_style( 'wte-elementor-widget-styles' );
		wp_register_style( 'wte-elementor-swiper-styles', plugin_dir_url( WPTRAVELENGINEEB_FILE__ ) . 'dist/swiper.min.css', array(), WPTRAVELENGINEEB_VERSION );
		wp_enqueue_style( 'wte-elementor-swiper-styles' );
	}


	/**
	 *
	 * Checks if trip has sale meta.
	 *
	 * @since 1.0.0
	 */
	public function update_has_sale_meta( $post_id ) {
		/**
		 * This should be handled from core.
		 */
		$should_update = apply_filters( 'wte_search_param_has_sale_meta', true );

		if ( ! $should_update ) {
			return;
		}

		\wp_cache_delete( $post_id, 'trips' );
		$trip = \wte_get_trip( $post_id );

		if ( $trip instanceof \WPTravelEngine\Posttype\Trip ) {
			if ( $trip->has_sale ) {
				update_post_meta( $post_id, '_s_has_sale', 'yes' );
			} else {
				update_post_meta( $post_id, '_s_has_sale', '' );
			}
		}
	}

}

new Plugin();
