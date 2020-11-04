<?php
class custom_area_widget extends WP_Widget {
    public function __construct()
    {
        parent::__construct('custom_area_widget', 'Custom Area', array('description' => 'Custom Area Widget by Indonesian Competitor'));
    }

    public function widget($args, $instance)
    {
        ?>
        <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; border: 2px dashed #808080; padding: 42px; border-radius: 24px">
            Custom Area
        </div>
        <?php
    }
}

add_action('widgets_init', function () {
   register_widget('custom_area_widget');
});