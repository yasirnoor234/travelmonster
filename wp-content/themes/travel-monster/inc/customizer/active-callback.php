<?php 
/**
 * Active Callback
 * 
 * @package Travel Monster
*/


if( ! function_exists( 'travel_monster_seo_breadcrumb_ac' ) ) :
/**
* Breadcrumb Active Callback 
*/
function travel_monster_seo_breadcrumb_ac( $control ){
	$control_id  = $control->id;
	$ed_breadcrumb = $control->manager->get_setting( 'ed_breadcrumb' )->value();

	if( $control_id == 'home_text' && $ed_breadcrumb == true) return true;
	if( $control_id == 'separator_icon' && $ed_breadcrumb == true) return true;

	return false;
}
endif;

if( ! function_exists( 'travel_monster_loading_ac' ) ) :
/**
 * Active Callback for pagination
*/
function travel_monster_loading_ac( $control ){
    
    $pagination_type = $control->manager->get_setting( 'post_navigation' )->value();
    
    if ( $pagination_type == 'load_more' ) return true;
    
    return false;
}
endif;

if( ! function_exists( 'travel_monster_404_ac' ) ) :
/**
 * Active Callback for 404
*/
function travel_monster_404_ac( $control ){
    
    $ed_latest_post = $control->manager->get_setting( 'ed_latest_post' )->value();
    $control_id     = $control->id;

    if ( $control_id == 'no_of_posts_404' && $ed_latest_post ) return true;
    if ( $control_id == 'posts_per_row_404' && $ed_latest_post ) return true;
}
endif;

if( ! function_exists( 'travel_monster_scroll_to_top_ac' ) ) :
/**
 * Active Callback for Scroll to top button
*/
function travel_monster_scroll_to_top_ac($control){
	$ed_scroll_top = $control->manager->get_setting( 'ed_scroll_top' )->value();
    
    if ( $ed_scroll_top ) return true;
    
    return false;
}
endif;

if( ! function_exists( 'travel_monster_performance_fonts' ) ) :
/**
*Fonts Performance Active Callback 
*/
function travel_monster_performance_fonts( $control ){
	$ed_google_fonts_locally  = $control->manager->get_setting( 'ed_localgoogle_fonts' )->value();
	$control_id               = $control->id;
	
	if ( $control_id == 'ed_preload_local_fonts' && $ed_google_fonts_locally === true ) return true;
	if ( $control_id == 'flush_google_fonts' && $ed_google_fonts_locally === true) return true;

	return false;
}
endif;