<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<section class="media-section no-slider"<?php if($id) echo ' id=' . $id ?>>
		<div class="bg br-15"></div>
		<div class="container">
			<div class="row">
				<div class="top d-flex justify-content-between flex-wrap<?php if($video_or_image == 'Image' && $image_left_right == 'Right') echo ' top-revers' ?>">
					<div class="video-wrap">
						<div class="wrap">
							<figure>

								<?php if ($video_or_image == 'Video' && $video): ?>
									<a data-fancybox="" href="<?= $video ?>?autoplay=1">
									<?php endif ?>

									<?php if ($image): ?>
										<?= wp_get_attachment_image($image['ID'], 'full') ?>
									<?php endif ?>

									<?php if ($video_or_image == 'Video' && $video): ?>
										<div class="icon-wrap">
											<i class="fal fa-play-circle"></i>
										</div>
									<?php endif ?>

									<?php if ($video_or_image == 'Video' && $video): ?>
									</a>
								<?php endif ?>

							</figure>
						</div>
					</div>
					<div class="text">

						<?php if ($title): ?>
							<h2><?= $title ?></h2>
						<?php endif ?>

						<?php if ($text): ?>
							<?= add_class_content($text, 'line') ?>
						<?php endif ?>

					</div>
				</div>

				<?php if (!empty($bottom)): ?>
					<div class="bottom">
						<div class="line-wrap">
							<img src="<?= get_stylesheet_directory_uri() ?>/img/icon-1.svg" alt="">
						</div>
						<div class="wrap-text">

							<?php if ($bottom['title']): ?>
								<h2 class="title"><?= $bottom['title'] ?></h2>
							<?php endif ?>

							<?= $bottom['text'] ?>

						</div>

						<?php if (!empty($bottom['cards'])): ?>
							<div class="slider-wrap">
								<div class="swiper slider-3x">
									<div class="swiper-wrapper">

										<?php $counter = 0 ?>

										<?php foreach ($bottom['cards'] as $item): ?>

											<?php $cards = $item['custom_or_default'] == 'Default' ? $item['default'] : $item['custom'] ?>

											<?php if ($cards): ?>

												<?php foreach ($cards as $card): ?>

													<?php 
													$link = '';
													$image = '';
													$title = '';
													$subtitle = '';
													if(is_array($card)){
														if ($card['link']) {
															$link = $card['link']['url'];
															if($card['link']['target']) $target = ' target="_blank"';
														}
														if($card['image']) $image = wp_get_attachment_image($card['image']['ID'], 'full');
														$title = $card['title'];
														$subtitle = $card['subtitle'];
													} else{
														$link = get_permalink($card->ID);
														$target = '';
														if(has_post_thumbnail($card->ID)) $image = get_the_post_thumbnail($card->ID, 'full');
														$title = $card->post_title;
														$subtitle = get_post_type($card->ID);
													}
													?>

													<div class="swiper-slide<?php if(!$link) echo ' no-link' ?>">
														<a href="<?= $link ?: '#' ?>"<?= $target ?>>
															<?= $image ?>

															<?php if ($subtitle): ?>
																<p><?= $subtitle ?></p>
															<?php endif ?>

															<?php if ($title): ?>
																<h6><?= $title ?></h6>
															<?php endif ?>

														</a>
													</div>

													<?php $counter++ ?>

												<?php endforeach ?>

											<?php endif ?>

										<?php endforeach ?>

									</div>

									<?php if ($counter > 3): ?>
										<div class="swiper-pagination pagination-3x"></div>
									<?php endif ?>

								</div>
							</div>
						<?php endif ?>

					</div>
				<?php endif ?>

			</div>
		</div>
	</section>

	<?php endif; ?>