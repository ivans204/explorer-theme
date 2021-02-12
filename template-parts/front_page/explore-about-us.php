<section id="about-us" class="clouds-bg pb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <?php
                $page = get_page_by_title('O nama');
                ?>
                <h1 class="mb-4"><?= get_the_title($page) ?></h1>
                <p class="about-us-text"><?= wp_trim_words($page->post_content, 100) ?></p>
                <a class="about-us-link" href="<?= get_permalink($page) ?>">Saznaj više <i
                        class="icon icon-green-arrow"></i></a>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <img class="about-us-img" src="<?= get_the_post_thumbnail_url($page) ?>" alt="">
            </div>
            <div class="col-lg-2 col-md-6 col-sm-12">
                <?php
                if (class_exists('Dynamic_Featured_Image'))
                {
                    global $dynamic_featured_image;
                    $featured_image = $dynamic_featured_image->get_featured_images($page->ID)[0]['full'];

                    echo "<img class='about-us-img' src='$featured_image'>";
                }
                ?>
            </div>
        </div>
    </div>
</section>