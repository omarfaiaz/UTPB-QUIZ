<?php

namespace Inc\ShortCode;

class LandingPage
{
    public static function display_landing_page()
    { ?>

        <div class="landing-container">
            <div class="uquiz_path_landing_wrapper">
                <div class="uquiz_path_landing_content">
                    <div class="uquiz_path_landing_left">
                        <h1 class="uquiz_page_title"><?php the_field('landing_page_title', 'options'); ?></h1>

                        <div class="uquiz_landing_mobile_only">
                            <img src="<?php the_field('landing_page_all_path_icon', 'options'); ?>" class="path_route_icon" />
                            <a href="<?php the_field('landing_page_button_url', 'options'); ?>" class="take_quiz_black"><?php the_field('landing_page_button_text', 'options'); ?></a>
                        </div>

                        <p class="uquiz-light-para"><?php echo get_field('landing_page_light_text', 'options'); ?></p>
                        <?php the_field('landing_page_content', 'options'); ?>
                        <div class="uquiz-cta">
                            <a href="<?php the_field('landing_page_button_url', 'options'); ?>" class="take_quiz"><?php the_field('landing_page_button_text', 'options'); ?></a>
                            <img src="<?php the_field('landing_page_all_path_icon', 'options'); ?>" class="path_route_icon" />
                        </div>
                    </div>
                    <div class="uquiz_path_landing_right">
                        <div class="uquiz_path_quote_wrapper" style="background-image: url('<?php the_field('landing_page_image', 'options'); ?>')">
                            <h3>
                                <?php the_field('landing_page_overlap_text', 'options'); ?>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php

    }
}
