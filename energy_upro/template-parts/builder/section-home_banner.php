<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<section class="home-banner<?php if($video_image == 'Image' && $desktop_image) echo ' no-video' ?>"<?php if($id) echo ' id=' . $id ?>>
		<div class="wrap-video">

			<?php if ($desktop_video || $desktop_image): ?>
				<div class="bg">

					<?php if ($video_image == 'Video' && $desktop_video): ?>
						<iframe src="<?= $desktop_video ?>?autoplay=1&mute=1&loop=1&color=white&controls=0&modestbranding=1&playsinline=1&rel=0&enablejsapi=1&playlist=WhY7uyc56ms" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					<?php endif ?>
					
					<?php if ($video_image == 'Image'): ?>
						
						<?php if ($desktop_image): ?>
							<?= wp_get_attachment_image($desktop_image['ID'], 'full', false, array('class' => 'desc-img')) ?>
						<?php endif ?>

						<?php if ($image = $mobile_image ?: $desktop_image): ?>
							<?= wp_get_attachment_image($image['ID'], 'full', false, array('class' => 'mob-img')) ?>
						<?php endif ?>
					<?php endif ?>
					
				</div>
			<?php endif ?>

			<div class="container">
				<div class="row">
					<div class="content">

						<?php if ($title): ?>
							<h1><?= $title ?></h1>
						<?php endif ?>
						
						<?php if ($description): ?>
							<?= add_class_content($description, 'line') ?>
						<?php endif ?>
						
						<?php if ($button || $ghost_button): ?>
							<div class="btn-wrap">


								<?php if ($button): ?>
									<a href="<?= $button['url'] ?>" class="btn-default"<?php if($button['target']) echo ' target="_blank"' ?>><?= $button['title'] ?></a>
								<?php endif ?>

								<?php if ($ghost_button): ?>
									<a href="<?= $ghost_button['url'] ?>" class="btn-default btn-border"<?php if($ghost_button['target']) echo ' target="_blank"' ?>><?= $ghost_button['title'] ?></a>
								<?php endif ?>

							</div>
						<?php endif ?>
						
					</div>
				</div>
			</div>
		</div>

		<?php if ($cards): ?>
			<div class="bottom-wrap">
				<ul class="d-flex flex-wrap">

					<?php foreach ($cards as $item): ?>
						<li>

							<?php if ($item['subtitle']): ?>
								<p><?= $item['subtitle'] ?></p>
							<?php endif ?>

							<?php if ($item['title']): ?>
								<h6><?= $item['title'] ?></h6>
							<?php endif ?>

							<?php if ($item['link']): ?>
								<a href="<?= $item['link']['url'] ?>" class="link"<?php if($item['link']['target']) echo ' target="_blank"' ?>>
									<i class="far fa-arrow-right"></i>
								</a>
							<?php endif ?>

						</li>
					<?php endforeach ?>

				</ul>
			</div>
		<?php endif ?>

		<?php if ($is_scroll): ?>
			<div class="scroll-down">
				<a href="#"><img src="<?= get_stylesheet_directory_uri() ?>/img/scroll.svg" alt=""></a>
			</div>
		<?php endif ?>

	</section>

	<?php endif; ?>