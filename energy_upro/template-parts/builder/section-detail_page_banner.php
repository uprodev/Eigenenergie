<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<section class="home-banner contact-banner banner-specialism-detail"<?php if($id) echo ' id=' . $id ?>>
		<div class="wrap-video">

			<?php if ($image): ?>
				<div class="bg-contact">
					<?= wp_get_attachment_image($image['ID'], 'full') ?>
				</div>
			<?php endif ?>

			<div class="container">
				<div class="row">
					<div class="content-contact d-flex justify-content-between flex-wrap p-0">
						<div class="text col-12 col-lg-6">

							<?php if ($subtitle): ?>
								<p class="label"><?= $subtitle ?></p>
							<?php endif ?>

							<?php if ($title): ?>
								<h1><?= $title ?></h1>
							<?php endif ?>

							<?php if ($image): ?>
								<figure class="mob">
									<?= wp_get_attachment_image($image['ID'], 'full') ?>
								</figure>
							<?php endif ?>

							<?php if ($description): ?>
								<div class="line"><?= $description ?></div>
							<?php endif ?>

							<?php if ($button): ?>
								<div class="btn-wrap">
									<a href="<?= $button['url'] ?>" class="btn-default"<?php if($button['target']) echo ' target="_blank"' ?>><?= $button['title'] ?></a>
								</div>
							<?php endif ?>

						</div>
						<div class="form-wrap col-12 col-lg-6 d-flex justify-content-lg-end justify-content-center">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php if ($list_items): ?>
		<section class="text-img-block only-bottom">
			<div class="container">
				<div class="row">
					<div class="bottom  col-12">
						<ul class="d-flex justify-content-center flex-wrap">

							<?php foreach ($list_items as $item): ?>
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
				</div>
			</div>
			<div class="scroll-down">
				<a href="#"><img src="<?= get_stylesheet_directory_uri() ?>/img/scroll.svg" alt=""></a>
			</div>
		</section>
	<?php endif ?>

	<?php endif; ?>