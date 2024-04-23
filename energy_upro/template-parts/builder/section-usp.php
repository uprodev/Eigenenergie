<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<?php if ($items): ?>
		<section class="ups-section bg-grey"<?php if($id) echo ' id=' . $id ?>>
			<div class="container">
				<div class="row">
					<div class="content d-grid">

						<?php foreach ($items as $item): ?>
							<div class="item">

								<?php if ($item['icon']): ?>
									<div class="icon-wrap">
										<i class="<?= $item['icon'] ?>"></i>
									</div>
								<?php endif ?>
								
								<?php if ($item['title']): ?>
									<h6><?= $item['title'] ?></h6>
								<?php endif ?>
								
								<?= $item['description'] ?>

								<?php if ($item['link']): ?>
									<div class="link-wrap">
										<a href="<?= $item['link']['url'] ?>"<?php if($item['link']['target']) echo ' target="_blank"' ?>><?= $item['link']['title'] ?> <i class="fal fa-long-arrow-right"></i></a>
									</div>
								<?php endif ?>

							</div>
						<?php endforeach ?>

					</div>
				</div>
			</div>
		</section>
	<?php endif ?>

	<?php endif; ?>