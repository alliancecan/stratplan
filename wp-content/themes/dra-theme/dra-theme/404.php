<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package pnf
 */

get_header();
?>
	<style>
		#primary{
			padding-top: 125px;

			background:rgb(50,50,47);
		}
		.error-404 {
			padding-top: 150px;
			padding-bottom: 300px;

		}
		.bg-white *{
			color: #00A880 !important;
		}
	</style>
	<main id="primary" class="site-main bg-secondary">

		<section class="error-404 not-found bg-white">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<header class="page-header">
							<h1 class="page-title text-white"><?php esc_html_e( '404: Page not found.', 'pnf' ); ?></h1>
						</header><!-- .page-header -->
			
						<div class="page-content">
							<p class="text-black"><?php esc_html_e( 'We cannot find the page your looking for.', 'pnf' ); ?></p>
								
						</div><!-- .page-content -->

					</div>
				</div>
			</div>
					</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
