<section class="promo">
  <div class="container">
    <div class="row">
      <div class="promo__header"><?php the_sub_field( 'promo_text' ); ?></div>
      <div class="promo__img">
        <?php $promo_img = get_sub_field( 'promo_img' ); ?>
        <?php if ( $promo_img ) : ?>
          <img src="<?= esc_url( $promo_img['sizes']['290x145'] ); ?>"
							 alt="<?= esc_attr( $promo_img['alt'] ); ?>"
							 width="<?= $promo_img['sizes']['290x145-width']; ?>"
							 height="<?= $promo_img['sizes']['290x145-height']; ?>" />
        <?php endif; ?>
        <?php if( get_sub_field( 'promo_link' ) ) : ?>
          <button class="arrow arrow_md arrow_dark promo__button" type="button" data-src="<?php the_sub_field( 'promo_link' ); ?>" data-fancybox>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 11" fill="currentColor">
              <polygon points="9 5.5 0 0 0 11 9 5.5"></polygon>
            </svg>
          </button>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
