<?php

namespace Inc\ShortCode;



class QuizForm
{
    public static function quiz_form_template()
    {
        $total_step = sizeof(get_field('quiz_step', 'options'));

?>
        <section id="quiz-form-block">
            <div class="container">
                <div class="utpd-form_block">
                    <h2 class="quiz-form_title"><?php _e(' CHOOSE YOUR PATH', ' utpb-quiz'); ?></h2>

                    <div class="form-progress_bar">
                        <p>Question <span class="que-index">1</span> of <?php echo $total_step; ?></p>
                        <div class="progress_bar">
                            <div class="progress_inner" style="<?php echo "width:" . 100 / $total_step; ?>%"></div>
                        </div>
                    </div>

                    <div class="utpd-form_wrapper">
                        <form action="" method="post">

                            <?php
                            wp_nonce_field('uquiz_form_action', 'uquiz_form_nonce');
                            if (have_rows('quiz_step', 'options')) :

                                while (have_rows('quiz_step', 'options')) : the_row();

                                    $index = get_row_index();
                                    $question = get_sub_field('quiz_question');
                                    $weight = get_sub_field('question_weight');
                                    $quiz_content = get_sub_field('quiz_content');
                                    $quiz_name = str_replace(" ", "_", strtolower($question));




                            ?>

                                    <div class="utpd-step <?php echo $index == 1 ? 'step_active' : '' ?>" data-step_index="<?php echo $index ?>">
                                        <div class="utpd-form-item">
                                            <div class="form-field_header">
                                                <p><?php echo "$index. $question"; ?></p>
                                            </div>

                                            <input type="hidden" name="<?php echo "question_$index" . "_weight" ?>" value="<?php echo $weight; ?>">
                                            <div class="utpd-form-field_content">
                                                <div class="utpd-form-field_wrapper">

                                                    <?php
                                                    if (have_rows('quiz_content')) :

                                                        while (have_rows('quiz_content')) : the_row();

                                                            $quiz_option = get_sub_field('quiz_option');
                                                            $quiz_option_label = str_replace(" ", "_", strtolower($quiz_option));
                                                            $option_matrix =  get_sub_field('option_matrix');
                                                    ?>

                                                            <div class="utpd-form_field">
                                                                <input type="radio" name="<?php echo $quiz_name; ?>" id="<?php echo $quiz_option_label; ?>" value="<?php echo $option_matrix; ?>" />

                                                                <label for="<?php echo $quiz_option_label; ?>"><?php echo $quiz_option; ?></label>
                                                            </div>
                                                    <?php
                                                        endwhile;

                                                    endif;
                                                    ?>

                                                </div>
                                            </div>
                                        </div>

                                        <?php
                                        if ($index < $total_step) : ?>
                                            <div class="utpd-step_btn">
                                                <div class="step_btn" data-step="<?php echo $index ?>" data-next_step="<?php echo $index + 1 ?>">
                                                    <?php _e(' NEXT QUESTION', ' utpb-quiz'); ?>
                                                </div>
                                            </div>
                                        <?php
                                        else : ?>
                                            <div class="utpd-step_btn">
                                                <button class="result_btn" type="submit" name="submit_quiz_form" data-step="<?php echo $index ?>"> <?php _e(' Get Results', ' utpb-quiz'); ?>> </button>
                                            </div>

                                        <?php
                                        endif;
                                        ?>


                                        <?php if ($index > 1) : ?>
                                            <div class="utpd-prev-state">
                                                <p data-step="<?php echo $index ?>" data-prev_step="<?php echo $index - 1 ?>">
                                                    &lsaquo; Back to previous question
                                                </p>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                            <?php
                                endwhile;

                            endif;
                            ?>



                        </form>
                    </div>
                </div>
            </div>
        </section>

<?php

    }
}
