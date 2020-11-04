<?php
if (!isset($_POST['from_ajax'])) {
    get_header();
}
?>

    <main id="content">

        <!-- Hero Section -->
        <section class="hero" id="hero">
            <div class="container">
                <div class="hero-caption">
                    <h1 class="hero-title">Kazan Museum Tour</h1>
                    <h3 class="hero-subtitle">
                        The most amazing museum in the world.
                    </h3>
                    <a href="#list-museum" class="btn btn-cta">Discover Museum</a>
                </div>
            </div>
        </section>
        <!-- Hero Section -->

        <!-- Museum Section -->
        <section class="museum-list" id="museum-list">
            <div class="section-header">
                <div class="container">
                    <h2 class="section-title">Hotest Museums</h2>
                    <a href="" class="link">All Museums</a>
                </div>
            </div>

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

        <!-- Main Layout -->
        <div class="main-layout">

            <div class="container">
                <!-- News Section -->
                <section class="news-list" id="museum-list">
                    <div class="section-header">
                        <div class="container">
                            <h2 class="section-title">News</h2>
                            <a href="" class="link">All news</a>
                        </div>
                    </div>


                    <div class="news-wrapper">

                        <?php foreach (get_news('limit') as $item) : ?>
                            <a href="<?= get_the_permalink($item->ID) ?>" class="news-item">
                                <div class="news-image" style="background:url(<?= get_the_post_thumbnail_url($item->ID); ?>); background-size: cover; background-position:center;"></div>
                                <div class="news-caption">
                                    <h3 class="news-title"><?= $item->post_title; ?></h3>
                                </div>
                            </a>
                        <?php endforeach; ?>

                    </div>
                </section>
                <!-- News Section -->

                <!-- Cover Section -->
                <section class="cover-list" id="cover-list">
                    <div class="section-header">
                        <div class="container">
                            <h2 class="section-title">Cover</h2>
                        </div>
                    </div>

                    <div class="news-wrapper">

                        <?php foreach (get_museums() as $item) : ?>
                            <a href="<?= get_the_permalink($item->ID) ?>" class="cover-item">
                                <div class="cover-image" style="background:url(<?= get_the_post_thumbnail_url($item->ID); ?>); background-size: cover; background-position:center;"></div>
                            </a>
                        <?php endforeach; ?>

                    </div>
                </section>
                <!-- Cover Section -->
            </div>

        </div>
        <!-- Main Layout -->

    </main>

<?php
if (!isset($_POST['from_ajax'])) {
    get_footer();
}
?>

