<section class="numbers">
  <div class="container">
    <div class="row">
      <div class="numbers__header">
        <h2 class="title"><?php the_sub_field( 'numbers_title' ); ?></h2>
        <?php if( get_sub_field( 'numbers_subtitle' ) ) : ?>
          <div class="numbers__subtitle"><?php the_sub_field( 'numbers_subtitle' ); ?></div>
        <?php endif; ?>
      </div>
    </div>
    <div class="numbers__slider swiper-container">
      <div class="swiper-wrapper">
        <?php if ( have_rows( 'numbers_items' ) ) : ?>
          <?php while ( have_rows( 'numbers_items' ) ) : the_row(); ?>
            <div class="numbers__item swiper-slide"><?php the_sub_field( 'name' ); ?></div>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>
      <button class="arrow arrow_sm arrow_dark arrow_prev numbers__prev" type="button">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 11" fill="currentColor" width="5" height="6">
          <polygon points="0 5.5 9 0 9 11 0 5.5"></polygon>
        </svg>
      </button>
      <button class="arrow arrow_sm arrow_dark arrow_next numbers__next" type="button">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 11" fill="currentColor" width="5" height="6">
          <polygon points="9 5.5 0 0 0 11 9 5.5"></polygon>
        </svg>
      </button>
    </div>
  </div>
</section>
