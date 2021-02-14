(function( $ ) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */


	jQuery(function($){
 
		// on upload button click
		$('body').on( 'click', '.mrcat-upl', function(e){
	 
			e.preventDefault();
	 
			var button = $(this),
			custom_uploader = wp.media({
				title: 'Insert image',
				library : {
					// uploadedTo : wp.media.view.settings.post.id, // attach to the current post?
					type : 'image'
				},
				button: {
					text: 'Use this image' // button label text
				},
				multiple: false
			}).on('select', function() { // it also has "open" and "close" events
				var attachment = custom_uploader.state().get('selection').first().toJSON();
				button.html('<img src="' + attachment.url + '">').next().val(attachment.id).next().show();
			}).open();
	 
		});
	 
		// on remove button click
		$('body').on('click', '.mrcat-rmv', function(e){
	 
			e.preventDefault();
	 
			var button = $(this);
			button.next().val(''); // emptying the hidden field
			button.hide().prev().html('Upload image');
		});
	 
	});

})( jQuery );
