<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<?php 
	switch ($horizontal_spacing) {
		case 'Normal':
		$width = ' col-lg-10';
		break;
		case 'Small':
		$width = ' col-lg-8';
		break;

		default:
		$width = '';
		break;
	}
	?>

	<?php if ($inner_content): ?>
		<section class="text-default"<?php if($id) echo ' id=' . $id ?>>
			<div class="container">
				<div class="row">
					<div class="content<?= $width ?> col-12">

						<?php foreach ($inner_content as $item): ?>
							<?php 
							switch ($item['acf_fc_layout']) {
								case 'inner_text': ?>

								<?php if ($item['title']): ?>
									<<?= $item['h2_h3']  ?>><?= $item['title'] ?></<?= $item['h2_h3']  ?>>
								<?php endif ?>

								<?php if ($item['intro_text']): ?>
									<?= add_class_content($item['intro_text'], 'line') ?>
								<?php endif ?>

								<?= $item['content_text'] ?>

								<?php case 'inner_image_video':
								$is_image = $item['image_video'] == 'Image' && $item['image'];
								$is_video = $item['image_video'] == 'Video' && $item['video'];
								if ($is_image || $is_video) { ?>
									<p <?php if($is_video) echo ' class="video-p"' ?>>

										<?php if ($is_image): ?>
											<?= wp_get_attachment_image($item['image_thumbnail']['ID'], 'full') ?>
										<?php endif ?>

										<?php if ($is_video): ?>
											<a data-fancybox="" href="<?= $item['video'] ?>?autoplay=1">

												<?php if ($item['image']): ?>
													<?= wp_get_attachment_image($item['image']['ID'], 'full') ?>
												<?php endif ?>
												
												<i class="fal fa-play-circle"></i>
											</a>
										<?php endif ?>
										
										<?php if ($item['description']): ?>
											<?= add_class_content($item['description'], 'title-photo') ?>
										<?php endif ?>
										
									</p>
								<?php }
								break;

								default:
								break;
							}
							?>
						<?php endforeach ?>
						
					</div>
				</div>
			</div>
		</section>
	<?php endif ?>

	<?php endif; ?>