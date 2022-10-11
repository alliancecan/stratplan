<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pnf
 */

?>

	<footer id="colophon" class="site-footer bg-secondary py-5">
		<!-- <a href="#masthead" id="back-to-top" class="d-none d-md-block">
			<svg id="Text" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50"><defs><style>.cls-1{fill:#fff;}.cls-2{fill:#0f3157;opacity:0.8;}.cls-3{fill:none;stroke:#fff;stroke-linecap:round;stroke-linejoin:round;stroke-width:3px;}</style></defs><circle class="cls-1" cx="25" cy="25" r="25"/><circle class="cls-2" cx="25" cy="25" r="25"/><polyline class="cls-3" points="16 27 25 19 34 27"/></svg>
		</a> -->
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-8 text-center text-md-start">
					<?php $my_current_lang = apply_filters( 'wpml_current_language', NULL );
					if($my_current_lang == 'fr'){ ?>
					<img class="footer-logo mb-3" src="<?php echo get_template_directory_uri();?>/images/Alliance_logo_French-first_reversed.png" alt="Header Logo">
					<?php }else{ ?>
					<img class="footer-logo mb-3" src="<?php echo get_template_directory_uri();?>/images/footer_logo@2x-8.png" alt="">
					<?php } ?>
												
				</div><!-- .site-info -->
				<div class="col-12 col-md-4">
					<div class="d-flex align-items-center justify-content-center  justify-content-md-end">
						<a href="<?php the_field('twitter_link', 'option'); ?>" target="_blank" rel="noopener noreferrer" class="footer-social twitter me-4">
							
						</a>
						<a href="<?php the_field('linkedin_link', 'option'); ?>" target="_blank" rel="noopener noreferrer" class="footer-social linkedin me-4">

						</a>
						<a href="<?php the_field('youtube_link', 'option'); ?>" target="_blank" rel="noopener noreferrer" class="footer-social youtube mt-1">
							
						</a>
						
					</div>					
				</div>
			</div>
			<div class="row flex-column-reverse flex-md-row align-items-center">
				<div class="col-12 col-md-8 col text-center text-md-start mt-4 mt-md-5 d-flex flex-column flex-md-row-reverse justify-content-end">
<!-- 					<p><a class="btn-link ms-md-5 btn-link" href="<?php echo site_url();?>/privacy-policy">Privacy Policy</a></p> -->
<style>
	#subfooter-menu li{
		font-size: 14px;
	}
	#subfooter-menu li a{
			    color: white;
			    font-size: 14px;
			    opacity: 0.8;		
	}
	#subfooter-menu li a{
		
	}
	.otgs-development-site-front-end{
		display: none !important;
	}
</style>
					<?php
						wp_nav_menu( array(
							'theme_location' => 'menu-2',
							'menu_id'        => 'subfooter-menu',
							'depth' => 1,
							'container' => false, 
							'menu_class' => 'list-unstyled ms-md-5 mb-0',							
						) );
					?>

					<p><?php the_field('footer_copyright', 'option'); ?></p>
				</div>
				<div class="col-12 col-md-4 text-center text-md-end">
					<?php $my_current_lang = apply_filters( 'wpml_current_language', NULL );
					if($my_current_lang == 'fr'){ ?>
						<img class="footer-logo mt-4 mt-md-0" src="<?php echo get_template_directory_uri();?>/images/CAN-FR-footer.png" alt="">
					<?php }else{ ?>
						<img class="footer-logo mt-4 mt-md-0" src="<?php echo get_template_directory_uri();?>/images/gov_logo.png" alt="">
					<?php } ?>

	
				</div>
			</div>
		</div>		
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>
