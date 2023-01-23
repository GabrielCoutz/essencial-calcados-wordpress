<?php get_header(); ?>
<?php
$products = [];

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		$products[] = wc_get_product( get_the_ID() );
	?>
	<?php }
} ?>

<?php
function price_filter( $filters ) { ?>
	<form id="filtro<?= $filters['id']; ?>">
		<input type="hidden" class="d-none" name="f" value='<?= $filters['id']; ?>' />
		<?php if ( ! empty( $filters['max_price'] ) ) { ?>
			<input type="hidden" name="max_price" value='<?= $filters['max_price']; ?>' />
		<?php } ?>
		<?php if ( ! empty( $filters['min_price'] ) ) { ?>
			<input type="hidden" name="min_price" value='<?= $filters['min_price']; ?>' />
		<?php } ?>
		<button class="border-0 bg-transparent d-flex align-items-center mt-2">
			<?= $filters['label'] ?>
		</button>
	</form>
<?php }
?>

<div class='container breadcrumb'>
	<?php woocommerce_breadcrumb( [ 'delimiter' => ' > ' ] ); ?>
</div>

<section class="container produtos shadow-none">
	<div class="row">
		<div class="col-lg-3 col-12 bg-transparent nav-position">
			<nav class="navbar navbar-expand-lg">
				<div class="container-fluid">
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#filtros"
						aria-controls="filtros" aria-expanded="false" aria-label="Toggle navigation">
						Filtros
					</button>
					<div class="collapse navbar-collapse flex-column align-items-start fs-5 mx-3 accordion" id="filtros">
						<div class="accordion-item bg-transparent border-0 rounded-0 w-100">
							<h2 class="accordion-header border-0" id="filtro1">
								<button class="accordion-button fs-5 text-black border-0 bg-transparent px-0 rounded-0 shadow-none"
									type="button" data-bs-toggle="collapse" data-bs-target="#filtro-categorias" aria-expanded="true"
									aria-controls="filtro-categorias">
									Categorias
								</button>
							</h2>
							<div id="filtro-categorias" class="accordion-collapse collapse show" aria-labelledby="filtro1">
								<div class="accordion-body p-0 pt-2">
									<?php wp_nav_menu( [ 
										'menu' => 'categorias',
										'menu_class' => 'filtro-cat navbar-nav list-unstyled flex-column',
										'container' => false
									] ); ?>
								</div>
							</div>
						</div>
						<hr>
						<div class="accordion-item bg-transparent border-0 rounded-0 w-100">
							<h2 class="accordion-header border-0" id="filtro2">
								<button class="accordion-button fs-5 text-black border-0 bg-transparent px-0 rounded-0 shadow-none"
									type="button" data-bs-toggle="collapse" data-bs-target="#filtro-preco" aria-expanded="true"
									aria-controls="filtro-preco">
									Preço
								</button>
							</h2>
							<div id="filtro-preco" class="accordion-collapse collapse show" aria-labelledby="filtro2">
								<div class="accordion-body p-0 pt-2">
									<?= price_filter( [ 
										'id' => '1',
										'max_price' => '50',
										'label' => 'Até R$ 50'
									] ) ?>
									<?= price_filter( [ 
										'id' => '2',
										'min_price' => '50',
										'max_price' => '100',
										'label' => 'R$ 50 - R$ 100'
									] ) ?>
									<?= price_filter( [ 
										'id' => '3',
										'min_price' => '100',
										'max_price' => '300',
										'label' => 'R$ 100 - R$ 300'
									] ) ?>
									<?= price_filter( [ 
										'id' => '4',
										'min_price' => '300',
										'label' => 'Acima de R$ 300'
									] ) ?>
								</div>
							</div>
						</div>

					</div>
				</div>
			</nav>
		</div>
		<div class="col-lg-9 col-12 bg-white p-3 cards">
			<ul class="row g-4 list-unstyled">
				<?= cards( $products ); ?>
			</ul>
		</div>
	</div>

</section>



<?php get_footer(); ?>