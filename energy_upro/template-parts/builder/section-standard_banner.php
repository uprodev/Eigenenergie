<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<section class="home-banner banner-specialism img-visible over-banner"<?php if($id) echo ' id=' . $id ?>>

		<?php if ($background_image): ?>
			<div class="bg">
				<?= wp_get_attachment_image($background_image['ID'], 'full') ?>
			</div>
		<?php endif ?>

		<div class="container">
			<div class="row">
				<div class="content">
					<div class="left">

						<?php if ($subtitle): ?>
							<p class="label"><?= $subtitle ?></p>
						<?php endif ?>

						<?php if ($title): ?>
							<h1><?= $title ?></h1>
						<?php endif ?>

						<?php if ($description): ?>
							<?= add_class_content($description, 'line') ?>
						<?php endif ?>
						
					</div>

					<?php if ($quicklinks == 'On'): ?>
						<div class="select-block-link">

							<?php if ($quicklinks_title): ?>
								<p class="label"><?= $quicklinks_title ?></p>
							<?php endif ?>

							<div class="nice-select">

								<?php if ($quicklinks_placeholder): ?>
									<span class="current"><?= $quicklinks_placeholder ?></span>
								<?php endif ?>

								<?php if ($quicklinks_links): ?>
									<ul class="list">

										<?php foreach ($quicklinks_links as $item): ?>										
											<?php if ($item['link']): ?>
												<li class="option">
													<a href="<?= $item['link']['url'] ?>"<?php if(str_contains($item['link']['url'], '#')) echo ' class="scroll"' ?><?php if($item['link']['target']) echo ' target="_blank"' ?>><?= $item['link']['title'] ?></a>
												</li>
											<?php endif ?>
										<?php endforeach ?>

									</ul>
								<?php endif ?>

							</div>
						</div>
					<?php endif ?>

					<div class="btn-wrap">
						<?php if ($button): ?>
							<a href="<?= $button['url'] ?>" class="btn-default btn-white btn-15 btn-h-45"<?php if($button['target']) echo ' target="_blank"' ?>><?= $button['title'] ?></a>
						</div>
					<?php endif ?>

				</div>
			</div>
		</div>

	</section>

	<?php endif; ?>