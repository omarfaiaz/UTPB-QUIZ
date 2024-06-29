<?php

/**
 * Plugin Name: UTPB Quiz
 * Plugin URI: https://online.utpb.edu/
 * Description: This plugin will generate a quiz form.
 * Version: 2.0
 * Author: UTPB Team
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: utpb-quiz
 */


// Prevent direct access.
defined('ABSPATH') || die;

if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

define('UQUIZ_PLUGIN_URL', plugin_dir_url(plugin_basename(__FILE__)));
define('UQUIZ_PLUGIN_PATH', trailingslashit(plugin_dir_path(__FILE__)));


use Inc\Base\Activate;
use Inc\Base\Deactivate;
use Inc\Base\Enqueue;
use Inc\CallBack\FormHandeller;
use Inc\Base\RegsiterTemplate;
use Inc\Base\RegisterPostType;
use Inc\CallBack\GroupField;
use Inc\ShortCode\QuizForm;
use Inc\ShortCode\AllPaths;
use Inc\ShortCode\LandingPage;

final class UTPB_QUIZ
{
    function __construct()
    {
        register_activation_hook(__FILE__, [$this, 'activate']);
        register_deactivation_hook(__FILE__, [$this, 'deactivate']);

        add_action('init', [$this, 'register_result_post']);
        add_action('wp_enqueue_scripts', [$this, 'utpb_enqueue']);
        add_filter('theme_page_templates', [$this, 'register_form_template']);
        add_filter('template_include', [$this, 'load_quiz_layout_template']);
        add_filter('single_template', [$this, 'load_result_template']);

        add_action('wp', [$this, 'quiz_form_handeller']);
        add_action('acf/init', [$this, 'add_option_page']);
        add_action('acf/include_fields', [$this, 'load_acf_fields']);

        add_shortcode('display_quiz_form', [$this, 'display_quiz_form']);
        add_shortcode('display_all_paths', [$this, 'display_all_paths']);
        add_shortcode('display_landing_page', [$this, 'display_landing_page']);
    }

    function activate()
    {
        Activate::activate();
    }
    function deactivate()
    {
        Deactivate::deactivate();
    }

    function register_result_post()
    {
        RegisterPostType::register_result();
    }

    function register_form_template($templates)
    {
        return RegsiterTemplate::utpb_form_templates($templates);
    }



    function load_quiz_layout_template($template)
    {
        if (is_page_template('templates/quiz-layout.php')) {

            $template = plugin_dir_path(__FILE__) . 'templates/quiz-layout.php';
        }
        return $template;
    }


    function utpb_enqueue()
    {
        Enqueue::utpb_enqueue();
    }


    function load_result_template($template)
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

    function add_option_page()
    {
        if (!function_exists('acf_add_local_field_group')) {
            return;
        }
        GroupField::utpb_add_option_page();
    }
    function load_acf_fields()
    {
        if (!function_exists('acf_add_local_field_group')) {
            return;
        }
        GroupField::utpb_load_acf_fields();
    }

    function display_quiz_form()
    {
        ob_start();
        QuizForm::quiz_form_template();
        return ob_get_clean();
    }

    function display_all_paths()
    {
        ob_start();
        AllPaths::all_paths_template();
        return ob_get_clean();
    }

    function display_landing_page()
    {
        ob_start();
        LandingPage::display_landing_page();
        return ob_get_clean();
    }

    function quiz_form_handeller()
    {
        FormHandeller::quiz_form_handeller();
    }
}

new UTPB_QUIZ();
