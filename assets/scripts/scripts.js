$( document ).ready( function() {

	$( '.statement h5' ).click(function() {

		$( this ).toggleClass( 'addBottomBorder' );
		$( this ).siblings( '.statement-content' ).slideToggle('fast');
		$( this ).parent().toggleClass( 'statement-clicked' );

	});

	$( '#edit-button' ).click(function() {

		$( '#edit-options-container' ).slideToggle('fast');

	});

});