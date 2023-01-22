<?php
function Tryvary_prefix_remove_default_images( $sizes ) {
	unset( $sizes['thumbnail'] );
	unset( $sizes['small'] );
	unset( $sizes['medium'] );
	unset( $sizes['large'] );
	unset( $sizes['medium_large'] );
	unset( $sizes['1536x1536'] );
	unset( $sizes['2048x2048'] );
	return $sizes;
}
add_filter( 'intermediate_image_sizes_advanced', 'Tryvary_prefix_remove_default_images' );

?>