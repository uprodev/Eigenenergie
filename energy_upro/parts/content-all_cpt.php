<?php if ($args['link']): ?>
<a href="<?= $args['link'] ?>"<?= $args['target'] ?>></a>
<?php endif ?>

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