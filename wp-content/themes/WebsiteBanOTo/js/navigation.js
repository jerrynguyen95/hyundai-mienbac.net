/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {
	// var container, button, menu, links, i, len;

	// container = document.getElementById( 'site-navigation' );
	// if ( ! container ) {
	// 	return;
	// }

	// button = container.getElementsByTagName( 'button' )[0];
	// if ( 'undefined' === typeof button ) {
	// 	return;
	// }

	// menu = container.getElementsByTagName( 'ul' )[0];

	// // Hide menu toggle button if menu is empty and return early.
	// if ( 'undefined' === typeof menu ) {
	// 	button.style.display = 'none';
	// 	return;
	// }

	// menu.setAttribute( 'aria-expanded', 'false' );
	// if ( -1 === menu.className.indexOf( 'nav-menu' ) ) {
	// 	menu.className += ' nav-menu';
	// }

	// button.onclick = function() {
	// 	if ( -1 !== container.className.indexOf( 'toggled' ) ) {
	// 		container.className = container.className.replace( ' toggled', '' );
	// 		button.setAttribute( 'aria-expanded', 'false' );
	// 		menu.setAttribute( 'aria-expanded', 'false' );
	// 	} else {
	// 		container.className += ' toggled';
	// 		button.setAttribute( 'aria-expanded', 'true' );
	// 		menu.setAttribute( 'aria-expanded', 'true' );
	// 	}
	// };

	// // Get all the link elements within the menu.
	// links    = menu.getElementsByTagName( 'a' );

	// // Each time a menu link is focused or blurred, toggle focus.
	// for ( i = 0, len = links.length; i < len; i++ ) {
	// 	links[i].addEventListener( 'focus', toggleFocus, true );
	// 	links[i].addEventListener( 'blur', toggleFocus, true );
	// }

	// *
	//  * Sets or removes .focus class on an element.
	 
	// function toggleFocus() {
	// 	var self = this;

	// 	// Move up through the ancestors of the current link until we hit .nav-menu.
	// 	while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

	// 		// On li elements toggle the class .focus.
	// 		if ( 'li' === self.tagName.toLowerCase() ) {
	// 			if ( -1 !== self.className.indexOf( 'focus' ) ) {
	// 				self.className = self.className.replace( ' focus', '' );
	// 			} else {
	// 				self.className += ' focus';
	// 			}
	// 		}

	// 		self = self.parentElement;
	// 	}
	// }

	// /**
	//  * Toggles `focus` class to allow submenu access on tablets.
	//  */
	// ( function( container ) {
	// 	var touchStartFn, i,
	// 		parentLink = container.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

	// 	if ( 'ontouchstart' in window ) {
	// 		touchStartFn = function( e ) {
	// 			var menuItem = this.parentNode, i;

	// 			if ( ! menuItem.classList.contains( 'focus' ) ) {
	// 				e.preventDefault();
	// 				for ( i = 0; i < menuItem.parentNode.children.length; ++i ) {
	// 					if ( menuItem === menuItem.parentNode.children[i] ) {
	// 						continue;
	// 					}
	// 					menuItem.parentNode.children[i].classList.remove( 'focus' );
	// 				}
	// 				menuItem.classList.add( 'focus' );
	// 			} else {
	// 				menuItem.classList.remove( 'focus' );
	// 			}
	// 		};

	// 		for ( i = 0; i < parentLink.length; ++i ) {
	// 			parentLink[i].addEventListener( 'touchstart', touchStartFn, false );
	// 		}
	// 	}
	// }( container ) );

	/*
		Custom jquery
		Author: Jerry
		Date: 2018/06/03
	*/
	// var menuItem = document.getElementsByClassName('menu-item-has-children');
	// var subMenuItem;
	// var position;
	// var before;
	// for(var i = 0; i < menuItem.length ; i++){
	// 	var item = menuItem[i];
	// 	if(!item){
	// 		return;
	// 	}

	// 	item.addEventListener('mouseenter', function(){
	// 		subMenuItem = item.querySelector('.sub-menu');
	// 		before = window.getComputedStyle(
	// 			this, ':before'
	// 		);
	// 		position = item.getBoundingClientRect();
	// 		if(subMenuItem){
	// 			subMenuItem.style.left = '-' + (position.left - 85) + 'px';
	// 			subMenuItem.style.opacity = '1';
	// 			before.opacity = '1';
	// 		}
	// 	}, true);

	// 	item.addEventListener('mouseout', function(){
	// 		subMenuItem = item.querySelector('.sub-menu');
	// 		position = item.getBoundingClientRect();

	// 		if(subMenuItem){
	// 			subMenuItem.style.opacity = '0';
	// 			before.opacity = '0';
	// 		}
	// 	}, true);
	// }

	// Show hide small button
	var smallMenu = document.getElementById('small-menu');
	var button = document.getElementById('icon-menu');
	var close = document.getElementById('close');
	var body = document.getElementsByTagName('body');
	var flagToggle = true;

	button.addEventListener('click', function(){
		if(flagToggle){
			smallMenu.style.display = 'block';
			body[0].style.height = '100%';
			body[0].style.overflow = 'hidden';
		}
		else{
			smallMenu.style.display = 'none';
			body[0].style.height = 'auto';
			body[0].style.overflow = 'auto';
		}
		
		flagToggle = !flagToggle;
	});

	close.addEventListener('click', function(){
		smallMenu.style.display = 'none';
		body[0].style.height = 'auto';
		body[0].style.overflow = 'auto';
		
		flagToggle = !flagToggle;
	});

	var menuScroll = $("#scroll-menu");

	// Show menu when scroll
	$(document).scroll(function() {
		var scrollPosition = $(this).scrollTop();
		

		if(scrollPosition > 700){
			$('#top').css('display','block');
		}
		else{
			$('#top').css('display','none');
		}

		if(scrollPosition >= 500){
			menuScroll.addClass('menu-scroll');
			if($("#wpadminbar").length){
				menuScroll.css("top","32px");
			}

			return;
		}
		else{
			menuScroll.removeClass('menu-scroll');

			if($("#wpadminbar").length){
				menuScroll.css("top","0");
			}

			return;
		}
	});


	$('#top').click(function(){
		$('html,body').animate({
			scrollTop: 0
		},500);
	});
	
	document.getElementById('lean_overlay').addEventListener('click',function(){
		document.getElementById('lean_overlay').style.display = 'none';
		document.getElementsByClassName('popupContainer')[0].style.display = 'none';
		$('#lean_overlay').css('opacity','0');
		$('.popupContainer').css('opacity','0');
	});
	
	$('.buttonRegist').click(function(){
		$('#lean_overlay').css('display','block');
		$('.popupContainer').css('display','block');
		$('#lean_overlay').css('opacity','0.6');
		$('.popupContainer').css('opacity','1');
	});
	
	var flagClickSmallMenu = true;

	$('#small-menu .main-navigation ul li').click(function(){
		if(flagClickSmallMenu){
			$(this).find('ul.sub-menu').removeClass('hide');
			$(this).find('ul.sub-menu').addClass('show');
		}
		else{
			$(this).find('ul.sub-menu').removeClass('show');
			$(this).find('ul.sub-menu').addClass('hide');
		}
		
		flagClickSmallMenu  = !flagClickSmallMenu;
	});
	
	$('#small-menu').click(function(e){
		var container = $(".contain");

		if (!container.is(e.target) && container.has(e.target).length === 0)
		{
			smallMenu.style.display = 'none';
			body[0].style.height = 'auto';
			body[0].style.overflow = 'auto';

			flagToggle = !flagToggle;
		}
	});

} )();