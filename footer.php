<?php

function get_attachment_url_by_slug( $slug ) {
	$args = array(
		'post_type' => 'attachment',
		'name' => sanitize_title( $slug ),
		'posts_per_page' => 1,
		'post_status' => 'inherit',
	);
	$_header = get_posts( $args );
	$header = $_header ? array_pop( $_header ) : null;
	return $header ? wp_get_attachment_url( $header->ID ) : '';
}

function get_social_media_info( $name ) {
	$social_info = get_field( $name );

	if ( empty( $social_info['nome'] ) || empty( $social_info['link'] ) )
		return null;

	return [ 
		'name' => $social_info['nome'],
		'img' => get_attachment_url_by_slug( $social_info['nome'] . "Logo" ),
		'link' => $social_info['link']
	];

}

function social_media( $data ) {
	$social_info = get_social_media_info( $data );
	if ( ! $social_info )
		return null;
	?>
	<li>
		<a href="<?= $social_info['link']; ?>" class="d-flex align-items-center mb-4">
			<img src="<?= $social_info['img']; ?>" width="32" height="32" alt="" class="me-3">
			<span>
				<?= $social_info['name']; ?>
			</span>
		</a>
	</li>
<?php } ?>

<?php

function diferencial_footer( $name ) {
	$diferencial = get_field( $name );
	if ( empty( $diferencial['frase_apoio'] ) || empty( $diferencial['frase_destaque'] ) )
		return null;
	?>
	<li class="my-3">
		<span>
			<?= $diferencial['frase_apoio'] ?>
		</span>
		<span>
			<?= $diferencial['frase_destaque'] ?>
		</span>
	</li>
<?php }

function executivos_footer( $name ) {
	$executivo = get_field( $name );
	if ( empty( $executivo['nome'] ) || empty( $executivo['contato'] ) )
		return null;
	?>
	<li class="my-3">
		<span>
			<?= $executivo['nome'] ?>:
		</span>
		<span>
			<?=" " . $executivo['contato'] ?>
		</span>
	</li>
<?php }

?>


<footer class="bg-white p-4 mt-5">
	<div class="container footer row justify-content-center">
		<div class="col-md-4 col-12 mb-md-0 mb-4 row">
			<div class="content">
				<h2 class="text-uppercase fs-4 mb-3">
					<?= get_bloginfo(); ?>
				</h2>
				<ul class="list-unstyled">
					<?= print_r( get_field( 'rede_social_1' ) ) ?>
					<?= social_media( 'rede_social_1' ); ?>
					<?= social_media( 'rede_social_2' ); ?>
					<?= social_media( 'rede_social_3' ); ?>
				</ul>
			</div>

		</div>
		<div class="col-md-4 col-12 mb-md-0 mb-4 row">
			<div class="content">
				<h2 class="text-uppercase fs-4 mb-3">Diferenciais</h2>
				<ul class="list-unstyled">
					<?= diferencial_footer( 'diferencial_1' ); ?>
					<?= diferencial_footer( 'diferencial_2' ); ?>
					<?= diferencial_footer( 'diferencial_3' ); ?>
				</ul>
			</div>

		</div>
		<div class="col-md-4 col-12 mb-md-0 mb-4 row">
			<div class="content">
				<h2 class="text-uppercase fs-4 mb-3">Nossos Executivos</h2>
				<ul class="list-unstyled">
					<?= executivos_footer( 'executivo_1' ); ?>
					<?= executivos_footer( 'executivo_2' ); ?>
					<?= executivos_footer( 'executivo_3' ); ?>
				</ul>
			</div>

		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
<script src="<?= get_template_directory_uri(); ?>/assets/js/bootstrap.bundle.min.js"></script>
<script src="<?= get_template_directory_uri(); ?>/assets/js/script.js"></script>

</html>