<?php
/*
Template Name: Информация
Template Post Type: page
*/
?>

<?php get_header(); ?>

<?php get_template_part( 'blocks/breadcrumbs' ); ?>

<?php get_template_part( 'blocks/page-header' ); ?>

<?php get_template_part( 'blocks/information' ); ?>

<?php if( get_the_ID() === 399 ) : ?>
  <?php $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
  $query = new WP_Query( [
    'post_type' => 'post',
    'category_name' => 'novosti',
    'posts_per_page' => -1,
    'paged' => $paged,
    'publish' => true,
  ] ); ?>

  <?php if( $query->have_posts() ) : ?>
  <section>
    <div class="container">
      <div class="row">
        <?php while( $query->have_posts() ): $query->the_post(); ?>
          <a class="news__item news__item_single" href="<?php the_permalink(); ?>">
            <div class="news__item-body">
              <?php $thumbnail_id = get_post_thumbnail_id( $query->ID );
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
                <div class="news__excerpt"><?= excerpt( 30 ); ?></div>
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
        <?php endwhile; ?>
      </div>
    </div>
  </section>
  <?php endif;  wp_reset_query(); ?>
<?php elseif( get_the_ID() === 404 ) : ?>
  <?php $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
  $query = new WP_Query( [
    'post_type' => 'post',
    'category_name' => 'stati',
    'posts_per_page' => -1,
    'paged' => $paged,
    'publish' => true,
  ] ); ?>

  <?php if( $query->have_posts() ) : ?>
    <section>
      <div class="container">
        <div class="row">
          <?php while( $query->have_posts() ): $query->the_post(); ?>
            <a class="news__item news__item_single" href="<?php the_permalink(); ?>">
              <div class="news__item-body">
                <?php $thumbnail_id = get_post_thumbnail_id( $query->ID );
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
                  <div class="news__excerpt"><?= excerpt( 30 ); ?></div>
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
          <?php endwhile; ?>
        </div>
      </div>
    </section>
  <?php endif;  wp_reset_query(); ?>
<?php endif; ?>

<?php get_template_part( 'blocks/_blocks' ); ?>

<?php get_footer(); ?>