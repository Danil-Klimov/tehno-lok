<section class="team">
  <div class="container">
    <div class="row">
      <div class="team__header">
        <h2 class="title"><?php the_sub_field( 'team_title' ); ?></h2>
      </div>
      <?php if ( have_rows( 'team_tabs' ) ) : ?>
        <div class="team__tabs">
          <?php while ( have_rows( 'team_tabs' ) ) : the_row(); ?>
            <a class="team__tab<?= get_row_index() === 0 ? ' active' : ''?>" href="#tab_<?= get_row_index(); ?>"><?php the_sub_field( 'tab-name' ); ?></a>
          <?php endwhile; ?>
        </div>
      <?php endif; ?>
      <?php if ( have_rows( 'team_tabs' ) ) : ?>
        <?php while ( have_rows( 'team_tabs' ) ) : the_row(); ?>
          <div class="team__container<?= get_row_index() === 0 ? ' active' : ''?>" id="tab_<?= get_row_index(); ?>">
            <div class="team__slider swiper-container">
              <div class="swiper-wrapper">
                <?php if ( have_rows( 'staff' ) ) : ?>
                  <?php while ( have_rows( 'staff' ) ) : the_row(); ?>
                    <div class="swiper-slide">
                      <div class="team__item">
                        <?php $img = get_sub_field( 'img' ); ?>
                        <?php if ( $img ) : ?>
                          <img src="<?= esc_url( $img['sizes']['210x270'] ); ?>"
                               alt="<?= esc_attr( $img['alt'] ); ?>"
															 width="<?= $img['sizes']['210x270-width']; ?>"
															 height="<?= $img['sizes']['210x270-height']; ?>" />
                        <?php endif; ?>
                        <div class="team__item-footer">
                          <div class="team__name"><?php the_sub_field( 'name' ); ?></div>
                          <div class="team__position"><?php the_sub_field( 'position' ); ?></div>
                        </div>
                      </div>
                    </div>
                  <?php endwhile; ?>
                <?php endif; ?>
              </div>
            </div>
            <button class="arrow arrow_sm arrow_dark arrow_prev" type="button">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 11" fill="currentColor" width="5" height="6">
                <polygon points="0 5.5 9 0 9 11 0 5.5"></polygon>
              </svg>
            </button>
            <button class="arrow arrow_sm arrow_dark arrow_next" type="button">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 11" fill="currentColor" width="5" height="6">
                <polygon points="9 5.5 0 0 0 11 9 5.5"></polygon>
              </svg>
            </button>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>
  </div>
</section>
