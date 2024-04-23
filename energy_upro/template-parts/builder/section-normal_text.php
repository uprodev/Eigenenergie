<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<section class="text-default<?php if($background_color == 'Grey') echo ' bg-grey' ?>"<?php if($id) echo ' id=' . $id ?>>
		<div class="container">
			<div class="row">

				<?php 
				switch ($spacing_selector) {
					case 'Normal width':
					$width = ' col-lg-10';
					break;
					case 'Small width':
					$width = ' col-lg-8';
					break;

					default:
					$width = '';
					break;
				}
				?>

				<div class="content<?= $width ?> col-12">

					<?php if ($title): ?>
						<h2><?= $title ?></h2>
					<?php endif ?>

					<?= $content ?>

					<?php if ($button): ?>
						<div class="btn-wrap d-flex justify-content-center mt-5">
							<a href="<?= $button['url'] ?>" class="btn-default btn-pur btn-15 btn-h-45"<?php if($button['target']) echo ' target="_blank"' ?>><?= $button['title'] ?></a>
						</div>
					<?php endif ?>

				</div>
			</div>
		</div>
	</section>

	<?php endif; ?>