<?php

namespace Inc\Base;

class RegisterPostType
{
    public static function register_result()
    {
        register_post_type('result', array(
            'labels' => array(
                'name' => 'Quiz Results',
                'singular_name' => 'Quiz Result',
                'menu_name' => 'Quiz Results',
                'all_items' => 'All Quiz Results',
                'edit_item' => 'Edit Quiz Result',
                'view_item' => 'View Quiz Result',
                'view_items' => 'View Quiz Results',
                'add_new_item' => 'Add New Quiz Result',
                'add_new' => 'Add New Quiz Result',
                'new_item' => 'New Quiz Result',
                'parent_item_colon' => 'Parent Quiz Result:',
                'search_items' => 'Search Quiz Results',
                'not_found' => 'No quiz results found',
                'not_found_in_trash' => 'No quiz results found in Trash',
                'archives' => 'Quiz Result Archives',
                'attributes' => 'Quiz Result Attributes',
                'insert_into_item' => 'Insert into quiz result',
                'uploaded_to_this_item' => 'Uploaded to this quiz result',
                'filter_items_list' => 'Filter quiz results list',
                'filter_by_date' => 'Filter quiz results by date',
                'items_list_navigation' => 'Quiz Results list navigation',
                'items_list' => 'Quiz Results list',
                'item_published' => 'Quiz Result published.',
                'item_published_privately' => 'Quiz Result published privately.',
                'item_reverted_to_draft' => 'Quiz Result reverted to draft.',
                'item_scheduled' => 'Quiz Result scheduled.',
                'item_updated' => 'Quiz Result updated.',
                'item_link' => 'Quiz Result Link',
                'item_link_description' => 'A link to a quiz result.',
            ),
            'public' => true,
            'show_in_rest' => true,
            'menu_position' => 30,
            'menu_icon' => 'dashicons-welcome-learn-more',
            'supports' => array(
                0 => 'title',
                1 => 'editor',
                2 => 'thumbnail',
                3 => 'custom-fields',
            ),
            'delete_with_user' => false,
        ));
    }
}
