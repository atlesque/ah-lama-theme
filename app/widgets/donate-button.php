<?php

namespace App;

class DonateButton extends \WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'donate_button',
            __('Donate Button', ' donate_button_domain'),
            array('description' => __('A simple donation button', 'donate_button_domain'),)
        );
    }

    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['title']);
        //echo $args['before_widget'];
        if (!empty($title)) {
            echo $args['before_title'] . $title . $args['after_title'];
        }
?>
        <section class="flex items-center h-full md:justify-end">
            <a href="/support" class="px-4 py-1 font-serif text-2xl text-white border-2 border-white border-solid hover:underline hover:border-white"><?= __('Support', 'donate_button_domain'); ?></a>
        </section>
    <?php
        //echo $args['after_widget'];
    }

    public function form($instance)
    {
        if (isset($instance['title']))
            $title = $instance['title'];
        else
            $title = __('Default Title', 'donate_button_domain');

    ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
<?php
    }
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }
}

add_action('widgets_init', function () {
    register_widget(DonateButton::class);
});
