<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<section class="faq-block<?php if($background_color == 'Grey') echo ' bg-grey' ?>"<?php if($id) echo ' id=' . $id ?>>
		<div class="bg"></div>
		<div class="container">
			<div class="row">

				<?php if ($image): ?>
					<figure>
						<?= wp_get_attachment_image($image['ID'], 'full') ?>
					</figure>
				<?php endif ?>

				<div class="content">

					<?php if ($title): ?>
						<h2><?= $title ?></h2>
					<?php endif ?>
					
					<?php if ($items): ?>
						<ul class="accordion">

							<?php foreach ($items as $item): ?>

								<?php if ($item['title'] && $item['text']): ?>
									<li class="accordion-item">
										<div class="accordion-thumb">
											<p><?= $item['title'] ?></p>
										</div>
										<div class="accordion-panel">
											<div class="wrap"><?= $item['text'] ?></div>
										</div>
									</li>
								<?php endif ?>
								
							<?php endforeach ?>
							
						</ul>
					<?php endif ?>
					
				</div>
			</div>
		</div>
	</section>

	<?php endif; ?>