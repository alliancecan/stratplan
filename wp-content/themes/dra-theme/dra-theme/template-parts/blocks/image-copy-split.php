<?php

/**
 * Image / Copy Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'image-copy-split-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'image-copy-split';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$heading = get_field('heading') ?: 'Your heading here...';
$image_position = get_field('image_position') ?: 'left';
$image_col_size = get_field('image_size') == 3 ? 'col-md-3' : 'col-md-4';
$content_col_size = get_field('image_size') == 3 ? 'col-md-7': 'col-md-6';
$pre_heading = get_field('pre_heading') ?: null;
$button = get_field('button') ?: null;
$body_copy = get_field('body_copy') ?: null;
$image = get_field('image');

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
	<div class="container py-5">
		<div class="row  align-items-center <?php echo $image_position == 'left' ? '' : 'flex-md-row-reverse' ?>">
			<div class="col-12 <?php echo $image_col_size;?> offset-md-1 image pb-5 scale-down">
				<?php echo wp_get_attachment_image( $image, 'full' ); ?>
			</div>
			<div class="col-12 <?php echo $content_col_size;?> offset-md-1 content">
				<?php if($pre_heading){?> <h3 class="h3 mb-4 fade-right"><?php echo $pre_heading;?></h3> <?php } ?>
				<h2 class="h2 mb-4 fade-right"><?php echo $heading;?></h2>
				<div class="fade-up">
					<?php echo $body_copy;?>
					<?php if($button){?> <a  href="<?php echo esc_url( $button['url'] ); ?>" target="<?php echo esc_attr( $button['target'] ); ?>" class="btn btn-secondary mt-4 mt-md-5"><?php echo $button['title'];?></a> <?php } ?>
				</div>

								
			</div>
		</div>
	</div>
</section>