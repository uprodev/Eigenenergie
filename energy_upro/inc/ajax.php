<?php

$actions = [
	'more_posts',
	'filter_by_term',

];
foreach ($actions as $action) {
	add_action("wp_ajax_{$action}", $action);
	add_action("wp_ajax_nopriv_{$action}", $action);
}

function more_posts () {
	$args = unserialize( stripslashes( $_POST['query'] ) );
	$args['paged'] = $_POST['page'] + 1;
	/*$args['post_status'] = 'publish';
	$args['suppress_filters'] = false;*/
	//if($_POST['posts_per_page']) $args['posts_per_page'] = (int)$_POST['posts_per_page'];

	$query = new WP_Query( $args );
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) { 
			$query->the_post(); ?>

			<?php 
			$thumbnail = has_post_thumbnail() ? get_the_post_thumbnail(get_the_ID(), 'full') : '';
			?>

			<div class="item">
				<?php get_template_part('parts/content', $_POST['template'], ['link' => get_permalink(), 'target' => '', 'thumbnail' => $thumbnail, 'subtitle' => __(mb_strtoupper(get_post_type())), 'title' => get_the_title()]) ?>
			</div>

		<?php }
	}
	wp_reset_query(); 
	die();
}

function filter_by_term () {
	$args = array(
		'post_type' => explode(',', $_POST['post_type']),
		'posts_per_page' => (int)$_POST['posts_per_page'],
		'post_status' => 'publish',
		'suppress_filters' => false,
		'tax_query' => array(
			array(
				'taxonomy' => explode(':', $_POST['taxonomy'])[0],
				'field'    => 'id',
				'terms'    => explode(':', $_POST['taxonomy'])[1]
			)
		)
	);
	if($_POST['posts']) $args['post__in'] = explode(',', $_POST['posts']);

	$wp_query = new WP_Query($args);

	if( $wp_query->have_posts() ) : ?>

		<div class="<?= $_POST['wraper_class'] ?>">

			<?php while($wp_query->have_posts() ): $wp_query->the_post() ?>

				<?php 
				$thumbnail = has_post_thumbnail() ? get_the_post_thumbnail(get_the_ID(), 'full') : '';
				$date = $_POST['is_date'] ? get_the_date() : '';
				$subtitle = $_POST['is_category_in_subtitle'] ? wp_get_object_terms(get_the_ID(), get_post_type() . '_cat')[0]->name : __(mb_strtoupper(get_post_type()));
				?>

				<div class="item">
					<?php get_template_part('parts/content', $_POST['template'], ['link' => get_permalink(), 'target' => '', 'thumbnail' => $thumbnail, 'subtitle' => $subtitle, 'title' => get_the_title(), 'date' => $date]) ?>
				</div>

			<?php endwhile; ?>

		</div>

		<?php if ( $wp_query->max_num_pages > 1 ) { ?>
			<script> var this_page = 1; </script>

			<div class="btn-wrap d-flex justify-content-center">
				<a href="#" class="btn-default btn-pur btn-15 btn-h-45 more_posts" data-param-posts='<?php echo serialize($wp_query->query_vars); ?>' data-max-pages='<?php echo $wp_query->max_num_pages; ?>'><?php _e('Meer laden', 'Energy') ?></a>
			</div>
		<?php } ?>

		<?php wp_reset_postdata();
	else :
		_e('Geen berichten gevonden', 'Energy');
	endif;

	die();
}