<section class="office">
  <div class="container">
    <div class="row">
      <div class="office__header">
        <h2 class="title"><?php the_sub_field( 'office_title' ); ?></h2>
      </div>
      <div class="office__container">
        <div class="office__slider swiper-container">
          <div class="swiper-wrapper">
            <?php if ( have_rows( 'office_gallery' ) ) : ?>
              <?php while ( have_rows( 'office_gallery' ) ) : the_row(); ?>
                <?php $slide_images = get_sub_field( 'slide' ); ?>
                <div class="office__slide swiper-slide">
                  <?php if ( $slide_images ) :  ?>
                    <?php foreach ( $slide_images as $slide_image ): ?>
                      <a class="zoom"
                         href="<?= esc_url( $slide_image['url'] ); ?>" data-fancybox>
                        <picture>
                          <source srcset="<?= esc_url( $slide_image['sizes']['545x200'] ); ?>"
                                  media="(max-width: 575px)">
                          <source srcset="<?= esc_url( $slide_image['sizes']['360x500'] ); ?>"
                                  media="(max-width: 992px)">
                          <source srcset="<?= esc_url( $slide_image['sizes']['630x355'] ); ?>"
                                  media="(max-width: 1200px)">
                          <img src="<?= esc_url( $slide_image['sizes']['750x500'] ); ?>" alt="<?= esc_attr( $slide_image['alt'] ); ?>" />
                        </picture>
                      </a>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </div>
              <?php endwhile; ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="office__bg" style="background-image: url(<?php the_sub_field( 'office_bg' ); ?>)"></div>
</section>