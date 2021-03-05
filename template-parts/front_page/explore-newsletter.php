<section id="newsletter" class="clouds-bg" style="margin-top: 100px; padding-top: 150px">

	<div class="container">
		<div class="newsletter-box">
			<h1>Newsletter</h1>
			<p><?= get_theme_mod('newsletter-text') ?></p>
            <?php echo do_shortcode('[newsletter_form type=“minimal”][newsletter_field name="email"][/newsletter_form]') ?>
		</div>

        <?= get_custom_logo() ?>
	</div>


</section>