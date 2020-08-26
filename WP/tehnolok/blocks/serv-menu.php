<section class="serv-menu">
  <div class="container">
    <div class="row">
      <div class="serv-menu__container">
        <?php if ( have_rows( 'serv-menu_blocks' ) ) : ?>
          <?php while ( have_rows( 'serv-menu_blocks' ) ) : the_row(); ?>
            <?php $title_link = get_sub_field( 'title-link' ); ?>
            <?php if( get_row_index() === 0 ) : ?>
              <div class="serv-menu__carcas" style="background-image: url(<?php the_sub_field( 'bg' ); ?>)">
                <?php if( get_sub_field( 'type-title' ) === 'text' ) : ?>
                  <div class="serv-menu__title serv-menu__carcas-title"><?php the_sub_field( 'title-text' ); ?></div>
                <?php else : ?>
                  <a class="serv-menu__title serv-menu__carcas-title"
                     href="<?= esc_url( $title_link['url'] ); ?>"
                    <?= get_sub_field( 'type-title' ) === 'popup' ? 'data-fancybox' : '' ?>><?= esc_html( $title_link['title'] ); ?></a>
                <?php endif; ?>
                <?php if ( have_rows( 'anchors' ) ) : ?>
                  <?php while ( have_rows( 'anchors' ) ) : the_row(); ?>
                    <?php $anchor = get_sub_field( 'anchor' ); ?>
                    <?php if ( get_sub_field( 'anchor-type' ) === 'text' ) : ?>
                      <div class="serv-menu__link"><?php the_sub_field( 'text' ); ?></div>
                    <?php else : ?>
                      <a class="serv-menu__link"
                         href="<?= esc_url( $anchor['url'] ); ?>"
                        <?= get_sub_field( 'anchor-type' ) === 'popup' ? 'data-fancybox' : '' ?>>
                        <span><?= esc_html( $anchor['title'] ); ?></span>
                      </a>
                    <?php endif; ?>
                  <?php endwhile; ?>
                <?php endif; ?>
              </div>
            <?php else :?>
              <div class="serv-menu__coating" style="background-image: url(<?php the_sub_field( 'bg' ); ?>)">
                <div class="serv-menu__coating-footer">
                  <?php if( get_sub_field( 'type-title' ) === 'text' ) : ?>
                    <div class="serv-menu__title serv-menu__coating-title"><?php the_sub_field( 'title-text' ); ?></div>
                  <?php else : ?>
                    <a class="serv-menu__title serv-menu__coating-title"
                       href="<?= esc_url( $title_link['url'] ); ?>"
                      <?= get_sub_field( 'type-title' ) === 'popup' ? 'data-fancybox' : '' ?>><?= esc_html( $title_link['title'] ); ?></a>
                  <?php endif; ?>
                  <?php if ( have_rows( 'anchors' ) ) : ?>
                    <ul class="serv-menu__coating-list">
                      <?php while ( have_rows( 'anchors' ) ) : the_row(); ?>
                        <?php $anchor = get_sub_field( 'anchor' ); ?>
                        <?php if ( get_sub_field( 'anchor-type' ) === 'text' ) : ?>
                          <li>
                            <div class="serv-menu__link"><?php the_sub_field( 'title-text' ); ?></div>
                          </li>
                        <?php else : ?>
                          <li>
                            <a class="serv-menu__link"
                               href="<?= esc_url( $anchor['url'] ); ?>"
                              <?= get_sub_field( 'anchor-type' ) === 'popup' ? 'data-fancybox' : '' ?>><?= esc_html( $anchor['title'] ); ?></a>
                          </li>
                        <?php endif; ?>
                      <?php endwhile; ?>
                    </ul>
                  <?php endif; ?>
                </div>
              </div>
            <?php endif; ?>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>