<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<?php if ($left_content || $right_content || $card_links): ?>
		<section class="home-banner contact-banner"<?php if($id) echo ' id=' . $id ?>>
			<div class="wrap-video">

				<?php if ($right_content && $right_content['background_image']): ?>
					<div class="bg-contact">
						<?= wp_get_attachment_image($right_content['background_image']['ID'], 'full') ?>
					</div>
				<?php endif ?>

				<div class="container">
					<div class="row">
						<div class="content-contact d-flex justify-content-between flex-wrap p-0">

							<?php if ($left_content): ?>
								<div class="text col-12 col-lg-6">

									<?php if ($left_content['subtitle']): ?>
										<p class="label"><?= $left_content['subtitle'] ?></p>
									<?php endif ?>

									<?php if ($left_content['title']): ?>
										<h1><?= $left_content['title'] ?></h1>
									<?php endif ?>

									<?php if ($left_content['description']): ?>
										<?= add_class_content($left_content['description'], 'sub-title') ?>
									<?php endif ?>

									<?php if ($left_content['columns']): ?>
										<div class="d-flex justify-content-between flex-wrap">

											<?php foreach ($left_content['columns'] as $index => $item): ?>
												<div class="item<?php if((count($left_content['columns']) % 2 == 1) && ($index == count($left_content['columns']) - 1)) echo ' item-full' ?> item-<?= $index + 1 ?>">

													<?php if ($item['title']): ?>
														<h6><?= $item['title'] ?></h6>
													<?php endif ?>
													
													<?= $item['description'] ?>

													<?php if ($item['table']): ?>
														<ul>

															<?php foreach ($item['table'] as $item_2): ?>
																<li>

																	<?php if ($item_2['table_left_column'] == 'Icon' && $item_2['table_right_column'] == 'Link' && $item_2['link_right']): ?>
																		<a href="<?= $item_2['link_right']['url'] ?>"<?php if($item_2['link_right']['target']) echo ' target="_blank"' ?>>

																			<?php if ($item_2['icon_left']): ?>
																				<i class="<?= $item_2['icon_left'] ?>"></i>
																			<?php endif ?>
																			
																			<?= $item_2['link_right']['title'] ?></a>
																		<?php endif ?>

																		<?php if ($item_2['table_left_column'] == 'Text' || ($item_2['table_left_column'] == 'Icon' && $item_2['table_right_column'] == 'Text')): ?>
																			<p>

																				<?php if ($item_2['icon_left']): ?>
																					<i class="<?= $item_2['icon_left'] ?>"></i>
																				<?php else: ?>
																					<?= $item_2['text_left'] ?>
																				<?php endif ?>
																				
																				<?php if ($item_2['table_right_column'] == 'Text' && $item_2['text_right']): ?>
																					<span><?= $item_2['text_right'] ?></span>
																				<?php endif ?>
																				
																				<?php if ($item_2['table_right_column'] == 'Link' && $item_2['link_right']): ?>
																					<a href="<?= $item_2['link_right']['url'] ?>"<?php if($item_2['link_right']['target']) echo ' target="_blank"' ?>><?= $item_2['link_right']['title'] ?></a>
																				<?php endif ?>
																				
																			</p>
																		<?php endif ?>

																	</li>
																<?php endforeach ?>

															</ul>
															
														<?php endif ?>

														<?= $item['description_after_table'] ?>

													</div>
												<?php endforeach ?>

											</div>
										<?php endif ?>

									</div>
								<?php endif ?>

								<?php if ($right_content): ?>
									<div class="form-wrap col-12 col-lg-6 d-flex justify-content-lg-end justify-content-center">

										<?php if ($right_content['form']): ?>
											<?= do_shortcode('[contact-form-7 id="' . $right_content['form'] . '" html_class="form-default"]') ?>
										<?php endif ?>
										
									</div>
								<?php endif ?>
								
							</div>
						</div>
					</div>
				</div>

				<?php if ($card_links): ?>
					<div class="bottom-wrap">
						<ul class="d-flex flex-wrap">

							<?php foreach ($card_links as $item): ?>
								<li>

									<?php if ($item['subtitle']): ?>
										<p><?= $item['subtitle'] ?></p>
									<?php endif ?>
									
									<?php if ($item['title']): ?>
										<h6><?= $item['title'] ?></h6>
									<?php endif ?>
									
									<?php if ($item['link']): ?>
										<a href="<?= $item['link']['url'] ?>" class="link"<?php if($item['link']['target']) echo ' target="_blank"' ?>>
											<i class="far fa-arrow-right"></i>
										</a>
									<?php endif ?>

								</li>
							<?php endforeach ?>

						</ul>
					</div>
				<?php endif ?>

			</section>
		<?php endif ?>

		<?php endif; ?>