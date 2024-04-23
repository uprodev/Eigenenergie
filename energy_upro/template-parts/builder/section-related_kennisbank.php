<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<?php 
	switch ($background_color) {
		case 'Grey':
		$class = ' bg-grey';
		break;
		case 'Grey top':
		$class = ' bg-grey-50-top';
		break;
		case 'Grey bottom':
		$class = ' bg-grey-50';
		break;
		
		default:
		$class = '';
		break;
	}

	?>

	<section class="item-3x knowledge-3x<?= $class ?>"<?php if($id) echo ' id=' . $id ?>>
		<div class="bg"></div>
		<div class="container">
			<div class="row">

				<?php if ($title): ?>
					<h2 class="title"><?= $title ?></h2>
				<?php endif ?>
				
				<?php if($kennisbank_cards == 'Default') $posts = get_posts(array('post_type' => 'kennis', 'posts_per_page' => 3)) ?>

				<div class="content d-flex flex-wrap p-0">

					<?php if($kennisbank_cards == 'Default' && $posts): ?>

						<?php foreach($posts as $post): 

							global $post;
							setup_postdata($post); ?>

							<?php 
							$thumbnail = has_post_thumbnail() ? get_the_post_thumbnail(get_the_ID(), 'full') : '';
							$terms = wp_get_object_terms(get_the_ID(), get_post_type() . '_cat');
							$term = $terms[0]->name;
							$subtitle = [$term, get_the_date()];
							?>

							<div class="item">
								<?php get_template_part('parts/content', 'all_cpt_2', ['link' => get_permalink(), 'thumbnail' => $thumbnail, 'subtitle' => $subtitle, 'title' => get_the_title(), 'is_ul' => true]) ?>
							</div>

						<?php endforeach; ?>

						<?php wp_reset_postdata(); ?>

					<?php elseif(isset($custom) && $custom): ?>

						<?php foreach ($custom as $item): ?>

							<?php 
							$thumbnail = $item['image'] ? wp_get_attachment_image($item['image']['ID'], 'full') : '';
							$link = $item['link'] ? $item['link']['url'] : '';
							$target = $item['link'] && $item['link']['target'] ? ' target="_blank"' : '';
							$subtitle = $item['subtitle'] ? wp_list_pluck($item['subtitle'], 'subtitle') : '';
							?>

							<div class="item">
								<?php get_template_part('parts/content', 'all_cpt_2', ['link' => $link, 'target' => $target, 'thumbnail' => $thumbnail, 'subtitle' => $subtitle, 'title' => $item['title'], 'is_ul' => true]) ?>
							</div>

						<?php endforeach ?>

					<?php endif; ?>

				</div>

				<?php if ($button): ?>
					<div class="btn-wrap d-flex justify-content-center">
						<a href="<?= $button['url'] ?>" class="btn-default btn-pur btn-15 btn-h-45"<?php if($button['target']) echo ' target="_blank"' ?>><?= $button['title'] ?></a>
					</div>
				<?php endif ?>

			</div>
		</div>
	</section>

	<?php endif; ?>