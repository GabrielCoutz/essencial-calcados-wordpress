<?php
// Template name: Home
get_header(); ?>


<?php

function diferencial_model( $diferencial_key ) {
	$diferencial = get_field( $diferencial_key );
	?>

	<li class="col m-0">
		<div class="d-flex flex-column text-center align-items-center g-3 justify-content-center">
			<h2 class="fs-5 apoio">
				<?= $diferencial['frase_apoio']; ?>
			</h2>
			<div class="d-flex flex-nowrap align-items-center">
				<span class="h2 destaque">
					<?= $diferencial['frase_destaque']; ?>
				</span>
				<img src="<?= $diferencial['icone']; ?>" alt="" class="ms-3 mb-2">
			</div>
		</div>
	</li>
<?php }


?>

<?php if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); ?>
		<section class="container intro">
			<h1 class="text-center fs-1 w-75 mx-auto">
				<?= get_field( 'frase_introducao' ); ?>
			</h1>
		</section>

		<section class="container diferenciais border-5 border-top border-bottom py-5">
			<ul class="list-unstyled row g-5 m-0">
				<?= diferencial_model( 'diferencial_1' ); ?>
				<?= diferencial_model( 'diferencial_2' ); ?>
				<?= diferencial_model( 'diferencial_3' ); ?>
			</ul>
		</section>
	<?php }
} ?>
<?php get_footer(); ?>