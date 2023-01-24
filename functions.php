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


function format_products( $products, $img_size = 'woocommerce_thumbnail' ) {
	$products_final = [];
	foreach ( $products as $product ) {
		$products_final[] = [ 
			'name' => $product->get_name(),
			'price' => $product->get_price_html(),
			'link' => $product->get_permalink(),
			'img' => wp_get_attachment_image_src( $product->get_image_id(), $img_size )[0] ];
	}
	return $products_final;
}

function cards( $dirtyProducts ) {
	$products = format_products( $dirtyProducts );

	foreach ( $products as $product ) { ?>
		<li class="col-lg-3 col-6 d-ml-block d-flex justify-content-center">
			<div class="card">
				<a href="<?= $product['link']; ?>" class="d-block">
					<div class="image mb-2">
						<img src="<?= $product['img']; ?>" alt="<?= $product['name']; ?>" class="img-fluid">
					</div>
					<h3 class="title h5 mb-2">
						<?= $product['name']; ?>
					</h3>
					<span class="price h6">
						<?= $product['price']; ?>
					</span>
				</a>
			</div>
		</li>
	<?php }
}

function essencialcalcados_loop_shop_per_page() {
	return 12;
}

add_filter( 'loop_shop_per_page', 'essencialcalcados_loop_shop_per_page' );

add_theme_support( 'woocommerce' );

?>