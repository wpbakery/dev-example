<?php
/**
 * HTML template for rendering custom element.
 *
 * @var array $atts
 * @var string $content
 * @var WPBakeryShortCode_Test_Element $this
 */

$attributes = ( shortcode_atts( [
	'value'       => 100,
	'bgcolor'     => '#e0e4e1',
	'actcolor'    => '#9fcb61',
	'cssanim'     => true,
	'showstroke'  => false,
	'strokecolor' => '#fff',
	'strokewidth' => 2,
	'innerfill'   => 50,
	'radius'      => 50,
], $atts ) );

$value = (int) $attributes['value'];
if ( $value > 100 ) {
	$value = 100;
} elseif ( $value < 0 ) {
	$value = 0;
}

// Enqueue Custom CSS Style
// Must be previously registered in constructor (class WPBakeryShortCode_Test_Element extends WPBakeryShortCode).
wp_enqueue_style( 'test_element_css' );

// attributes for html.
$radius       = 2 * (int) $attributes['radius'];
$val1         = $value;
$val2         = 100 - $value;
$col1         = $attributes['actcolor'];
$col2         = $attributes['bgcolor'];
$animation    = ( $this->check_bool( $attributes['cssanim'] ) ? 'true' : 'false' );
$show_stroke  = ( $this->check_bool( $attributes['showstroke'] ) ? 'true' : 'false' );
$stroke_color = $attributes['strokecolor'];
$stroke_width = (int) $attributes['strokewidth'];
$inner_fill   = (int) $attributes['innerfill'];

?>

<canvas class="piechartex" height="<?php echo esc_attr( $radius ); ?>"
		width="<?php echo esc_attr( $radius ); ?>"
		data-value-first="<?php echo esc_attr( $val1 ); ?>"
		data-value-second="<?php echo esc_attr( $val2 ); ?>"
		data-value-first-color="<?php echo esc_attr( $col1 ); ?>"
		data-value-second-color="<?php echo esc_attr( $col2 ); ?>"
		data-animation="<?php echo esc_attr( $animation ); ?>"
		data-segment-stroke-show="<?php echo esc_attr( $show_stroke ); ?>"
		data-segment-stroke-color="<?php echo esc_attr( $stroke_color ); ?>"
		data-segment-stroke-width="<?php echo esc_attr( $stroke_width ); ?>"
		data-percentage-inner-cutout="<?php echo esc_attr( $inner_fill ); ?>"></canvas>

<div class="your_content_from_textarea_html">
	<?php echo wp_kses_post( wpb_js_remove_wpautop( $content, true ) ); ?>
</div>

