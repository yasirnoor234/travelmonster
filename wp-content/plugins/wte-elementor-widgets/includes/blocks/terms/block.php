<?php
/**
 * Content for Terms Listing.
 *
 * @package wp-travel-engine/blocks
 */

/**
 * Template vars: $attribtues
 */
$results = array();
if ( ! empty( $attributes['listItems'] ) ) {
	$results = wte_get_terms_by_id(
		$attributes['taxonomy'],
		array(
			'taxonomy'   => $attributes['taxonomy'],
			// 'include'    => $attributes['listItems'],
			'number'     => 100,
			'hide_empty' => true,
		)
	);
	if ( ! is_array( $results ) ) {
		return;
	}
}
$taxonomies_slugs = array(
	'trip_types' => 'trip-types',
);

$taxonomy_slug = isset( $taxonomies_slugs[ $attributes['taxonomy'] ] ) ? $taxonomies_slugs[ $attributes['taxonomy'] ] : $attributes['taxonomy'];

$show_heading             = wte_array_get( $attributes, 'showTitle', false );
$show_section_description = wte_array_get( $attributes, 'showSubtitle', false );
$view_all_link            = wte_array_get( $attributes, 'viewAllLink', '' ) != '' ? trailingslashit( $attributes['viewAllLink'] ) : home_url( $taxonomy_slug );

$attributes = (object) $attributes;
if ( $results && is_array( $results ) ) :
	?>
<div class="wp-block-wptravelengine wpte-gblock-wrapper wpte-elementor-widget">
	<div class="<?php printf( 'wte-d-flex wte-layout-grid wte-col-%1$d wpte-trip-list-wrapper columns-%1$d %2$s', (int) $attributes->{'itemsPerRow'}, ( $attributes->{'cardlayout'} === 2 ) ? 'full-width' : '' ); ?>">
		<?php
		foreach ( $attributes->{'listItems'} as $term_id ) :
			if ( ! isset( $results[ (int) $term_id ] ) ) {
				continue;
			}
			$args = array( $attributes, $results[ $term_id ], $results );
			include __DIR__ . "/layouts/layout-{$attributes->cardlayout}.php";
		endforeach;
		?>
	</div>
	<?php if ( wte_array_get( (array) $attributes, 'layoutFilters.showViewAll', false ) ) : ?>
		<?php
	endif;
	?>
</div>
	<?php
else :
	echo 'No trips available. Please add a new trip.';
endif;
