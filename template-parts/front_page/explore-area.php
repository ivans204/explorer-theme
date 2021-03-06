<?php

global $product;
global $dynamic_featured_image;

$sky = get_page_by_title('Explore the sky', OBJECT, 'product');
$sea = get_page_by_title('Explore the sea', OBJECT, 'product');
$sky_prod = wc_get_product($sky->ID);
$sea_prod = wc_get_product($sea->ID);
$sky_img = $dynamic_featured_image->get_featured_images($sky->ID)[0]['full'];
$sea_img = $dynamic_featured_image->get_featured_images($sea->ID)[0]['full']
//wp_get_attachment_url( $sky_prod->get_image_id() );
?>

<section id="explore-area" class="clouds-bg">

	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6">
				<div class="explore-area">
					<img class="explore-area_img"
					     src="<?= isset($sky_img) ? $sky_img : wp_get_attachment_url( $sky_prod->get_image_id() ); ?>" alt="">
					<h2 class="explore-area_title"><?= __('Explore the sky') ?></h2>
					<a class="explore-area_more d-flex justify-content-center align-items-center" href="<?= $sky_prod->get_permalink(); ?>">Saznaj više <i class="icon icon-arrow"></i> </a>
				</div>


			</div>
			<div class="col-lg-6 col-md-6">
				<div class="explore-area">
					<img class="explore-area_img"
					     src="<?= isset($sea_img) ? $sea_img : wp_get_attachment_url( $sea_prod->get_image_id() ); ?>" alt="">
					<h2 class="explore-area_title"><?= __('Explore the sea') ?></h2>
					<a class="explore-area_more d-flex justify-content-center align-items-center" href="<?= $sea_prod->get_permalink(); ?>">Saznaj više <i class="icon icon-arrow"></i> </a>
				</div>
			</div>
		</div>
	</div>

	<div class="section-end beach-img"></div>

    <?php echo do_shortcode('[metaslider id="57"]'); ?>
	<!--    --><?php //echo do_shortcode('[metaslider id="159"]'); ?>

	<p class="slider-desc">Slike s naših tura</p>

</section>