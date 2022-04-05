<section class="faq">
	<div class="container">
		<div class="row">
			<div class="faq__header">
				<h2 class="title"><?php the_field('faq__title', 'option'); ?></h2>
				<?php if (get_field('faq__subtitle', 'option')) : ?>
					<div class="subtitle"><?php the_field('faq__subtitle', 'option'); ?></div>
				<?php endif; ?>
			</div>
			<div class="faq__container big-square">
				<div class="faq__questions">
					<?php if (have_rows('faq__items', 'option')) : ?>
						<?php while (have_rows('faq__items', 'option')) : the_row(); ?>
							<div class="faq__tab">
								<div class="faq__question"><?php the_sub_field('question'); ?></div>
								<div class="faq__answer"><?php the_sub_field('answer'); ?></div>
							</div>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
				<svg class="faq__mask" version="1.1" xmlns="http://www.w3.org/2000/svg"
						 xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="100%">
					<defs>
						<mask id="hole1">
							<rect width="100%" height="100%" fill="#fff"></rect>
							<rect class="faq__mask-rect"></rect>
						</mask>
					</defs>
					<rect width="100%" height="100%" fill="#fff" mask="url(#hole1)"></rect>
				</svg>
			</div>
			<div class="faq__footer">
				<button class="button button_fill" type="button" data-src="#modal-question" data-fancybox>ЗАДАЙТЕ ВАШ ВОПРОС
				</button>
			</div>
		</div>
	</div>
</section>
