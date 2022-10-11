<?php

/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'testimonial-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'testimonial bg-light-gray';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$text = get_field('testimonial') ?: 'Your testimonial here...';
$author = get_field('author_name') ?: 'Author name';
$role = get_field('author_role') ?: 'Author role';
$image = get_field('image') ?: null;

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
	<div class="container">
		<div class="row ">
			<div class="col-12 col-md-3 col-lg-3">
				<h3 class="h3 text-primary mt-2 fade-right">What they say</h3>
			</div>
			<div class="col-12 col-md-9 col-lg-7 ">
				<blockquote class="testimonial-blockquote fade-up">
					<span class="testimonial-text"><?php echo $text; ?></span>        
				</blockquote>
				<div class="d-flex flex-column flex-sm-row align-items-sm-center mt-4 fade-up">
					<div class="testimonial-image pe-4 mb-4 mb-sm-0">
						<?php echo wp_get_attachment_image( $image, 'full' ); ?>
					</div>
					<div>
						<span class="testimonial-author"><?php echo $author; ?></span><br/>
						<span class="testimonial-role"><?php echo $role; ?></span>
					</div>
				</div>
			</div>
		</div>
	</div>
    
</section>