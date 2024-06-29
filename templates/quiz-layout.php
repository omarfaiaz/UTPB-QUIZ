<?php

get_header();

?>

<div class="breadcrumbs_wrapper">
    <div class="container">

        <div class="cell small-12 medium-9 large-9 show-for-large">
            <?php utpb_breadcrumbs(); ?>
        </div>

    </div>
</div>

<div class="quiz-layout">
    <div class="container">
        <?php the_content(); ?>
    </div>
</div>

<?php get_template_part('template-parts/sections/rmi'); ?>

<?php get_footer(); ?>