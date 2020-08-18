<?php
/*
Template Name: Проект
Template Post Type: page
*/
?>

<?php get_header(); ?>

<?php get_template_part( 'blocks/breadcrumbs' ); ?>

<?php get_template_part( 'blocks/page-header' ); ?>

<?php get_template_part( 'blocks/projects-menu' ); ?>

<section class="our-projects our-projects_clean">
  <div class="our-projects__wrapper">
    <div class="container">
      <div class="row">
        <div class="our-projects__body big-square">
          <div class="our-projects__inner">
            <div class="our-projects__img">
              <div class="our-projects__img-slider-w-nav swiper-container">
                <div class="swiper-wrapper">
                  <?php $project_gallery_images = get_field( 'project-gallery' ); ?>
                  <?php if ( $project_gallery_images ) :  ?>
                    <?php foreach ( $project_gallery_images as $project_gallery_image ): ?>
                      <div class="swiper-slide">
                        <a href="<?= esc_url( $project_gallery_image['url'] ); ?>" data-fancybox>
                          <img src="<?= esc_url( $project_gallery_image['sizes']['450x450'] ); ?>"
                               alt="<?= esc_attr( $project_gallery_image['alt'] ); ?>" />
                        </a>
                        <div class="our-projects__img-footer">
                          <div class="our-projects__img-caption"><?= esc_html( $project_gallery_image['caption'] ); ?></div>
                        </div>
                      </div>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </div>
                <div class="our-projects__controls">
                  <button class="arrow arrow_sm arrow_light arrow_prev" type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 11" fill="currentColor">
                      <polygon points="0 5.5 9 0 9 11 0 5.5"></polygon>
                    </svg>
                  </button>
                  <button class="arrow arrow_sm arrow_light arrow_next" type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 11" fill="currentColor">
                      <polygon points="9 5.5 0 0 0 11 9 5.5"></polygon>
                    </svg>
                  </button>
                </div>
              </div>
              <div class="our-projects__img-nav swiper-container">
                <div class="swiper-wrapper">
                  <?php if ( $project_gallery_images ) :  ?>
                    <?php foreach ( $project_gallery_images as $project_gallery_image ): ?>
                      <img class="swiper-slide"
                           src="<?= esc_url( $project_gallery_image['sizes']['105x110'] ); ?>"
                           alt="<?= esc_attr( $project_gallery_image['alt'] ); ?>">
                    <?php endforeach; ?>
                  <?php endif; ?>
                </div>
              </div>
            </div>
            <div class="our-projects__content">
              <a class="our-projects__title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              <div class="our-projects__text"><?php the_field( 'project-description' ); ?></div>
            </div>
          </div>
          <div class="vertical-text">ПРОЕКТЫ</div>
        </div>
      </div>
    </div>
    <div class="our-projects__bg-element our-projects__bg-element_left" style="background-image: url(<?php the_post_thumbnail_url('full'); ?>)"></div>
    <div class="our-projects__bg-element our-projects__bg-element_right" style="background-image: url(<?= get_template_directory_uri() ?>/img/our-projects-right-bg.jpg)"></div>
  </div>
</section>

<?php get_template_part( 'blocks/_blocks' ); ?>

<?php get_footer(); ?>
