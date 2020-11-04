<?php
if (!isset($_POST['from_ajax'])) {
    get_header();
}


?>
    <main id="content">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <div class="entry-half">
                <div class="entry-hero" style="background: url(<?= get_the_post_thumbnail_url($post->ID); ?>); background-size: cover; background-position: center;">
                    <div class="container">
                        <h1 class="entry-title"><?php single_term_title(); ?></h1>
                    </div>
                </div>

                <!-- News Section -->
                <section class="news-list" id="news-list">


                    <div class="container">
                        <div class="news-wrapper">

                            <?php foreach (get_posts(['post_type' => 'post', 'category_name' => get_the_category($post->ID)[0]->slug]) as $item) : ?>
                                <a href="<?= get_the_permalink($item->ID) ?>" class="news-item">
                                    <div class="news-image" style="background:url(<?= get_the_post_thumbnail_url($item->ID); ?>); background-size: cover; background-position:center;"></div>
                                    <div class="news-caption">
                                        <h3 class="news-title"><?= $item->post_title; ?></h3>
                                        <div class="news-desc">
                                            <?= substr($item->post_content, 0, 100) . '...'; ?>
                                        </div>
                                    </div>
                                </a>
                            <?php endforeach; ?>

                        </div>
                    </div>
                </section>
                <!-- News Section -->

            </div>

        </article>
    </main>

<?php
if (!isset($_POST['from_ajax'])) {
    get_footer();
}
?>