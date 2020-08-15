<section class="video-block" style="background-image: url(<?php the_sub_field( 'video-block_bg' ); ?>)">
  <div class="container">
    <div class="row">
      <div class="video-block__header">
        <div class="vertical-text"><?php the_sub_field( 'video-block_vertical-text' ); ?></div>
        <h2 class="title video-block__title"><?php the_sub_field( 'video-block_title' ); ?></h2>
        <?php if( get_sub_field( 'video-block_subtitle' ) ) : ?>
          <div class="video-block__subtitle"><?php the_sub_field( 'video-block_subtitle' ); ?></div>
        <?php endif; ?>
      </div>
      <div class="video-block__container video-border">
        <?php if( get_sub_field( 'video-block_source' ) === 'youtube') : ?>
          <div class="video">
            <a class="video__link" href="<?php the_sub_field( 'video-block_online' ); ?>">
              <?php $video_block_cover = get_sub_field( 'video-block_cover' ); ?>
              <?php if ( $video_block_cover ) : ?>
                <picture>
                  <source srcset="<?= esc_url( $video_block_cover['sizes']['515x290'] ); ?>"
                          media="(max-width: 768px)">
                  <source srcset="<?= esc_url( $video_block_cover['sizes']['695x390'] ); ?>"
                          media="(max-width: 992px)">
                  <source srcset="<?= esc_url( $video_block_cover['sizes']['935x525'] ); ?>"
                          media="(max-width: 1200px)">
                  <img class="video__media"
                       src="<?= esc_url( $video_block_cover['sizes']['630x355'] ); ?>"
                       alt="<?= esc_attr( $video_block_cover['alt'] ); ?>">
                </picture>
              <?php endif; ?>
            </a>
            <button class="video__button" type="button">
              <svg width="68" height="48" viewbox="0 0 68 48">
                <path class="video__button-shape"
                      d="M66.52,7.74c-0.78-2.93-2.49-5.41-5.42-6.19C55.79,.13,34,0,34,0S12.21,.13,6.9,1.55 C3.97,2.33,2.27,4.81,1.48,7.74C0.06,13.05,0,24,0,24s0.06,10.95,1.48,16.26c0.78,2.93,2.49,5.41,5.42,6.19 C12.21,47.87,34,48,34,48s21.79-0.13,27.1-1.55c2.93-0.78,4.64-3.26,5.42-6.19C67.94,34.95,68,24,68,24S67.94,13.05,66.52,7.74z"></path>
                <path class="video__button-icon" d="M 45,24 27,14 27,34"></path>
              </svg>
            </button>
          </div>
        <?php else : ?>
          <?php $video_block_local = get_sub_field( 'video-block_local' ); ?>
          <?php if ( $video_block_local ) : ?>
            <video src="<?= esc_url( $video_block_local['url'] ); ?>" controls></video>
          <?php endif; ?>
        <?php endif; ?>
      </div>
      <div class="video-block__text">
        <?php the_sub_field( 'video-block_description' ); ?>
        <button class="button button_fill button_w-icon" type="button" data-src="#modal-request" data-fancybox>
          <img src="<?= get_template_directory_uri() ?>/img/request-icon.png" alt="">
          <span>ЗАКАЗАТЬ РАСЧЕТ</span>
        </button>
      </div>
    </div>
  </div>
</section>