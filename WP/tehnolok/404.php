<?php get_header(); ?>

<?php get_template_part( 'blocks/breadcrumbs' ); ?>

  <section class="page-header">
    <div class="container">
      <div class="row">
        <div class="page-header__content">
          <h1 class="page-header__title">ОШИБКА 404</h1>
        </div>
      </div>
    </div>
  </section>

  <div class="content">
    <div class="container">
      <div class="row">
        <div class="content__inner">
          <p>Сраница не найдена</p>
          <p>Неправильно набран адрес или</p>
          <p>такой страницы не существует</p>
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
          <form class="request__form" data-name="Заявка с футера">
            <input type="hidden" name="page_request" value="<?php the_title(); ?>">
            <div class="request__group">
              <input class="input" type="text" name="client_name" placeholder="Ваше имя" required>
              <input class="input" type="tel" name="client_tel" placeholder="Ваш телефон"
                     pattern="[+]7\([0-9]{3}\)[0-9]{3}-[0-9]{2}-[0-9]{2}" required>
            </div>
            <div class="request__group">
              <div class="textarea">
                <textarea class="input" name="client_message" placeholder="Сообщение"></textarea>
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