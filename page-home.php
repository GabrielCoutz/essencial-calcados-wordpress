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


		<?php
		$data['products'] = wc_get_products( [ 
			'limit' => 12,
		] );

		?>

		<main class="container bg-white produtos p-md-4 py-md-5 p-2 py-3 d-flex align-items-center flex-column">
			<h2 class="fs-2 text-uppercase text-center mb-5 mt-4 mt-md-0">Nossos produtos</h2>
			<ul class="cards row g-4 list-unstyled">
				<?= cards( $data['products'] ); ?>
			</ul>
			<a class="btn btn-primary my-3" href="/loja">Ver mais</a>
		</main>

	<?php }
} ?>
<?php get_footer(); ?>