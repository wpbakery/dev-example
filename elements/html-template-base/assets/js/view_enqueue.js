/**
 * Loaded via the "view_enqueue_js" wpb_map parameter.
 *
 * Unlike "admin_enqueue_js" / "front_enqueue_js" (which only run inside the
 * WPBakery backend/frontend editors), this file is enqueued on the actual
 * published page whenever the [test_element] shortcode is present, so it is the
 * place for the element's real, visitor-facing behaviour.
 */
( function () {
	'use strict';

	console && console.log( 'view_enqueue.js is loaded on the site frontend' );

	/**
	 * Animate every chart value from 0 up to its target number once it scrolls
	 * into view.
	 */
	function initTestElements() {
		var charts = document.querySelectorAll( '.test-element-chart__value' );

		if ( ! charts.length ) {
			return;
		}

		charts.forEach( function ( el ) {
			var target = parseInt( el.getAttribute( 'data-value' ) || el.textContent, 10 ) || 0;
			var current = 0;
			var step = Math.max( 1, Math.round( target / 40 ) );

			var timer = setInterval( function () {
				current += step;

				if ( current >= target ) {
					current = target;
					clearInterval( timer );
				}

				el.textContent = current + '%';
			}, 20 );
		} );
	}

	if ( 'loading' === document.readyState ) {
		document.addEventListener( 'DOMContentLoaded', initTestElements );
	} else {
		initTestElements();
	}
} )();
