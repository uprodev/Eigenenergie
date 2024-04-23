<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<?php if ($items): ?>
		<section class="slider-section m-0 br-0"<?php if($id) echo ' id=' . $id ?>>
			<div class="container">
				<div class="row">

					<?php if ($subtitle): ?>
						<p class="label"><?= $subtitle ?></p>
					<?php endif ?>
					
					<?php if ($title): ?>
						<h2><?= $title ?></h2>
					<?php endif ?>
					
					<div class="slider-wrap p-0">
						<div class="swiper full-img-slider">
							<div class="swiper-wrapper">

								<?php foreach ($items as $item): ?>

									<?php if ($item['type'] = 'Image' && $item['image']): ?>
										<div class="swiper-slide">
											<a href="<?= $item['image']['url'] ?>" data-fancybox >
												<?= wp_get_attachment_image($item['image']['ID'], 'full') ?>
											</a>
										</div>
									<?php endif ?>

									<?php if ($item['type'] = 'Video' && $item['video']): ?>
										<div class="swiper-slide video-slide">
											<a data-fancybox="" href="<?= $item['video'] ?>">

												<?php if ($item['poster']): ?>
													<?= wp_get_attachment_image($item['poster']['ID'], 'full') ?>
												<?php endif ?>
												
												<i class="fal fa-play-circle"></i>
											</a>
										</div>
									<?php endif ?>

								<?php endforeach ?>
								
							</div>
						</div>
						<div class="nav-wrap">
							<div class="swiper-button-next full-next"><i class="fal fa-arrow-circle-right"></i></div>
							<div class="swiper-button-prev full-prev"><i class="fal fa-arrow-circle-left"></i></div>
						</div>
						<div class="swiper-pagination full-pagination"></div>
					</div>
				</div>
			</div>
		</section>
	<?php endif ?>

	<?php endif; ?>