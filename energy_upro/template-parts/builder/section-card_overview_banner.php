<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<?php 
	$template = 'all_cpt';
	$is_default = $cards_overview == 'Default' && $filter_default == 'Show';
	$is_selection = $cards_overview == 'Selection' && $filter_selection == 'Show';
	$filter_title = $is_default && $filter_title_default ? $filter_title_default : ($is_selection && $filter_title_selection ? $filter_title_selection : '');
	$filter_dropdown_placeholder = $is_default && $filter_dropdown_placeholder_default ? $filter_dropdown_placeholder_default : ($is_selection && $filter_dropdown_placeholder_selection ? $filter_dropdown_placeholder_selection : '');

	$terms = '';
	if ($is_default) {
		$terms = get_terms( [
			'taxonomy' => $default->name . '_cat',
			'hide_empty' => false,
		] );
	}
	if ($is_selection && $selection) {
		$taxonomies = array_unique(wp_list_pluck($selection, 'post_type'));
		foreach ($taxonomies as &$taxonomy) {
			$taxonomy .= '_cat';
		}
		$terms = get_terms( [
			'taxonomy' => $taxonomies,
			'hide_empty' => false,
		] );
	}

	$is_custom = $cards_overview == 'Custom' && $custom_cards;
	$args = array(
		'post_status' => 'publish', 
		'posts_per_page' => 6,
		'suppress_filters' => false,
		'paged' => get_query_var('paged')
	);
	if($is_default) $args['post_type'] = [$default->name];
	if($is_selection && $selection){
		$args['post_type'] = array_unique(wp_list_pluck($selection, 'post_type'));
		$args['post__in'] = wp_list_pluck($selection, 'ID');
		$args['orderby'] = 'post__in';
	} 
	?>

	<?php if ($background_image): ?>
		<section class="home-banner banner-specialism img-visible img-visible only-bg" >
			<div class="bg">
				<?= wp_get_attachment_image($background_image['ID'], 'full') ?>
			</div>
		</section>
	<?php endif ?>
	
	<section class="home-banner banner-specialism img-visible home-banner-index"<?php if($id) echo ' id=' . $id ?>>
		<div class="container">
			<div class="row">
				<div class="content-flex d-flex justify-content-between flex-wrap align-items-end">
					<div class="left">

						<?php if ($subtitle): ?>
							<p class="label"><?= $subtitle ?></p>
						<?php endif ?>
						
						<?php if ($title): ?>
							<h1><?= $title ?></h1>
						<?php endif ?>
						
						<?php if ($description): ?>
							<?= add_class_content($description, 'line') ?>
						<?php endif ?>
						
					</div>

					<?php if (($is_default || $is_selection) && $terms): ?>
						<form class="select-block" id="filter_by_term">

							<?php if ($filter_title): ?>
								<label class="form-label" for="taxonomies"><?= $filter_title ?></label>
							<?php endif ?>
							
							<select id="taxonomies" name="taxonomy">

								<?php if ($filter_dropdown_placeholder): ?>
									<option value="0" selected disabled><?= $filter_dropdown_placeholder ?></option>
								<?php endif ?>

								<?php foreach ($terms as $term): ?>
									<option value="<?= $term->taxonomy . ':' . $term->term_id ?>"><?= $term->name ?></option>
								<?php endforeach ?>

							</select>
							<input type="hidden" name="post_type" value="<?= implode(',', $args['post_type']) ?>">
							<input type="hidden" name="template" value="<?= $template ?>">
							<input type="hidden" name="wraper_class" value="content d-grid">
							<input type="hidden" name="posts_per_page" value="6">
							<input type="hidden" name="action" value="filter_by_term">
						</form>
					<?php endif ?>

				</div>
			</div>
		</div>
	</section>

	<?php 
	$wp_query = new WP_Query($args);
	if($wp_query->have_posts() || $is_custom): 
		?>

		<section class="item-3x">
			<div class="container">
				<div class="row" id="response_posts">
					<div class="content d-grid">

						<?php if ($wp_query->have_posts()): ?>
							<?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>

								<?php 
								$thumbnail = has_post_thumbnail() ? get_the_post_thumbnail(get_the_ID(), 'full') : '';
								?>

								<div class="item">
									<?php get_template_part('parts/content', $template, ['link' => get_permalink(), 'target' => '', 'thumbnail' => $thumbnail, 'subtitle' => __(mb_strtoupper(get_post_type())), 'title' => get_the_title()]) ?>
								</div>
							<?php endwhile; ?>
						<?php endif ?>

						<?php if ($is_custom): ?>
							<?php foreach ($custom_cards as $item): ?>

								<?php 
								$link = $item['card_link'] ? $item['card_link']['url'] : '';
								$target = $item['card_link'] && $item['card_link']['target'] ? ' target="_blank"' : '';
								$thumbnail = $item['card_image'] ? wp_get_attachment_image($item['card_image']['ID'], 'full') : '';
								?>

								<div class="item">
									<?php get_template_part('parts/content', $template, ['link' => $link, 'target' => $target, 'thumbnail' => $thumbnail, 'subtitle' => $item['card_subtitle'], 'title' => $item['card_title']]) ?>
								</div>
							<?php endforeach ?>
						<?php endif ?>	

					</div>

					<?php if (!$is_custom): ?>
						<?php if ( $wp_query->max_num_pages > 1 ) { ?>
							<script> var this_page = 1; </script>

							<div class="btn-wrap d-flex justify-content-center">
								<a href="#" class="btn-default btn-pur btn-15 btn-h-45 more_posts" data-param-posts='<?php echo serialize($wp_query->query_vars); ?>' data-max-pages='<?php echo $wp_query->max_num_pages; ?>' data-template="<?= $template ?>"><?php _e('Meer laden', 'Energy') ?></a>
							</div>
						<?php } ?>
					<?php endif ?>

				</div>
			</div>
		</section>

		<?php 
	endif;
	wp_reset_query(); 
	?>

	<?php endif; ?>