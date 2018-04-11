/**
 * Metabox Media: upload.js
 * Author: Bearsthemes
 * Author URI: http://beasthemes.com
 * Email: bearsthemes@gmail.com
 * Version: 1.0
 */
 
! ( function( $ ) {
	'use strict';
	
	/**
	 * consulta_MetaField_OpenMedia
	 */
	function consulta_MetaField_OpenMedia(title, button_text, opts, callback) {
		var custom_uploader = wp.media({
	        title: title,
	        button: {
	            text: button_text
	        },
	        multiple: opts.multiple
	    })
	    .on('select', function() {
	        var attachment = custom_uploader.state().get('selection').toJSON();
	        callback.call(this, attachment);
	    })
	    .open();
	}
	
	/**
	 * consulta_MetaField_MediaHandle
	 *
	 */
	function consulta_MetaField_MediaHandle() {
		var $consulta_upload_button = $( '.consulta_upload_button' );
		$consulta_upload_button.each( function() {
			$( this ).on( 'click', function() {
				var $this = $( this ),
					$input = $this.parent().find( 'input.upload_field' ),
					opts = { multiple: false },
					images_obj = [];
				
				consulta_MetaField_OpenMedia('Select Logo', 'Select Logo', opts, function( result ) {
					$.each(result, function(index, item) {
						images_obj.push( item.url );
					})
					
					$input.val( images_obj.join( ',' ) );
				})
			} )
		} )
	}
	
	$( function() {
		consulta_MetaField_MediaHandle();
	} )
} )( jQuery )