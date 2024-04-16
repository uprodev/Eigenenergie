<?php get_header(); ?>

<section class="home-banner banner-404 img-visible" >

	<?php if ($field = get_field('image_404', 'option')): ?>
		<div class="bg">
			<?= wp_get_attachment_image($field['ID'], 'full') ?>
		</div>
	<?php endif ?>

	<div class="container">
		<div class="row">
			<div class="content-404">

				<?php if ($field = get_field('subtitle_404', 'option')): ?>
					<p class="label"><?= $field ?></p>
				<?php endif ?>
				
				<?php if ($field = get_field('title_404', 'option')): ?>
					<h1><?= $field ?></h1>
				<?php endif ?>
				
				<?php if ($field = get_field('description_404', 'option')): ?>
					<?= add_class_content($field, 'line') ?>
				<?php endif ?>
				
				<?php if ($field = get_field('button_404', 'option')): ?>
					<div class="btn-wrap">
						<a href="<?= $field['url'] ?>" class="btn-default btn-grey"<?php if($field['target']) echo ' target="_blank"' ?>><?= $field['title'] ?></a>
					</div>
				<?php endif ?>

			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>