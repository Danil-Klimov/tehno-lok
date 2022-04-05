<?php
/*
Template Name: Проекты
Template Post Type: page
*/
?>

<?php get_header(); ?>

<?php get_template_part('template-parts/partial/breadcrumbs'); ?>

<?php get_template_part('template-parts/partial/page-header'); ?>

<?php get_template_part('template-parts/partial/filter'); ?>

<section id="projects">
	<?php $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
	$query = new WP_Query([
		'post_type' => 'page',
		'post_parent' => get_the_ID(),
		'posts_per_page' => -1,
		'paged' => $paged,
		'publish' => true,
		'category_name' => 'dlya-sporta'
	]); ?>

	<?php if ($query->have_posts()) : ?>
		<?php while ($query->have_posts()): $query->the_post(); ?>
			<section
				class="our-projects our-projects_clean<?php echo $query->current_post == 0 ? ' our-projects__w-filter' : ''; ?>">
				<div class="our-projects__wrapper">
					<div class="container">
						<div class="row">
							<div class="our-projects__body big-square">
								<div class="our-projects__inner">
									<div class="our-projects__img">
										<div class="our-projects__img-slider-w-nav swiper-container">
											<div class="swiper-wrapper">
												<?php $project_gallery_images = get_field('project-gallery'); ?>
												<?php if ($project_gallery_images) : ?>
													<?php foreach ($project_gallery_images as $project_gallery_image): ?>
														<div class="swiper-slide">
															<a href="<?php echo esc_url($project_gallery_image['url']); ?>" data-fancybox>
																<img src="<?php echo esc_url($project_gallery_image['sizes']['450x450']); ?>"
																		 alt="<?php echo esc_attr($project_gallery_image['alt']); ?>"
																		 width="<?php echo $project_gallery_image['sizes']['450x450-width']; ?>"
																		 height="<?php echo $project_gallery_image['sizes']['450x450-height']; ?>"/>
															</a>
															<div class="our-projects__img-footer">
																<div
																	class="our-projects__img-caption"><?php echo esc_html($project_gallery_image['caption']); ?></div>
															</div>
														</div>
													<?php endforeach; ?>
												<?php endif; ?>
											</div>
											<div class="our-projects__controls">
												<button class="arrow arrow_sm arrow_light arrow_prev" type="button">
													<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 11" fill="currentColor" width="5"
															 height="6">
														<polygon points="0 5.5 9 0 9 11 0 5.5"></polygon>
													</svg>
												</button>
												<button class="arrow arrow_sm arrow_light arrow_next" type="button">
													<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 11" fill="currentColor" width="5"
															 height="6">
														<polygon points="9 5.5 0 0 0 11 9 5.5"></polygon>
													</svg>
												</button>
											</div>
										</div>
										<div class="our-projects__img-nav swiper-container">
											<div class="swiper-wrapper">
												<?php if ($project_gallery_images) : ?>
													<?php foreach ($project_gallery_images as $project_gallery_image): ?>
														<img class="swiper-slide"
																 src="<?php echo esc_url($project_gallery_image['sizes']['105x110']); ?>"
																 alt="<?php echo esc_attr($project_gallery_image['alt']); ?>"
																 width="<?php echo $project_gallery_image['sizes']['105x110-width']; ?>"
																 height="<?php echo $project_gallery_image['sizes']['105x110-height']; ?>">
													<?php endforeach; ?>
												<?php endif; ?>
											</div>
										</div>
									</div>
									<div class="our-projects__content">
										<a class="our-projects__title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										<div class="our-projects__text"><?php the_field('project-description'); ?></div>
									</div>
								</div>
								<div class="vertical-text">ПРОЕКТЫ</div>
							</div>
						</div>
					</div>
					<div class="our-projects__bg-element our-projects__bg-element_left"
							 style="background-image: url(<?php the_post_thumbnail_url('full'); ?>)"></div>
					<div class="our-projects__bg-element our-projects__bg-element_right"
							 style="background-image: <?php echo $query->current_post % 2 ? 'linear-gradient(270deg, rgba(0,151,209, 0.2) 0%, rgba(0,151,209, 0.2) 100%),' : ''; ?> url(<?php echo get_template_directory_uri() ?>/assets/images/our-projects-right-bg.jpg)"></div>
				</div>
			</section>
		<?php endwhile; ?>
	<?php endif;
	wp_reset_query(); ?>
</section>
<script>
	var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
	var posts = '<?php echo json_encode($query->query_vars); ?>';
	var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
	var max_pages = '<?php echo $query->max_num_pages; ?>';
	var parent = '<?php echo $query->query_vars['post_parent']; ?>';
</script>
<!--TODO глянуть пагинацию-->
<?php //if (  $query->max_num_pages > 1 ) : ?>
<!--  <div class="row">-->
<!--    <div class="button button_empty posts__button">ПОКАЗАТЬ ЕЩЕ</div>-->
<!--  </div>-->
<?php //endif; ?>

<?php get_template_part('template-parts/partial/blocks'); ?>

<?php get_footer(); ?>
