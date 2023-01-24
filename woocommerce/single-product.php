<?php get_header(); ?>

<?php

function format_single_product( $id, $img_size = 'woocommerce_thumbnail' ) {
	$product = wc_get_product( $id );

	$gallery_ids = $product->get_gallery_attachment_ids();
	$gallery = [];
	if ( $gallery_ids ) {
		foreach ( $gallery_ids as $img_id ) {
			$gallery[] = [ 
				'img' => wp_get_attachment_image_src( $img_id, $img_size )[0],
				'imageFullSize' => wp_get_attachment_image_src( $img_id, 'full' )[0],
			]
			;
		}
	}

	return [ 
		'id' => $id,
		'title' => $product->get_name(),
		'price' => $product->get_price_html(),
		'link' => $product->get_permalink(),
		'description' => $product->get_description(),
		'img' => wp_get_attachment_image_src( $product->get_image_id(), $img_size )[0],
		'imageFullSize' => wp_get_attachment_image_src( $product->get_image_id(), 'full' )[0],
		'gallery' => $gallery
	];
}
?>

<div class='container notificacao'>
	<?php wc_print_notices(); ?>
</div>

<section class="container">
	<?php
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post();
			$data['product'] = format_single_product( get_the_ID() );
			?>
			<div class="row mt-5 align-items-start">
				<div class="col-lg-7 order-lg-0 order-1 col-12">
					<div class="galery">
						<a href="<?= $data['product']['imageFullSize']; ?>" target="_blank">
							<img src="<?= $data['product']['img']; ?>" alt="<?= $data['product']['title']; ?>" class="w-100">
						</a>
						<?php
						foreach ( $data['product']['gallery'] as $image ) { ?>
							<a href="<?= $image['imageFullSize']; ?>" target="_blank">
								<img src="<?= $image['img']; ?>" alt="<?= $data['product']['title']; ?>" class="w-100">
							</a>
						<?php } ?>
					</div>
				</div>
				<div class="col-lg-5 order-lg-1 order-0 col-12 mb-lg-0 mb-5 bg-white p-5 product-info">
					<div class="info mb-5">
						<h1 class="title mb-2 fs-3">
							<?= $data['product']['title']; ?>
						</h1>
						<span class="price fs-4">
							<?= $data['product']['price']; ?>
						</span>
					</div>
					<?php if ( $data['product']['description'] ) { ?>
						<h2 class="h4">Descrição</h2>
						<p class="description mb-2">
							<?= $data['product']['description']; ?>
						</p>
					<?php } ?>
					<div class="my-5">
						<?= woocommerce_template_single_add_to_cart(); ?>
					</div>
				</div>
			</div>
			<div class="floating-btn d-none">
				<?= woocommerce_template_single_add_to_cart(); ?>
			</div>
		<?php }
	} ?>
</section>


<?php get_footer(); ?>