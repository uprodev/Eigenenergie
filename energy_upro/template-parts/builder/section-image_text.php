<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<div class="bg-grey-wrap"<?php if($id) echo ' id=' . $id ?>>
		<div class="bg bg-cta"></div>

		<?php if ($items): ?>

			<?php foreach ($items as $item): ?>

				<section class="img-text<?php if($item['image_position'] == 'Right') echo ' img-text-revers'; if($item['background_color'] == 'White') echo ' bg-white' ?>">
					<div class="container">
						<div class="row">
							<div class="content d-flex justify-content-between flex-wrap align-items-center<?php if($item['content_width'] == 'Full width') echo ' p-0' ?>">

								<?php if ($item['image']): ?>
									<figure class="col-6">
										<?= wp_get_attachment_image($item['image']['ID'], 'full') ?>
									</figure>
								<?php endif ?>

								<div class="text-wrap col-6">

									<?php if ($item['title']): ?>
										<h2 class="title"><?= $item['title'] ?></h2>
									<?php endif ?>

									<?php if ($item['description']): ?>
										<div class="line"><?= $item['description'] ?></div>
									<?php endif ?>

								</div>
							</div>
						</div>
					</div>
				</section>
			<?php endforeach ?>
			
		<?php endif ?>

		<?php if ($section_cta_block == 'Show'): ?>
			<section class="bg-slider-img no-slider">
				<div class="container">
					<div class="row">

						<?php 

						$fields = ['title' => 'title_cta', 'text' => 'text_cta', 'image' => 'image_cta', 'button' => 'button_cta'];

						foreach ($fields as $field => $field_) {
							$$field = $custom_default_cta == 'Custom' ? $$field_ : get_field($field . '_cta', 'option');
						}

						?>

						<?php if ($title || $text || $image || $button): ?>
							<?php get_template_part('parts/cta', null, ['title' => $title, 'text' => $text, 'image' => $image, 'button' => $button]) ?>
						<?php endif ?>

					</div>
				</div>
			</section>
		<?php endif ?>
		
	</div>

	<?php endif; ?>