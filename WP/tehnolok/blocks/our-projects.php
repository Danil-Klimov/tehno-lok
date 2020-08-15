<section class="our-projects">
  <div class="our-projects__wrapper">
    <div class="container">
      <div class="row">
        <?php if( have_rows( 'our-projects_title' ) ) : ?>
          <?php while( have_rows( 'our-projects_title' ) ) : the_row(); ?>
            <div class="our-projects__header">
              <h2 class="title"><?php the_sub_field( 'left' ); ?></h2>
              <h2 class="title"><?php the_sub_field( 'right' ); ?></h2>
            </div>
          <?php endwhile; ?>
        <?php endif; ?>
        <?php $our_projects_items = get_sub_field( 'our-projects_items' ); ?>
        <?php if( $our_projects_items ) : ?>
          <div class="our-projects__body big-square">
            <div class="our-projects__slider swiper-container">
              <div class="swiper-wrapper">
                <?php foreach( $our_projects_items as $post ) : ?>
                  <?php setup_postdata( $post ); ?>
                  <div class="our-projects__inner swiper-slide">
                    <div class="our-projects__img">
                      <?php $thumbnail_id = get_post_thumbnail_id( $post->ID );
                      $alt = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true ); ?>
                      <picture>
                        <source srcset="<?php the_post_thumbnail_url( '620x450' ); ?>"
                                media="(max-width: 992px)">
                        <img src="<?php the_post_thumbnail_url( '450x450' ); ?>" alt="<?= $alt; ?>">
                      </picture>
                    </div>
                    <div class="our-projects__content">
                      <a class="our-projects__title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                      <!--                      TODO добавить описание при создании страницы проекта-->
                      <div class="our-projects__text">
                        <p><span style="font-weight: 700; color: #054c7a">Назначение:</span> Укрытия ледовых полей и
                          теннисных кортов</p>
                        <p>Утепленное каркасно-мембранное укрытие двух хоккейных полей и четырех теннисных кортов с
                          пристройкой для размещения раздевалок, кафе, спортивного зала и др. помещений.</p>
                        <p><span style="font-weight: 700; color: #054c7a">Размеры</span> 40 х 144 х 5,1м/14,4м(по стене/
                          в
                          коньке), пристройка 15 х 68 х 5м (по стене)</p>
                        <p>Ворота подъемные для въезда ледоуборочных машин 4 шт</p>
                        <p><span style="font-weight: 700; color: #054c7a">Место расположения:</span> г. Москва.</p>
                        <p><span style="font-weight: 700; color: #054c7a">Год постройки:</span> 2018</p>
                        <p><span style="font-weight: 700; color: #054c7a">Срок монтажа:</span> 60 рабочих дней</p>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
            <button class="arrow arrow_md arrow_dark arrow_next our-projects__next" type="button">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 11" fill="currentColor">
                <polygon points="9 5.5 0 0 0 11 9 5.5"></polygon>
              </svg>
            </button>
            <button class="arrow arrow_md arrow_dark arrow_prev our-projects__prev" type="button">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 11" fill="currentColor">
                <polygon points="0 5.5 9 0 9 11 0 5.5"></polygon>
              </svg>
            </button>
            <div class="vertical-text"><?php the_sub_field( 'our-projects_vertical-text' ); ?></div>
          </div>
          <?php wp_reset_postdata(); ?>
        <?php endif; ?>
        <div class="our-projects__buttons">
          <button class="button button_fill button_w-icon our-projects__request-btn" type="button"
                  data-src="#modal-request" data-fancybox>
            <img src="<?= get_template_directory_uri() ?>/img/request-icon.png" alt="">
            <span>ЗАКАЗАТЬ РАСЧЕТ</span>
          </button>
          <?php $our_projects_link = get_sub_field( 'our-projects_link' ); ?>
          <?php if( $our_projects_link ) : ?>
            <a class="button button_empty"
               href="<?= esc_url( $our_projects_link[ 'url' ] ); ?>"
               target="<?= esc_attr( $our_projects_link[ 'target' ] ); ?>"><?= esc_html( $our_projects_link[ 'title' ] ); ?></a>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <?php if( have_rows( 'our-projects_bg' ) ) : ?>
      <?php while( have_rows( 'our-projects_bg' ) ) : the_row(); ?>
        <?php if( get_sub_field( 'left' ) ) : ?>
          <div class="our-projects__bg-element our-projects__bg-element_left"
               style="background-image: url(<?php the_sub_field( 'left' ); ?>)"></div>
        <?php endif ?>
        <?php if( get_sub_field( 'right' ) ) : ?>
          <div class="our-projects__bg-element our-projects__bg-element_right"
               style="background-image: url(<?php the_sub_field( 'right' ); ?>)"></div>
        <?php endif ?>
      <?php endwhile; ?>
    <?php endif; ?>
  </div>
</section>