<div class="bottom d-flex justify-content-between flex-wrap align-items-center">
	<div class="bg"></div>
	<div class="text">

		<?php if ($args['title']): ?>
			<h2 class="title"><?= $args['title'] ?></h2>
		<?php endif ?>

		<?php if ($args['text']): ?>
			<p><?= $args['text'] ?></p>
		<?php endif ?>

	</div>

	<?php if ($args['image']): ?>
		<figure>
			<?= wp_get_attachment_image($args['image']['ID'], 'full') ?>
		</figure>
	<?php endif ?>

	<?php if ($args['button']): ?>
		<div class="btn-wrap d-flex justify-content-center justify-content-sm-end">
			<a href="<?= $args['button']['url'] ?>" class="btn-default btn-blue"<?php if($args['button']['target']) echo ' target="_blank"' ?>><?= $args['button']['title'] ?></a>
		</div>
	<?php endif ?>

</div>