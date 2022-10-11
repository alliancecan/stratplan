<?php

/**
 * Scroller Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'scroller-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'scroller bg-secondary';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$content = get_field('content') ?: 'Author name';
$image = get_field('background');

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" style="background-image:url(<?php echo wp_get_attachment_image_url( $image, 'full' ); ?>);">
	<div class="container py-5">
		<div class="row align-items-center">			
			<div id="scroller-content-<?php echo $block['id'];?>" class="col-12 col-lg-10 offset-lg-1 scroller-content">
				<?php
					if( $content ) {
						foreach( $content as $row ) {
							$text = $row['text'];
							echo '<div class="scroller-content-text text-center mb-5">';
								echo '<h4 class="text-white h4">'.$text.'</h4>';
							echo '</div>';
						}
					}
				?>
				<p class="larger pe-lg-5"><?php echo $body_copy;?></p>
			</div>
		</div>
	</div>
</section>