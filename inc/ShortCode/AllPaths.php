<?php

namespace Inc\ShortCode;

use WP_Query;

class AllPaths
{
    public static function all_paths_template()
    {

        $args = [
            'post_type' => 'result',
            'posts_per_page' => -1
        ];

        $query = new WP_Query($args);
?>


        <section id="all-path_result">
            <div class="path-container">
                <div class="all-path-content">
                    <h1 class="path-page_title"><?php _e('Choose Your path', 'utpb-quiz'); ?></h1>
                </div>

                <div class="uquiz-path-item_wrapper">

                    <?php

                    if ($query->have_posts()) :
                        while ($query->have_posts()) :
                            $query->the_post();

                            $image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full')[0];
                    ?>
                            <div class="uquiz-path-item">
                                <div class="uquiz-path-img">
                                    <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title_attribute(); ?>" /></a>
                                </div>

                                <div class="uquiz-path-content">
                                    <a href="<?php the_permalink(); ?>">
                                        <h3 style="color: <?php the_field('result_color'); ?>"><?php the_title(); ?></h3>
                                    </a>
                                    <p>
                                        Celebrated for their keen eye for detail, analytical prowess,
                                        and knack for problem-solving, the Financier plays an essential
                                        role in the bustling world of business. While others may
                                        struggle to see the big picture, the Financier maintains a clear
                                        vision supported by numbers and facts.
                                    </p>
                                </div>
                            </div>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>


                </div>

                <div class="uquiz-cta">
                    <p><strong>OR</strong></p>
                    <a href="<?php the_field('all_paths_take_quiz_button_url', 'options'); ?>" class="take_quiz"><?php the_field('all_paths_take_quiz_button_text', 'options'); ?></a>
                </div>
            </div>
        </section>

<?php

    }
}
