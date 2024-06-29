<?php


get_header();

?>

<style>
    .result-header {
        background: <?php the_field('result_header_bg'); ?>;
    }

    .result-intro_text>h1 {
        color: <?php the_field('result_color'); ?>;
    }

    .result-intro_text>p {
        color: <?php the_field('result_color'); ?>;
    }

    .result-content {
        border: 2px solid <?php the_field('result_color'); ?>;
        border-top: none;
    }

    .result-content_left {
        border-right: 2px solid <?php the_field('result_color'); ?>;
    }

    @media only screen and (max-width: 1024px) {
        .result-content_left {
            border-right: 0;
            border: 1px solid <?php the_field('result_color'); ?>;
            border-top: none;
        }

        .result-content {
            border: none;
        }
    }
</style>

<div class="breadcrumbs_wrapper">
    <div class="container">

        <div class="cell small-12 medium-9 large-9 show-for-large">
            <?php utpb_breadcrumbs(); ?>
        </div>

    </div>
</div>
<section id="single-result">
    <div class="container">
        <div class="result-container">
            <div class="result-wrapper">
                <div class="result-header">
                    <div class="result-intro">
                        <div class="result-logo">
                            <?php the_post_thumbnail('full'); ?>
                        </div>
                        <div class="result-intro_text">
                            <p>Your Result:</p>
                            <h1><?php the_title(); ?></h1>
                        </div>
                    </div>
                    <div class="result-icon">
                        <img src="<?php the_field('result_icon'); ?>" alt="" />
                    </div>
                </div>
                <div class="result-content">
                    <div class="result-content_left">
                        <?php the_field('result_content') ?>
                    </div>

                    <div class="result-content_right">
                        <?php
                        if (have_rows('result_box')) :

                            while (have_rows('result_box')) : the_row(); ?>
                                <div class="result-icon_box">

                                    <?php the_sub_field('box_texts'); ?>

                                    <img src="<?php the_sub_field('box_image'); ?>" alt="" />
                                    <a href="<?php the_sub_field('box_button_url'); ?>"><?php the_sub_field('box_button_text'); ?></a>
                                    <div class="box-border"></div>
                                </div>

                        <?php
                            endwhile;
                        endif;
                        ?>


                        <a href="<?php the_field('all_path_button_url'); ?>" class="result-btn"><?php the_field('all_path_button_text'); ?>

                            <img src="<?php the_field('all_paths_icon') ?>" alt="" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>


<?php

get_template_part('template-parts/sections/rmi');

get_footer();

?>