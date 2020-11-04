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

                    <div class="entry-content">
                        <div class="container">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>

            </article>
        <?php endwhile; endif; ?>
    </main>

<?php
if (!isset($_POST['from_ajax'])) {
    get_footer();
}
?>