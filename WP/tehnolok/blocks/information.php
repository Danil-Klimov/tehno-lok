<section class="information">
  <div class="container">
    <div class="row information__body">
      <?php wp_nav_menu( [
        'theme_location' => 'menu_information',
        'container' => '',
        'items_wrap' => '<ul class="information__menu">%3$s</ul>',
        'walker' => new Walker_information_menu()
      ] ); ?>
      <div class="information__text"><?php the_field( 'information_text' ); ?></div>
      <?php $information_img = get_field( 'information_img' ); ?>
      <?php if( $information_img ) : ?>
        <div class="information__img">
          <img src="<?= esc_url( $information_img[ 'sizes' ][ '345x210' ] ); ?>"
               alt="<?= esc_attr( $information_img[ 'alt' ] ); ?>"/>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>