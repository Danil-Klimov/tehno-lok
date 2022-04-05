<section class="gallery swiper-container">
	<div class="swiper-wrapper">
		<?php $gallery_items_images = get_sub_field('gallery_items'); ?>
		<?php if ($gallery_items_images) : ?>
			<?php foreach ($gallery_items_images as $gallery_items_image): ?>
				<a class="zoom swiper-slide"
					 href="<?php echo esc_url($gallery_items_image['url']); ?>" data-fancybox="gallery">
					<img src="<?php echo esc_url($gallery_items_image['sizes']['340x340']); ?>"
							 alt="<?php echo esc_attr($gallery_items_image['alt']); ?>"
							 width="<?php echo $gallery_items_image['sizes']['340x340-width']; ?>"
							 height="<?php echo $gallery_items_image['sizes']['340x340-height']; ?>"/>
				</a>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
</section>
