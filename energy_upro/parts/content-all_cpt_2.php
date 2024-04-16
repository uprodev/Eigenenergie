<a href="<?= $args['link'] ?>">
	
	<?php if ($args['thumbnail']): ?>
		<figure>
			<?= $args['thumbnail'] ?>
		</figure>
	<?php endif ?>

	<div class="text-wrap">
		
		<?php if ($args['subtitle']): ?>
			<p><?= $args['subtitle'] ?></p>
		<?php endif ?>
		
		<?php if ($args['title']): ?>
			<h6><?= $args['title'] ?></h6>
		<?php endif ?>
		
	</div>
	<div class="link-wrap">
		<span><i class="fal fa-long-arrow-right"></i></span>
	</div>
</a>