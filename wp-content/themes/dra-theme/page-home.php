<?php
/**
 * Template Name: Base
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
<style>
	.two_three_wysiwyg_split .d-flex.align-items-start > p{
		flex-shrink: 0;
	}
	.slick-slider .bg-secondary a{
		color: white !important;
	}
</style>

	<main id="primary" class="site-main base-page">
		<section class="feature-image d-flex bg-secondary align-items-center justify-content-center">
			<?php $feature_image_d = get_field('feature_image_desktop');?>
			<?php $feature_image_t = get_field('feature_image_tablet');?>
			<?php $feature_image_m = get_field('feature_image_mobile');?>
			<style>
				.feature-image{					
					background-image:url(<?php echo $feature_image_d['url'];?>);					
				}
				@media screen and (max-width:990px) {
					.feature-image{
						background-image:url(<?php echo $feature_image_t['url'];?>);	
					}
				}
				@media screen and (max-width:767px) {
					.feature-image{
						background-image:url(<?php echo $feature_image_m['url'];?>);	
					}
				}
			</style>
			<div class="container">
				<div class="row">
					<div class="col-12 col-md-9 col-lg-6 fade-up">
						<h1 class="h1 ">
							<?php the_field('feature_title');?>							
						</h1>
						<p><?php the_field('feature_body');?></p>
					</div>
				</div>
			</div>
<!--
			<?php if(is_page(2)){ ?>		
				<div class="feature-signup d-flex justify-content-between align-items-center py-4 px-4 fade-up">
					<div class="py-1 pe-4">
						<strong class="h5"><?php the_field('sign_up_title', 'option'); ?></strong>
						<p class="mb-0 d-none d-md-block"><?php the_field('sign_up_copy', 'option'); ?></p>
					</div>
					<div>
						<a href="<?php the_field('sign_up_button_url', 'option'); ?>" class="btn btn-secondary"><?php the_field('sign_up_button_text', 'option'); ?></a>
					</div>
				</div>
			<?php } ?>
-->
		</section>
		
		
						<?php
						while ( have_posts() ) :
							the_post();

							// Check value exists.
							if( have_rows('repeating_content') ):

								// Loop through rows.
								while ( have_rows('repeating_content') ) : the_row();

									
									if( get_row_layout() == 'intro_heading_copy_split' ): 
										?>
										<section class="py-5">
											<div class="container py-xl-5 ">
												<div class="row">
													<div class="col-12 col-lg-5 fade-up">
														<h2 class="h2"><?php the_sub_field('left_column');?></h2>
													</div>
													<div class="col-12 col-lg-7 fade-up">
													<?php the_sub_field('right_column');?>
													</div>
												</div>
											</div>
										</section>	
										<?php
										// Do something...

									
									elseif( get_row_layout() == 'video_copy_split' ): 
										?>
										<section class="bg-secondary triangles-bg video_copy_split">
											<div class="container ">
												<div class="row align-items-center">
													<div class="col-12 col-lg-6 col-xl-7">
														<?php the_sub_field('video');?>
													</div>
													<div class="col-12 col-lg-6 col-xl-5 py-5 fade-up">
														<?php the_sub_field('right_copy');?>
													</div>
												</div>
											</div>
										</section>
										<?php
										// Do something...
									
									elseif( get_row_layout() == '2__1_copy_image_split' ): 
										?>
										<section class="py-5">
											<div class="container py-xl-5 ">
												<div class="row flex-column-reverse flex-md-row align-items-start align-items-xl-center">
													<div class="col-12 col-md-7 col-xl-6 mt-5 mt-md-0 fade-up">
														<?php the_sub_field('left_content');?>
													</div>
													<div class="col-12 col-md-5 col-xl-5 offset-xl-1 py-xl-5 fade-up">
														<?php 
															$image = get_sub_field('right_image');															
															echo wp_get_attachment_image($image['id'],'full');
														?>
													</div>
												</div>
											</div>
										</section>
									<?php
									// Do something...
									elseif( get_row_layout() == 'full_image_headline' ): 
										?>
										<section class="py-5 bg-secondary full_image_headline">
											<?php $full_image_headline = get_sub_field('image');?>
											<?php //$feature_image_t = get_field('feature_image_tablet');?>
											<?php //$feature_image_m = get_field('feature_image_mobile');?>
											<style>
												.full_image_headline{
													background-size:cover;
													background-repeat:no-repeat;					
													background-position:center center;					
													background-image:url(<?php echo $full_image_headline['url'];?>);					
												}
												@media screen and (max-width:990px) {
													.full_image_headline{
														background-image:url(<?php echo $full_image_headline['url'];?>);	
													}
												}
												@media screen and (max-width:767px) {
													.full_image_headline{
														background-image:url(<?php echo $full_image_headline['url'];?>);	
													}
												}
											</style>
											
													<div class="col-12 col-lg-12 col-xl-8 py-5 ps-4 pe-4 pe-xl-0 ps-xl-5 ms-xl-5 fade-up">
														<h2 class="h1 py-xl-5"><?php the_sub_field('headline');?></h2>
													</div>													
												
										</section>
									<?php
									// Do something...
									
									elseif( get_row_layout() == 'message_from' ): 
										?>
										<section class="py-5">
											<div class="container">
												<div class="row gx-md-5">
												<?php 
													if( have_rows('message') ): ?>
														<?php 
														while( have_rows('message') ): the_row(); ?>
															<div class="col-12 col-xl-6 mt-5 fade-up text-center text-md-start">
																<?php $image = get_sub_field('thumbnail');															
																echo wp_get_attachment_image($image['id'],'full');?>
																<div class="mt-4 text-start">
																<?php the_sub_field('message_copy');?>
																</div>
															</div>
														<?php endwhile; ?>
													<?php endif; //if( get_sub_field('items') ): ?>
												</div>
											</div>
										</section>
									
									<?php
									elseif( get_row_layout() == 'slider' ): 
										?>
									<section class="slick-slider">
				
													
													<?php if( have_rows('slide') ): ?>
														<?php 
														while( have_rows('slide') ): the_row(); ?>
																<?php $image = get_sub_field('image');?>														
																
															<div class="bg-secondary" style="background-image:url(<?php echo $image['url'];?>);">
																<div class="container">
																	<div class="row  py-5">
																		<div class="col-md-10 offset-md-1 col-12 py-5 mb-xl-5">
																			<?php the_sub_field('content');?>
																		</div>
																	</div>
																</div>
															</div>
														<?php endwhile; ?>
													<?php endif; //if( get_sub_field('items') ): ?>

									</section>
									<?php
									// Do something...									
									elseif( get_row_layout() == 'full_video' ): 
										?>
										<section class=" mb-5 pb-lg-5">
											<div class="container ">
												<div class="row align-items-center">
													<div class="col-12 col-xl-8 offset-xl-2 fade-up">
														<?php the_sub_field('video');?>
													</div>													
												</div>
											</div>
										</section>
										
										<?php
										// Do something...
									

									elseif( get_row_layout() == '2__3_wysiwyg_split' ): 
										?>
										<section class="py-5 two_three_wysiwyg_split <?php the_sub_field('background');?>">
											<div class="container py-xl-5">
												<div class="row <?php if(get_sub_field('testimonial')){echo 'no-sticky';}?>">
													<div class="col-12 col-lg-5 col-xl-4 fade-up">
														<?php the_sub_field('left_column');?>
													</div>
													<div class="col-12 col-lg-6 col-xl-7 offset-lg-1 mt-4 mt-lg-0 fade-up">
														<?php the_sub_field('right_column');?>														
													</div>
													<?php if( have_rows('testimonial') ): ?>
															<?php 
															while( have_rows('testimonial') ): the_row(); ?>
															<div class="col-12">
																<div class="testimonial w-100 px-0 mt-5 d-flex flex-column flex-md-row align-items-center">
																	<?php $image = get_sub_field('image');?>
																	<?php echo wp_get_attachment_image($image['id'],'full');?>
																	<div class="p-4 p-md-5">
																		<p class="copy">
																			<?php the_sub_field('copy');?>
																		</p>
																		<p class="name mb-0">
																			<strong><?php the_sub_field('name');?></strong><br/>																		
																			<?php the_sub_field('sub_title');?>
																		</p>
																	</div>
																</div>		
															</div>																																																													
															<?php endwhile; ?>
														<?php endif; //if( get_sub_field('items') ): ?>
												</div>
											</div>
										</section>	


										<?php
									// Do something...
									elseif( get_row_layout() == 'full_image_learn_more' ): 
										?>
										<section class="py-5 bg-secondary full_image_learn_more">
											<?php $full_image_headline = get_sub_field('image');?>
											<?php //$feature_image_t = get_field('feature_image_tablet');?>
											<?php //$feature_image_m = get_field('feature_image_mobile');?>
											<style>
												.full_image_learn_more{
													background-size:cover;
													background-repeat:no-repeat;					
													background-position:center center;					
													background-image:url(<?php echo $full_image_headline['url'];?>);					
												}
												@media screen and (max-width:990px) {
													.full_image_learn_more{
														background-image:url(<?php echo $full_image_headline['url'];?>);	
													}
												}
												@media screen and (max-width:767px) {
													.full_image_learn_more{
														background-image:url(<?php echo $full_image_headline['url'];?>);	
													}
												}
											</style>
												<div class="container py-5">
													<div class="row">
														<div class="col-12 col-lg-12 col-xl-8 py-xl-5 <?php the_sub_field('text_position');?> <?php if(get_sub_field('text_position') == 'text-center') { echo 'offset-xl-2'; }?>">
															<?php the_sub_field('copy');?>
														</div>													
													</div>
												</div>												
										</section>
									<?php
									// Do something...
									elseif( get_row_layout() == 'dropdown' ): 
										?>
											<section class="pb-5 mb-5">
												<div class="container">
													<div class="row">
														<div class="col-12 text-center fade-up">
															<div class="dropdown dropdown-secondary">
																<button class="dropdown-toggle"><?php the_sub_field('button_title');?></button>
																<ul class="dropdown-menu">
																<?php 
																	if( have_rows('links') ): ?>
																		<?php 
																		while( have_rows('links') ): the_row(); ?>
																			<li><a href="<?php the_sub_field('link');?>"><?php the_sub_field('label');?></a></li>
																		<?php endwhile; ?>
																	<?php endif; //if( get_sub_field('items') ): ?>																	
																</ul>
															</div>
														</div>
													</div>
												</div>
											</section>									
										<?php
										// Do something...
									// Do something...
									elseif( get_row_layout() == 'single_download' ): 
										?>
											<section class="pb-5 mb-5">
												<div class="container">
													<div class="row">
														<div class="col-12 text-center fade-up">
															<a href="<?php the_sub_field('button_link');?>" class="btn btn-primary"><?php the_sub_field('button_title');?></a>															
														</div>
													</div>
												</div>
											</section>									
										<?php
										// Do something...
									endif;									
								// End loop.
								endwhile;

							// No value.
							else :
								// Do something...
							endif;
						endwhile; // End of the loop.
						?>
						<section class="bg-primary py-5">
							<div class="container">
								<div class="row">
									<div class="col-12 d-flex flex-column flex-md-row align-items-md-end py-5">
										<div class="me-4 me-md-5">
											<h2 class="h2"><?php the_field('sign_up_title', 'option'); ?></h2>
											<p class="mb-md-0"><?php the_field('sign_up_copy', 'option'); ?></p>
										</div>
										<div>
											<a href="<?php the_field('sign_up_button_url', 'option'); ?>" class="btn btn-secondary"><?php the_field('sign_up_button_text', 'option'); ?></a>
										</div>
									</div>
								</div>
							</div>
						</section>
	
	</main><!-- #main -->

<?php
get_footer();
