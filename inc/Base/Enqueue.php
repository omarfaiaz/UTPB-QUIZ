<?php

namespace Inc\Base;



class Enqueue
{
    public static function utpb_enqueue()
    {
        wp_enqueue_style('uquiz_style', UQUIZ_PLUGIN_URL . 'assets/css/style.css', []);

        wp_enqueue_script('jquery');
        wp_enqueue_script('uquiz-script', UQUIZ_PLUGIN_URL . 'assets/js/main.js', ['jquery'], time(), true);

        wp_localize_script('uquiz-script', 'uquiz_object', [
            'ajaxUrl'  => admin_url('admin-ajax.php'),
        ]);
    }
}
