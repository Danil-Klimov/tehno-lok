<section class="posts">
  <div class="container">
    <div class="row">
      <div class="posts__header">
        <div class="vertical-text"><?php the_sub_field( 'posts_vertical-text' ); ?></div>
        <h2 class="title posts__title"><?php the_sub_field( 'posts_title' ); ?></h2>
        <?php if( get_sub_field( 'posts_subtitle' ) ) : ?>
          <div class="posts__subtitle"><?php the_sub_field( 'posts_subtitle' ); ?></div>
        <?php endif; ?>
      </div>
      <div class="posts__container">
        <div class="posts__slider swiper-container">
          <div class="swiper-wrapper">
            <?php $posts_item = get_sub_field( 'posts_item' ); ?>
            <?php if ( $posts_item ) : ?>
              <?php foreach ( $posts_item as $post ) : ?>
                <?php setup_postdata ( $post ); ?>
                <?php if( $post->post_status !== 'draft' ) : ?>
                  <a class="posts__slide swiper-slide" href="<?php the_permalink(); ?>">
                    <?php $thumbnail_id = get_post_thumbnail_id( $post->ID );
                    $alt = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true ); ?>
                    <picture>
                      <source srcset="<?php the_post_thumbnail_url( '515x160' ); ?>"
                              media="(max-width: 575px)">
                      <source srcset="<?php the_post_thumbnail_url( '260x160' ); ?>"
                              media="(max-width: 768px)">
                      <source srcset="<?php the_post_thumbnail_url( '325x160' ); ?>"
                              media="(max-width: 992px)">
                      <img src="<?php the_post_thumbnail_url( '260x160' ); ?>"
													 alt="<?= $alt; ?>"
													 width="515"
													 height="160">
                    </picture>
                    <div class="posts__text">
                      <div class="posts__item-title"><?php the_title(); ?></div>
                      <div class="posts__excerpt"><?= excerpt(60); ?></div>
                    </div>
                  </a>
                <?php endif; ?>
              <?php endforeach; ?>
              <?php wp_reset_postdata(); ?>
            <?php endif; ?>
          </div>
        </div>
        <button class="arrow arrow_sm arrow_light arrow_prev posts__prev" type="button">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 11" fill="currentColor" width="5" height="6">
            <polygon points="0 5.5 9 0 9 11 0 5.5"></polygon>
          </svg>
        </button>
        <button class="arrow arrow_sm arrow_light arrow_next posts__next" type="button">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 11" fill="currentColor" width="5" height="6">
            <polygon points="9 5.5 0 0 0 11 9 5.5"></polygon>
          </svg>
        </button>
      </div>
    </div>
  </div>
</section>
