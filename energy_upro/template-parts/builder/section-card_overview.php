<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<section class="item-3x item-3x-bg"<?php if($id) echo ' id=' . $id ?>>
		<div class="container">
			<div class="row">
				<div class="wrap">
					<div class="bg"></div>

					<?php if ($title): ?>
						<div class="title-wrap">
							<h2 class="title"><?= $title ?></h2>
						</div>
					<?php endif ?>

					<div class="content d-grid">

						<?php if($card_overview == 'Default' && $default): ?>

							<?php foreach($default as $post): 

								global $post;
								setup_postdata($post); ?>

								<?php 
								$thumbnail = has_post_thumbnail() ? get_the_post_thumbnail(get_the_ID(), 'full') : '';
								
								switch (get_post_type()) {
									case 'post':
									$terms = wp_get_object_terms(get_the_ID(), 'category');
									break;
									case 'page':
									$terms = '';
									break;
									
									default:
									$terms = wp_get_object_terms(get_the_ID(), get_post_type() . '_cat');
									break;
								}
								
								$term = $terms ? $terms[0]->name : '';
								?>

								<div class="item">
									<?php get_template_part('parts/content', 'all_cpt', ['link' => get_permalink(), 'target' => '', 'thumbnail' => $thumbnail, 'subtitle' => $term, 'title' => get_the_title()]) ?>
								</div>
							<?php endforeach; ?>

							<?php wp_reset_postdata(); ?>

						<?php endif; ?>

						<?php if ($card_overview == 'Custom' && $custom): ?>
							
							<?php foreach ($custom_cards as $item): ?>

								<?php 
								$link = $item['card_link'] ? $item['card_link']['url'] : '';
								$target = $item['card_link'] && $item['card_link']['target'] ? ' target="_blank"' : '';
								$thumbnail = $item['background_image'] ? wp_get_attachment_image($item['background_image']['ID'], 'full') : '';
								?>

								<div class="item">
									<?php get_template_part('parts/content', 'all_cpt', ['link' => $link, 'target' => $target, 'thumbnail' => $thumbnail, 'subtitle' => $item['subtitle'], 'title' => $item['title']]) ?>
								</div>
							<?php endforeach ?>
							
						<?php endif ?>

					</div>
				</div>

				<?php if ($button): ?>
					<div class="btn-wrap-full d-flex justify-content-center">
						<a href="<?= $button['url'] ?>" class="btn-default btn-pur"<?php if($button['target']) echo ' target="_blank"' ?>><?= $button['title'] ?></a>
					</div>
				<?php endif ?>

			</div>
		</div>
	</section>

	<?php endif; ?>