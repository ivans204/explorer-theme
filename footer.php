<footer id="main-footer">

	<div class="footer-social">
		<div class="container social">
			<p class="social-text">For more photos and informations, follow us on social networks</p>
			<div class="social-links">
				<a class="social-link" href="#">
					<img src="<?= get_template_directory_uri() . '/assets/icons/instagram.svg' ?>" alt="">@explorerhr
				</a>
				<a class="social-link" href="#">
					<img src="<?= get_template_directory_uri() . '/assets/icons/facebook.svg' ?>" alt="">Explorer.hr
				</a>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row footer-wrapper">
			<div class="col-md-4 footer-item">
				<p class="footer-text"><?= get_theme_mod('basic-footer-text') ?></p>
			</div>
			<div class="col-md-4 footer-item">
                <?php the_custom_logo(); ?>
			</div>
			<div class="col-md-4 footer-item">
                <?php
                wp_nav_menu([
                    'theme_location' => 'explorer-footer-menu',
                    'depth' => 2, // 1 = no dropdowns, 2 = with dropdowns.
                    'container' => 'div',
                    'container_class' => '',
                    'container_id' => 'footer-navbar-menu',
                    'menu_class' => 'navbar-nav ml-auto',
                    'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                    'walker' => new WP_Bootstrap_Navwalker(),
                ])
                ?>
			</div>
		</div>
	</div>
</footer>

<?php wp_footer() ?>
</body>
</html>
