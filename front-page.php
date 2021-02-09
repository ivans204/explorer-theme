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

				<!-- Full-width slides/quotes -->
				<div class="mySlides" style="display: block">
					<p class="slide-title">Tura Gorski Kotar</p>
					<p class="slide-quote">I love you the more in that I believe you had liked me for my own sake and
						for nothing else</p>
					<p class="slide-author">- John Keats</p>
				</div>

				<div class="mySlides">
					<q class="slide-quote">But man is not made for defeat. A man can be destroyed but not defeated.</q>
					<p class="slide-author">- Ernest Hemingway</p>
				</div>

				<div class="mySlides">
					<q class="slide-quote">I have not failed. I've just found 10,000 ways that won't work.</q>
					<p class="slide-author">- Thomas A. Edison</p>
				</div>

				<!-- Next/prev buttons -->
				<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
				<a class="next" onclick="plusSlides(1)">&#10095;</a>
			</div>
		</section>
		<section id="about-us"></section>
		<section id="nesletter">
            <?php echo do_shortcode('[newsletter_form]') ?>
		</section>

    <?php endwhile; ?>
<?php endif; ?>


<?php
//get_sidebar();
get_footer('front');
?>
