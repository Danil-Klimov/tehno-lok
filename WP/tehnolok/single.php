<?php get_header(); ?>

<?php get_template_part( 'blocks/breadcrumbs' ); ?>

  <section class="page-header">
    <div class="container">
      <div class="row">
        <div class="page-header__content">
          <h1 class="page-header__title"><?php the_title(); ?></h1>
        </div>
      </div>
    </div>
  </section>

  <div class="content">
    <div class="container">
      <div class="row">
        <div class="content__inner">
          <?php $thumbnail_id = get_post_thumbnail_id();
          $alt = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true ); ?>
          <picture>
            <source srcset="<?php the_post_thumbnail_url( '545x200' ); ?>"
                    media="(max-width: 575px)">
            <source srcset="<?php the_post_thumbnail_url( '720x260' ); ?>"
                    media="(max-width: 992px)">
            <img class="content__img" src="<?php the_post_thumbnail_url( '1140x260' ); ?>" alt="<?= $alt; ?>">
          </picture>
          <?php the_content(); ?>
        </div>
      </div>
    </div>
  </div>

  <section class="request">
    <div class="container">
      <div class="row">
        <div class="request__container">
          <div class="request__header">
            <div class="vertical-text"><?= get_field( 'request_vertical-text', 'option' ); ?></div>
            <h2 class="title request__title"><?php the_field( 'request_title', 'option' ); ?></h2>
            <div class="request__subtitle"><?php the_field( 'request_subtitle', 'option' ); ?></div>
          </div>
          <form class="request__form">
            <div class="request__group">
              <input class="input" type="text" name="client_name" placeholder="Ваше имя" required>
              <input class="input" type="tel" name="client_tel" placeholder="Ваш телефон"
                     pattern="[+]7\([0-9]{3}\)[0-9]{3}-[0-9]{2}-[0-9]{2}" required>
            </div>
            <div class="request__group">
              <div class="textarea">
                <textarea class="input" placeholder="Сообщение"></textarea>
              </div>
            </div>
            <label class="checkbox">
              <input type="checkbox" required>
              <div></div>
              <?php $policy_link = get_field( 'policy-link', 'option' ); ?>
              <p>Вы соглашаетесь с
                <a href="<?= esc_url( $policy_link[ 'url' ] ); ?>"
                   target="<?= esc_attr( $policy_link[ 'target' ] ); ?>">политикой персональных данных
                </a>, нажимая кнопку
              </p>
            </label>
            <button class="button button_fill" type="submit">ОТПРАВИТЬ</button>
          </form>
        </div>
      </div>
    </div>
  </section>

<?php get_footer(); ?>