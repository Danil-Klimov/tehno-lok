<section class="reviews">
	<div class="container">
		<div class="row">
			<div class="reviews__header">
				<div class="vertical-text"><?php the_sub_field('reviews_vertical-text'); ?></div>
				<h2 class="title reviews__title"><?php the_sub_field('reviews_title'); ?></h2>
				<?php $reviews_link = get_sub_field('reviews_link'); ?>
				<?php if ($reviews_link) : ?>
					<div class="reviews__link">
						<a href="<?php echo esc_url($reviews_link['url']); ?>"
							 target="<?php echo esc_attr($reviews_link['target']); ?>">
							<?php echo esc_html($reviews_link['title']); ?>
						</a>
					</div>
				<?php endif; ?>
			</div>
			<div class="reviews__container">
				<div class="reviews__slider swiper-container">
					<div class="swiper-wrapper">
						<?php $reviews_items = get_sub_field('reviews_items'); ?>
						<?php if ($reviews_items) : ?>
							<?php foreach ($reviews_items as $post) : ?>
								<?php setup_postdata($post); ?>
								<a class="reviews__item zoom swiper-slide" href="#rev_<?php echo $post->ID ?>" data-fancybox>
									<?php the_post_thumbnail('195x275'); ?>
								</a>
							<?php endforeach; ?>
							<?php wp_reset_postdata(); ?>
						<?php endif; ?>
					</div>
				</div>
				<button class="arrow arrow_md arrow_dark arrow_next reviews__next" type="button">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 11" fill="currentColor">
						<polygon points="9 5.5 0 0 0 11 9 5.5"></polygon>
					</svg>
				</button>
				<button class="arrow arrow_md arrow_dark arrow_prev reviews__prev" type="button">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 11" fill="currentColor">
						<polygon points="0 5.5 9 0 9 11 0 5.5"></polygon>
					</svg>
				</button>
			</div>
		</div>
	</div>
	<?php if ($reviews_items) : ?>
		<?php foreach ($reviews_items as $post) : ?>
			<?php setup_postdata($post); ?>
			<div class="reviews__modal" id="rev_<?php echo $post->ID ?>">
				<div class="reviews__modal-inner">
					<?php $thumbnail_id = get_post_thumbnail_id($post->ID);
					$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); ?>
					<div class="reviews__modal-img">
						<img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php echo $alt; ?>">
					</div>
					<div class="reviews__modal-content">
						<div class="reviews__name"><?php the_title(); ?></div>
						<?php the_content(); ?>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
		<?php wp_reset_postdata(); ?>
	<?php endif; ?>
</section>
