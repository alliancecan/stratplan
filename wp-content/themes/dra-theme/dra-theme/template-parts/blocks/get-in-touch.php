<?php

/**
 * Get in Touch Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'get-in-touch-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'get-in-touch';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$text = get_field('text') ?: 'Your text here...';

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
	<div class="bg-primary get-in-touch-inner">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-12 col-md-10 offset-md-1">
					<div class="d-flex flex-column flex-md-row justify-content-center align-items-center">
						<p class="larger mx-2 mx-md-0 pe-md-5 mb-5 mb-md-0 text-center text-md-left fade-up"><?php echo $text;?></p>
						<a href="<?php echo site_url();?>/get-in-touch" class="btn btn-secondary fade-left">Get in touch</a>
					</div>	

				</div>
			</div>
		</div>
	</div>
</section>