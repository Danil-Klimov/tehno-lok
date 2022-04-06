<section class="cases">
	<div class="container">
		<div class="row">
			<?php $cases = get_sub_field('cases'); ?>
			<?php if(count($cases) > 1) : ?>
				<div class="cases__nav">
					<?php foreach ($cases as $case) : ?>
						<a href="#<?php echo $case['name']; ?>" class="cases__anchor">
							<?php echo wp_get_attachment_image($case['icon'], 'full'); ?>
							<span><?php echo $case['name']; ?></span>
						</a>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
			<?php foreach ($cases as $key => $case) : ?>
				<?php $gallery = $case['gallery']; ?>
				<div class="cases__case<?php echo $key % 2 ? ' cases__case_right-to-left' : ' cases__case_left-to-right' ?>" id="<?php echo $case['name']; ?>">
					<div class="cases__main">
						<div class="cases__text">
							<div class="cases__name">
								<?php echo $case['name']; ?>
								<?php echo wp_get_attachment_image($case['icon'], '43x43'); ?>
							</div>
							<?php foreach ($gallery as $gallery_key => $item) : ?>
								<div class="cases__description<?php echo $gallery_key == 0 ? ' active' : ''; ?>">
									<?php echo $item['description'] ?: $case['description']; ?>
								</div>
							<?php endforeach; ?>
							<?php if($case['link']) : ?>
								<a href="<?php echo $case['link']['url']; ?>" class="button button_fill cases__btn"
									 target="<?php echo $case['link']['target']; ?>">
									<?php echo $case['link']['title']; ?>
								</a>
							<?php endif; ?>
						</div>
						<div class="cases__img-wrap">
							<div class="cases__img swiper-container">
								<div class="swiper-wrapper">
									<?php foreach ($gallery as $item) : ?>
										<?php echo wp_get_attachment_image($item['img'], '720x540', false, array(
											'class' => 'swiper-slide'
										)); ?>
									<?php endforeach; ?>
								</div>
							</div>
							<button class="arrow arrow_sm arrow_dark arrow_next cases__arrow" type="button">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 11" fill="currentColor" width="8" height="10">
									<polygon points="9 5.5 0 0 0 11 9 5.5"></polygon>
								</svg>
							</button>
							<button class="arrow arrow_sm arrow_dark arrow_prev cases__arrow" type="button">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 11" fill="currentColor" width="8" height="10">
									<polygon points="0 5.5 9 0 9 11 0 5.5"></polygon>
								</svg>
							</button>
						</div>
					</div>
					<div class="cases__gallery-wrap">
						<div class="cases__gallery swiper-container">
							<div class="swiper-wrapper">
								<?php foreach ($gallery as $item) : ?>
									<?php echo wp_get_attachment_image($item['img'], '165x125', false, array(
										'class' => 'swiper-slide'
									)); ?>
								<?php endforeach; ?>
							</div>
						</div>
						<button class="arrow arrow_sm arrow_dark arrow_next cases__arrow" type="button">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 11" fill="currentColor" width="8" height="10">
								<polygon points="9 5.5 0 0 0 11 9 5.5"></polygon>
							</svg>
						</button>
						<button class="arrow arrow_sm arrow_dark arrow_prev cases__arrow" type="button">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 11" fill="currentColor" width="8" height="10">
								<polygon points="0 5.5 9 0 9 11 0 5.5"></polygon>
							</svg>
						</button>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
