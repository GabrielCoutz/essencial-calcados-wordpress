<?php
// Template name: Home
get_header(); ?>
<?php
$products = [];

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		$products[] = wc_get_product( get_the_ID() );
	?>
	<?php }
} ?>

<pre>
						<?= print_r( $products ); ?>
					</pre>
foi
<?php get_footer(); ?>