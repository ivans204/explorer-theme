<?php get_header('front'); ?>
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
		<section id="explore">

			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<img class="compass-img" src="<?= get_template_directory_uri() . '/assets/img/kompas.png' ?>"
						     alt="kompas">
					</div>
					<div class="col-lg-6">

						<div class="explore-locations">

							<div class="explore-location">
								<img class="location-img"
								     src="<?= get_template_directory_uri() . '/assets/img/kompas.png' ?>" alt="">
								<div class="location-info">
									<h2 class="explore-title">Explore Lika</h2>
									<p class="explore-duration">Duration: 3 days</p>
								</div>
								<button class="explore-locate">
									Lociraj
									<img src="<?= get_template_directory_uri() . '/assets/icons/map-pin.svg' ?>" alt="">
								</button>
							</div>

							<div class="explore-location">
								<img class="location-img"
								     src="<?= get_template_directory_uri() . '/assets/img/kompas.png' ?>" alt="">
								<div class="location-info">
									<h2 class="explore-title">Explore Lika</h2>
									<p class="explore-duration">Duration: 3 days</p>
								</div>
								<button class="explore-locate">
									Lociraj
									<img src="<?= get_template_directory_uri() . '/assets/icons/map-pin.svg' ?>" alt="">
								</button>
							</div>

							<div class="explore-location">
								<img class="location-img"
								     src="<?= get_template_directory_uri() . '/assets/img/kompas.png' ?>" alt="">
								<div class="location-info">
									<h2 class="explore-title">Explore Lika</h2>
									<p class="explore-duration">Duration: 3 days</p>
								</div>
								<button class="explore-locate">
									Lociraj
									<img src="<?= get_template_directory_uri() . '/assets/icons/map-pin.svg' ?>" alt="">
								</button>
							</div>

							<div class="explore-location">
								<img class="location-img"
								     src="<?= get_template_directory_uri() . '/assets/img/kompas.png' ?>" alt="">
								<div class="location-info">
									<h2 class="explore-title">Explore Lika</h2>
									<p class="explore-duration">Duration: 3 days</p>
								</div>
								<button class="explore-locate">
									Lociraj
									<img src="<?= get_template_directory_uri() . '/assets/icons/map-pin.svg' ?>" alt="">
								</button>
							</div>

						</div>
					</div>

				</div>
			</div>
			<div class="section-end mountain-img"></div>

		</section>

		<section id="explore-area">

			<div class="container">
				<div class="row">
					<div class="col-lg-6">

						<div class="explore-area">
							<img class="explore-area_img"
							     src="<?= get_template_directory_uri() . '/assets/img/A-2.jpg' ?>" alt="">
							<h2 class="explore-area_title">Explore the sky</h2>
							<a class="explore-area_more" href="#">Saznaj više -> </a>
						</div>


					</div>
					<div class="col-lg-6">

						<div class="explore-area">
							<img class="explore-area_img"
							     src="<?= get_template_directory_uri() . '/assets/img/IMG_-2.jpg' ?>" alt="">
							<h2 class="explore-area_title">Explore the sea</h2>
							<a class="explore-area_more" href="#">Saznaj više -> </a>
						</div>
					</div>
				</div>
			</div>

			<div class="section-end beach-img"></div>

            <?php echo do_shortcode('[metaslider id="57"]'); ?>

			<p class="slider-desc">Slike s naših tura</p>

		</section>

		<section id="explore-quotes">
			<div class="slideshow-container">

				<h2 class="reviews-title">Reviews</h2>

                <?php
                $args = [
                    'post_type' => 'review',
                    'posts_per_page' => -1
                ];
                $query = new WP_Query($args);
                foreach ($query->posts as $key => $post)
                {
                if ($key === 0)
                {
                ?>
				<div class="mySlides" style="display: block">
                    <?php } else { ?>
					<div class="mySlides">
                        <?php } ?>
						<p class="slide-title"><?= $post->post_title ?></p>
						<p class="slide-quote"><?= $post->post_content ?></p>
						<div class="slide-fields">
							<p class="slide-author"><?= get_field('ime_prezime', $post->ID) ?></p>
							<p class="slide-date"><?= get_field('review_datum', $post->ID) ?></p>
						</div>

					</div>
                    <?php } ?>

					<!-- Next/prev buttons -->
					<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
					<a class="next" onclick="plusSlides(1)">&#10095;</a>
				</div>
		</section>
		<section id="about-us"></section>
		<section id="newsletter">
            <?php echo do_shortcode('[newsletter_form]') ?>
		</section>

    <?php endwhile; ?>
<?php endif; ?>


<?php
//get_sidebar();
get_footer('front');
?>
