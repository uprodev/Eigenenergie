<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<section class="home-banner banner-404 img-visible" >

		<?php if ($background_image): ?>
			<div class="bg">
				<?= wp_get_attachment_image($background_image['ID'], 'full') ?>
			</div>
		<?php endif ?>

		<div class="container">
			<div class="row">
				<div class="content-404">

					<?php if ($subtitle): ?>
						<p class="label"><?= $subtitle ?></p>
					<?php endif ?>
					
					<?php if ($title): ?>
						<h1><?= $title ?></h1>
					<?php endif ?>
					
					<?php if ($description): ?>
						<?= add_class_content($description, 'line') ?>
					<?php endif ?>
					
					<?php if ($button): ?>
						<div class="btn-wrap">
							<a href="<?= $button['url'] ?>" class="btn-default btn-grey"<?php if($button['target']) echo ' target="_blank"' ?>><?= $button['title'] ?></a>
						</div>
					<?php endif ?>

				</div>
			</div>
		</div>

	</section>

	<?php endif; ?>