<?php
if (!isset($_POST['from_ajax'])) {
    get_header();
}

$selected = get_field('museum_selected', $post->ID)[0];

?>
<main id="content">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php if ($selected): ?>
        <div class="entry-full" style="background: url(<?= get_the_post_thumbnail_url($post->ID); ?>)">
            <div class="container">
                <div class="entry-content">
                   <h1 class="entry-title"><?php the_title(); ?></h1> <?php edit_post_link(); ?>
                    <?php the_content(); ?>
                </div>
            </div>
        </div>

        <!-- News Section -->
        <section class="news-list" id="news-list">
            <div class="section-header">
                <div class="container">
                    <h2 class="section-title">News Related</h2>
                    <a href="<?php echo site_url('/news') ?>" class="link">All news</a>
                </div>
            </div>


            <div class="container">
                <div class="news-wrapper">

                    <?php foreach (get_posts(['post_type' => 'post', 'category_name' => $post->post_name]) as $item) : ?>
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

    <?php else: ?>

        <div class="entry-half">
            <div class="entry-hero" style="background: url(<?= get_the_post_thumbnail_url($post->ID); ?>)">
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

    <?php endif; ?>

</article>
<?php endwhile; endif; ?>
</main>

<?php
if (!isset($_POST['from_ajax'])) {
    get_footer();
}
?>