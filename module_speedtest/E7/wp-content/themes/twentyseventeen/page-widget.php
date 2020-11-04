<?php
class page_widget extends WP_Widget {
    public function __construct()
    {
        parent::__construct('page_widget', 'Page Widget', array('description' => 'Pgae Widget by Indonesian Competitor'));
    }

    public function widget($args, $instance)
    {
        ?>
        <div class="widget">
            <h2 class="widget-title">Pages</h2>
            <ul>
                <?php foreach (get_posts(['post_type' => 'page', 'posts_per_page' => -1]) as $item) : ?>
                    <li><a href="<?= get_the_permalink($item->ID); ?>"><?= $item->post_title; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php
    }
}

add_action('widgets_init', function () {
    register_widget('page_widget');
});