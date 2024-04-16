<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<section class="contact">
		<div class="container">
			<div class="row">
				<div class="text  col-12 col-lg-6">

					<?php if ($title): ?>
						<h2><?= $title ?></h2>
					<?php endif ?>

					<?php if ($text): ?>
						<?= add_class_content($text, 'line') ?>
					<?php endif ?>

					<?php if (!empty($contact)): ?>
						<div class="user-block d-flex justify-content-between">

							<?php if ($contact['image']): ?>
								<figure>
									<?= wp_get_attachment_image($contact['image']['ID'], 'full') ?>
								</figure>
							<?php endif ?>
							
							<div class="wrap-text">

								<?php if ($contact['name']): ?>
									<h6><?= $contact['name'] ?></h6>
								<?php endif ?>

								<?php if ($contact['function']): ?>
									<p><?= $contact['function'] ?></p>
								<?php endif ?>

								<?php if (!empty($contact['links'])): ?>
									<ul>

										<?php foreach ($contact['links'] as $item): ?>
											<?php if ($item['link']): ?>
												<li>
													<a href="<?= $item['link']['url'] ?>"<?php if($item['link']['target']) echo ' target="_blank"' ?>>

														<?php if ($item['icon']): ?>
															<i class="<?= $item['icon'] ?>"></i>
														<?php endif ?>
														
														<?= $item['link']['title'] ?>
													</a>
												</li>
											<?php endif ?>
										<?php endforeach ?>

									</ul>
								<?php endif ?>
								
								<?php if ($contact['arrow_link']): ?>
									<div class="link-wrap">
										<a href="<?= $contact['arrow_link']['url'] ?>"<?php if($contact['arrow_link']['target']) echo ' target="_blank"' ?>><?= $contact['arrow_link']['title'] ?> <i class="far fa-chevron-double-right"></i></a>
									</div>
								<?php endif ?>

							</div>
						</div>
					<?php endif ?>

				</div>

				<?php if ($image_right): ?>
					<div class="img-wrap col-6 p-0">
						<?= wp_get_attachment_image($image_right['ID'], 'full') ?>
					</div>
				<?php endif ?>
				
			</div>
		</div>
	</section>

	<?php endif; ?>