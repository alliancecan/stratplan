<?php
/**
 * Template Name: Blank
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package pnf
 */

get_header();
?>

	<main id="primary" class="site-main plain-page">
		<section class="py-5">
			<div class="container py-5">
				<div class="row">
					<div class="col-12">
						<?php
						while ( have_posts() ) :
							the_post();?>
							<h1 class="h1 pe-md-5"><?php the_title();?></h1>
							<?php the_content();

						endwhile; // End of the loop.
						?>
					</div>
				</div>
			</div>
		</section>		
	</main><!-- #main -->

<?php
get_footer();
