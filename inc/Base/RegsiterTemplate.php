<?php

namespace Inc\Base;

class RegsiterTemplate
{
    public static function utpb_form_templates($templates)
    {

        if (is_array($templates)) {
            $templates['templates/quiz-layout.php'] = 'Quiz Layout';
        }
        return $templates;
    }

    public static function utpb_result_template($template)
    {

        global $post;

        if ('result' === $post->post_type && locate_template(array('templates/single-result.php')) === '') {
            // Look for single-book.php in the plugin directory
            $plugin_template = plugin_dir_path(__FILE__) . 'templates/single-result.php';
            if (file_exists($plugin_template)) {
                return $plugin_template;
            }
        }

        return $template;
    }
}
