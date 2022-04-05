<form class="filter" id="filter"><span>Назначение</span>
  <select class="input select" name="category">
    <option value="">Все</option>
    <option value="dlya-sporta" selected>Для спорта</option>
    <option value="dlya-biznesa">Для бизнеса</option>
    <option value="promyshlennye">Промышленные</option>
  </select>
  <input type="hidden" name="page-id" value="<?php the_ID(); ?>">
</form>
