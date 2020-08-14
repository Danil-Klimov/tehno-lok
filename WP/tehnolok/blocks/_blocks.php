<?php if ( have_rows( 'blocks' ) ): ?>
  <?php while ( have_rows( 'blocks' ) ) : the_row(); ?>
    <?php if ( get_row_layout() == 'block_about' ) : get_template_part( 'blocks/about' ); ?>
    <?php elseif ( get_row_layout() == 'block_reasons' ) : get_template_part( 'blocks/reasons' ); ?>
    <?php endif; ?>
  <?php endwhile; ?>
<?php endif; ?>