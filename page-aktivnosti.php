<?php get_header();

function getThumbnailByPostName($name) {
    return wp_get_attachment_url(get_post_thumbnail_id(get_posts(['name' => $name])[0]->ID), 'thumbnail');
}

?>
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
		<section id="explore-page" class="content-page">
			<div class="container contact-main">
				<h1 class="contact-title"><?= get_the_title() ?></h1>

				<?php echo do_shortcode('[newsletter_form]') ?>

				<div class="trokut">

					<div class="row h-50">
						<div class="col-12 activity-wrap">
							<img class="activity-image" src="<?= getThumbnailByPostName('zrak') ?>" alt="tura zrak">
							<a id="activity-air" class="activity-title" data-toggle="collapse"
							   href="#collapseAir" aria-expanded="false" aria-controls="collapseAir">Zrak</a>
						</div>
					</div>

					<div class="row h-50">
						<div class="col-6 activity-wrap">
							<img class="activity-image" src="<?= getThumbnailByPostName('voda') ?>" alt="tura voda">
							<a id="activity-water" class="activity-title" data-toggle="collapse" data-toggle="collapse"
							   href="#collapseWater" aria-expanded="false" aria-controls="collapseWater">Voda</a>
						</div>

						<div class="col-6 activity-wrap">
							<img class="activity-image" src="<?= getThumbnailByPostName('zemlja') ?>" alt="tura zemlja">
							<a id="activity-earth" class="activity-title" data-toggle="collapse" data-toggle="collapse"
							   href="#collapseEarth" aria-expanded="false" aria-controls="collapseEarth">Zemlja</a>
						</div>

					</div>

				</div>

				<div id="parent">
					<div id="collapseAir" class="collapse" data-parent="#parent">
						<h1>Zrak</h1>
                        <?php
                        $page = get_posts(['name' => 'zrak']);

                        if ($page)
                        {
                            echo $page[0]->post_content;
                        }
                        ?>
					</div>

					<div id="collapseWater" class="collapse" data-parent="#parent">
                        <?php
                        $page = get_posts(['name' => 'voda']);

                        if ($page)
                        {
                            echo $page[0]->post_content;
                        }
                        ?>
					</div>

					<div id="collapseEarth" class="collapse" data-parent="#parent">
                        <?php
                        $page = get_posts(['name' => 'zemlja']);

                        if ($page)
                        {
                            echo $page[0]->post_content;
                        }
                        ?>
					</div>
				</div>

			</div>
		</section>
    <?php endwhile; ?>
<?php endif; ?>


<?php
get_footer();
?>
