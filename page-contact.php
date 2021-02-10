<?php get_header(); ?>
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
		<section id="explore-page" class="content-page">
			<div class="container contact-main">
				<h1 class="contact-title"><?= get_the_title() ?></h1>
				<div class="row">
					<div class="col-md-4 contact-wrap">
						<h2 class="contact-info-title">Kontakt podatci</h2>
						<p class="contact-info-text"><?= get_theme_mod('contact-info-text') ?></p>
						<div class="contact-info">

							<div class="info">
								<i class="icon icon-phone-black"></i>
								<a class="info-link"
								   href="tel:<?= get_theme_mod('contact-phone-number') ?>"> <?= get_theme_mod('contact-phone-number') ?>
									<br> <span>Broj telefona</span> </a>
							</div>
							<div class="info">
								<i class="icon icon-mail-black"></i>
								<a class="info-link"
								   href="<?= 'mailto:' . get_theme_mod('contact-info-mail') ?>"> <?= get_theme_mod('contact-info-mail') ?>
									<br> <span>E-mail adresa</span>
								</a>
							</div>
							<div class="info">
								<i class="icon icon-insta-black"></i>
								<a class="info-link info-social" target="_blank"
								   href="<?= get_theme_mod('contact-instagram-link') ?>">@explorer.hr </a>
							</div>
							<div class="info">
								<i class="icon icon-facebook-black"></i>
								<a class="info-link info-social" target="_blank"
								   href="<?= get_theme_mod('contact-facebook-link') ?>">Explorer.hr</a>
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
