<?php

add_filter('genesis_footer_creds_text', 'conditional_footer_creds_filter');
function conditional_footer_creds_filter( $creds ) {
if ( is_front_page() ) {
	$creds = '&copy; 2018 &middot; <a href="http://mydomain.com">My Custom Link</a> &middot; Built on the <a href="http://www.studiopress.com/themes/genesis" title="Genesis Framework">Genesis Framework</a>';
	return $creds;
	} else {
	$creds = sprintf( '<p>%s<span class="dashicons dashicons-heart"></span>%s<a href="http://www.studiopress.com/">%s</a></p>',  __( 'Handcrafted with ', 'filter' ), __( ' on the', 'filter' ), __( ' Genesis Framework', 'filter' ) );
	return $creds;
	}
}


?>
