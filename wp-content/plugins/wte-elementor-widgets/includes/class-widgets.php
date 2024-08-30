<?php
namespace WPTRAVELENGINEEB;

use \Elementor\Plugin;

use \WPTRAVELENGINEEB\Widget;
use \WPTRAVELENGINEEB;

/**
 * Widgets.
 */
defined( 'ABSPATH' ) || exit;

/**
 * Class Widgets.
 *
 * @since 1.0.0
 */
class Widgets_Controller {

	protected static $instance = null;

	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'elementor/widgets/widgets_registered', array( $this, 'register_elementor_widgets' ), 99 );
		add_action( 'elementor/elements/categories_registered', array( $this, 'add_elementor_categories' ) );
		add_action( 'elementor/common/after_register_scripts', array( $this, 'load_wte_icons' ), 99999 );

		add_action( 'init', array( $this, 'set_core_widgets' ), 20 );

	}

	public function load_wte_icons() {
		wp_enqueue_style( 'wte-blocks-index' );
		wp_enqueue_style( 'wte-icons', plugin_dir_url( WP_TRAVEL_ENGINE_FILE_PATH ) . 'includes/vendors/wte-icons/style.css' );
	}

	public function add_elementor_categories( $elements_manager ) {
		$elements_manager->add_category(
			'wptravelengine',
			array(
				'title' => __( 'WP Travel Engine', 'wptravelengine-elementor-widgets' ),
				'icon'  => 'fa fa-plug',
			)
		);
	}

	/**
	 *
	 */
	public function set_core_widgets() {

		$wte_blocks_registration_args = apply_filters(
			'wte_register_block_types',
			array(),
			true
		);

		$layout_options = array(
			'grid' => __( 'Grid', 'wptravelengine-elementor-widgets' ),
			'list' => __( 'List', 'wptravelengine-elementor-widgets' ),
		);

		$slider_settings = array();
		if ( version_compare( \WP_TRAVEL_ENGINE_VERSION, '5.3.6', '>' ) ) {
			$layout_options['slider'] = __( 'Slider', 'wptravelengine-elementor-widgets' );
			$slider_settings          = array(
				'slider.slidesPerViewDesktop' => array(
					'type'          => \Elementor\Controls_Manager::NUMBER,
					'label'         => __( 'Slides Number', 'wptravelengine-elementor-widgets' ) . WPTRAVELENGINEEB_NEWCONTROL,
					'default'       => 3,
					'is_responsive' => true,
					'condition'     => array( 'layout' => 'slider' ),
				),
				'slider.spaceBetween'         => array(
					'type'      => 'NUMBER',
					'label'     => __( 'Space Between Slides', 'wptravelengine-elementor-widgets' ),
					'default'   => 30,
					'condition' => array( 'layout' => 'slider' ),
				),
				'slider.autoplay'             => array(
					'type'      => 'SWITCHER',
					'label'     => __( 'Autoplay', 'wptravelengine-elementor-widgets' ),
					'default'   => 'yes',
					'condition' => array( 'layout' => 'slider' ),
				),
				'slider.autoplaydelay'        => array(
					'type'      => 'NUMBER',
					'label'     => __( 'Autoplay Speed', 'wptravelengine-elementor-widgets' ),
					'default'   => 3000,
					'condition' => array( 'layout' => 'slider' ),
				),
				'slider.loop'                 => array(
					'type'      => 'SWITCHER',
					'label'     => __( 'Loop', 'wptravelengine-elementor-widgets' ),
					'default'   => 'yes',
					'condition' => array( 'layout' => 'slider' ),
				),
				'slider.speed'                => array(
					'type'      => 'NUMBER',
					'label'     => __( 'Transition Speed (ms)', 'wptravelengine-elementor-widgets' ),
					'default'   => 300,
					'condition' => array( 'layout' => 'slider' ),
				),
				'slider.arrow'                => array(
					'type'          => \Elementor\Controls_Manager::SWITCHER,
					'label'         => __( 'Slider Arrow', 'wptravelengine-elementor-widgets' ) . WPTRAVELENGINEEB_NEWCONTROL,
					'default'       => 'yes',
					'condition'     => array( 'layout' => 'slider' ),
					'is_responsive' => true,
					'condition'     => array( 'layout' => 'slider' ),
				),
				'slider.pagination'           => array(
					'type'          => \Elementor\Controls_Manager::SWITCHER,
					'label'         => __( 'Slider Pagination', 'wptravelengine-elementor-widgets' ) . WPTRAVELENGINEEB_NEWCONTROL,
					'default'       => 'yes',
					'condition'     => array( 'layout' => 'slider' ),
					'is_responsive' => true,
					'condition'     => array( 'layout' => 'slider' ),
				),
			);
		}

		// Trips Block Settings.
		$widgets['wptravelengine-trips'] = array(
			'title'               => __( 'Trips', 'wptravelengine-elementor-widgets' ),
			'icon'                => 'wtei-b-trips',
			'categories'          => 'wptravelengine',
			'style_dependencies'  => array( 'wte-blocks-index' ),
			'script_dependencies' => array(),
			'controls'            => array(
				'block_layout_settings' => array(
					'type'        => 'control_section',
					'label'       => __( 'Layout', 'wptravelengine-elementor-widgets' ),
					'subcontrols' => array(
						'layout'           => array(
							'label'   => __( 'Card View', 'wptravelengine-elementor-widgets' ),
							'type'    => 'SELECT',
							'options' => array(
								'grid'   => __( 'Grid', 'wptravelengine-elementor-widgets' ),
								'list'   => __( 'List', 'wptravelengine-elementor-widgets' ),
								'slider' => __( 'Slider', 'wptravelengine-elementor-widgets' ),
							),
							'default' => 'grid',
						),
						'tripsCountPerRow' => array(
							'type'      => 'NUMBER',
							'min'       => '2',
							'max'       => '4',
							'label'     => __( 'Trips per row', 'wptravelengine-elementor-widgets' ),
							'default'   => '3',
							'condition' => array( 'layout' => 'grid' ),
						),
						'tripsgap'         => array(
							'label'      => __( 'Trips Gap', 'wptravelengine-elementor-widgets' ) . WPTRAVELENGINEEB_NEWCONTROL,
							'type'       => 'SLIDER',
							'size_units' => array( 'px', '%' ),
							'range'      => array(
								'px' => array(
									'min'  => 0,
									'max'  => 100,
									'step' => 5,
								),
								'%'  => array(
									'min' => 0,
									'max' => 100,
								),
							),
							'default'    => array(
								'unit' => 'px',
								'size' => 50,
							),
							'selectors'  => array(
								'{{WRAPPER}} .wpte-trip-list-wrapper' => '--gap: {{SIZE}}{{UNIT}};',
							),
							'condition'  => array( 'layout!' => 'slider' ),
						),
						'cardlayout'       => array(
							'label'     => __( 'Widget Layouts', 'wptravelengine-elementor-widgets' ),
							'type'      => 'SELECT',
							'options'   => array(
								1 => __( 'Layout 1', 'wptravelengine-elementor-widgets' ),
								2 => __( 'Layout 2', 'wptravelengine-elementor-widgets' ),
								3 => __( 'Layout 3', 'wptravelengine-elementor-widgets' ),
								4 => __( 'Layout 4', 'wptravelengine-elementor-widgets' ),
								5 => __( 'Layout 5', 'wptravelengine-elementor-widgets' ),
							),
							'default'   => 1,
							'condition' => array(
								'layout!' => array( 'list' ),
							),
						),
					),
				),
				'sorting_filtering'     => array(
					'type'        => 'control_section',
					'label'       => __( 'Query', 'wptravelengine-elementor-widgets' ),
					'subcontrols' => array(
						'listby'         => array(
							'type'    => 'SELECT',
							'label'   => __( 'Show Trips By', 'wptravelengine-elementor-widgets' ),
							'default' => 'latest',
							'options' => array(
								'featured' => __( 'Featured', 'wptravelengine-elementor-widgets' ),
								'latest'   => __( 'Latest', 'wptravelengine-elementor-widgets' ),
								'onsale'   => __( 'onsale', 'wptravelengine-elementor-widgets' ),
								'byid'     => __( 'Choose from the list', 'wptravelengine-elementor-widgets' ),
							),
						),
						'tripsCount'     => array(
							'type'      => 'NUMBER',
							'label'     => __( 'Number of Trips', 'wptravelengine-elementor-widgets' ),
							'default'   => 6,
							'min'       => '1',
							'condition' => array(
								'listby!' => 'byid',
							),
						),
						'tripsToDisplay' => array(
							'type'      => 'tripselector',
							'label'     => __( 'Select Trips', 'wptravelengine-elementor-widgets' ),
							'default'   => array(),
							'multiple'  => true,
							'condition' => array(
								'listby' => 'byid',
							),
						),
					),
				),
				'additional_settings'   => array(
					'type'        => 'control_section',
					'label'       => __( 'Additional', 'wptravelengine-elementor-widgets' ),
					'subcontrols' => array(
						'showDescription'       => array(
							'label'   => __( 'Trip Description', 'wptravelengine-elementor-widgets' ),
							'type'    => 'SWITCHER',
							'default' => 'yes',
						),
						'excerptLength'         => array(
							'label'     => __( 'Max number of words in description', 'wptravelengine-elementor-widgets' ),
							'type'      => 'NUMBER',
							'default'   => 20,
							'min'       => '1',
							'condition' => array( 'showDescription' => 'yes' ),
						),
						'showFeaturedImage'     => array(
							'label'   => __( 'Featured Image', 'wptravelengine-elementor-widgets' ),
							'type'    => 'SWITCHER',
							'default' => 'yes',
						),
						'showFeaturedRibbon'    => array(
							'label'   => __( 'Featured Ribbon', 'wptravelengine-elementor-widgets' ),
							'type'    => 'SWITCHER',
							'default' => 'yes',
						),
						'showTitle'             => array(
							'label'   => __( 'Title', 'wptravelengine-elementor-widgets' ),
							'type'    => 'SWITCHER',
							'default' => 'yes',
						),
						'showPrice'             => array(
							'label'   => __( 'Price', 'wptravelengine-elementor-widgets' ),
							'type'    => 'SWITCHER',
							'default' => 'yes',
						),
						'showStrikedPrice'      => array(
							'label'   => __( 'Show striked price on sale', 'wptravelengine-elementor-widgets' ),
							'type'    => 'SWITCHER',
							'default' => 'yes',
						),
						'showDuration'          => array(
							'label'   => __( 'Duration', 'wptravelengine-elementor-widgets' ),
							'type'    => 'SWITCHER',
							'default' => 'yes',
						),
						'durationType'         => array(
							'type'    => 'SELECT',
							'label'   => __( 'Duration Type', 'wptravelengine-elementor-widgets' ) . WPTRAVELENGINEEB_NEWCONTROL,
							'default' => 'days',
							'options' => array(
								'both' => __( 'Both Days & Nights', 'wptravelengine-elementor-widgets' ),
								'days'   => __( 'Days only', 'wptravelengine-elementor-widgets' ),
								'nights'   => __( 'Nights only', 'wptravelengine-elementor-widgets' ),
							),
							'condition' => array( 'showDuration' => 'yes' ),
						),
						'showLocation'          => array(
							'label'   => __( 'Location', 'wptravelengine-elementor-widgets' ),
							'type'    => 'SWITCHER',
							'default' => 'yes',
						),
						'showReviews'           => array(
							'label' => __( 'Reviews', 'wptravelengine-elementor-widgets' ),
							'type'  => 'SWITCHER',
						),
						'showDiscount'          => array(
							'label'   => __( 'Discount', 'wptravelengine-elementor-widgets' ),
							'type'    => 'SWITCHER',
							'default' => 'yes',
						),
						'showGroupSize'         => array(
							'label' => __( 'Group Size', 'wptravelengine-elementor-widgets' ),
							'type'  => 'SWITCHER',
						),
						'showActivities'        => array(
							'label' => __( 'Trip Activities', 'wptravelengine-elementor-widgets' ),
							'type'  => 'SWITCHER',
						),
						'showTripType'          => array(
							'label' => __( 'Trip Type', 'wptravelengine-elementor-widgets' ),
							'type'  => 'SWITCHER',
						),
						'showTripAvailableTime' => array(
							'label' => __( 'Trip Available Times', 'wptravelengine-elementor-widgets' ),
							'type'  => 'SWITCHER',
						),
						'showViewMoreButton'    => array(
							'label' => __( 'View Details button', 'wptravelengine-elementor-widgets' ),
							'type'  => 'SWITCHER',
						),
						'viewMoreButtonText'    => array(
							'default'   => __( 'View Details', 'wptravelengine-elementor-widgets' ),
							'type'      => 'TEXT',
							'condition' => array( 'showViewMoreButton' => 'yes' ),
							'label'     => __( 'Button label', 'wptravelengine-elementor-widgets' ),
							'condition' => array( 'showViewMoreButton' => 'yes' ),
						),
					),
				),
				'slider_settings'       => array(
					'type'        => 'control_section',
					'label'       => __( 'Slider', 'wptravelengine-elementor-widgets' ),
					'subcontrols' => $slider_settings,
					'condition'   => array( 'layout' => 'slider' ),
				),
			),
			'render'              => function( $attributes ) {
				if ( isset( $attributes['listby'] ) ) {
					if ( 'byid' === $attributes['listby'] ) {
						$attributes['filters']['tripsToDisplay'] = $attributes['tripsToDisplay'];
					} else {
						$query_args = array(
							'post_type'      => WP_TRAVEL_ENGINE_POST_TYPE,
							'posts_per_page' => $attributes['tripsCount'],
							'fields'         => 'ids',
							'post_status'    => 'publish',
						);
						if ( 'featured' === $attributes['listby'] ) {
							$query_args['meta_key'] = 'wp_travel_engine_featured_trip';
							$query_args['meta_value'] = 'yes';
						} elseif ( 'onsale' === $attributes['listby'] ) {
							$query_args['meta_key'] = '_s_has_sale';
							$query_args['meta_value'] = 'yes';
						}

						$trips = get_posts( $query_args );

						if ( is_array( $trips ) ) {
							$attributes['filters']['tripsToDisplay'] = $trips;
						} else {
							$attributes['filters']['tripsToDisplay'] = array();
						}
					}
				}

				foreach ( array(
					'showFeaturedRibbon',
					'showDescription',
					'showFeaturedImage',
					'showTitle',
					'showPrice',
					'showStrikedPrice',
					'showDuration',
					'showLocation',
					'showReviews',
					'showDiscount',
					'showActivities',
					'showTripType',
					'showGroupSize',
					'showTripAvailableTime',
					'showViewMoreButton',
					'showViewAll',
				) as $subkey ) {
					if ( isset( $attributes[ "{$subkey}" ] ) ) {
						$attributes['layoutFilters'][ $subkey ] = $attributes[ "{$subkey}" ];
					}
				}

				foreach ( array( 'listby', 'tripsCount' ) as $subkey ) {
					if ( isset( $attributes[ "{$subkey}" ] ) ) {
						$attributes['filters'][ $subkey ] = $attributes[ "{$subkey}" ];
					}
				}

				foreach ( array(
					'slider.autoplay',
					'slider.autoplaydelay',
					'slider.loop',
					'slider.speed',
					'slider.slidesPerViewDesktop',
					'slider.slidesPerViewDesktop_laptop',
					'slider.slidesPerViewDesktop_tablet',
					'slider.slidesPerViewDesktop_mobile',
					'slider.spaceBetween',
				)  as $subkey ) {
					if ( isset( $attributes[ $subkey ] ) ) {
						$attributes['slider'][ str_replace( 'slider.', '', $subkey ) ] = $attributes[ $subkey ];
					}
				}
				if ( file_exists( WPTRAVELENGINEEB_PATH . 'includes/blocks/trips/block.php' ) ) {
					include WPTRAVELENGINEEB_PATH . 'includes/blocks/trips/block.php';
				} else {
					echo __( '<p>Oops! No preview/output available for this widget.</p>', 'wptravelengine-elementor-widgets' );
				}
			},
		);

		// General Terms Controls.
		$general_terms_controls = array(
			'card_layout_section' => array(
				'type'        => 'control_section',
				'label'       => __( 'Layout', 'wptravelengine-elementor-widgets' ),
				'subcontrols' => array(
					'cardlayout'  => array(
						'label'   => __( 'Choose card layout', 'wptravelengine-elementor-widgets' ),
						'default' => 1,
						'type'    => 'SELECT',
						'options' => array(
							'1' => __( 'Layout 1', 'wptravelengine-elementor-widgets' ),
							'2' => __( 'Layout 2', 'wptravelengine-elementor-widgets' ),
							'3' => __( 'Layout 3', 'wptravelengine-elementor-widgets' ),
						),
					),
					'itemsPerRow' => array(
						'type'    => 'NUMBER',
						'label'   => __( 'Trips per row', 'wptravelengine-elementor-widgets' ),
						'default' => 3,
						'min'     => '2',
						'max'     => '4',
					),
					'termsgap'    => array(
						'label'      => __( 'Trips Gap', 'wptravelengine-elementor-widgets' ) . WPTRAVELENGINEEB_NEWCONTROL,
						'type'       => 'SLIDER',
						'size_units' => array( 'px', '%' ),
						'range'      => array(
							'px' => array(
								'min'  => 0,
								'max'  => 100,
								'step' => 5,
							),
							'%'  => array(
								'min' => 0,
								'max' => 100,
							),
						),
						'default'    => array(
							'unit' => 'px',
							'size' => 50,
						),
						'selectors'  => array(
							'{{WRAPPER}} .wpte-trip-list-wrapper' => '--gap: {{SIZE}}{{UNIT}};',
						),
					),
				),
			),
			'sorting_filtering'   => array(
				'type'        => 'control_section',
				'label'       => __( 'Query', 'wptravelengine-elementor-widgets' ),
				'subcontrols' => array(
					'listby'     => array(
						'type'    => 'SELECT',
						'label'   => __( 'Show Terms By', 'wptravelengine-elementor-widgets' ),
						'default' => 'default',
						'options' => array(
							'default' => __( 'Default', 'wptravelengine-elementor-widgets' ),
							'byids'   => __( 'Choose from the list', 'wptravelengine-elementor-widgets' ),
						),
					),
					'itemsCount' => array(
						'type'      => 'NUMBER',
						'label'     => __( 'Number of items', 'wptravelengine-elementor-widgets' ),
						'min'       => '1',
						'default'   => 6,
						'condition' => array(
							'listby!' => 'byids',
						),
					),
					'listItems'  => array(
						'type'          => 'TAXONOMY_TERMS_SELECT2',
						'label'         => __( 'Choose terms', 'wptravelengine-elementor-widgets' ),
						'default'       => array(),
						'multiple'      => true,
						'taxonomy_name' => 'destination',
						'condition'     => array(
							'listby' => 'byids',
						),
					),
				),
			),
			'additional_settings' => array(
				'type'        => 'control_section',
				'label'       => __( 'Additional', 'wptravelengine-elementor-widgets' ),
				'subcontrols' => array(
					'showFeaturedImage'  => array(
						'type'    => 'HIDDEN',
						'default' => 'yes',
					),
					'showTripCounts'     => array(
						'label'   => __( 'Show Trip Counts', 'wptravelengine-elementor-widgets' ),
						'type'    => 'SWITCHER',
						'default' => 'yes',
					),
					'countLabel'         => array(
						'label'     => __( 'Trips Count Label', 'wptravelengine-elementor-widgets' ),
						'type'      => 'TEXT',
						'condition' => array( 'showTripCounts' => 'yes' ),
						'default'   => __( 'Trip|Trips', 'wptravelengine-elementor-widgets' ),
					),
					'showCTAButton'      => array(
						'label'   => __( 'Show Name', 'wptravelengine-elementor-widgets' ),
						'type'    => 'SWITCHER',
						'default' => 'yes',
					),
					'showViewMoreButton' => array(
						'label'     => __( 'Show view more button on hover', 'wptravelengine-elementor-widgets' ),
						'type'      => 'SWITCHER',
						'default'   => 'yes',
						'condition' => array( 'cardlayout' => '1' ),
					),
					'linkText'           => array(
						'label'     => __( 'View more label', 'wptravelengine-elementor-widgets' ),
						'type'      => 'TEXT',
						'default'   => __( 'View More', 'wptravelengine-elementor-widgets' ),
						'condition' => array(
							'cardlayout'         => '1',
							'showViewMoreButton' => 'yes',
						),
					),
				),
			),
		);

		$default_taxonomies = array(
			'destinations' => array(
				'title'    => __( 'Destinations', 'wptravelengine-elementor-widgets' ),
				'icon'     => 'wtei-b-destination',
				'taxonomy' => 'destination',
				'name'     => __( 'Destinations', 'wptravelengine-elementor-widgets' ),
			),
			'activities'   => array(
				'title'    => __( 'Activities', 'wptravelengine-elementor-widgets' ),
				'icon'     => 'wtei-b-activities',
				'taxonomy' => 'activities',
				'name'     => __( 'Activities', 'wptravelengine-elementor-widgets' ),
			),
			'trip-types'   => array(
				'title'    => __( 'Trip Types', 'wptravelengine-elementor-widgets' ),
				'icon'     => 'wtei-b-trip-types',
				'taxonomy' => 'trip_types',
				'name'     => __( 'Trip Types', 'wptravelengine-elementor-widgets' ),
			),
		);

		foreach ( $default_taxonomies as $widget_name => $widget_args ) {
			$widget_args['categories']          = 'wptravelengine';
			$widget_args['style_dependencies']  = array( 'wte-blocks-index' );
			$widget_args['script_dependencies'] = array();

			// $section_settings    = $general_terms_controls['section_settings'];
			$card_layout_section = $general_terms_controls['card_layout_section'];
			$sorting_filtering   = $general_terms_controls['sorting_filtering'];
			$additional_settings = $general_terms_controls['additional_settings'];

			$sorting_filtering['subcontrols']['listby']['label']            = sprintf( _x( 'Show %s by', 'Taxonomy name', 'wptravelengine-elementor-widgets' ), $widget_args['name'] );
			$sorting_filtering['subcontrols']['listItems']['label']         = sprintf( _x( 'Choose %s', 'Taxonomy name', 'wptravelengine-elementor-widgets' ), $widget_args['name'] );
			$sorting_filtering['subcontrols']['listItems']['taxonomy_name'] = $widget_args['taxonomy'];
			// $card_display_settings   = $general_terms_controls['card_display_settings'];
			$widget_args['controls'] = array(
				// "{$widget_name}_section_settings"      => $section_settings,
				"{$widget_name}_card_layout_section" => $card_layout_section,
				"{$widget_name}_sorting_filtering"   => $sorting_filtering,
				// "{$widget_name}_card_display_settings" => $card_display_settings,
				"{$widget_name}_additional_settings" => $additional_settings,
			);

			$widget_args['render'] = function( $attributes ) use ( $widget_name, $widget_args ) {

				if ( isset( $attributes['listby'] ) ) {
					if ( 'byids' !== $attributes['listby'] ) {

						$items = get_terms(
							array(
								'taxonomy'  => $widget_args['taxonomy'],
								'childless' => true,
								'number'    => isset( $attributes['itemsCount'] ) ? $attributes['itemsCount'] : 6,
								'fields'    => 'ids',
							)
						);

						if ( is_array( $items ) ) {
							$attributes['listItems'] = $items;
						} else {
							$attributes['listItems'] = array();
						}
					}
				}

				foreach ( array(
					'showCTAButton',
					'showFeaturedRibbon',
					'showDescription',
					'showFeaturedImage',
					'showName',
					'showPrice',
					'showStrikedPrice',
					'showDuration',
					'showLocation',
					'showReviews',
					'showDiscount',
					'showTripType',
					'showGroupSize',
					'showTripAvailableTime',
					'showViewMoreButton',
					'showTripCounts',
					'showViewAll',
				) as $subkey ) {
					if ( isset( $attributes[ "{$subkey}" ] ) ) {
						if ( 'showName' === $subkey ) {
							$subkey = 'showTitle';
						}
						$attributes['layoutFilters'][ $subkey ] = $attributes[ "{$subkey}" ];
					}
				}

				if ( file_exists( WPTRAVELENGINEEB_PATH . "includes/blocks/{$widget_name}/block.php" ) ) {
					include WPTRAVELENGINEEB_PATH . "includes/blocks/{$widget_name}/block.php";
				} else {
					echo __( '<p>Oops! No preview/output available for this widget.</p>', 'wptravelengine-elementor-widgets' );
				}
			};

			unset( $widget_args['name'] );
			unset( $widget_args['taxonomy'] );

			$widgets[ "wptravelengine-{$widget_name}" ] = $widget_args;
		}

		// Trip Search
		$search_form_filters = array();

		if ( isset( $wte_blocks_registration_args['trip-search']['attributes']['searchFilters']['default'] ) ) {
			$search_form_filters = $wte_blocks_registration_args['trip-search']['attributes']['searchFilters']['default'];
		}

		$search_form_display_settings = array(
			'type'        => 'control_section',
			'label'       => __( 'Additional', 'wptravelengine-elementor-widgets' ),
			'subcontrols' => array(
				'active_filters'    => array(
					'type'    => 'HIDDEN',
					'default' => implode( ',', array_keys( $search_form_filters ) ),
				),
				'searchButtonLabel' => array(
					'label'   => __( 'Search Button Label', 'wptravelengine-elementor-widgets' ),
					'type'    => 'TEXT',
					'default' => __( 'Search', 'wptravelengine-elementor-widgets' ),
				),
			),
		);

		foreach ( $search_form_filters  as $filter_name => $filter_args ) {
			$search_form_display_settings['subcontrols'][ "{$filter_name}_divider" ] = array(
				'type' => 'DIVIDER',
			);
			$search_form_display_settings['subcontrols'][ "{$filter_name}_heading" ] = array(
				'label' => $filter_args['default'],
				'type'  => 'HEADING',
			);
			foreach ( array(
				'show'  => array(
					'label'   => sprintf( _x( 'Show %s', 'Filter Name', 'wptravelengine-elementor-widgets' ), $filter_args['default'] ),
					'type'    => 'SWITCHER',
					'default' => $filter_args['show'] ? 'yes' : '',
				),
				'label' => array(
					'type'    => 'TEXT',
					'label'   => __( 'Filter Label', 'wptravelengine-elementor-widgets' ),
					'default' => $filter_args['default'],
				),
				'order' => array(
					'type'    => 'NUMBER',
					'min'     => '1',
					'label'   => __( 'Display Order', 'wptravelengine-elementor-widgets' ),
					'default' => isset( $filter_args['order'] ) ? $filter_args['order'] : 5,
				),
			) as $key => $el_field_params ) {
				if ( $key !== 'show' ) {
					$el_field_params['condition'] = array( "{$filter_name}_show" => 'yes' );
				}
				$search_form_display_settings['subcontrols'][ "{$filter_name}_{$key}" ] = $el_field_params;
			}
		}

		$widgets['wptravelengine-trip-search'] = array(
			'title'               => __( 'Trip Search', 'wptravelengine-elementor-widgets' ),
			'icon'                => 'wtei-b-trip-search',
			'categories'          => 'wptravelengine',
			'style_dependencies'  => array( 'wte-blocks-index' ),
			'script_dependencies' => array(),
			'controls'            => array(
				'trip_search_section_settings' => array(
					'type'        => 'control_section',
					'label'       => __( 'Layout', 'wptravelengine-elementor-widgets' ),
					'subcontrols' => array(
						'searchFormOrientation' => array(
							'label'   => __( 'Search Form Orientation', 'wptravelengine-elementor-widgets' ),
							'type'    => 'SELECT',
							'options' => array(
								'horizontal' => __( 'Horizontal (Default)', 'wptravelengine-elementor-widgets' ),
								'vertical'   => __( 'Vertical', 'wptravelengine-elementor-widgets' ),
							),
							'default' => 'horizontal',
						),
					),
				),
				'search_form_display_settings' => $search_form_display_settings,
			),
			'render'              => function( $attributes, $elementor = false ) {

				$attributes['searchFilters'] = array();
				if ( isset( $attributes['active_filters'] ) ) {
					$active_filters = explode( ',', $attributes['active_filters'] );
					if ( is_array( $active_filters ) ) {
						foreach ( $active_filters as $_filter ) {
							foreach ( array( 'show', 'label', 'order' ) as $_key ) {
								if ( isset( $attributes[ "{$_filter}_show" ] ) && 'yes' === $attributes[ "{$_filter}_show" ] ) {
									$attributes['searchFilters'][ $_filter ][ $_key ] = $attributes[ "{$_filter}_{$_key}" ];
								}
							}
						}
					}
				}

				$attributes['searchFormOrientation'] = 'horizontal' === $attributes['searchFormOrientation'];

				// $attributes['layoutFilters']['showTitle'] = $attributes['showTitle'];
				// $attributes['layoutFilters']['showSubtitle'] = $attributes['showSubtitle'];

				if ( file_exists( WPTRAVELENGINEEB_PATH . 'includes/blocks/trip-search/block.php' ) ) {
					include WPTRAVELENGINEEB_PATH . 'includes/blocks/trip-search/block.php';
				} else {
					echo __( '<p>Oops! No preview/output available for this widget.</p>', 'wptravelengine-elementor-widgets' );
				}
			},
		);

		$core_widget_collection                = apply_filters(
			'wte_core_blocks_to_elementor_widgets',
			$widgets
		);

		$this->core_widgets_collection = $core_widget_collection;

	}

	public function get_core_widget_setting( $name, $key = null ) {
		$settings = array();
		if ( isset( $this->core_widgets_collection[ $name ] ) ) {
			$settings = $this->core_widgets_collection[ $name ];
		} elseif ( isset( $this->core_widgets_collection[ "wptravelengine-{$name}" ] ) ) {
			$settings = $this->core_widgets_collection[ "wptravelengine-{$name}" ];
		}
		if ( $key && isset( $settings[ $key ] ) ) {
			return $settings[ $key ];
		}
		return $settings;
	}

	/**
	 * Registers Elementor Widgets.
	 */
	public function register_elementor_widgets() {

		include_once WPTRAVELENGINEEB_PATH . 'includes/class-widget.php';

		$core_widgets = $this->core_widgets_collection;

		if ( is_array( $core_widgets ) ) {
			$core_widgets = array_keys( $core_widgets );
		} else {
			$core_widgets = array( 'trips', 'destinations', 'trip-search' );
		}
		$core_widgets = apply_filters( 'wte_elementor_widgets_file_names', $core_widgets );

		foreach ( $core_widgets as $core_widget ) {
			$core_widget = str_replace( 'wptravelengine-', '', $core_widget );
			if ( file_exists( WPTRAVELENGINEEB_PATH . "includes/widgets/{$core_widget}/{$core_widget}.php" ) ) {
				include_once WPTRAVELENGINEEB_PATH . "includes/widgets/{$core_widget}/{$core_widget}.php";
				$class_name = str_replace( '-', '_', $core_widget );
				$class_name = __NAMESPACE__ . "\Widget_{$class_name}";
				if ( method_exists( Plugin::instance()->widgets_manager, 'register' ) ) {
					Plugin::instance()->widgets_manager->register( new $class_name() );
				} else {
					Plugin::instance()->widgets_manager->register_widget_type( new $class_name() );
				}
			}
		}
	}
}

Widgets_Controller::instance();
