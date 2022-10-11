<?php

/**
 * Hero Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'hero-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'hero bg-primary';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$header = get_field('header') ?: 'Your hero here...';
$body_copy = get_field('body_copy') ?: 'Author name';
$image = get_field('image');

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
	<div class="container pt-4 pb-5 py-md-5">
		<div class="row align-items-center">
			<div class="col-12 col-md-4 col-lg-5 hero-image pb-5 scale-down">
				<?php echo wp_get_attachment_image( $image, 'full' ); ?>
			</div>
			<div class="col-12 col-md-7 col-lg-6 offset-lg-1 hero-content">
				<h1 class="h1 slide-up"><?php echo $header;?></h1>
				<p class="larger pe-lg-5 fade-up"><?php echo $body_copy;?></p>
			</div>
		</div>
	</div>
</section>