<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?= get_bloginfo( 'name' ); ?></title>
    <?php wp_head() ?>
</head>
<body <?php body_class(); ?>>

<header>

	<nav class="navbar navbar-expand-lg navbar-light" role="navigation">
		<div class="container">

            <?php the_custom_logo(); ?>

			<button class="navbar-toggler" type="button" data-toggle="collapse"
			        data-target="#main-navbar-menu" aria-controls="main-navbar-menu"
			        aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'infinum'); ?>">
				<span class="navbar-hamburger"></span>
			</button>

            <?php
            wp_nav_menu([
                'theme_location' => 'explorer-header-menu',
                'depth' => 2, // 1 = no dropdowns, 2 = with dropdowns.
                'container' => 'div',
                'container_class' => 'collapse navbar-collapse',
                'container_id' => 'main-navbar-menu',
                'menu_class' => 'navbar-nav ml-auto',
                'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                'walker' => new WP_Bootstrap_Navwalker(),
            ])
            ?>
		</div>
	</nav>

</header>