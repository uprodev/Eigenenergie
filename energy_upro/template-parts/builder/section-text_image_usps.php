<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<section class="text-img-block">
		<div class="container">
			<div class="row">
				<div class="top d-flex justify-content-between flex-wrap">
					<div class="bg p-0"></div>
					<div class="text col-12 col-md-6">

						<?php if ($title): ?>
							<h2><?= $title ?></h2>
						<?php endif ?>

						<?php if ($text): ?>
							<?= add_class_content($text, 'line') ?>
						<?php endif ?>

						<?php if ($button): ?>
							<div class="btn-wrap">
								<a href="<?= $button['url'] ?>" class="btn-default btn-blue"<?php if($button['target']) echo ' target="_blank"' ?>><?= $button['title'] ?></a>
							</div>
						<?php endif ?>

					</div>

					<?php if ($image): ?>
						<figure class="col-12 col-md-6 d-flex justify-content-md-end justify-content-center">
							<?= wp_get_attachment_image($image['ID'], 'full') ?>
						</figure>
					<?php endif ?>

				</div>

				<?php if ($items): ?>
					<div class="bottom  col-12">
						<ul class="d-flex justify-content-center flex-wrap">

							<?php foreach ($items as $item): ?>
								<li>

									<?php if ($item['icon']): ?>
										<div class="icon-wrap">
											<i class="<?= $item['icon'] ?>"></i>
										</div>
									<?php endif ?>

									<?php if ($item['text']): ?>
										<p><?= $item['text'] ?></p>
									<?php endif ?>

								</li>
							<?php endforeach ?>

						</ul>
					</div>
				<?php endif ?>

			</div>
		</div>
	</section>

	<?php endif; ?>