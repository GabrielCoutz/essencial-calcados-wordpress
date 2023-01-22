<!DOCTYPE html>
<html lang="pt-BR">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>
		<?= get_bloginfo(); ?>
	</title>
	<?php wp_head(); ?>
	<link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/style.css">
</head>

<body class="<?= body_class(); ?>">

	<header class="mx-4">
		<nav class="navbar navbar-expand-lg header px-md-4 px-1 container mt-4">
			<div class="container-fluid">
				<h1 class="navbar-brand fs-4 m-0 text-uppercase"> <a href="/">Essencial Calçados</a>
				</h1>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
					aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse justify-content-end" id="navbarNav">
					<ul class="navbar-nav align-items-lg-center align-items-end fs-5">
						<li class="nav-item ms-md-4 py-lg-1 py-3">
							<a class="nav-link 
							<?php
							if ( is_page( 'loja' ) ) {
								echo ( 'active' );
							} ?>
							" href="/loja">Todos produtos</a>
						</li>
						<li class="nav-item ms-md-4 py-lg-1 py-3">
							<a class="nav-link 
							<?php
							if ( is_page( 'destaques' ) ) {
								echo ( 'active' );
							} ?>
							" href="/destaques">Destaques</a>
						</li>
						<li class="nav-item ms-md-4 py-lg-1 py-3">
							<a class="nav-link 
							<?php
							if ( is_page( 'contato' ) ) {
								echo ( 'active' );
							} ?>
							" href="/contato">Contato</a>
						</li>
						<li class="nav-item ms-md-4 py-lg-1 py-3 d-flex align-items-center">

							<a href="/carrinho" data-icon='carrinho' class="p-2">
								<?php
								$cart_count = WC()->cart->get_cart_contents_count();
								if ( $cart_count ) { ?>
									<span class="carrinho-count">
										<?= $cart_count; ?>
									</span>
								<?php } ?>
								<svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path
										d="M6.90723 2.4187L3.90723 6.4187V20.4187C3.90723 20.9491 4.11794 21.4578 4.49301 21.8329C4.86809 22.208 5.37679 22.4187 5.90723 22.4187H19.9072C20.4377 22.4187 20.9464 22.208 21.3214 21.8329C21.6965 21.4578 21.9072 20.9491 21.9072 20.4187V6.4187L18.9072 2.4187H6.90723Z"
										stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
									<path d="M3.90723 6.4187H21.9072" stroke="black" stroke-width="2" stroke-linecap="round"
										stroke-linejoin="round" />
									<path
										d="M16.9072 10.4187C16.9072 11.4796 16.4858 12.497 15.7357 13.2471C14.9855 13.9973 13.9681 14.4187 12.9072 14.4187C11.8464 14.4187 10.8289 13.9973 10.0788 13.2471C9.32865 12.497 8.90723 11.4796 8.90723 10.4187"
										stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
								</svg>
							</a>
							<span class="d-lg-none">Carrinho</span>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</header>