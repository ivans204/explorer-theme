<?php get_header(); ?>
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
		<section id="explore-page" class="content-page">
			<div class="container page-main">
                <?php the_content(); ?>
			</div>
		</section>
    <?php endwhile; ?>
<?php endif; ?>


<?php
get_footer();
?>
