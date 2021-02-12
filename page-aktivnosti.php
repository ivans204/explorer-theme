<?php get_header();

function getThumbnailByPostName($name) {
    return wp_get_attachment_url(get_post_thumbnail_id(get_posts(['name' => $name])[0]->ID), 'thumbnail');
}

function getContentByPostName($name) {
    $page = get_posts(['name' => $name]);

    if ($page)
    {
        echo $page[0]->post_content;
    }
}

?>
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
		<section id="explore-page" class="content-page">
			<div class="container contact-main">
				<h1 class="contact-title"><?= get_the_title() ?></h1>

				<div class="trokut">
					<div class="row h-50">
						<div class="col-12 activity-wrap" style="align-items: baseline">
							<img class="activity-image" src="<?= getThumbnailByPostName('zrak') ?>" alt="tura zrak">
							<a id="activity-air" class="activity-link" data-toggle="collapse"
							   href="#collapseAir" aria-expanded="false" aria-controls="collapseAir">Zrak</a>
						</div>
					</div>

					<div class="row h-50">
						<div class="col-6 activity-wrap">
							<img class="activity-image" src="<?= getThumbnailByPostName('voda') ?>" alt="tura voda">
							<a id="activity-water" class="activity-link" data-toggle="collapse" data-toggle="collapse"
							   href="#collapseWater" aria-expanded="false" aria-controls="collapseWater">Voda</a>
						</div>

						<div class="col-6 activity-wrap">
							<img class="activity-image" src="<?= getThumbnailByPostName('zemlja') ?>" alt="tura zemlja">
							<a id="activity-earth" class="activity-link" data-toggle="collapse" data-toggle="collapse"
							   href="#collapseEarth" aria-expanded="false" aria-controls="collapseEarth">Zemlja</a>
						</div>
					</div>
					<img class="compass-img" src="<?= get_template_directory_uri() . '/assets/img/logo-cutoff.png'  ?>" alt="">
				</div>

				<div id="activity-parent">
					<div id="collapseAir" class="collapse" data-parent="#activity-parent">
						<h1 class="activity-title">Zrak</h1>
						<div id="air-loader" class="loader">Loading...</div>
<!--                        --><?php
//                        getContentByPostName('zrak')
//                        ?>
					</div>

					<div id="collapseWater" class="collapse" data-parent="#activity-parent">
						<h1 class="activity-title">Voda</h1>
						<div id="water-loader" class="loader">Loading...</div>
<!--                        --><?php
//                        getContentByPostName('voda')
//                        ?>
					</div>

					<div id="collapseEarth" class="collapse" data-parent="#activity-parent">
						<h1 class="activity-title">Zemlja</h1>
						<div id="earth-loader" class="loader">Loading...</div>
<!--                        --><?php
//                        getContentByPostName('zemlja')
//                        ?>
					</div>
				</div>

			</div>
		</section>
    <?php endwhile; ?>
<?php endif; ?>


<?php
get_footer();
?>
