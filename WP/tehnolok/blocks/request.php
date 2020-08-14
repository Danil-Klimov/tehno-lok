<!--TODO есть 2 вариант этого блока-->
<section class="request">
  <div class="container">
    <div class="row">
      <div class="request__container">
        <div class="request__header">
          <div class="vertical-text">КОНТАКТЫ</div>
          <h2 class="title request__title">ОСТАЛИСЬ ВОПРОСЫ</h2>
          <div class="request__subtitle">Заполните небольшую форму и мы ответим вам</div>
        </div>
        <form class="request__form">
          <div class="request__group">
            <input class="input" type="text" name="client_name" placeholder="Ваше имя" required>
            <input class="input" type="tel" name="client_tel" placeholder="Ваш телефон" pattern="[+]7\([0-9]{3}\)[0-9]{3}-[0-9]{2}-[0-9]{2}" required>
          </div>
          <div class="request__group">
            <div class="textarea">
              <textarea class="input" placeholder="Сообщение"></textarea>
            </div>
          </div>
          <label class="checkbox">
            <input type="checkbox" required>
            <div></div>
            <p>Вы соглашаетесь с <a href="#" target="_blank">политикой персональных данных</a>, нажимая кнопку</p>
          </label>
          <button class="button button_fill" type="submit">ОТПРАВИТЬ</button>
        </form>
      </div>
    </div>
  </div>
</section>