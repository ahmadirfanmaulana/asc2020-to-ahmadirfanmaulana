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

                    <!-- Museum Section -->
                    <section class="museum-list" id="museum-list">

                        <div class="container">

                            <div class="museum-wrapper">

                                <?php foreach (get_museums() as $item) : ?>
                                    <a href="<?= get_the_permalink($item->ID) ?>" class="museum-item">
                                        <div class="museum-image" style="background:url(<?= get_the_post_thumbnail_url($item->ID); ?>); background-size: cover; background-position:center;"></div>
                                        <div class="museum-caption">
                                            <h3 class="museum-title"><?= $item->post_title; ?></h3>
                                        </div>
                                    </a>
                                <?php endforeach; ?>

                            </div>
                        </div>
                    </section>
                    <!-- Museum Section -->
                </div>

            </article>
        <?php endwhile; endif; ?>
    </main>

<?php
if (!isset($_POST['from_ajax'])) {
    get_footer();
}
?>