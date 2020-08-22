<section class="serv-descr">
  <div class="container">
    <div class="row">
      <div class="serv-descr__header">
        <h2 class="title"><?php the_sub_field( 'serv-descr_title' ); ?></h2>
      </div>
      <?php if( have_rows( 'serv-descr_items' ) ) : ?>
        <?php while( have_rows( 'serv-descr_items' ) ) : the_row(); ?>
          <div class="serv-descr__item serv-descr__item_<?= get_sub_field( 'img-position' ) === 'left' ? 'left' : 'right'; ?>">
            <div class="serv-descr__text"><?php the_sub_field( 'text' ); ?></div>
            <div class="serv-descr__img">
              <?php $img = get_sub_field( 'img' ); ?>
              <?php if( $img ) : ?>
                <img src="<?= esc_url( $img[ 'url' ] ); ?>" alt="<?= esc_attr( $img[ 'alt' ] ); ?>"/>
              <?php endif; ?>
            </div>
            <div class="serv-descr__bg" style="background-image: url(<?php the_sub_field( 'bg-img' ); ?>)"></div>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>
  </div>
</section>