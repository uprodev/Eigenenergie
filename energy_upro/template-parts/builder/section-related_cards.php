<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<?php 

	$fields = ['title' => 'title_cta', 'text' => 'text_cta', 'image' => 'image_cta', 'button' => 'button_cta'];

	foreach ($fields as $field => $field_) {
		$$field = $custom_default_cta == 'Custom' ? $$field_ : get_field($field . '_cta', 'option');
	}
	$is_fields = $title || $text || $image || $button;

	?>

	<div class="bg-wrap-cta<?php if($background_color == 'Grey') echo ' bg-grey'; if($background_color_top == 'Grey') echo ' bg-grey-50-top'; if($background_color_bottom == 'Grey') echo ' bg-grey-50'; ?>"<?php if($id) echo ' id=' . $id ?>>
		<div class="bg bg-cta"></div>
		<section class="bg-slider-img no-slider<?php if(!$is_fields) echo ' block-empty' ?>">
			<div class="bg"></div>
			<div class="container">
				<div class="row">

					<?php if ($is_fields): ?>
						<div class="bg-slider-img no-slider">
							<?php get_template_part('parts/cta', null, ['title' => $title, 'text' => $text, 'image' => $image, 'button' => $button]) ?>
						</div>
					<?php endif ?>

				</div>

			</div>
		</section>
		<section class="item-2x item-2x-title">
			<div class="container">
				<div class="row">

					<?php if ($title_): ?>
						<div class="title-wrap">
							<h3 class="title"><?= $title_ ?></h3>
						</div>
					<?php endif ?>

					<?php 
					$is_default = $custom_or_default_cards == 'Default' && $default_cards;
					$is_custom = $custom_or_default_cards == 'Custom' && $custom_cards;
					?>

					<?php if ($is_default || $is_custom): ?>
						<div class="content d-flex justify-content-between flex-wrap p-0">

							<?php if($is_default): ?>

								<?php foreach($default_cards as $post): 

									global $post;
									setup_postdata($post); ?>

									<?php 
									$thumbnail = has_post_thumbnail() ? get_the_post_thumbnail(get_the_ID(), 'full') : '';
									$terms = wp_get_object_terms(get_the_ID(), get_post_type() . '_cat');
									$term = $terms[0]->name;
									?>

									<div class="item">
										<?php get_template_part('parts/content', 'all_cpt_2', ['link' => get_permalink(), 'thumbnail' => $thumbnail, 'subtitle' => get_post_type() . ' • ' . $term, 'title' => get_the_title()]) ?>
									</div>

								<?php endforeach; ?>

								<?php wp_reset_postdata(); ?>

							<?php else: ?>

								<?php foreach ($custom_cards as $item): ?>

									<?php 
									$thumbnail = $item['image'] ? wp_get_attachment_image($item['image']['ID'], 'full') : '';
									$link = $item['link'] ? $item['link']['url'] : '';
									$target = $item['link'] && $item['link']['target'] ? ' target="_blank"' : '';
									$subtitle = !empty($item['subtitles']) ? implode(' • ', wp_list_pluck($item['subtitles'], 'subtitle')) : '';
									?>

									<div class="item">
										<?php get_template_part('parts/content', 'all_cpt_2', ['link' => $link, 'target' => $target, 'thumbnail' => $thumbnail, 'subtitle' => $subtitle, 'title' => $item['title']]) ?>
									</div>

								<?php endforeach ?>

							<?php endif; ?>

						</div>
					<?php endif ?>

					<?php if ($button_): ?>
						<div class="btn-wrap-full d-flex justify-content-center">
							<a href="<?= $button_['url'] ?>" class="btn-default"<?php if($button_['target']) echo ' target="_blank"' ?>><?= $button_['title'] ?></a>
						</div>
					<?php endif ?>

				</div>
			</div>
		</section>
	</div>

	<?php endif; ?>