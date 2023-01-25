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

<body <?= body_class(); ?>>

	<header class="mx-4">
		<nav class="navbar navbar-expand-lg header px-md-4 px-1 container mt-4">
			<div class="container-fluid">
				<h1 class="navbar-brand fs-4 m-0 text-uppercase"> <a href="/">
						<?= get_bloginfo(); ?>
					</a>
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
							" href="/produto-tag/destaques">Destaques</a>
						</li>
						<li class="nav-item ms-md-4 py-lg-1 py-3">
							<a data-icon='minha-conta' href="/minha-conta">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
									class="d-lg-block d-none">
									<path
										d="M20 21V19C20 17.9391 19.5786 16.9217 18.8284 16.1716C18.0783 15.4214 17.0609 15 16 15H8C6.93913 15 5.92172 15.4214 5.17157 16.1716C4.42143 16.9217 4 17.9391 4 19V21"
										stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
									<path
										d="M12 11C14.2091 11 16 9.20914 16 7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7C8 9.20914 9.79086 11 12 11Z"
										stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
								</svg>
								<?= strtok( wp_get_current_user()->display_name, " " ); ?>
								<span class="d-lg-none nav-link">Minha conta</span>
							</a>
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
								<svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg"
									class="d-lg-block d-none">
									<path
										d="M6.90723 2.4187L3.90723 6.4187V20.4187C3.90723 20.9491 4.11794 21.4578 4.49301 21.8329C4.86809 22.208 5.37679 22.4187 5.90723 22.4187H19.9072C20.4377 22.4187 20.9464 22.208 21.3214 21.8329C21.6965 21.4578 21.9072 20.9491 21.9072 20.4187V6.4187L18.9072 2.4187H6.90723Z"
										stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
									<path d="M3.90723 6.4187H21.9072" stroke="black" stroke-width="2" stroke-linecap="round"
										stroke-linejoin="round" />
									<path
										d="M16.9072 10.4187C16.9072 11.4796 16.4858 12.497 15.7357 13.2471C14.9855 13.9973 13.9681 14.4187 12.9072 14.4187C11.8464 14.4187 10.8289 13.9973 10.0788 13.2471C9.32865 12.497 8.90723 11.4796 8.90723 10.4187"
										stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
								</svg>
								<span class="d-lg-none nav-link">Carrinho</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</header>