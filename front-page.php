<?php get_header('front'); ?>
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>

		<!--  Section Explore  -->
        <?php get_template_part('/template-parts/front_page/explore') ?>

		<!--  Section Explore Area  -->
        <?php get_template_part('template-parts/front_page/explore-area') ?>

		<!--  Section Quotes  -->
        <?php get_template_part('template-parts/front_page/explore-quotes') ?>

		<!--  Section About Us  -->
        <?php get_template_part('template-parts/front_page/explore-about-us') ?>

		<!--  Section Newsletter  -->
        <?php get_template_part('template-parts/front_page/explore-newsletter') ?>

    <?php endwhile; ?>
<?php endif; ?>


<?php
//get_sidebar();
get_footer('front');
?>
