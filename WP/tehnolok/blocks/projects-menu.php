<section class="projects-menu">
  <div class="container">
    <div class="row projects-menu__container">
      <div class="projects-menu__title">Остальные проекты</div>
      <div class="projects-menu__wrapper">
        <?php $parent = get_ancestors( get_the_ID(), 'page', 'post_type' ); ?>
        <?php $ID = get_the_ID(); ?>
        <?php $count = null; ?>
        <?php $query = new WP_Query( [
          'post_type' => 'page',
          'post_parent' => $parent[0],
          'posts_per_page' => -1,
          'publish' => true,
        ] ); ?>
        <?php foreach( $query->posts as $key => $post ) {
          if( $post->ID === $ID ) {
            $count = $key;
          }
        } ?>
        <div class="projects-menu__slider swiper-container" data-init="<?= $count; ?>">
          <div class="swiper-wrapper">

            <?php if( $query->have_posts() ) : ?>
              <?php while( $query->have_posts() ): $query->the_post(); ?>
                <a class="swiper-slide" href="<?php the_permalink(); ?>">
                  <?php the_post_thumbnail( '165x170' ); ?>
                  <div class="projects-menu__footer"><?php the_title(); ?></div>
                </a>
              <?php endwhile; ?>
            <?php endif;
            wp_reset_query(); ?>
          </div>
          <button class="arrow arrow_md arrow_dark arrow_next projects-menu__next" type="button">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 11" fill="currentColor">
              <polygon points="9 5.5 0 0 0 11 9 5.5"></polygon>
            </svg>
          </button>
          <button class="arrow arrow_md arrow_dark arrow_prev projects-menu__prev" type="button">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 11" fill="currentColor">
              <polygon points="0 5.5 9 0 9 11 0 5.5"></polygon>
            </svg>
          </button>
        </div>
      </div>
    </div>
</section>