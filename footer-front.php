<footer id="main-footer">
	<div class="container">
		<div class="row footer-wrapper">

			<div class="col-lg-6">
				<p class="footer-text"><?= get_theme_mod('basic-footer-text') ?></p>
			</div>
			<div class="col-lg-6">
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
