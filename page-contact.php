<?php get_header(); ?>
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
		<section id="explore-page" class="content-page">
			<div class="container contact-main">
				<h1 class="contact-title"><?= get_the_title() ?></h1>
				<div class="row">
					<div class="col-md-4 contact-wrap">
						<h2 class="contact-info-title">Kontakt podatci</h2>
						<p class="contact-info-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet at,
							cupiditate eligendi eos incidunt ipsum labore minus mollitia natus, necessitatibus
							nihil.</p>
						<div class="contact-info">

							<div class="info">
								<i class="icon icon-phone-black"></i>
								<a class="info-link" href="#"> +385 555 5555 <br> <span>Broj telefona</span> </a>
							</div>
							<div class="info">
								<i class="icon icon-mail-black"></i>
								<a class="info-link" href="mailto:support@explorer.hr"> +385 555 5555 <br> <span>E-mail adresa</span>
								</a>
							</div>
							<div class="info">
								<i class="icon icon-insta-black"></i>
								<a class="info-link info-social" href="https://www.instagram.com/explorer_hr/">@explorer.hr </a>
							</div>
							<div class="info">
								<i class="icon icon-facebook-black"></i>
								<a class="info-link info-social"
								   href="https://www.facebook.com/Explorerhr-112775783908681/">Explorer.hr</a>
							</div>
						</div>
					</div>
					<div class="offset-md-1 col-md-7">
						<h2 class="contact-info-title">Kontakt forma</h2>
                        <?= do_shortcode('[contact-form-7 id="79" title="Kontant Forma"]') ?>
					</div>
				</div>
			</div>
		</section>
    <?php endwhile; ?>
<?php endif; ?>


<?php
get_footer();
?>
