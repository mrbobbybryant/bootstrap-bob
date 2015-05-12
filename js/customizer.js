/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title settings section.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.navbar-brand' ).text( to );
		});
	});
	wp.customize('site_title_font_range', function(value){
		value.bind(function(to){
			$('.navbar-brand').css('font-size', to + 'px');
		});
	});
	wp.customize('site_title_color_setting', function(value){
		value.bind(function(to){
			$('.navbar-brand').css('color', to);
		});
	});
	// Navigation settings section.
	wp.customize('nav_font_range', function(value){
		value.bind(function(to){
			$('.nav li a').css('font-size', to + 'px');
		});
	});
	wp.customize('nav_font_color_setting', function(value){
		value.bind(function(to){
			$('.nav li a').css('color', to);
		});
	});
	wp.customize('nav_menu_button_color', function(value){
		value.bind(function(to){
			$('.navbar-toggle').css('background-color', to);
			$('.navbar-toggle').css('border-color', to);
		});
	});
	wp.customize('nav_menu_button_icon_color', function(value){
		value.bind(function(to){
			$('.navbar-toggle .icon-bar').css('background-color', to);
		});
	});
	//Welcome Title Section postMessage Controls
	wp.customize('welcome_title_textbox', function( value ) {
		value.bind(function(to) {
			$('.intro-lead-in').text(to);
		});
	});
	wp.customize('welcome_title_font_range', function(value){
		value.bind(function(to){
			$('.intro-lead-in').css('font-size', to + 'px');
		});
	});
	wp.customize('welcome_title_color_setting', function(value){
		value.bind(function(to){
			$('.intro-lead-in').css('color', to);
		});
	});
	//Subtitle Section postMessage Controls
	wp.customize('hero_subtitle_textbox', function( value ) {
		value.bind(function(to) {
			$('.intro-heading').text(to);
		});
	});
	wp.customize('hero_subtitle_font_range', function(value){
		value.bind(function(to){
			$('.intro-heading').css('font-size', to + 'px');
		});
	});
	wp.customize('subtitle_color_setting', function(value){
		value.bind(function(to){
			$('.intro-heading').css('color', to);
		});
	});
	//Hero Button Section postMessage Controls
	wp.customize('hero_button_textbox', function( value ) {
		value.bind(function(to) {
			$('a.btn-xl').text(to);
		});
	});
	wp.customize('hero_button_font_range', function(value){
		value.bind(function(to){
			$('.btn-xl').css('font-size', to + 'px');
		});
	});
	wp.customize('hero_button_font_color', function(value){
		value.bind(function(to){
			$('.btn-xl').css('color', to);
		});
	});
	wp.customize('hero_button_color_setting', function(value){
		value.bind(function(to){
			$('.btn-xl').css('border-color', to);
		});
	});
	wp.customize('hero_button_border_color', function(value){
		value.bind(function(to){
			$('.btn-xl').css('background-color', to);
		});
	});

	/**
	 * 
	 *
	 * Start of Services Section postMessage settings.
	 */
	//Services Section Title Controls
	wp.customize('services_title_textbox', function( value ) {
		value.bind(function(to) {
			$('#services .section-heading').text(to);
		});
	});
	wp.customize('services_title_font_range', function(value){
		value.bind(function(to){
			$('#services .section-heading').css('font-size', to + 'px');
		});
	});
	wp.customize('services_title_font_color', function(value){
		value.bind(function(to){
			$('#services .section-heading').css('color', to);
		});
	});
	//Services Section Subtitle Controls
	wp.customize('services_subtitle_textbox', function( value ) {
		value.bind(function(to) {
			$('#services .section-subheading').text(to);
		});
	});
	wp.customize('services_subtitle_font_range', function(value){
		value.bind(function(to){
			$('#services .section-subheading').css('font-size', to + 'px');
		});
	});
	wp.customize('services_subtitle_font_color', function(value){
		value.bind(function(to){
			$('#services h3.text-muted').css('color', to);
		});
	});
} )( jQuery );
