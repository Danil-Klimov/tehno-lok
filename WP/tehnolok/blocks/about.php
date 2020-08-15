<section class="about<?= get_sub_field( 'about_projects-visible' ) == 1 ? ' about_w-projects' : '' ?>">
  <div class="container">
    <div class="row">
      <div class="about__header">
        <div class="vertical-text"><?php the_sub_field( 'about_vertical-text' ); ?></div>
        <h2 class="title about__title"><?php the_sub_field( 'about_title' ); ?></h2>
        <?php $about_img = get_sub_field( 'about_img' ); ?>
        <?php if( $about_img ) : ?>
          <img src="<?php echo esc_url( $about_img[ 'url' ] ); ?>"
               alt="<?php echo esc_attr( $about_img[ 'alt' ] ); ?>"/>
        <?php endif; ?>
      </div>
      <div class="about__content"><?php the_sub_field( 'about_content' ); ?></div>
    </div>
  </div>
  <?php if( get_sub_field( 'about_projects-visible' ) == 1 ) : ?>
    <div class="about__projects">
      <div class="about__projects-wrap">
        <?php $about_projects = get_sub_field( 'about_projects' ); ?>
        <?php if( $about_projects ) : ?>
          <?php foreach( $about_projects as $key => $post ) : ?>
            <?php setup_postdata( $post ); ?>
            <a class="about__project"
               href="<?php the_permalink(); ?>"
               style="background-image: linear-gradient(to <?= $key % 2 ? 'top' : 'bottom' ?>, rgba(23, 98, 175, 0.6) 0%, transparent 175px), url(<?php the_post_thumbnail_url( '345x540' ); ?>)">
              <div class="about__project-name">
                <div class="about__project-title"><?php the_title(); ?></div>
                <div class="arrow arrow_sm arrow_light about__project-arrow">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 11" fill="currentColor">
                    <polygon points="9 5.5 0 0 0 11 9 5.5"></polygon>
                  </svg>
                </div>
              </div>
            </a>
          <?php endforeach; ?>
          <?php wp_reset_postdata(); ?>
        <?php endif; ?>
      </div>
    </div>
  <?php endif; ?>
</section>