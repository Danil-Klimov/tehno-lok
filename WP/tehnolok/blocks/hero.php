<section class="hero" style="background-image: url(<?php the_field( 'hero_bg' ); ?>)">
  <div class="container">
    <div class="row">
      <div class="hero__offer">
        <div class="vertical-text"><?php the_field( 'hero_vertical-text' ); ?></div>
        <div class="hero__content"><?php the_field( 'hero_content' ); ?></div>
      </div>
    </div>
    <?php if ( have_rows( 'hero_cats' ) ) : ?>
      <div class="row">
        <div class="hero__cats">
          <?php while ( have_rows( 'hero_cats' ) ) : the_row(); ?>
            <?php $img = get_sub_field( 'img' ); ?>
            <?php $link = get_sub_field( 'link' ); ?>
            <a class="hero__cats-item"
               href="<?= esc_url( $link['url'] ); ?>"
               target="<?php echo esc_attr( $link['target'] ); ?>">
              <?php if ( $img ) : ?>
                <img src="<?= esc_url( $img['url'] ); ?>"
										 alt="<?= esc_attr( $img['alt'] ); ?>"
										 width="<?= $img['width']; ?>"
										 height=<?= $img['height']; ?>"" />
              <?php endif; ?>
              <div><?= esc_html( $link['title'] ); ?></div>
            </a>
          <?php endwhile; ?>
          <?php $hero_cats_button = get_field( 'hero_cats-button' ); ?>
          <?php if ( $hero_cats_button ) : ?>
            <div class="hero__cats-button">
              <a class="arrow arrow_sm arrow_dark"
                 href="<?= esc_url( $hero_cats_button['url'] ); ?>"
                 target="<?= esc_attr( $hero_cats_button['target'] ); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 11" fill="currentColor" width="5" height="6">
                  <polygon points="9 5.5 0 0 0 11 9 5.5"></polygon>
                </svg>
              </a>
            </div>
          <?php endif; ?>
          <button class="order__request" type="button" data-src="#modal-request" data-fancybox>
            <img src="<?= get_template_directory_uri() ?>/img/calculation-icon.png" alt="" width="45" height="44">
            <span>ЗАКАЗАТЬ РАСЧЕТ</span>
          </button>
        </div>
      </div>
    <?php endif; ?>
  </div>
</section>
