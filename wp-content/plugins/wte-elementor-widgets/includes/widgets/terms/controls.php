<?php
namespace WPTRAVELENGINEEB;

/**
 * Trip Widget Controls.
 *
 * @since 1.2.0
 */
$selectors = array(
	// general section.
	'terms_typography'                 => '{{WRAPPER}} .wpte-elementor-widget .wpte-trip-category',
	'terms_boxshadow'                  => '{{WRAPPER}} .wpte-elementor-widget .wpte-trip-category .wpte-inner-container',
	'terms_border'                     => '{{WRAPPER}} .wpte-elementor-widget .wpte-trip-category .wpte-inner-container',
	'terms_alignment'                  => array(
		'{{WRAPPER}} .wpte-elementor-widget .wpte-trip-category .wpte-inner-container' => 'text-align: {{VALUE}};',
	),
	'terms_padding'                    => array(
		'{{WRAPPER}} .wpte-elementor-widget .wpte-trip-category .wpte-inner-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
	),
	'terms_margin'                    => array(
		'{{WRAPPER}} .wpte-elementor-widget .wpte-trip-category .wpte-inner-container' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
	),
	'terms_background_color'           => array(
		'{{WRAPPER}} .wpte-elementor-widget .wpte-trip-category .wpte-inner-container' => 'background-color: {{VALUE}};',
	),
	'terms_overlay_color'           => array(
		'{{WRAPPER}} .wpte-elementor-widget .wpte-trip-category-img-wrap .wpte-trip-category-overlay' => 'background-color: {{VALUE}};',
	),
	'terms_border_radius'              => array(
		'{{WRAPPER}} .wpte-elementor-widget .wpte-trip-category .wpte-inner-container' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	),
	'terms_boxshadow_hover'            => '{{WRAPPER}} .wpte-elementor-widget .wpte-trip-category:hover .wpte-inner-container',
	'terms_border_hover'               => '{{WRAPPER}} .wpte-elementor-widget .wpte-trip-category:hover .wpte-inner-container',
	'terms_background_hover_color'     => array(
		'{{WRAPPER}} .wpte-elementor-widget .wpte-trip-category:hover .wpte-inner-container' => 'background-color: {{VALUE}};',
	),
	'terms_border_radius_hover'        => array(
		'{{WRAPPER}} .wpte-elementor-widget .wpte-trip-category:hover .wpte-inner-container' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	),

	// title.
	'terms_title_typography'           => '{{WRAPPER}} .wpte-elementor-widget .wpte-trip-category .wpte-trip-category-title',
	'terms_title_color'                => array(
		'{{WRAPPER}} .wpte-elementor-widget .wpte-trip-category .wpte-trip-category-text-wrap .wpte-trip-category-title' => 'color: {{VALUE}};',
	),
	'terms_title_color_hover'          => array(
		'{{WRAPPER}} .wpte-elementor-widget .wpte-trip-category .wpte-trip-category-title a:hover' => 'color: {{VALUE}};',
	),
	'terms_title_padding'              => array(
		'{{WRAPPER}} .wpte-elementor-widget .wpte-trip-category .wpte-trip-category-text-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	),
	'terms_title_margin'                    => array(
		'{{WRAPPER}} .wpte-elementor-widget .wpte-trip-category .wpte-trip-category-text-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
	),

	// count.
	'terms_count_border'               => '{{WRAPPER}} .wpte-elementor-widget .wpte-trip-category .wpte-trip-category-title .trip-count',
	'terms_count_border_radius'        => array(
		'{{WRAPPER}} .wpte-elementor-widget .wpte-trip-category .wpte-trip-category-title .trip-count' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	),
	'terms_count_padding'              => array(
		'{{WRAPPER}} .wpte-elementor-widget .wpte-trip-category .wpte-trip-category-title .trip-count' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	),
	'terms_count_typography'           => '{{WRAPPER}} .wpte-elementor-widget .wpte-trip-category .wpte-trip-category-title .trip-count',
	'terms_count_color'                => array(
		'{{WRAPPER}} .wpte-elementor-widget .wpte-trip-category .wpte-trip-category-title .trip-count' => 'color: {{VALUE}};',
	),
	'terms_count_bg_color'             => array(
		'{{WRAPPER}} .wpte-elementor-widget .wpte-trip-category .wpte-trip-category-title .trip-count' => 'background-color: {{VALUE}};',
	),
	// arrow.
	'terms_arrow_size'                 => array(
		'{{WRAPPER}} .wpte-elementor-widget .wpte-trip-category .wpte-trip-category-title .wpte-icon' => 'font-size: {{SIZE}}{{UNIT}};',
	),
	'terms_arrow_color'                => array(
		'{{WRAPPER}} .wpte-elementor-widget .wpte-trip-category .wpte-trip-category-title .wpte-icon' => 'color: {{VALUE}};',
	),
	// image.
	'terms_image_scale'                => array(
		'{{WRAPPER}} .wpte-elementor-widget .wpte-trip-category figure img' => 'object-fit: {{VALUE}};',
	),
	'terms_image_width'                => array(
		'{{WRAPPER}} .wpte-elementor-widget .wpte-trip-category figure img' => 'width: {{SIZE}}{{UNIT}};',
	),
	'terms_image_height'               => array(
		'{{WRAPPER}} .wpte-elementor-widget .wpte-trip-category figure img' => 'height: {{SIZE}}{{UNIT}} !important;',
	),
	'terms_animation_type'             => array(
		'{{WRAPPER}} .wpte-elementor-widget .wpte-trip-category figure img' => 'transition-timing-function: {{VALUE}};',
	),
	'terms_img_animation_duration'     => array(
		'{{WRAPPER}} .wpte-elementor-widget .wpte-trip-category figure img' => 'transition-duration: {{VALUE}}s;',
	),
	'terms_image_border_radius'     => array(
		'{{WRAPPER}} .wpte-elementor-widget .wpte-trip-category figure, {{WRAPPER}} .wpte-elementor-widget .wpte-trip-category .wpte-trip-category-overlay' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		'{{WRAPPER}} .wpte-trip-category.style-1 .wpte-trip-category-text-wrap' => 'border-radius: 0 0 {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}'
	),

	// button.
	'terms_button_typography'          => '{{WRAPPER}} .wpte-elementor-widget .wpte-trip-category .wpte-trip-cat-btn',
	'terms_button_padding'             => array(
		'{{WRAPPER}} .wpte-elementor-widget .wpte-trip-category .wpte-trip-cat-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	),
	'terms_button_bg_color'            => array(
		'{{WRAPPER}} .wpte-elementor-widget .wpte-trip-category .wpte-trip-cat-btn' => 'background-color: {{VALUE}};',
	),
	'terms_button_color'               => array(
		'{{WRAPPER}} .wpte-elementor-widget .wpte-trip-category .wpte-trip-cat-btn' => 'color: {{VALUE}};',
	),
	'terms_button_border'              => '{{WRAPPER}} .wpte-elementor-widget .wpte-trip-category .wpte-trip-cat-btn',
	'terms_button_border_radius'       => array(
		'{{WRAPPER}} .wpte-elementor-widget .wpte-trip-category .wpte-trip-cat-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	),
	'terms_button_boxshadow'           => '{{WRAPPER}} .wpte-elementor-widget .wpte-trip-category .wpte-trip-cat-btn',
	'terms_button_bg_hover_color'      => array(
		'{{WRAPPER}} .wpte-elementor-widget .wpte-trip-category .wpte-trip-cat-btn:hover' => 'background-color: {{VALUE}};',
	),
	'terms_button_hover_color'         => array(
		'{{WRAPPER}} .wpte-elementor-widget .wpte-trip-category .wpte-trip-cat-btn:hover' => 'color: {{VALUE}};',
	),
	'terms_button_hover_border'        => '{{WRAPPER}} .wpte-elementor-widget .wpte-trip-category .wpte-trip-cat-btn:hover',
	'terms_button_hover_border_radius' => array(
		'{{WRAPPER}} .wpte-elementor-widget .wpte-trip-category .wpte-trip-cat-btn:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	),
	'terms_button_hover_boxshadow'     => '{{WRAPPER}} .wpte-elementor-widget .wpte-trip-category .wpte-trip-cat-btn:hover',
);
$controls = array(
	'terms_general_section' => array(
		'type'        => \Elementor\Controls_Manager::TAB_STYLE,
		'label'       => __( 'General', 'wptravelengine-elementor-widgets' ) . WPTRAVELENGINEEB_NEWCONTROL,
		'subcontrols' => array(
			'terms_typography'   => array(
				'type'     => \Elementor\Group_Control_Typography::get_type(),
				'selector' => $selectors['terms_typography'],
				'label'     => __( 'Typography', 'wptravelengine-elementor-widgets' ),
			),
			'terms_alignment'    => array(
				'type'      => 'CHOOSE',
				'label'     => __( 'Alignment', 'wptravelengine-elementor-widgets' ),
				'options'   => array(
					'left'   => array(
						'title' => esc_html__( 'Left', 'wptravelengine-elementor-widgets' ),
						'icon'  => 'eicon-text-align-left',
					),
					'center' => array(
						'title' => esc_html__( 'Center', 'wptravelengine-elementor-widgets' ),
						'icon'  => 'eicon-text-align-center',
					),
					'right'  => array(
						'title' => esc_html__( 'Right', 'wptravelengine-elementor-widgets' ),
						'icon'  => 'eicon-text-align-right',
					),
				),
				'selectors' => $selectors['terms_alignment'],
			),
			'terms_padding'      => array(
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'label'      => __( 'Padding', 'wptravelengine-elementor-widgets' ),
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => $selectors['terms_padding'],
			),
			'terms_margin'      => array(
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'label'      => __( 'Margin', 'wptravelengine-elementor-widgets' ),
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => $selectors['terms_margin'],
			),
			'terms_general_tabs' => array(
				'type' => 'start_controls_tabs',
				'tabs' => array(
					'terms_general_normal' => array(
						'type'        => 'start_controls_tab',
						'label'       => __( 'Normal', 'wptravelengine-elementor-widgets' ),
						'subcontrols' => array(
							'terms_background_color' => array(
								'type'      => \Elementor\Controls_Manager::COLOR,
								'label'     => __( 'Background Color', 'wptravelengine-elementor-widgets' ),
								'selectors' => $selectors['terms_background_color'],
							),
							'terms_boxshadow'        => array(
								'type'     => \Elementor\Group_Control_Box_Shadow::get_type(),
								'selector' => $selectors['terms_boxshadow'],
								'label'     => __( 'Box Shadow', 'wptravelengine-elementor-widgets' ),
							),
							'terms_border'           => array(
								'type'     => \Elementor\Group_Control_Border::get_type(),
								'selector' => $selectors['terms_border'],
							),
							'terms_border_radius'    => array(
								'type'       => \Elementor\Controls_Manager::DIMENSIONS,
								'label'      => __( 'Border Radius', 'wptravelengine-elementor-widgets' ),
								'size_units' => array( 'px', '%' ),
								'selectors'  => $selectors['terms_border_radius'],
							),
						),
					),
					'terms_general_hover'  => array(
						'type'        => 'start_controls_tab',
						'label'       => __( 'Hover', 'wptravelengine-elementor-widgets' ),
						'subcontrols' => array(
							'terms_background_hover_color' => array(
								'type'      => \Elementor\Controls_Manager::COLOR,
								'label'     => __( 'Background Color', 'wptravelengine-elementor-widgets' ),
								'selectors' => $selectors['terms_background_hover_color'],
							),
							'terms_overlay_color' => array(
								'type'      => \Elementor\Controls_Manager::COLOR,
								'label'     => __( 'Overlay Color', 'wptravelengine-elementor-widgets' ),
								'selectors' => $selectors['terms_overlay_color'],
								'condition' => array(
									'cardlayout'         => '1',
									'showViewMoreButton' => 'yes',
								),
							),
							'terms_boxshadow_hover'        => array(
								'type'     => \Elementor\Group_Control_Box_Shadow::get_type(),
								'selector' => $selectors['terms_boxshadow_hover'],
								'label'     => __( 'Box Shadow', 'wptravelengine-elementor-widgets' ),
							),
							'terms_border_hover'           => array(
								'type'     => \Elementor\Group_Control_Border::get_type(),
								'selector' => $selectors['terms_border_hover'],
							),
							'terms_border_radius_hover'    => array(
								'type'       => \Elementor\Controls_Manager::DIMENSIONS,
								'label'      => __( 'Border Radius', 'wptravelengine-elementor-widgets' ),
								'size_units' => array( 'px', '%' ),
								'selectors'  => $selectors['terms_border_radius_hover'],
							),
						),
					),
				),
			),
		),
	),
	'terms_title_section'   => array(
		'type'        => \Elementor\Controls_Manager::TAB_STYLE,
		'label'       => __( 'Title', 'wptravelengine-elementor-widgets' ) . WPTRAVELENGINEEB_NEWCONTROL,
		'subcontrols' => array(
			'terms_title_typography' => array(
				'type'     => \Elementor\Group_Control_Typography::get_type(),
				'selector' => $selectors['terms_title_typography'],
				'label'     => __( 'Typography', 'wptravelengine-elementor-widgets' ),
			),
			'terms_title_tabs'       => array(
				'type' => 'start_controls_tabs',
				'tabs' => array(
					'terms_title_normal' => array(
						'type'        => 'start_controls_tab',
						'label'       => __( 'Normal', 'wptravelengine-elementor-widgets' ),
						'subcontrols' => array(
							'terms_title_color' => array(
								'type'      => \Elementor\Controls_Manager::COLOR,
								'label'     => esc_html__( 'Color', 'wptravelengine-elementor-widgets' ),
								'selectors' => $selectors['terms_title_color'],
							),
						),
					),
					'terms_title_hover'  => array(
						'type'        => 'start_controls_tab',
						'label'       => __( 'Hover', 'wptravelengine-elementor-widgets' ),
						'subcontrols' => array(
							'terms_title_color_hover' => array(
								'type'      => \Elementor\Controls_Manager::COLOR,
								'label'     => esc_html__( 'Color', 'wptravelengine-elementor-widgets' ),
								'selectors' => $selectors['terms_title_color_hover'],
							),
						),
					),
				),
			),
			'terms_title_padding'    => array(
				'label'      => esc_html__( 'Padding', 'wptravelengine-elementor-widgets' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => $selectors['terms_title_padding'],
			),
			'terms_title_margin'      => array(
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'label'      => __( 'Margin', 'wptravelengine-elementor-widgets' ),
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => $selectors['terms_title_margin'],
			),
		),
	),
	'terms_count_section'   => array(
		'type'        => \Elementor\Controls_Manager::TAB_STYLE,
		'label'       => __( 'Count', 'wptravelengine-elementor-widgets' ) . WPTRAVELENGINEEB_NEWCONTROL,
		'subcontrols' => array(
			'terms_count_typography'    => array(
				'type'     => \Elementor\Group_Control_Typography::get_type(),
				'selector' => $selectors['terms_count_typography'],
			),
			'terms_count_color'         => array(
				'type'      => \Elementor\Controls_Manager::COLOR,
				'label'     => esc_html__( 'Color', 'wptravelengine-elementor-widgets' ),
				'selectors' => $selectors['terms_count_color'],
			),
			'terms_count_bg_color'      => array(
				'type'      => \Elementor\Controls_Manager::COLOR,
				'label'     => esc_html__( 'Background Color', 'wptravelengine-elementor-widgets' ),
				'selectors' => $selectors['terms_count_bg_color'],
			),
			'terms_count_border'        => array(
				'type'     => \Elementor\Group_Control_Border::get_type(),
				'selector' => $selectors['terms_count_border'],
			),
			'terms_count_border_radius' => array(
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'label'      => __( 'Border Radius', 'wptravelengine-elementor-widgets' ),
				'size_units' => array( 'px', '%' ),
				'selectors'  => $selectors['terms_count_border_radius'],
			),
			'terms_count_padding'       => array(
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'label'      => __( 'Padding', 'wptravelengine-elementor-widgets' ),
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => $selectors['terms_count_padding'],
			),
		),
		'condition'   => array ( 'showTripCounts' => 'yes'),
	),
	'terms_arrow_section'   => array(
		'type'        => \Elementor\Controls_Manager::TAB_STYLE,
		'label'       => __( 'Arrow', 'wptravelengine-elementor-widgets' ) . WPTRAVELENGINEEB_NEWCONTROL,
		'subcontrols' => array(
			'terms_arrow_enable' => array(
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label'        => esc_html__( 'Enable/Disable', 'wptravelengine-elementor-widgets' ),
				'default'      => 'yes',
			),
			'terms_arrow_color'  => array(
				'type'      => \Elementor\Controls_Manager::COLOR,
				'label'     => esc_html__( 'Arrow Color', 'wptravelengine-elementor-widgets' ),
				'selectors' => $selectors['terms_arrow_color'],
				'condition'   => array ( 'terms_arrow_enable' => 'yes'),
			),
			'terms_arrow_size'   => array(
				'type'       => 'SLIDER',
				'label'      => esc_html__( 'Arrow Size', 'wptravelengine-elementor-widgets' ),
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
				'selectors'  => $selectors['terms_arrow_size'],
				'condition'   => array ( 'terms_arrow_enable' => 'yes'),
			),
			'terms_arrow_icon'   => array(
				'type'        => \Elementor\Controls_Manager::ICONS,
				'label'       => esc_html__( 'Custom Upload', 'wptravelengine-elementor-widgets' ),
				'recommended' => array(
					'fa-solid'   => array(
						'arrow-alt-circle-left',
						'arrow-alt-circle-right',
						'arrow-left',
						'arrow-right',
					),
					'fa-regular' => array(
						'arrow-alt-circle-left',
						'arrow-alt-circle-right',
					),
				),
				'condition'   => array ( 'terms_arrow_enable' => 'yes'),
			),
		),
	),
	'terms_image_section'   => array(
		'type'        => \Elementor\Controls_Manager::TAB_STYLE,
		'label'       => __( 'Image', 'wptravelengine-elementor-widgets' ) . WPTRAVELENGINEEB_NEWCONTROL,
		'subcontrols' => array(
			'terms_image_tabs' => array(
				'type' => 'start_controls_tabs',
				'tabs' => array(
					'terms_image_normal' => array(
						'type'        => 'start_controls_tab',
						'label'       => __( 'Normal', 'wptravelengine-elementor-widgets' ),
						'subcontrols' => array(
							'terms_image_size'        => array(
								'type'    => 'SELECT',
								'label'   => esc_html__( 'Image Size', 'wptravelengine-elementor-widgets' ),
								'options' => Widget::get_image_size_options(),
								'default' => 'trip-single-size',
							),
							'terms_image_custom_size' => array(
								'type'      => 'IMAGE_DIMENSIONS',
								'label'     => esc_html__( 'Custom Image Size', 'wptravelengine-elementor-widgets' ),
								'condition' => array(
									'terms_image_size' => 'custom',
								),
							),
							'terms_image_scale'       => array(
								'type'      => 'SELECT',
								'label'     => esc_html__( 'Object Fit', 'wptravelengine-elementor-widgets' ),
								'options'   => array(
									'original' => esc_html__( 'Original', 'wptravelengine-elementor-widgets' ),
									'contain'  => esc_html__( 'Contain', 'wptravelengine-elementor-widgets' ),
									'cover'    => esc_html__( 'Cover', 'wptravelengine-elementor-widgets' ),
									'fill'     => esc_html__( 'Fill', 'wptravelengine-elementor-widgets' ),
								),
								'default'   => 'original',
								'selectors' => $selectors['terms_image_scale'],
							),
							'terms_image_width'       => array(
								'type'       => 'SLIDER',
								'label'      => esc_html__( 'Width', 'wptravelengine-elementor-widgets' ),
								'size_units' => array( 'px', '%' ),
								'range'      => array(
									'%'  => array(
										'min' => 0,
										'max' => 100,
									),
									'px' => array(
										'min' => 0,
										'max' => 1000,
									),
								),
								'selectors'  => $selectors['terms_image_width'],
							),
							'terms_image_height'      => array(
								'type'       => 'SLIDER',
								'label'      => esc_html__( 'Height', 'wptravelengine-elementor-widgets' ),
								'size_units' => array( 'px', '%' ),
								'range'      => array(
									'%'  => array(
										'min' => 0,
										'max' => 100,
									),
									'px' => array(
										'min' => 0,
										'max' => 1000,
									),
								),
								'selectors'  => $selectors['terms_image_height'],
							),
							'terms_image_border_radius'    => array(
								'type'       => \Elementor\Controls_Manager::DIMENSIONS,
								'label'      => __( 'Border Radius', 'wptravelengine-elementor-widgets' ),
								'size_units' => array( 'px', '%' ),
								'selectors'  => $selectors['terms_image_border_radius'],
							),
						),
					),
					'terms_image_hover'  => array(
						'type'        => 'start_controls_tab',
						'label'       => __( 'Hover', 'wptravelengine-elementor-widgets' ),
						'subcontrols' => array(
							'terms_animation_type'         => array(
								'type'      => 'SELECT',
								'label'     => esc_html__( 'Animation Type', 'wptravelengine-elementor-widgets' ),
								'options'   => array(
									'linear'      => esc_html__( 'Linear', 'wptravelengine-elementor-widgets' ),
									'ease'        => esc_html__( 'Ease', 'wptravelengine-elementor-widgets' ),
									'ease-in'     => esc_html__( 'Ease-in', 'wptravelengine-elementor-widgets' ),
									'ease-out'    => esc_html__( 'Ease-out', 'wptravelengine-elementor-widgets' ),
									'ease-in-out' => esc_html__( 'Ease-in-out', 'wptravelengine-elementor-widgets' ),
									'step-start'  => esc_html__( 'Step-start', 'wptravelengine-elementor-widgets' ),
									'step-end'    => esc_html__( 'Step-end', 'wptravelengine-elementor-widgets' ),
									'initial'     => esc_html__( 'Initial', 'wptravelengine-elementor-widgets' ),
									'inherit'     => esc_html__( 'Inherit', 'wptravelengine-elementor-widgets' ),
								),
								'default'   => 'linear',
								'selectors' => $selectors['terms_animation_type'],
							),
							'terms_img_animation_duration' => array(
								'type'      => \Elementor\Controls_Manager::NUMBER,
								'label'     => esc_html__( 'Animation Duration (sec)', 'wptravelengine-elementor-widgets' ),
								'selectors' => $selectors['terms_img_animation_duration'],
								'min'       => 0,
								'max'       => 100,
								'step'      => 0.1,
								'default'   => 3,
							),
						),
					),
				),
			),
		),
	),
	'terms_button_section'  => array(
		'type'        => \Elementor\Controls_Manager::TAB_STYLE,
		'label'       => __( 'Button', 'wptravelengine-elementor-widgets' ) . WPTRAVELENGINEEB_NEWCONTROL,
		'subcontrols' => array(
			'terms_button_typography' => array(
				'type'     => \Elementor\Group_Control_Typography::get_type(),
				'selector' => $selectors['terms_button_typography'],
				'label'       => __( 'Typography', 'wptravelengine-elementor-widgets' ),
			),
			'terms_button_padding'    => array(
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'label'      => __( 'Padding', 'wptravelengine-elementor-widgets' ),
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => $selectors['terms_button_padding'],
			),
			'terms_button_tabs'       => array(
				'type' => 'start_controls_tabs',
				'tabs' => array(
					'terms_button_normal' => array(
						'type'        => 'start_controls_tab',
						'label'       => __( 'Normal', 'wptravelengine-elementor-widgets' ),
						'subcontrols' => array(
							'terms_button_bg_color'      => array(
								'type'      => \Elementor\Controls_Manager::COLOR,
								'label'       => esc_html__( 'Background Color', 'wptravelengine-elementor-widgets' ),
								'selectors' => $selectors['terms_button_bg_color'],
							),
							'terms_button_color'         => array(
								'type'      => \Elementor\Controls_Manager::COLOR,
								'label'     => esc_html__( 'Color', 'wptravelengine-elementor-widgets' ),
								'selectors' => $selectors['terms_button_color'],
							),
							'terms_button_border'        => array(
								'type'     => \Elementor\Group_Control_Border::get_type(),
								'selector' => $selectors['terms_button_border'],
							),
							'terms_button_border_radius' => array(
								'type'       => \Elementor\Controls_Manager::DIMENSIONS,
								'label'      => __( 'Border Radius', 'wptravelengine-elementor-widgets' ),
								'size_units' => array( 'px', '%' ),
								'selectors'  => $selectors['terms_button_border_radius'],
							),
							'terms_button_boxshadow'     => array(
								'type'     => \Elementor\Group_Control_Box_Shadow::get_type(),
								'selector' => $selectors['terms_button_boxshadow'],
								'label'     => esc_html__( 'Box Shadow', 'wptravelengine-elementor-widgets' ),
							),
						),
					),
					'terms_button_hover'  => array(
						'type'        => 'start_controls_tab',
						'label'       => __( 'Hover', 'wptravelengine-elementor-widgets' ),
						'subcontrols' => array(
							'terms_button_bg_hover_color'  => array(
								'type'      => \Elementor\Controls_Manager::COLOR,
								'label'     => esc_html__( 'Background Color', 'wptravelengine-elementor-widgets' ),
								'selectors' => $selectors['terms_button_bg_hover_color'],
							),
							'terms_button_hover_color'     => array(
								'type'      => \Elementor\Controls_Manager::COLOR,
								'label'     => esc_html__( 'Color', 'wptravelengine-elementor-widgets' ),
								'selectors' => $selectors['terms_button_hover_color'],
							),
							'terms_button_hover_border'    => array(
								'type'     => \Elementor\Group_Control_Border::get_type(),
								'selector' => $selectors['terms_button_hover_border'],
							),
							'terms_button_hover_border_radius' => array(
								'type'       => \Elementor\Controls_Manager::DIMENSIONS,
								'label'      => __( 'Border Radius', 'wptravelengine-elementor-widgets' ),
								'size_units' => array( 'px', '%' ),
								'selectors'  => $selectors['terms_button_hover_border_radius'],
							),
							'terms_button_hover_boxshadow' => array(
								'type'     => \Elementor\Group_Control_Box_Shadow::get_type(),
								'selector' => $selectors['terms_button_hover_boxshadow'],
								'label'     => esc_html__( 'Box Shadow', 'wptravelengine-elementor-widgets' ),
							),
						),
					),
				),
			),
		),
	),
);


return $controls;
