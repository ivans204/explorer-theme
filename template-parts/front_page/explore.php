<?php

global $product;
global $dynamic_featured_image;

$lika = get_page_by_title('Explore Lika', OBJECT, 'product');
$gorski_kotar = get_page_by_title('Explore Gorski Kotar', OBJECT, 'product');
$istra = get_page_by_title('Explore Istra', OBJECT, 'product');
$sj_dalmacija = get_page_by_title('Explore Sj. Dalmacija', OBJECT, 'product');

$mega_arr = [
    'lika' => [
        'product' => wc_get_product($lika->ID),
        'btn-id' => 'locate-lika',
        'details-id' => 'details-lika',
        'close-id' => 'close-lika',
        'featured-image' => $dynamic_featured_image->get_featured_images($lika->ID)[0]['full']
    ],
    'gorski_kotar' => [
        'product' => wc_get_product($gorski_kotar->ID),
        'btn-id' => 'locate-gk',
        'details-id' => 'details-gk',
        'close-id' => 'close-gk',
        'featured-image' => $dynamic_featured_image->get_featured_images($gorski_kotar->ID)[0]['full']
    ], 'istra' => [
        'product' => wc_get_product($istra->ID),
        'btn-id' => 'locate-istra',
        'details-id' => 'details-istra',
        'close-id' => 'close-istra',
        'featured-image' => $dynamic_featured_image->get_featured_images($istra->ID)[0]['full']
    ], 'sj_dalmacija' => [
        'product' => wc_get_product($sj_dalmacija->ID),
        'btn-id' => 'locate-sjd',
        'details-id' => 'details-sjd',
        'close-id' => 'close-sjd',
        'featured-image' => $dynamic_featured_image->get_featured_images($sj_dalmacija->ID)[0]['full']
    ],
]

?>

<section id="explore" class="clouds-bg">

	<div class="container">
		<div class="row">

			<!--	  Karta županija		-->
			<div class="col-lg-6 compass-img">

                <?= file_get_contents(get_template_directory_uri() . '/assets/img/mapa.svg'); ?>

			</div>

			<!--	  Prikaz tura		-->
			<div class="col-lg-6">
				<div class="explore-locations">

                    <?php
                    foreach ($mega_arr as $tura)
                    {
                        ?>

						<div class="explore-location">

							<div class="d-flex align-items-center cursor-pointer" id="<?= $tura['btn-id'] ?>">
								<img class="location-img" src="<?= $tura['featured-image']; ?>" alt="">
								<div class="location-info">
									<h2 class="explore-title"><?= $tura['product']->get_title() ?></h2>
									<p class="explore-duration">
                                        <?= __('Trajanje: '), get_field('tura_duration', $tura['product']->get_id()), ' ', get_field('tura_duration_time', $tura['product']->get_id()) ?>
									</p>
								</div>
								<button class="explore-locate d-flex">
                                    <?= __('Lociraj') ?>
									<i class="icon icon-map-pin ml-2"></i>
								</button>
							</div>

							<div class="map-ture-details" id="<?= $tura['details-id'] ?>">
								<img class="explore-area_img" src="<?= $tura['featured-image']; ?>" alt="">
								<div class="ture-details">
									<div class="title-duration">
										<h2><?= $tura['product']->get_title() ?></h2>
										<p><?php echo __('Trajanje: '), get_field('tura_duration', $tura['product']->get_id()), ' ', get_field('tura_duration_time', $tura['product']->get_id()) ?></p>
									</div>
									<div class="tura-icons d-flex">
                                        <?php

                                        $tura_icons = get_field('tura_icons', $tura['product']->get_id());

                                        if ($tura_icons)
                                        {
                                            foreach ($tura_icons as $icon_name)
                                            {
                                                echo "<i class='ml-2 icon icon-" . $icon_name . "'></i>";
                                            }
                                        }
                                        ?>
									</div>
								</div>
								<a class="tura-get-more" href="<?= $tura['product']->get_permalink() ?>">Saznaj više</a>
								<button class="close-tura-details" id="<?= $tura['close-id'] ?>">Vrati listu svih tura
								</button>
							</div>
						</div>

                    <?php } ?>

				</div>
			</div>

		</div>
	</div>
	<div class="section-end mountain-img"></div>

</section>