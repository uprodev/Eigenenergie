<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<div class="contact-block d-flex justify-content-between flex-wrap<?= $horizontal_spacing_selector == 'Normal width' ? ' w-10' : ' w-full' ?><?php if($vertical_spacing_top == 'No') echo ' mt-0'; if($vertical_spacing_bottom == 'No') echo ' mb-0'; ?>"<?php if($id) echo ' id=' . $id ?>>

		<?php if ($image): ?>
			<div class="img-wrap">
				<?= wp_get_attachment_image($image['ID'], 'full') ?>
			</div>
		<?php endif ?>
		
		<div class="text">

			<?= $description ?>

			<?php if ($contact_info): ?>
				<div class="user-block d-flex flex-wrap justify-content-between">

					<?php if ($contact_info['image']): ?>
						<div class="img-user">
							<?= wp_get_attachment_image($contact_info['image']['ID'], 'full') ?>
						</div>
					<?php endif ?>

					<div class="wrap">

						<?php if ($contact_info['title']): ?>
							<h6><?= $contact_info['title'] ?></h6>
						<?php endif ?>

						<?php if ($contact_info['table']): ?>
							<ul>

								<?php foreach ($contact_info['table'] as $item): ?>

									<?php if ($item['link']): ?>
										<li>
											<a href="<?= $item['link']['url'] ?>"<?php if($item['link']['target']) echo ' target="_blank"' ?>>

												<?php if ($item['icon']): ?>
													<i class="<?= $item['icon'] ?>"></i>
												<?php endif ?>

												<?= $item['link']['title'] ?></a>
											</li>
										<?php endif ?>

									<?php endforeach ?>

								</ul>
							<?php endif ?>

						</div>
					</div>
				<?php endif ?>

			</div>
		</div>

		<?php endif; ?>