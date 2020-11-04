<?php
if (!isset($_POST['from_ajax'])) {
    get_header();
}


?>
    <main id="content">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <div class="entry-half">
                    <div class="entry-hero" style="background: url(<?= get_the_post_thumbnail_url($post->ID); ?>); background-size: cover; background-position: center;">
                        <div class="container">
                            <h1 class="entry-title"><?php the_title(); ?></h1> <?php edit_post_link(); ?>
                        </div>
                    </div>

                    <!-- News Section -->
                    <section class="news-list" id="news-list">


                        <div class="container">
                            <div class="news-wrapper">

                                <?php foreach (get_news() as $item) : ?>
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
        <?php endwhile; endif; ?>
    </main>

<?php
if (!isset($_POST['from_ajax'])) {
    get_footer();
}
?>