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
	<form id="filtro<?= $filters['id']; ?>" method="get" action="/loja">
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
<?php if ( ! empty( $products[0] ) ) { ?>

	<div class="container pesquisa bg-white p-3 mt-5 mb-3">
		<form method="get" id="searchForm" action="<?= bloginfo( 'url' ); ?>/loja">
			<input class="text" type="text" name="s" id="s" placeholder="Nike preto ..." />
			<button>
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path
						d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z"
						stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
					<path d="M21 21L16.65 16.65" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
				</svg>
				Pesquisar
			</button>
		</form>
	</div>

	<section class="container produtos shadow-none">
		<div class="row">
			<div class="col-lg-3 col-12 bg-transparent nav-position">
				<nav class="navbar navbar-expand-lg">
					<div class="container-fluid">
						<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".filtros"
							aria-controls="filtros" aria-expanded="false" aria-label="Toggle navigation">
							Filtros
						</button>
						<div class="collapse navbar-collapse flex-column align-items-start fs-5 mx-3 accordion filtros">
							<div class="accordion-item bg-transparent border-0 rounded-0 w-100">
								<h2 class="accordion-header border-0" id="accordion-filtro1">
									<button class="accordion-button fs-5 text-black border-0 bg-transparent px-0 rounded-0 shadow-none"
										type="button" data-bs-toggle="collapse" data-bs-target="#filtro-categorias" aria-expanded="true"
										aria-controls="filtro-categorias">
										Categorias
									</button>
								</h2>
								<div id="filtro-categorias" class="accordion-collapse collapse show" aria-labelledby="accordion-filtro1">
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
								<h2 class="accordion-header border-0" id="accordion-filtro2">
									<button class="accordion-button fs-5 text-black border-0 bg-transparent px-0 rounded-0 shadow-none"
										type="button" data-bs-toggle="collapse" data-bs-target="#filtro-preco" aria-expanded="true"
										aria-controls="filtro-preco">
										Preço
									</button>
								</h2>
								<div id="filtro-preco" class="accordion-collapse collapse show" aria-labelledby="accordion-filtro2">
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
			<div class="col-lg-9 col-12 bg-white p-3 cards d-flex flex-column">
				<div class="row my-3 mb-5">
					<?php woocommerce_catalog_ordering(); ?>
				</div>
				<ul class="row g-4 list-unstyled">
					<?= cards( $products ); ?>
				</ul>
				<?= get_the_posts_pagination( [ 'mid_size' => 2, 'prev_next' => false ] ) ?>
			</div>
		</div>
	</section>

<?php } else { ?>
	<div class="container fs-3 my-5 text-center">
		<p class="d-block">Nenhum resultado foi encontrado para esta busca.</p>
		<a href="/loja" class="btn-primary btn">Voltar para loja</a>
	</div>
<?php } ?>


<?php get_footer(); ?>