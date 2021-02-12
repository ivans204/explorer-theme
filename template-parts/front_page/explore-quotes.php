<section id="explore-quotes">
    <div class="slideshow-container">

        <?php
        $args = [
            'post_type' => 'review',
            'posts_per_page' => -1
        ];
        $query = new WP_Query($args);

        if (!empty($query->posts))
        {
        ?>
        <h2 class="reviews-title">Reviews</h2>

        <?php
        foreach ($query->posts as $key => $post)
        {
        if ($key === 0)
        {
        ?>
        <div class="mySlides" style="display: block">
            <?php } else { ?>
            <div class="mySlides">
                <?php } ?>
                <p class="slide-title"><?= $post->post_title ?></p>
                <p class="slide-quote"><?= $post->post_content ?></p>
                <div class="slide-fields">
                    <p class="slide-author"><?= get_field('ime_prezime', $post->ID) ?></p>
                    <p class="slide-date"><?= get_field('review_datum', $post->ID) ?></p>
                </div>

            </div>
            <?php } ?>

            <!-- Next/prev buttons -->
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
            <?php } ?>
        </div>
</section>