</div>
<footer id="footer">
    <div class="container">
        <div id="copyright">
            Copyright © <?= date('Y') ?> - All rights reserved
        </div>
        <div class="social-media">

            <?php foreach (get_posts(['post_type' => 'social-media', 'posts_per_page' => -1]) as $item) : ?>
                <a href="<?= $item->post_content; ?>" target="_blank" class="link without-ajax">
                    <?= $item->post_title; ?>
                </a>
            <?php endforeach; ?>

        </div>
    </div>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>