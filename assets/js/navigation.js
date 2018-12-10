/* global systemorphScreenReaderText */
/**
 * Theme functions file.
 *
 * Contains handlers for navigation and widget area.
 */

(function( $ ) {
	var masthead, menuToggle, siteNavContain, siteNavigation;

	function initMainNavigation( container ) {

		// Add dropdown toggle that displays child menu items.
		// var dropdownToggle = $( '<button />', { 'class': 'dropdown-toggle', 'aria-expanded': false })
		// 	.append( systemorphScreenReaderText.icon )
		// 	.append( $( '<span />', { 'class': 'screen-reader-text', text: systemorphScreenReaderText.expand }) );

		// container.find( '.menu-item-has-children > a, .page_item_has_children > a' ).after( dropdownToggle );

		// Set the active submenu dropdown toggle button initial state.
		container.find( '.current-menu-ancestor > a' )
			.addClass( 'toggled-on' )
			.attr( 'aria-expanded', 'true' )
			.find( '.screen-reader-text' )
			.text( systemorphScreenReaderText.collapse );
		// Set the active submenu initial state.
		container.find( '.current-menu-ancestor > .sub-menu' ).addClass( 'toggled-on' );


		$( 'body' ).click( function( e ) {
			var _this = $( e.target );

			if (!_this.is(menuToggle)){
				var isTopMenuClicked = _this.is(masthead) || _this.parents("#masthead").length;
				var isTopMenuLinkClicked = _this.is(container.find( '.menu-link-header > a' ));
				var shouldOpenMenu =  isTopMenuLinkClicked && !_this.parents( '.menu-item, .page_item' ).hasClass('focus') || window.matchMedia('(max-width: 1024px)').matches;

				if (!isTopMenuClicked || isTopMenuLinkClicked){
					masthead.find( '.menu-item, .page_item' ).removeClass('focus');
					masthead.removeClass( 'menu--open' );
				}

				if (isTopMenuLinkClicked){
					_this.toggleClass( 'toggled-on' );
					_this.next( '.children, .sub-menu' ).toggleClass( 'toggled-on' );
					e.preventDefault();

					_this.attr( 'aria-expanded', _this.attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );

					if (shouldOpenMenu){
						var screenReaderSpan = _this.find( '.screen-reader-text' );

						masthead.addClass( 'menu--open' );
						_this.parents( '.menu-item, .page_item' ).addClass( 'focus' );

						screenReaderSpan.text( screenReaderSpan.text() === systemorphScreenReaderText.expand ? systemorphScreenReaderText.collapse : systemorphScreenReaderText.expand );
					}
				}
			}
		});
	}

	initMainNavigation( $( '.main-navigation' ) );

	masthead       = $( '#masthead' );
	menuToggle     = masthead.find( '.menu-toggle' );
	siteNavContain = masthead.find( '.main-navigation' );
	siteNavigation = masthead.find( '.main-navigation > div > ul' );

	// Enable menuToggle.
	(function() {

		// Return early if menuToggle is missing.
		if ( ! menuToggle.length ) {
			return;
		}

		// Add an initial value for the attribute.
		menuToggle.attr( 'aria-expanded', 'false' );

		menuToggle.on( 'click.systemorph', function() {
			siteNavContain.toggleClass( 'toggled-on' );
			masthead.toggleClass( 'menu--open' );

			$( this ).attr( 'aria-expanded', siteNavContain.hasClass( 'toggled-on' ) );
		});
	})();

	// Fix sub-menus for touch devices and better focus for hidden submenu items for accessibility.
	(function() {
		if ( ! siteNavigation.length || ! siteNavigation.children().length ) {
			return;
		}

		// Toggle `focus` class to allow submenu access on tablets.
		function toggleFocusClassTouchScreen() {
			if ( 'none' === $( '.menu-toggle' ).css( 'display' ) ) {

				$( document.body ).on( 'touchstart.systemorph', function( e ) {
					if ( ! $( e.target ).closest( '.main-navigation li' ).length ) {
						$( '.main-navigation li' ).removeClass( 'focus' );
					}
				});

				siteNavigation.find( '.menu-item-has-children > a, .page_item_has_children > a' )
					.on( 'touchstart.systemorph', function( e ) {
						var el = $( this ).parent( 'li' );

						if ( ! el.hasClass( 'focus' ) ) {
							masthead.addClass( 'menu--open' );
							e.preventDefault();
							el.toggleClass( 'focus' );
							el.siblings( '.focus' ).removeClass( 'focus' );

						}
					});

			} else {
				siteNavigation.find( '.menu-item-has-children > a, .page_item_has_children > a' ).unbind( 'touchstart.systemorph' );
			}
		}

		if ( 'ontouchstart' in window ) {
			$( window ).on( 'resize.systemorph', toggleFocusClassTouchScreen );
			toggleFocusClassTouchScreen();
		}

		/*siteNavigation.find( 'a' ).on( 'focus.systemorph blur.systemorph', function() {
			$( this ).parents( '.menu-item, .page_item' ).toggleClass( 'focus' );
			masthead.toggleClass( 'menu--open' );
		});*/
	})();
})( jQuery );