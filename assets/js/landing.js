( function () {
	'use strict';

	// FAQ accordion — single item open at a time, matches design handoff behavior.
	function initFaq() {
		var items = document.querySelectorAll( '.wl-faq-item' );

		items.forEach( function ( item ) {
			var trigger = item.querySelector( '.wl-faq-question' );
			var icon = item.querySelector( '.wl-faq-icon' );

			if ( ! trigger ) {
				return;
			}

			trigger.addEventListener( 'click', function () {
				var isOpen = item.classList.contains( 'is-open' );

				items.forEach( function ( other ) {
					other.classList.remove( 'is-open' );
					var otherIcon = other.querySelector( '.wl-faq-icon' );
					if ( otherIcon ) {
						otherIcon.textContent = '+';
					}
				} );

				if ( ! isOpen ) {
					item.classList.add( 'is-open' );
					if ( icon ) {
						icon.textContent = '−';
					}
				}
			} );
		} );
	}

	// Smooth scroll for in-page nav anchors.
	function initSmoothScroll() {
		document.querySelectorAll( 'a[href^="#"]' ).forEach( function ( link ) {
			link.addEventListener( 'click', function ( e ) {
				var targetId = link.getAttribute( 'href' ).slice( 1 );
				var target = document.getElementById( targetId );
				if ( target ) {
					e.preventDefault();
					target.scrollIntoView( { behavior: 'smooth', block: 'start' } );
				}
			} );
		} );
	}

	if ( document.readyState === 'loading' ) {
		document.addEventListener( 'DOMContentLoaded', function () {
			initFaq();
			initSmoothScroll();
		} );
	} else {
		initFaq();
		initSmoothScroll();
	}
} )();
