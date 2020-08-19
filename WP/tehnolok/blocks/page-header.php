<section class="page-header">
  <div class="container">
    <div class="row">
      <div class="page-header__content">
        <h1 class="page-header__title"><?php the_field( 'page-header_title' ); ?></h1>
        <?php if( get_field( 'page-header_text' ) ) : ?>
          <?php the_field( 'page-header_text' ); ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>