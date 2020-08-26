<section class="features<?= get_sub_field( 'features_view' ) === 'big' ? ' features_main' : ' features_sub' ?>">
  <div class="container">
    <div class="row">
      <div class="features__header">
        <div class="vertical-text"><?php the_sub_field( 'features__vertical-text' ); ?></div>
        <h2 class="title features__title"><?php the_sub_field( 'features__title' ); ?></h2>
        <?php if( get_sub_field( 'features__subtitle' ) ) : ?>
          <div class="features__subtitle"><?php the_sub_field( 'features__subtitle' ); ?></div>
        <?php endif; ?>
      </div>
      <?php if ( have_rows( 'features__items' ) ) : ?>
        <div class="features__container">
          <div class="features__slider swiper-container">
            <div class="swiper-wrapper">
              <?php while ( have_rows( 'features__items' ) ) : the_row(); ?>
                <?php $icon = get_sub_field( 'icon' ); ?>
                <div class="features__item swiper-slide">
                  <?php if ( $icon ) : ?>
                    <div class="features__item-icon">
                      <img src="<?= esc_url( $icon['url'] ); ?>" alt="<?= esc_attr( $icon['alt'] ); ?>" />
                    </div>
                  <?php endif; ?>
                  <div class="features__item-title"><?php the_sub_field( 'text' ); ?></div>
                </div>
              <?php endwhile; ?>
          </div>
          <button class="arrow arrow_sm arrow_dark arrow_prev features__prev" type="button">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 11" fill="currentColor">
              <polygon points="0 5.5 9 0 9 11 0 5.5"></polygon>
            </svg>
          </button>
          <button class="arrow arrow_sm arrow_dark arrow_next features__next" type="button">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 11" fill="currentColor">
              <polygon points="9 5.5 0 0 0 11 9 5.5"></polygon>
            </svg>
          </button>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>