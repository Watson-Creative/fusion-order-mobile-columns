<?php
/**
 * Plugin Name: Fusion Builder Order Mobile Columns
 * Plugin URI: https://www.watsoncreative.com/
 * Description: Allows you to change the order of your columns on mobile devices - add the class "order-container" to the container.
 * Version: 1.0.0
 * Author: Watson Creative
 * Author URI: https://www.watsoncreative.com/
 *
 * @package Fusion Builder Order Mobile Columns
 */

 // Do not allow directly access to this file.
 if ( !defined('ABSPATH') ) {
 	exit('Direct script access denied.');
 }

 add_action('wp_enqueue_scripts', 'enqueue_style');
 function enqueue_style(){
    wp_register_style( 'custom_fusion_mobile_order', plugins_url('style.css', __FILE__), '1.0.0' );
    wp_enqueue_style('custom_fusion_mobile_order');
 }


 function update_element_options() {

   // Example of how to add or modify options to existing element in Fusion Builder.
   if ( function_exists( 'fusion_builder_update_element' ) ) {
     fusion_builder_map(
     		array(
     			'name'              => esc_attr__( 'Column', 'fusion-builder' ),
     			'shortcode'         => 'fusion_builder_column',
     			'hide_from_builder' => true,
     			'params'            => array(
            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
     				array(
     					'type'        => 'select',
              'default'     => '',
     					'heading'     => esc_attr__( 'Mobile Order', 'fusion-builder' ),
     					'description' => esc_attr__( 'Set the order of this column for mobile. Make sure to add the class order-container to the container of this column.', 'fusion-builder' ),
     					'param_name'  => 'custom_mobile_order',
              'value'       => array(
     						''  => esc_attr__( 'Default', 'fusion-builder' ),
     						'1' => esc_attr__( '1', 'fusion-builder' ),
     						'2' => esc_attr__( '2', 'fusion-builder' ),
     						'3' => esc_attr__( '3', 'fusion-builder' ),
     						'4' => esc_attr__( '4', 'fusion-builder' ),
     						'5' => esc_attr__( '5', 'fusion-builder' ),
     						'6' => esc_attr__( '6', 'fusion-builder' ),
     						'7' => esc_attr__( '7', 'fusion-builder' ),
     						'8' => esc_attr__( '8', 'fusion-builder' ),
     						'9' => esc_attr__( '9', 'fusion-builder' ),
     						'10' => esc_attr__( '10', 'fusion-builder' ),
     						'11' => esc_attr__( '11', 'fusion-builder' ),
     						'12' => esc_attr__( '12', 'fusion-builder' ),
     						'13' => esc_attr__( '13', 'fusion-builder' ),
     						'14' => esc_attr__( '14', 'fusion-builder' ),
     						'15' => esc_attr__( '15', 'fusion-builder' ),
     						'16' => esc_attr__( '16', 'fusion-builder' ),
     						'17' => esc_attr__( '17', 'fusion-builder' ),
     						'18' => esc_attr__( '18', 'fusion-builder' ),
     						'19' => esc_attr__( '19', 'fusion-builder' ),
     						'20' => esc_attr__( '20', 'fusion-builder' ),
     					),
     					'group'       => esc_attr__( 'General', 'fusion-builder' ),
     				),
            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

     				array(
     					'type'        => 'textfield',
     					'heading'     => esc_attr__( 'Column Spacing', 'fusion-builder' ),
     					'description' => esc_attr__( 'Controls the column spacing between one column to the next. Enter value including any valid CSS unit, ex: 4%.', 'fusion-builder' ),
     					'param_name'  => 'spacing',
     					'group'       => esc_attr__( 'General', 'fusion-builder' ),
     					'value'       => '',
     				),
     				array(
     					'type'        => 'radio_button_set',
     					'heading'     => esc_attr__( 'Center Content', 'fusion-builder' ),
     					'description' => esc_attr__( 'Set to "Yes" to center the content vertically. Equal heights on the parent container must be turned on.', 'fusion-builder' ),
     					'param_name'  => 'center_content',
     					'default'     => 'no',
     					'group'       => esc_attr__( 'General', 'fusion-builder' ),
     					'value'       => array(
     						'yes' => esc_attr__( 'Yes', 'fusion-builder' ),
     						'no'  => esc_attr__( 'No', 'fusion-builder' ),
     					),
     				),
     				array(
     					'type'        => 'link_selector',
     					'heading'     => esc_attr__( 'Link URL', 'fusion-builder' ),
     					'description' => esc_attr__( 'Add the URL the column will link to, ex: http://example.com. IMPORTANT: This will disable links on elements inside the column.', 'fusion-builder' ),
     					'param_name'  => 'link',
     					'value'       => '',
     				),
     				array(
     					'type'        => 'radio_button_set',
     					'heading'     => esc_attr__( 'Link Target', 'fusion-builder' ),
     					'description' => esc_attr__( '_self = open in same browser tab, _blank = open in new browser tab.', 'fusion-builder' ),
     					'param_name'  => 'target',
     					'default'     => '_self',
     					'value'       => array(
     						'_self'  => esc_attr__( '_self', 'fusion-builder' ),
     						'_blank' => esc_attr__( '_blank', 'fusion-builder' ),
     					),
     				),
     				array(
     					'type'        => 'radio_button_set',
     					'heading'     => esc_attr__( 'Ignore Equal Heights', 'fusion-builder' ),
     					'description' => esc_attr__( 'Choose to ignore equal heights on this column if you are using equal heights on the surrounding container.', 'fusion-builder' ),
     					'param_name'  => 'min_height',
     					'default'     => '',
     					'group'       => esc_attr__( 'General', 'fusion-builder' ),
     					'value'       => array(
     						'none' => esc_attr__( 'Yes', 'fusion-builder' ),
     						''     => esc_attr__( 'No', 'fusion-builder' ),
     					),
     				),
     				array(
     					'type'        => 'checkbox_button_set',
     					'heading'     => esc_attr__( 'Column Visibility', 'fusion-builder' ),
     					'param_name'  => 'hide_on_mobile',
     					'value'       => fusion_builder_visibility_options( 'full' ),
     					'default'     => fusion_builder_default_visibility( 'array' ),
     					'description' => esc_attr__( 'Choose to show or hide the column on small, medium or large screens. You can choose more than one at a time.', 'fusion-builder' ),
     				),
     				array(
     					'type'        => 'textfield',
     					'heading'     => esc_attr__( 'CSS Class', 'fusion-builder' ),
     					'description' => esc_attr__( 'Add a class to the wrapping HTML element.', 'fusion-builder' ),
     					'param_name'  => 'class',
     					'value'       => '',
     					'group'       => esc_attr__( 'General', 'fusion-builder' ),
     				),
     				array(
     					'type'        => 'textfield',
     					'heading'     => esc_attr__( 'CSS ID', 'fusion-builder' ),
     					'description' => esc_attr__( 'Add an ID to the wrapping HTML element.', 'fusion-builder' ),
     					'param_name'  => 'id',
     					'value'       => '',
     					'group'       => esc_attr__( 'General', 'fusion-builder' ),
     				),

     				array(
     					'type'        => 'colorpickeralpha',
     					'heading'     => esc_attr__( 'Background Color', 'fusion-builder' ),
     					'description' => esc_attr__( 'Controls the background color.', 'fusion-builder' ),
     					'param_name'  => 'background_color',
     					'value'       => '',
     					'group'       => esc_attr__( 'Design', 'fusion-builder' ),
     				),
     				array(
     					'type'        => 'upload',
     					'heading'     => esc_attr__( 'Background Image', 'fusion-builder' ),
     					'description' => esc_attr__( 'Upload an image to display in the background.', 'fusion-builder' ),
     					'param_name'  => 'background_image',
     					'value'       => '',
     					'group'       => esc_attr__( 'Design', 'fusion-builder' ),
     				),
     				array(
     					'type'        => 'select',
     					'heading'     => esc_attr__( 'Background Position', 'fusion-builder' ),
     					'description' => esc_attr__( 'Choose the postion of the background image.', 'fusion-builder' ),
     					'param_name'  => 'background_position',
     					'default'     => 'left top',
     					'group'       => esc_attr__( 'Design', 'fusion-builder' ),
     					'dependency'  => array(
     						array(
     							'element'  => 'background_image',
     							'value'    => '',
     							'operator' => '!=',
     						),
     					),
     					'value'       => array(
     						'left top'      => esc_attr__( 'Left Top', 'fusion-builder' ),
     						'left center'   => esc_attr__( 'Left Center', 'fusion-builder' ),
     						'left bottom'   => esc_attr__( 'Left Bottom', 'fusion-builder' ),
     						'right top'     => esc_attr__( 'Right Top', 'fusion-builder' ),
     						'right center'  => esc_attr__( 'Right Center', 'fusion-builder' ),
     						'right bottom'  => esc_attr__( 'Right Bottom', 'fusion-builder' ),
     						'center top'    => esc_attr__( 'Center Top', 'fusion-builder' ),
     						'center center' => esc_attr__( 'Center Center', 'fusion-builder' ),
     						'center bottom' => esc_attr__( 'Center Bottom', 'fusion-builder' ),
     					),
     				),
     				array(
     					'type'        => 'select',
     					'heading'     => esc_attr__( 'Background Repeat', 'fusion-builder' ),
     					'description' => esc_attr__( 'Choose how the background image repeats.', 'fusion-builder' ),
     					'param_name'  => 'background_repeat',
     					'default'     => 'no-repeat',
     					'group'       => esc_attr__( 'Design', 'fusion-builder' ),
     					'dependency'  => array(
     						array(
     							'element'  => 'background_image',
     							'value'    => '',
     							'operator' => '!=',
     						),
     					),
     					'value'       => array(
     						'no-repeat' => esc_attr__( 'No Repeat', 'fusion-builder' ),
     						'repeat'    => esc_attr__( 'Repeat Vertically and Horizontally', 'fusion-builder' ),
     						'repeat-x'  => esc_attr__( 'Repeat Horizontally', 'fusion-builder' ),
     						'repeat-y'  => esc_attr__( 'Repeat Vertically', 'fusion-builder' ),
     					),
     				),
     				array(
     					'type'        => 'radio_button_set',
     					'heading'     => esc_attr__( 'Hover Type', 'fusion-builder' ),
     					'description' => esc_attr__( 'Select the hover effect type. IMPORTANT: For the effect to be noticeable, you\'ll need a background color/image, and/or a border enabled. This will disable links and hover effects on elements inside the column.', 'fusion-builder' ),
     					'param_name'  => 'hover_type',
     					'default'     => 'none',
     					'value'       => array(
     						'none'    => esc_attr__( 'None', 'fusion-builder' ),
     						'zoomin'  => esc_attr__( 'Zoom In', 'fusion-builder' ),
     						'zoomout' => esc_attr__( 'Zoom Out', 'fusion-builder' ),
     						'liftup'  => esc_attr__( 'Lift Up', 'fusion-builder' ),
     					),
     					'group'       => esc_attr__( 'Design', 'fusion-builder' ),
     				),
     				array(
     					'type'        => 'range',
     					'heading'     => esc_attr__( 'Border Size', 'fusion-builder' ),
     					'description' => esc_attr__( 'Controls the border size of the column. In pixels.', 'fusion-builder' ),
     					'param_name'  => 'border_size',
     					'value'       => '0',
     					'min'         => '0',
     					'max'         => '50',
     					'step'        => '1',
     					'group'       => esc_attr__( 'Design', 'fusion-builder' ),
     				),
     				array(
     					'type'        => 'colorpicker',
     					'heading'     => esc_attr__( 'Border Color', 'fusion-builder' ),
     					'description' => esc_attr__( 'Controls the border color.', 'fusion-builder' ),
     					'param_name'  => 'border_color',
     					'value'       => '',
     					'group'       => esc_attr__( 'Design', 'fusion-builder' ),
     					'dependency'  => array(
     						array(
     							'element'  => 'border_size',
     							'value'    => '0',
     							'operator' => '!=',
     						),
     					),
     				),
     				array(
     					'type'        => 'radio_button_set',
     					'heading'     => esc_attr__( 'Border Style', 'fusion-builder' ),
     					'description' => esc_attr__( 'Controls the border style.', 'fusion-builder' ),
     					'param_name'  => 'border_style',
     					'default'     => 'solid',
     					'group'       => esc_attr__( 'Design', 'fusion-builder' ),
     					'dependency'  => array(
     						array(
     							'element'  => 'border_size',
     							'value'    => '0',
     							'operator' => '!=',
     						),
     					),
     					'value'       => array(
     						'solid'  => esc_attr__( 'Solid', 'fusion-builder' ),
     						'dashed' => esc_attr__( 'Dashed', 'fusion-builder' ),
     						'dotted' => esc_attr__( 'Dotted', 'fusion-builder' ),
     					),
     				),
     				array(
     					'type'        => 'radio_button_set',
     					'heading'     => esc_attr__( 'Border Position', 'fusion-builder' ),
     					'description' => esc_attr__( 'Choose the postion of the border.', 'fusion-builder' ),
     					'param_name'  => 'border_position',
     					'default'     => 'all',
     					'group'       => esc_attr__( 'Design', 'fusion-builder' ),
     					'dependency'  => array(
     						array(
     							'element'  => 'border_size',
     							'value'    => '0',
     							'operator' => '!=',
     						),
     					),
     					'value'       => array(
     						'all'    => esc_attr__( 'All', 'fusion-builder' ),
     						'top'    => esc_attr__( 'Top', 'fusion-builder' ),
     						'right'  => esc_attr__( 'Right', 'fusion-builder' ),
     						'bottom' => esc_attr__( 'Bottom', 'fusion-builder' ),
     						'left'   => esc_attr__( 'Left', 'fusion-builder' ),
     					),
     				),
     				array(
     					'type'             => 'dimension',
     					'remove_from_atts' => true,
     					'heading'          => esc_attr__( 'Padding', 'fusion-builder' ),
     					'description'      => esc_attr__( 'In pixels (px), ex: 10px.', 'fusion-builder' ),
     					'param_name'       => 'padding',
     					'value'            => array(
     						'padding_top'    => '',
     						'padding_right'  => '',
     						'padding_bottom' => '',
     						'padding_left'   => '',
     					),
     					'group'       => esc_attr__( 'Design', 'fusion-builder' ),
     				),
     				array(
     					'type'             => 'dimension',
     					'remove_from_atts' => true,
     					'heading'          => esc_attr__( 'Margin', 'fusion-builder' ),
     					'description'      => esc_attr__( 'In pixels (px), ex: 10px.', 'fusion-builder' ),
     					'param_name'       => 'dimension_margin',
     					'value'            => array(
     						'margin_top'    => '',
     						'margin_bottom' => '',
     					),
     					'group'            => esc_attr__( 'Design', 'fusion-builder' ),
     				),
     				array(
     					'type'        => 'select',
     					'heading'     => esc_attr__( 'Animation Type', 'fusion-builder' ),
     					'description' => esc_attr__( 'Select the type of animation to use on the element.', 'fusion-builder' ),
     					'param_name'  => 'animation_type',
     					'value'       => fusion_builder_available_animations(),
     					'default'     => '',
     					'group'       => esc_attr__( 'Animation', 'fusion-builder' ),
     				),
     				array(
     					'type'        => 'radio_button_set',
     					'heading'     => esc_attr__( 'Direction of Animation', 'fusion-builder' ),
     					'description' => esc_attr__( 'Select the incoming direction for the animation.', 'fusion-builder' ),
     					'param_name'  => 'animation_direction',
     					'value'       => array(
     						'down'   => esc_attr__( 'Top', 'fusion-builder' ),
     						'right'  => esc_attr__( 'Right', 'fusion-builder' ),
     						'up'     => esc_attr__( 'Bottom', 'fusion-builder' ),
     						'left'   => esc_attr__( 'Left', 'fusion-builder' ),
     						'static' => esc_attr__( 'Static', 'fusion-builder' ),
     					),
     					'default'     => 'left',
     					'group'       => esc_attr__( 'Animation', 'fusion-builder' ),
     					'dependency'  => array(
     						array(
     							'element'  => 'animation_type',
     							'value'    => '',
     							'operator' => '!=',
     						),
     					),
     				),
     				array(
     					'type'        => 'range',
     					'heading'     => esc_attr__( 'Speed of Animation', 'fusion-builder' ),
     					'description' => esc_attr__( 'Type in speed of animation in seconds (0.1 - 1).', 'fusion-builder' ),
     					'param_name'  => 'animation_speed',
     					'min'         => '0.1',
     					'max'         => '1',
     					'step'        => '0.1',
     					'value'       => '0.3',
     					'group'       => esc_attr__( 'Animation', 'fusion-builder' ),
     					'dependency'  => array(
     						array(
     							'element'  => 'animation_type',
     							'value'    => '',
     							'operator' => '!=',
     						),
     					),
     				),
     				array(
     					'type'        => 'select',
     					'heading'     => esc_attr__( 'Offset of Animation', 'fusion-builder' ),
     					'description' => esc_attr__( 'Controls when the animation should start.', 'fusion-builder' ),
     					'param_name'  => 'animation_offset',
     					'default'     => '',
     					'group'       => esc_attr__( 'Animation', 'fusion-builder' ),
     					'dependency'  => array(
     						array(
     							'element'  => 'animation_type',
     							'value'    => '',
     							'operator' => '!=',
     						),
     					),
     					'value'       => array(
     						''                => esc_attr__( 'Default', 'fusion-builder' ),
     						'top-into-view'   => esc_attr__( 'Top of element hits bottom of viewport', 'fusion-builder' ),
     						'top-mid-of-view' => esc_attr__( 'Top of element hits middle of viewport', 'fusion-builder' ),
     						'bottom-in-view'  => esc_attr__( 'Bottom of element enters viewport', 'fusion-builder' ),
     					),
     				),
     			),
     		)
     	);

   }
 }
 add_action( 'fusion_builder_before_init', 'update_element_options', 11 );



  function do_fusion_shortcode_override( $atts) {
     // Add hook to fusion builder container
     //remove_shortcode('fusion_builder_container');
     //add_shortcode( 'fusion_builder_container', 'before_container_shortcode' );
     remove_shortcode('fusion_builder_column');
     add_shortcode( 'fusion_builder_column', 'before_column_shortcode' );

  }

 function before_column_shortcode( $atts, $content = '' ) {
   /*
    $dat = array();
    preg_match('/\[[a-z\_\-]* (.+?)\]/', $content, $dat);

    $dat = array_pop($dat);
    $dat= explode(" ", $dat);
    $params = array();
    foreach ($dat as $d){
        list($opt, $val) = explode("=", $d);
        $params[$opt] = trim($val, '"');
    }*/

   if(isset($atts['custom_mobile_order'])) {
     $atts['class'] = $atts['class'] . ' order-mob-' . $atts['custom_mobile_order'];
   }

   // Call original function and return
   $fcontainer = new FusionSC_Column();
   $col_html = $fcontainer->render($atts, $content);
   do_fusion_shortcode_override(0); //replace added hook
   return $col_html;
 }

   add_action( 'avada_before_body_content', 'do_fusion_shortcode_override', 11 );

 ?>
