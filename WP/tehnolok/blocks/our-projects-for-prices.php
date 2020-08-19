<?php $title_left = get_sub_field( 'our-projects-f-p_title' )[ 'left' ];
$title_right = get_sub_field( 'our-projects-f-p_title' )[ 'right' ];
$vertical_text = get_sub_field( 'our-projects-f-p_vertical-text' );
$our_projects_f_p_link = get_sub_field( 'our-projects-f-p_link' ); ?>

<?php $our_projects_f_p_items = get_sub_field( 'our-projects-f-p_items' ); ?>
<?php if( $our_projects_f_p_items ) : ?>
  <?php foreach( $our_projects_f_p_items as $key => $post ) : ?>
    <?php setup_postdata( $post ); ?>
    <section class="our-projects our-projects_clean<?= $key % 2 ? ' our-projects_backwards' : '' ?>">
      <div class="our-projects__wrapper">
        <div class="container">
          <div class="row">
            <?php if( $key === 0 ) : ?>
              <div class="our-projects__header">
                <h2 class="title"><?= $title_left ?></h2>
                <h2 class="title"><?= $title_right ?></h2>
              </div>
            <?php endif; ?>
            <div class="our-projects__body big-square">
              <div class="our-projects__inner">
                <div class="our-projects__img our-projects__img-slider swiper-container">
                  <div class="swiper-wrapper">
                    <?php $project_gallery_images = get_field( 'project-gallery' ); ?>
                    <?php if( $project_gallery_images ) : ?>
                      <?php foreach( $project_gallery_images as $project_gallery_image ): ?>
                        <div class="swiper-slide">
                          <a href="<?= esc_url( $project_gallery_image[ 'url' ] ); ?>" data-fancybox>
                            <img src="<?= esc_url( $project_gallery_image[ 'sizes' ][ '450x450' ] ); ?>"
                                 alt="<?= esc_attr( $project_gallery_image[ 'alt' ] ); ?>"/>
                          </a>
                          <div class="our-projects__img-footer">
                            <div class="our-projects__img-caption"><?= esc_html( $project_gallery_image[ 'caption' ] ); ?></div>
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
                <div class="our-projects__content">
                  <a class="our-projects__title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                  <div class="our-projects__text"><?php the_field( 'project-description' ); ?></div>
                </div>
              </div>
              <?php if( $key === 0) : ?>
                <div class="vertical-text"><?= $vertical_text; ?></div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="our-projects__bg-element our-projects__bg-element_left"
             style="background-image: url(<?php the_post_thumbnail_url( 'full' ); ?>)"></div>
        <div class="our-projects__bg-element our-projects__bg-element_right"
             style="background-image: url(<?= get_template_directory_uri() ?>/img/our-projects-right-bg.jpg)"></div>
      </div>
      <?php if( $key === count($our_projects_f_p_items) - 1 ) : ?>
        <div class="container">
          <div class="row">
            <div class="our-projects__buttons">
              <?php if ( $our_projects_f_p_link ) : ?>
                <a class="button button_empty"
                   href="<?= esc_url( $our_projects_f_p_link['url'] ); ?>"
                   target="<?= esc_attr( $our_projects_f_p_link['target'] ); ?>"><?= esc_html( $our_projects_f_p_link['title'] ); ?></a>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php endif; ?>
    </section>
  <?php endforeach; ?>
  <?php wp_reset_postdata(); ?>
<?php endif; ?>

