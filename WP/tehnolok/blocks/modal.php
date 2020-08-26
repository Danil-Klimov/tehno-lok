<?php $policy_link = get_field( 'policy-link', 'option' ); ?>
<div class="modal modal_call big-square" id="modal-call">
  <div class="modal__title modal__call-title">ОБРАТНЫЙ ЗВОНОК</div>
  <div class="modal__subtitle">Заполните небольшую форму и мы перезвоним вам</div>
  <form class="modal__form modal-call__form" data-name="Заказ звонка">
    <input type="hidden" name="page_request" value="<?php the_title(); ?>">
    <input class="input" type="text" name="client_name" placeholder="Ваше имя" required>
    <input class="input" type="tel" name="client_tel" placeholder="Ваш телефон" pattern="[+]7\([0-9]{3}\)[0-9]{3}-[0-9]{2}-[0-9]{2}" required>
    <label class="checkbox modal__policy">
      <input type="checkbox" required>
      <div></div>
      <p>Вы соглашаетесь с
        <a href="<?= esc_url( $policy_link[ 'url' ] ); ?>"
           target="<?= esc_attr( $policy_link[ 'target' ] ); ?>">политикой персональных данных
        </a>, нажимая кнопку
      </p>
    </label>
    <button class="button button_fill" type="submit">ОТПРАВИТЬ</button>
  </form>
</div>

<div class="modal modal_request big-square" id="modal-request">
  <div class="modal__title">ОСТАВИТЬ ЗАЯВКУ</div>
  <div class="modal__subtitle">Заполните небольшую форму и мы ответим вам</div>
  <form class="modal__form modal-call__form" data-name="Заказ расчета">
    <input type="hidden" name="page_request" value="<?php the_title(); ?>">
    <input class="input" type="text" name="client_name" placeholder="Ваше имя" required>
    <input class="input" type="tel" name="client_tel" placeholder="Ваш телефон" pattern="[+]7\([0-9]{3}\)[0-9]{3}-[0-9]{2}-[0-9]{2}" required>
    <div class="textarea">
      <textarea class="input" placeholder="Сообщение" name="client_message" rows="6"></textarea>
    </div>
    <label class="checkbox modal__policy">
      <input type="checkbox" required>
      <div></div>
      <p>Вы соглашаетесь с
        <a href="<?= esc_url( $policy_link[ 'url' ] ); ?>"
           target="<?= esc_attr( $policy_link[ 'target' ] ); ?>">политикой персональных данных
        </a>, нажимая кнопку
      </p>
    </label>
    <button class="button button_fill" type="submit">ОТПРАВИТЬ</button>
  </form>
</div>

<div class="modal modal_request big-square" id="modal-question">
  <div class="modal__title">ЗАДАТЬ ВОПРОС</div>
  <div class="modal__subtitle">Заполните небольшую форму и мы ответим вам</div>
  <form class="modal__form modal-call__form" data-name="Вопрос">
    <input type="hidden" name="page_request" value="<?php the_title(); ?>">
    <input class="input" type="text" name="client_name" placeholder="Ваше имя" required>
    <input class="input" type="tel" name="client_tel" placeholder="Ваш телефон" pattern="[+]7\([0-9]{3}\)[0-9]{3}-[0-9]{2}-[0-9]{2}" required>
    <div class="textarea">
      <textarea class="input" placeholder="Сообщение" name="client_message" rows="6"></textarea>
    </div>
    <label class="checkbox modal__policy">
      <input type="checkbox" required>
      <div></div>
      <p>Вы соглашаетесь с
        <a href="<?= esc_url( $policy_link[ 'url' ] ); ?>"
           target="<?= esc_attr( $policy_link[ 'target' ] ); ?>">политикой персональных данных
        </a>, нажимая кнопку
      </p>
    </label>
    <button class="button button_fill" type="submit">ОТПРАВИТЬ</button>
  </form>
</div>