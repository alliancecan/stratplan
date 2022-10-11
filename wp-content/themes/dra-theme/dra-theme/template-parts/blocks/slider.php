<?php

/**
 * slider Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'slider-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'slider ';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$slide_title = get_field('slider_title') ?: null;
$slides = get_field('slider') ?: 'Author name';
$nav_slides = get_field('slider_nav') ?: 'Author name';

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
	<?php if($slide_title){ ?>
	<div class="container pb-5">
		<div class="row">
			<div class="col-12 text-center">
				<h2 class="h2"><?php echo $slide_title;?></h2>
			</div>
		</div>
	</div>
	<?php } ?>
	<div id="slider-nav-<?php echo $block['id'];?>" class="slider-nav d-none d-lg-block">	
		<?php
			if( $nav_slides ) {
				foreach( $nav_slides as $row ) { ?>
					<div class="text-center slider-fade-up pb-5">
						<div class="reg">
							<?php echo wp_get_attachment_image( $row['image'], 'full' ); ?><br/>
						</div>
						<?php if($row['image_active']){?>
						<div class="active">
							<?php echo wp_get_attachment_image( $row['image_active'], 'full' ); ?><br/>
						</div>
						<?php } ?>
						<strong><?php echo $row['label'];?></strong>
					</div>
				<?php 
				}
			}
		?>
	</div>
	<div id="slider-content-<?php echo $block['id'];?>" class="slider-content slider-fade-up d-none d-lg-block">	
		<?php
			if( $slides ) {
				foreach( $slides as $row ) { ?>
					<div>
						<?php echo wp_get_attachment_image( $row['image'], 'full' ); ?>
						<div class="slider-content-copy">
							<h4 class="h4"><?php echo $row['title'];?></h4>
							<?php if($row['sub_title']){ ?>
								<h3 class="h3 text-white mb-3"><?php echo $row['sub_title'];?></h3>
							<?php } ?>
							<p><?php echo $row['copy'];?></p>
						</div>
					</div>
				<?php 
				}
			}
		?>
	</div>

	<div class="accordion d-block d-lg-none" id="accordion">
		<?php
		if( $slides ) {
			foreach( $slides as $key=>$row ) { 
				$nav_row = $nav_slides[$key]?>
				<div class="accordion-item">
					<h2 class="accordion-header" id="heading<?php echo $key;?>">
					<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $key;?>" aria-expanded="true" aria-controls="collapse<?php echo $key;?>">
						<div class="d-flex align-items-center text-left">
							<div>
								<div class="reg">
									<?php echo wp_get_attachment_image( $nav_row['image'], 'full' ); ?><br/>
								</div>
								<?php if($nav_row['image_active']){?>
								<div class="active">
									<?php echo wp_get_attachment_image( $nav_row['image_active'], 'full' ); ?><br/>
								</div>
								<?php } ?>
							</div>
							
							<strong><?php echo $nav_row['label'];?></strong>
						</div>
					</button>
					</h2>
					<div id="collapse<?php echo $key;?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo $key;?>" data-bs-parent="#accordion">
					<div class="accordion-body">
					<?php echo wp_get_attachment_image( $row['image'], 'full' ); ?>
						<div class="accordian-content-copy">
							<h4 class="h4"><?php echo $row['title'];?></h4>
							<?php if($row['sub_title']){ ?>
								<h3 class="h3 text-white mb-3"><?php echo $row['sub_title'];?></h3>
							<?php } ?>
							<p><?php echo $row['copy'];?></p>
						</div>
					</div>
					</div>
				</div>

				<?php 
				}
			}
		?>
	</div>
	

	<script>
	jQuery( document ).ready(function($) {
		 $('#slider-content-<?php echo $block['id'];?>').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: true,
			fade: false,
			asNavFor: '#slider-nav-<?php echo $block['id'];?>'
		});
		$('#slider-nav-<?php echo $block['id'];?>').slick({
			slidesToShow: 8,
			slidesToScroll: 1,
			asNavFor: '#slider-content-<?php echo $block['id'];?>',
			dots: false,
			arrow:false,
			centerMode: false,
			focusOnSelect: true
		});
	});
	</script>
</section>