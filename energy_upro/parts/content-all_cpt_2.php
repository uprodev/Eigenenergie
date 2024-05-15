<?php if ($args['link']): ?>
	<a href="<?= $args['link'] ?>"<?= $args['target'] ?>>
	<?php endif ?>
	
	<?php if ($args['thumbnail']): ?>
		<figure>
			<?= $args['thumbnail'] ?>
		</figure>
	<?php endif ?>

	<div class="text-wrap">
		
		<?php if ($args['subtitle']): ?>

			<?php if ($args['is_ul']): ?>
				<ul>

					<?php foreach ($args['subtitle'] as $item): ?>
						<li><?= $item ?></li>
					<?php endforeach ?>
					
				</ul>
			<?php else: ?>
				<p><?= $args['subtitle'] ?></p>
			<?php endif ?>
		<?php endif ?>
		
		<?php if ($args['title']): ?>
			<h6><?= $args['title'] ?></h6>
		<?php endif ?>
		
	</div>

	<?php if ($args['link']): ?>
		<div class="link-wrap">
			<span><i class="fal fa-long-arrow-right"></i></span>
		</div>
	</a>
	<?php endif ?>