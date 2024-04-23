<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<section class="text-col-<?= $column_select ?>"<?php if($id) echo ' id=' . $id ?>>
		<div class="container">
			<div class="row">

				<?php if ($title): ?>
					<h2 class="p-0"><?= $title ?></h2>
				<?php endif ?>
				
				<div class="content p-0">
					
					<?= $description ?>

					<?php if ($button): ?>
						<div class="btn-wrap">
							<a href="<?= $button['url'] ?>" class="btn-default btn-15 btn-h-45"<?php if($button['target']) echo ' target="_blank"' ?>><?= $button['title'] ?></a>
						</div>
					<?php endif ?>

				</div>
			</div>
		</div>
	</section>

	<?php endif; ?>