<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<section class="bg-slider-img<?php if($background_color == 'Grey') echo ' bg-grey'; if($background_color_top == 'Grey') echo ' bg-grey-50-top'; if($background_color_bottom == 'Grey') echo ' bg-grey-50'; ?>"<?php if($id) echo ' id=' . $id ?>>
		<div class="container">
			<div class="row">
				<div class="top">
					<div class="bg"></div>

					<?php if ($title): ?>
						<h2><?= $title ?></h2>
					<?php endif ?>

					<?php $posts = $custom_or_default_cards == 'Default' ? get_posts(array('post_type' => 'thema', 'posts_per_page' => -1)) : $custom ?>
					
					<?php if ($posts): ?>
						<div class="slider-wrap">
							<div class="swiper img-slider">
								<div class="swiper-wrapper">

									<?php foreach($posts as $post): 

										global $post;
										setup_postdata($post); ?>

										<?php 
										$thumbnail = has_post_thumbnail() ? get_the_post_thumbnail(get_the_ID(), 'full') : '';
										?>
										
										<div class="swiper-slide">
											<?php get_template_part('parts/content', 'all_cpt', ['link' => get_permalink(), 'target' => '', 'thumbnail' => $thumbnail, 'subtitle' => __(mb_strtoupper(get_post_type())), 'title' => get_the_title()]) ?>
										</div>
									<?php endforeach; ?>

									<?php wp_reset_postdata(); ?>

								</div>
							</div>
							<div class="nav-wrap d-flex justify-content-between flex-wrap fd">
								<div class="wrap d-flex justify-content-between">
									<div class="swiper-button-next img-next"></div>
									<div class="swiper-button-prev img-prev"></div>
								</div>
								<div class="p-wrap d-flex align-items-center">
									<div class="swiper-pagination img-pagination"></div>
								</div>
							</div>
						</div>
					<?php endif ?>
					
				</div>

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

	<?php endif; ?>