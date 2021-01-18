<section class="news">
  <div class="container">
    <div class="row">
      <div class="news__header">
        <h2 class="title news__title"><?php the_sub_field( 'news_title' ); ?></h2>
      </div>
    </div>
    <div class="news__container">
      <div class="news__slider swiper-container">
        <div class="swiper-wrapper">
          <?php $news_items = get_sub_field( 'news_items' ); ?>
          <?php if( $news_items ) : ?>
            <?php foreach( $news_items as $post ) : ?>
              <?php setup_postdata( $post ); ?>
              <a class="news__item swiper-slide" href="<?php the_permalink(); ?>">
                <div class="news__item-body">
                  <?php $thumbnail_id = get_post_thumbnail_id( $post->ID );
                  $alt = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true ); ?>
                  <picture>
                    <source srcset="<?php the_post_thumbnail_url( '545x200' ); ?>"
                            media="(max-width: 575px)">
                    <source srcset="<?php the_post_thumbnail_url( '260x160' ); ?>"
                            media="(max-width: 768px)">
                    <source srcset="<?php the_post_thumbnail_url( '345x210' ); ?>"
                            media="(max-width: 992px)">
                    <source srcset="<?php the_post_thumbnail_url( '300x180' ); ?>"
                            media="(max-width: 1200px)">
                    <img src="<?php the_post_thumbnail_url( '360x220' ); ?>" alt="<?= $alt; ?>">
                  </picture>
                  <div class="news__text">
                    <div class="news__item-title"><?php the_title(); ?></div>
                    <div class="news__excerpt"><?= excerpt( 60 ); ?></div>
                  </div>
                  <div class="news__date">
                    <div class="news__date-number"><?php the_time( 'd' ); ?></div>
                    <div class="news__date-other"><?php the_time( 'F Y' ); ?></div>
                  </div>
                </div>
                <div class="news__item-footer">
                  <div class="news__link"><span>подробнее</span>
                    <button class="arrow arrow_sm arrow_dark" type="button">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 11" fill="currentColor">
                        <polygon points="9 5.5 0 0 0 11 9 5.5"></polygon>
                      </svg>
                    </button>
                  </div>
                </div>
              </a>
            <?php endforeach; ?>
            <?php wp_reset_postdata(); ?>
          <?php endif; ?>
        </div>
      </div>
      <button class="arrow arrow_sm arrow_dark arrow_prev news__prev" type="button">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 11" fill="currentColor">
          <polygon points="0 5.5 9 0 9 11 0 5.5"></polygon>
        </svg>
      </button>
      <button class="arrow arrow_sm arrow_dark arrow_next news__next" type="button">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 11" fill="currentColor">
          <polygon points="9 5.5 0 0 0 11 9 5.5"></polygon>
        </svg>
      </button>
    </div>
  </div>
</section>
