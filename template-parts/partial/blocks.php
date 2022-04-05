<?php if (have_rows('blocks')): ?>
	<?php while (have_rows('blocks')) : the_row(); ?>
		<?php if (get_row_layout() == 'block_about') : get_template_part('template-parts/blocks/about'); ?>
		<?php elseif (get_row_layout() == 'block_faq') : get_template_part('template-parts/blocks/faq'); ?>
		<?php elseif (get_row_layout() == 'block_features') : get_template_part('template-parts/blocks/features'); ?>
		<?php elseif (get_row_layout() == 'block_gallery') : get_template_part('template-parts/blocks/gallery'); ?>
		<?php elseif (get_row_layout() == 'block_interview') : get_template_part('template-parts/blocks/interview'); ?>
		<?php elseif (get_row_layout() == 'block_news') : get_template_part('template-parts/blocks/news'); ?>
		<?php elseif (get_row_layout() == 'block_numbers') : get_template_part('template-parts/blocks/numbers'); ?>
		<?php elseif (get_row_layout() == 'block_office') : get_template_part('template-parts/blocks/office'); ?>
		<?php elseif (get_row_layout() == 'block_our-projects') : get_template_part('template-parts/blocks/our-projects'); ?>
		<?php elseif (get_row_layout() == 'block_our-projects-for-prices') : get_template_part('template-parts/blocks/our-projects-for-prices'); ?>
		<?php elseif (get_row_layout() == 'block_posts') : get_template_part('template-parts/blocks/posts'); ?>
		<?php elseif (get_row_layout() == 'block_promo') : get_template_part('template-parts/blocks/promo'); ?>
		<?php elseif (get_row_layout() == 'block_request') : get_template_part('template-parts/blocks/request'); ?>
		<?php elseif (get_row_layout() == 'block_reviews') : get_template_part('template-parts/blocks/reviews'); ?>
		<?php elseif (get_row_layout() == 'block_serv-descr') : get_template_part('template-parts/blocks/serv-descr'); ?>
		<?php elseif (get_row_layout() == 'block_team') : get_template_part('template-parts/blocks/team'); ?>
		<?php elseif (get_row_layout() == 'block_text') : get_template_part('template-parts/blocks/text'); ?>
		<?php elseif (get_row_layout() == 'block_types') : get_template_part('template-parts/blocks/types'); ?>
		<?php elseif (get_row_layout() == 'block_video-block') : get_template_part('template-parts/blocks/video-block'); ?>
		<?php endif; ?>
	<?php endwhile; ?>
<?php endif; ?>
