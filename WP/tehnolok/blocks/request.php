<section class="request">
  <div class="container">
    <div class="row">
      <?php if( get_sub_field( 'request_view' ) === 'w_map' ) : ?>
        <div class="request__container request__container_left">
          <div class="request__header">
            <div class="vertical-text"><?php the_field( 'request_vertical-text', 'option' ); ?></div>
            <h2 class="title request__title">КОНТАКТЫ</h2>
            <div class="request__subtitle">Завод компании «ТехноЛОК» находится по
              адресу: <?php the_field( 'address', 'option' ); ?></div>
          </div>
          <div class="request__contacts">
            <?php $tel = preg_replace( '~[^0-9,+]~', '', get_field( 'phone_moscow', 'option' ) );
            $tel_sub = preg_replace( '~[^0-9,+]~', '', get_field( 'phone_voronej', 'option' ) );
            $email = get_field( 'email', 'option' ); ?>
            <div class="request__phones">
              <div class="request__phones-item">
                <a href="tel:<?= $tel ?>"><?= get_field( 'phone_moscow', 'option' ) ?></a>
                <span>Офис в Москве</span>
              </div>
              <div class="request__phones-item">
                <a href="tel:<?= $tel_sub ?>"><?= get_field( 'phone_voronej', 'option' ) ?></a>
                <span>Офис в Воронеже</span>
              </div>
            </div>
            <a class="request__mail" href="mailto:<?= $email ?>"><?= $email ?></a>
            <?php if( get_field( 'request_text', 'option' ) ) : ?>
              <div class="request__text"><?php the_field( 'request_text', 'option' ); ?></div>
            <?php endif; ?>
            <div class="request__map" id="map">
              <script type="text/javascript">
                ymaps.ready(init);

                function init() {
                  <?php if( get_field( 'map', 'option' ) ) :
                  $map = json_decode( get_field( 'map', 'option' ), true );?>

                  let maps = new ymaps.Map("map", {
                    center: [<?= $map[ 'center_lat' ] ?>, <?= $map[ 'center_lng' ] ?>],
                    zoom: <?= $map[ 'zoom' ]; ?>,
                    controls: []
                  });

                  <?php foreach ($map[ 'marks' ] as $key2 => $mark): ?>
                  maps.geoObjects.add(
                    new ymaps.Placemark([<?= $mark[ 'coords' ][ 0 ]; ?>, <?= $mark[ 'coords' ][ 1 ]; ?>], {
                      hintContent: '<?= $mark[ 'content' ] ?>',
                      balloonContent: '<?= $mark[ 'content' ] ?>'
                    })
                  );
                  <?php endforeach; ?>
                  <?php endif; ?>
                }
              </script>
            </div>
          </div>
        </div>
      <?php endif; ?>
      <div
          class="request__container<?= get_sub_field( 'request_view' ) !== 'simple' ? ' request__container_right' : ''; ?>">
        <div class="request__header">
          <div class="vertical-text">
            <?= get_sub_field( 'request_view' ) === 'simple' ? get_field( 'request_vertical-text', 'option' ) : 'ОБРАТНАЯ СВЯЗЬ'; ?></div>
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