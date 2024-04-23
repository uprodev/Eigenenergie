<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<section class="home-banner knowledge-banner"<?php if($id) echo ' id=' . $id ?>>

		<?php if ($image): ?>
			<div class="bg">
				<?= wp_get_attachment_image($image['ID'], 'full') ?>
			</div>
		<?php endif ?>

		<div class="container">
			<div class="row">
				<div class="content">

					<?php if ($subtitle): ?>
						<p class="label"><?= $subtitle ?></p>
					<?php endif ?>

					<?php if ($title): ?>
						<h1><?= $title ?></h1>
					<?php endif ?>

					<?php if ($description): ?>
						<div class="line"><?= $description ?></div>
					<?php endif ?>
					
					<?php if ($button): ?>
						<div class="btn-wrap">
							<a href="<?= $button['url'] ?>" class="btn-default btn-white btn-h-45 btn-15"<?php if($button['target']) echo ' target="_blank"' ?>><?= $button['title'] ?></a>
						</div>
					<?php endif ?>

				</div>
			</div>
		</div>
	</section>

	<?php endif; ?>