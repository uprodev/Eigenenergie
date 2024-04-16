<a href="<?= $args['link'] ?>">

	<?php if ($args['thumbnail']): ?>
		<figure>
			<?= $args['thumbnail'] ?>
		</figure>
	<?php endif ?>

	<div class="text-wrap">
		<ul>

			<?php if ($args['subtitle']): ?>
				<li><?= $args['subtitle'] ?></li>
			<?php endif ?>

			<?php if ($args['date']): ?>
				<li><?= $args['date'] ?></li>
			<?php endif ?>

		</ul>

		<?php if ($args['title']): ?>
			<h6><?= $args['title'] ?></h6>
		<?php endif ?>
		
	</div>
	<div class="link-wrap">
		<span><i class="fal fa-long-arrow-right"></i></span>
	</div>
</a>