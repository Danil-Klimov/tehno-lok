<?php
/*
Template Name: Услуги
Template Post Type: page
*/
?>

<?php get_header(); ?>

<?php get_template_part( 'blocks/breadcrumbs' ); ?>

<?php get_template_part( 'blocks/page-header' ); ?>

<section id="services">
  <?php $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
  $query = new WP_Query( [
    'post_type' => 'page',
    'post_parent' => get_the_ID(),
    'posts_per_page' => -1,
    'paged' => $paged,
    'publish' => true,
  ] ); ?>

  <?php if( $query->have_posts() ) : ?>
    <?php while( $query->have_posts() ): $query->the_post(); ?>
      <section class="service">
        <div class="container-fluid service__container">
          <div class="row">
            <div class="service__img" style="background-image: url(<?php the_post_thumbnail_url( 'full' ); ?>)"></div>
            <div class="service__text<?= $query->current_post % 2 ? ' service__text_left' : ''; ?>">
              <?php the_field( 'services-description' ); ?>
              <?php if ( get_field( 'services-link-view' ) == 1 ) : ?>
                <a class="button button_fill" href="<?php the_permalink(); ?>">УЗНАТЬ БОЛЬШЕ</a>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <?php if ( get_field( 'services-params' ) == 1 ) : ?>
          <div class="service__footer">
            <div class="container">
              <div class="row">
                <?php if ( have_rows( 'services-carcas' ) ) : ?>
                  <?php while ( have_rows( 'services-carcas' ) ) : the_row(); ?>
                    <div class="service__footer-item">
                      <div class="service__footer-text">
                        <h3>ТИП <br> КАРКАСА</h3>
                        <p><?php the_sub_field( 'carcas' ); ?></p>
                      </div>
                      <div class="service__footer-img">
                        <?php $img = get_sub_field( 'carcas-img' ); ?>
                        <?php if ( $img ) : ?>
                          <a href="<?= esc_url( $img['url'] ); ?>" data-fancybox>
                            <img src="<?= esc_url( $img['sizes']['200x130'] ); ?>" alt="<?= esc_attr( $img['alt'] ); ?>" />
                          </a>
                        <?php endif; ?>
                      </div>
                    </div>
                  <?php endwhile; ?>
                <?php endif; ?>
                <?php if ( have_rows( 'services-coating' ) ) : ?>
                  <?php while ( have_rows( 'services-coating' ) ) : the_row(); ?>
                    <div class="service__footer-item">
                      <div class="service__footer-text">
                        <h3>ТИП <br> ПОКРЫТИЯ</h3>
                        <p><?php the_sub_field( 'coating' ); ?></p>
                      </div>
                      <div class="service__footer-img">
                        <?php $img = get_sub_field( 'img' ); ?>
                        <?php if ( $img ) : ?>
                          <a href="<?= esc_url( $img['url'] ); ?>" data-fancybox>
                            <img src="<?= esc_url( $img['sizes']['200x130'] ); ?>" alt="<?= esc_attr( $img['alt'] ); ?>" />
                          </a>
                        <?php endif; ?>
                      </div>
                    </div>
                  <?php endwhile; ?>
                <?php endif; ?>
                <div class="service__footer-item">
                  <div class="service__footer-text">
                    <h3>ВЫПОЛНЕНО <br> ПРОЕКТОВ</h3>
                  </div>
                  <div class="service__footer-number"><?php the_field( 'services-numbers' ); ?></div>
                </div>
              </div>
            </div>
          </div>
        <?php endif; ?>
      </section>
    <?php endwhile; ?>
  <?php endif;
  wp_reset_query(); ?>
</section>

<?php get_template_part( 'blocks/_blocks' ); ?>

<?php get_footer(); ?>
