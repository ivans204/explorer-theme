<?php

global $product;

$lika = wc_get_product(get_page_by_title('Explore Lika', OBJECT, 'product')->ID);
$gorski_kotar = wc_get_product(get_page_by_title('Explore Gorski Kotar', OBJECT, 'product')->ID);
$istra = wc_get_product(get_page_by_title('Explore Istra', OBJECT, 'product')->ID);
$sj_dalmacija = wc_get_product(get_page_by_title('Explore Sj. Dalmacija', OBJECT, 'product')->ID);

$mega_arr = [
    'lika' => [
        'product' => $lika,
        'btn-id' => 'locate-lika',
        'details-id' => 'details-lika',
        'close-id' => 'close-lika'
    ],
    'gorski_kotar' => [
        'product' => $gorski_kotar,
        'btn-id' => 'locate-gk',
        'details-id' => 'details-gk',
        'close-id' => 'close-gk'
    ], 'istra' => [
        'product' => $istra,
        'btn-id' => 'locate-istra',
        'details-id' => 'details-istra',
        'close-id' => 'close-istra'
    ], 'sj_dalmacija' => [
        'product' => $sj_dalmacija,
        'btn-id' => 'locate-sjd',
        'details-id' => 'details-sjd',
        'close-id' => 'close-sjd'
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
							<img class="location-img"
							     src="<?= wp_get_attachment_url($tura['product']->get_image_id()); ?>" alt="">
							<div class="location-info">
								<h2 class="explore-title"><?= $tura['product']->get_title() ?></h2>
								<p class="explore-duration">
                                    <?= __('Trajanje: '), get_field('tura_duration', $tura['product']->get_id()), ' ', get_field('tura_duration_time', $tura['product']->get_id()) ?>
								</p>
							</div>
							<button class="explore-locate d-flex" id="<?= $tura['btn-id'] ?>">
                                <?= __('Lociraj') ?>
								<i class="icon icon-map-pin ml-2"></i>
							</button>

							<div class="map-ture-details" id="<?= $tura['details-id'] ?>">
								<img class="explore-area_img"
								     src="<?= wp_get_attachment_url($tura['product']->get_image_id()); ?>"
								     alt="">
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