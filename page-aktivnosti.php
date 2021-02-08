<?php get_header(); ?>
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
		<section id="explore-page" class="content-page">
			<div class="container contact-main">
				<h1 class="contact-title"><?= get_the_title() ?></h1>


				<div class="trokut">
					<!--					<img src="-->
                    <? //= get_template_directory_uri() . '/assets/img/kompas.png' ?><!--" alt="">-->

					<div class="row h-50">
						<div class="col-12 activity-wrap">
							<img src="<?= get_template_directory_uri() . '/assets/img/logo-cutoff.png'  ?>" alt="">
						</div>
					</div>
					<div class="row h-50">
						<div class="col-6 activity-wrap">
							<img src="<?= get_template_directory_uri() . '/assets/img/logo-cutoff.png'  ?>" alt="">
						</div>
						<div class="col-6 activity-wrap">
							<img src="<?= get_template_directory_uri() . '/assets/img/logo-cutoff.png'  ?>" alt="">
						</div>
					</div>

				</div>


				<!--                --><?php
                //
                //                $page = get_posts(array('name' => 'zrak'));
                //
                //                if ($page)
                //                {
                //                    echo $page[0]->post_content;
                //                }
                //
                //                ?>
			</div>
		</section>
    <?php endwhile; ?>
<?php endif; ?>


<?php
get_footer();
?>
