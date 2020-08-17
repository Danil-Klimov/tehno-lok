<section class="interview">
  <div class="container">
    <div class="row">
      <div class="interview__header">
        <h2 class="title interview__title"><?php the_sub_field( 'interview_title' ); ?></h2>
      </div>
    </div>
    <div class="row interview__container">
      <div class="interview__slider swiper-container">
        <div class="swiper-wrapper">
          <?php if ( have_rows( 'interview_items' ) ) : ?>
            <?php while ( have_rows( 'interview_items' ) ) : the_row(); ?>
              <div class="interview__slide swiper-slide">
                <div class="interview__video video-border">
                  <?php if( get_sub_field( 'video-source' ) === 'youtube' ) : ?>
                    <div class="video">
                      <a class="video__link" href="<?php the_sub_field( 'video-online' ); ?>">
                        <?php $video_cover = get_sub_field( 'video-cover' ); ?>
                        <?php if ( $video_cover ) : ?>
                          <picture>
                            <source srcset="<?= esc_url( $video_cover['sizes']['515x290'] ); ?>"
                                    media="(max-width: 768px)">
                            <source srcset="<?= esc_url( $video_cover['sizes']['620x450'] ); ?>"
                                    media="(max-width: 992px)">
                            <source srcset="<?= esc_url( $video_cover['sizes']['820x460'] ); ?>"
                                    media="(max-width: 1200px)">
                            <img class="video__media"
                                 src="<?= esc_url( $video_cover['sizes']['630x355'] ); ?>"
                                 alt="<?= esc_attr( $video_cover['alt'] ); ?>">
                          </picture>
                        <?php endif; ?>
                      </a>
                      <button class="video__button" type="button">
                        <svg width="68" height="48" viewbox="0 0 68 48">
                          <path class="video__button-shape" d="M66.52,7.74c-0.78-2.93-2.49-5.41-5.42-6.19C55.79,.13,34,0,34,0S12.21,.13,6.9,1.55 C3.97,2.33,2.27,4.81,1.48,7.74C0.06,13.05,0,24,0,24s0.06,10.95,1.48,16.26c0.78,2.93,2.49,5.41,5.42,6.19 C12.21,47.87,34,48,34,48s21.79-0.13,27.1-1.55c2.93-0.78,4.64-3.26,5.42-6.19C67.94,34.95,68,24,68,24S67.94,13.05,66.52,7.74z"></path>
                          <path class="video__button-icon" d="M 45,24 27,14 27,34"></path>
                        </svg>
                      </button>
                    </div>
                  <?php else : ?>
                    <?php $video_local = get_sub_field( 'video-local' ); ?>
                    <?php if ( $video_local ) : ?>
                      <video src="<?= esc_url( $video_local['url'] ); ?>" controls></video>
                    <?php endif; ?>
                  <?php endif; ?>
                </div>
                <div class="interview__text">
                  <?php the_sub_field( 'text' ); ?>
                  <?php $link = get_sub_field( 'link' ); ?>
                  <?php if ( $link ) : ?>
                    <a class="button button_fill"
                       href="<?= esc_url( $link['url'] ); ?>"
                       target="<?= esc_attr( $link['target'] ); ?>"><?= esc_html( $link['title'] ); ?></a>
                  <?php endif; ?>
                </div>
              </div>
            <?php endwhile; ?>
          <?php endif; ?>
        </div>
      </div>
      <button class="arrow arrow_sm arrow_dark arrow_prev interview__prev" type="button">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 11" fill="currentColor">
          <polygon points="0 5.5 9 0 9 11 0 5.5"></polygon>
        </svg>
      </button>
      <button class="arrow arrow_sm arrow_dark arrow_next interview__next" type="button">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 11" fill="currentColor">
          <polygon points="9 5.5 0 0 0 11 9 5.5"></polygon>
        </svg>
      </button>
    </div>
    <?php $interview_button = get_sub_field( 'interview_button' ); ?>
    <?php if ( $interview_button ) : ?>
      <div class="row">
        <div class="interview__footer">
          <a class="button button_empty"
             href="<?= esc_url( $interview_button['url'] ); ?>"
             target="<?= esc_attr( $interview_button['target'] ); ?>"><?= esc_html( $interview_button['title'] ); ?></a>
        </div>
      </div>
    <?php endif; ?>
  </div>
</section>