<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<section class="home-banner banner-project-detail"<?php if($id) echo ' id=' . $id ?>>
		<div class="wrap-video">

			<?php 
			$is_video = $background == 'Video' && $video;
			$is_image = $background == 'Image' && $image;
			?>

			<div class="bg">

				<?php if ($is_video): ?>
					<iframe src="<?= $video ?>?autoplay=1&mute=1&loop=1&color=white&controls=0&modestbranding=1&playsinline=1&rel=0&enablejsapi=1&playlist=WhY7uyc56ms" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				<?php endif ?>
				
				<?php if ($is_image): ?>
					<?= wp_get_attachment_image($image['ID'], 'full') ?>
				<?php endif ?>
				
			</div>
			<div class="container">
				<div class="row">
					<div class="content">

						<?php if ($subtitle): ?>

							<p class="label">

								<?php foreach ($subtitle as $item): ?>
									<?php if ($item['subtitle']): ?>
										<?= $item['subtitle'] ?>
									<?php endif ?>
								<?php endforeach ?>

							</p>

						<?php endif ?>
						
						<?php if ($title): ?>
							<h1><?= $title ?></h1>
						<?php endif ?>
						
						<?php if ($description): ?>
							<?= add_class_content($description, 'line') ?>
						<?php endif ?>
						
						<?php if ($button || $ghost_button): ?>
							<div class="btn-wrap">

								<?php if ($button): ?>
									<a href="<?= $button['url'] ?>" class="btn-default btn-white btn-15 btn-h-45"<?php if($button['target']) echo ' target="_blank"' ?>><?= $button['title'] ?></a>
								<?php endif ?>

								<?php if ($ghost_button): ?>
									<a href="<?= $ghost_button['url'] ?>" class="btn-default btn-white btn-15 btn-h-45"<?php if($ghost_button['target']) echo ' target="_blank"' ?>><?= $ghost_button['title'] ?></a>
								<?php endif ?>

							</div>
						<?php endif ?>

					</div>

					<?php if ($items): ?>
						<div class="info-project">
							<ul>

								<?php foreach ($items as $item): ?>
									<li>

										<?php if ($item['icon']): ?>
											<div class="icon-wrap">
												<i class="fal fa-solar-panel"></i>
											</div>
										<?php endif ?>
										
										<?php if ($item['text_1'] || $item['text_1']): ?>
											<div class="wrap">

												<?php if ($item['text_1']): ?>
													<p><?= $item['text_1'] ?></p>
												<?php endif ?>

												<?php if ($item['text_2']): ?>
													<h6><?= $item['text_2'] ?></h6>
												<?php endif ?>

											</div>
										<?php endif ?>
										
									</li>
								<?php endforeach ?>

							</ul>
						</div>
					<?php endif ?>
					
				</div>
			</div>
		</div>
	</section>

	<?php if ($inner_content): ?>
		<section class="text-default text-default-left pb-90">
			<div class="container">
				<div class="row">
					<div class="content col-lg-6 col-12 p-0">

						<?php foreach ($inner_content as $item): ?>
							<?php 
							switch ($item['acf_fc_layout']) {
								case 'inner_description':
								if ($item['description']) echo $item['description'];
								break;

								case 'inner_image_video':
								$is_image = $item['image_video'] == 'Image' && $item['image'];
								$is_video = $item['image_video'] == 'Video' && $item['video'];
								if ($is_image || $is_video) { ?>
									<p <?php if($is_video) echo ' class="video-p"' ?>>

										<?php if ($is_image): ?>
											<?= wp_get_attachment_image($item['image']['ID'], 'full') ?>
										<?php endif ?>

										<?php if ($is_video): ?>
											<a data-fancybox="" href="<?= $item['video'] ?>?autoplay=1">

												<?php if ($item['image']): ?>
													<?= wp_get_attachment_image($item['image']['ID'], 'full') ?>
												<?php endif ?>
												
												<i class="fal fa-play-circle"></i>
											</a>
										<?php endif ?>
										
										<?php if ($item['description']): ?>
											<?= add_class_content($item['description'], 'title-photo') ?>
										<?php endif ?>
										
									</p>
								<?php }
								break;

								default:
								break;
							}
							?>	
						<?php endforeach ?>

					</div>
				</div>
			</div>
		</section>
	<?php endif ?>

	<?php endif; ?>