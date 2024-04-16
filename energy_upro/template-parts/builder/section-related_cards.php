<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<section class="item-2x item-2x-title bg-grey-50">
			<div class="bg"></div>
			<div class="container">
				<div class="row">
					<div class="title-wrap">
						<h3 class="title">Bekijk onze projecten</h3>
					</div>
					<div class="content d-flex justify-content-between flex-wrap p-0">
						<div class="item">
							<a href="#">
								<figure>
									<img src="img/img-12-1.jpg" alt="">
								</figure>
								<div class="text-wrap">
									<p>PROJECT •. DAK</p>
									<h6>Dak Amsterdam</h6>
								</div>
								<div class="link-wrap">
									<span><i class="fal fa-long-arrow-right"></i></span>
								</div>
							</a>
						</div>
						<div class="item">
							<a href="#">
								<figure>
									<img src="img/img-12-2.jpg" alt="">
								</figure>
								<div class="text-wrap">
									<p>PROJECT •. DAK</p>
									<h6>Dak Born</h6>
								</div>
								<div class="link-wrap">
									<span><i class="fal fa-long-arrow-right"></i></span>
								</div>
							</a>
						</div>

					</div>
					<div class="btn-wrap-full d-flex justify-content-center">
						<a href="#" class="btn-default">Meer laden</a>
					</div>
				</div>
			</div>
		</section>

	<?php endif; ?>