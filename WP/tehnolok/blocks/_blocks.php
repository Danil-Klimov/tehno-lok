<?php if ( have_rows( 'blocks' ) ): ?>
  <?php while ( have_rows( 'blocks' ) ) : the_row(); ?>
    <?php if ( get_row_layout() == 'block_about' ) : get_template_part( 'blocks/about' ); ?>
    <?php elseif ( get_row_layout() == 'block_reasons' ) : get_template_part( 'blocks/reasons' ); ?>
    <?php elseif ( get_row_layout() == 'block_features' ) : get_template_part( 'blocks/features' ); ?>
<!--TODO обратить внимание на этот блок, он сложный. Есть на разный страницах с разной галереей-->
    <?php elseif ( get_row_layout() == 'block_our-projects' ) : get_template_part( 'blocks/our-projects' ); ?>
    <?php elseif ( get_row_layout() == 'block_types' ) : get_template_part( 'blocks/types' ); ?>
    <?php elseif ( get_row_layout() == 'block_video-block' ) : get_template_part( 'blocks/video-block' ); ?>
    <?php elseif ( get_row_layout() == 'block_reviews' ) : get_template_part( 'blocks/reviews' ); ?>
    <?php elseif ( get_row_layout() == 'block_gallery' ) : get_template_part( 'blocks/gallery' ); ?>
<!--TODO не сделанные блоки-->
    <?php elseif ( get_row_layout() == 'block_news' ) : get_template_part( 'blocks/news' ); ?>
    <?php elseif ( get_row_layout() == 'block_posts' ) : get_template_part( 'blocks/posts' ); ?>
    <?php elseif ( get_row_layout() == 'block_request' ) : get_template_part( 'blocks/request' ); ?>
    <?php elseif ( get_row_layout() == 'block_promo' ) : get_template_part( 'blocks/promo' ); ?>
    <?php elseif ( get_row_layout() == 'block_interview' ) : get_template_part( 'blocks/interview' ); ?>
    <?php elseif ( get_row_layout() == 'block_team' ) : get_template_part( 'blocks/team' ); ?>
    <?php elseif ( get_row_layout() == 'block_office' ) : get_template_part( 'blocks/office' ); ?>

    <?php elseif ( get_row_layout() == 'block_information' ) : get_template_part( 'blocks/information' ); ?>
    <?php elseif ( get_row_layout() == 'block_faq' ) : get_template_part( 'blocks/faq' ); ?>
    <?php elseif ( get_row_layout() == 'block_numbers' ) : get_template_part( 'blocks/numbers' ); ?>
    <?php elseif ( get_row_layout() == 'block_service' ) : get_template_part( 'blocks/service' ); ?>
    <?php elseif ( get_row_layout() == 'block_text' ) : get_template_part( 'blocks/text' ); ?>
    <?php endif; ?>
  <?php endwhile; ?>
<?php endif; ?>