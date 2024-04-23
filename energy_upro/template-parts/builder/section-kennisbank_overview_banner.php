<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<?php 
	$posts_per_page = 9;
	/*$posts_per_page_2 = 6;*/
	$template = 'all_cpt_3';
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

	$args = array(
		'post_status' => 'publish', 
		'posts_per_page' => $posts_per_page,
		'suppress_filters' => false,
		'paged' => get_query_var('paged')
	);
	if($is_default) $args['post_type'] = [$default->name];
	if($is_selection && $selection){
		$args['post_type'] = array_unique(wp_list_pluck($selection, 'post_type'));
		$args['post__in'] = wp_list_pluck($selection, 'ID');
		$args['orderby'] = 'post__in';
	} 

	/*$args_2 = array(
		'post_type' => $args['post_type'],
		'post_status' => 'publish', 
		'posts_per_page' => $posts_per_page_2,
		'suppress_filters' => false,
		'paged' => get_query_var('paged')
	);
	if($is_default) $args_2['offset'] = $posts_per_page;
	if($is_selection && $selection) $args_2['post__not_in'] = $args['post__in'];*/
	?>

	<div class="bg-grey-wrap"<?php if($id) echo ' id=' . $id ?>>
		<div class="bg br-15-0"></div>

		<?php if ($background_image): ?>
			<section class="home-banner banner-specialism img-visible banner-project no-img only-bg" >
				<div class="bg">
					<?= wp_get_attachment_image($background_image['ID'], 'full') ?>
				</div>
			</section>
		<?php endif ?>

		<section class="home-banner banner-specialism img-visible banner-project no-img home-banner-index" >
			<div class="container">
				<div class="row">
					<div class="content-flex d-flex justify-content-between flex-wrap">
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
								<input type="hidden" name="wraper_class" value="content d-flex flex-wrap p-0">
								<input type="hidden" name="posts_per_page" value="<?= $posts_per_page ?>">
								<input type="hidden" name="action" value="filter_by_term">
							</form>
						<?php endif ?>

					</div>
				</div>
			</div>
		</section>

		<?php 
		$wp_query = new WP_Query($args);
		/*$wp_query_2 = new WP_Query($args_2);*/
		if($wp_query->have_posts()): 
			?>

			<section class="item-3x knowledge-3x">
				<div class="container">
					<div class="row" id="response_posts">
						<div class="content d-flex flex-wrap p-0">

							<?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>

								<?php if (!get_field('is_hide')): ?>
									<?php 
									$thumbnail = has_post_thumbnail() ? get_the_post_thumbnail(get_the_ID(), 'full') : '';
									?>

									<div class="item">
										<?php get_template_part('parts/content', $template, ['link' => get_permalink(), 'thumbnail' => $thumbnail, 'subtitle' => wp_get_object_terms(get_the_ID(), get_post_type() . '_cat')[0]->name, 'date' => get_the_date(), 'title' => get_the_title()]) ?>
									</div>

									<?php if ($cta_form == 'Show' && $form_cta && $wp_query->current_post == 5): ?>
										<div class="item-form d-flex flex-wrap justify-content-between align-items-center">

											<?php if ($title_cta): ?>
												<div class="title-item-wrap">
													<h3 class="title-item"><?= $title_cta ?></h3>
												</div>
											<?php endif ?>
											
											<div class="form-wrap">
												<?= do_shortcode('[contact-form-7 id="' . $form_cta . '" html_class="d-flex form-default justify-content-between flex-wrap"]') ?>
											</div>
										</div>
									<?php endif ?>
								<?php endif ?>

							<?php endwhile; ?>
							
						</div>

						<?php if ( $wp_query->max_num_pages > 1 ) { ?>
							<script> var this_page = 1; </script>

							<div class="btn-wrap d-flex justify-content-center">
								<a href="#" class="btn-default btn-pur btn-15 btn-h-45 more_posts" data-param-posts='<?php echo serialize($wp_query->query_vars); ?>' data-max-pages='<?php echo $wp_query->max_num_pages; ?>' data-template="<?= $template ?>"><?= $load_more_button ?></a>
							</div>
						<?php } ?>

					</div>
				</div>
			</section>

			<?php 
		endif;
		wp_reset_query(); 
		?>

	</div>

	<?php endif; ?>