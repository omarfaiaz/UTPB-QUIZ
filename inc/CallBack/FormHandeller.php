<?php

namespace Inc\CallBack;

class FormHandeller
{
    public static function quiz_form_handeller()
    {
        if (isset($_POST['submit_quiz_form'])) {
            // Check the nonce for security
            if (!isset($_POST['uquiz_form_nonce']) || !wp_verify_nonce($_POST['uquiz_form_nonce'], 'uquiz_form_action')) {
                wp_die('Security check failed.');
            }

            $total_weight = [];
            if (have_rows('quiz_step', 'options')) :

                while (have_rows('quiz_step', 'options')) : the_row();

                    $index = get_row_index();
                    $question = get_sub_field('quiz_question');
                    $quiz_name = str_replace(" ", "_", strtolower($question));

                    $key = sanitize_text_field($_POST[$quiz_name]);
                    $value = $_POST["question_" . $index . "_weight"];

                    $total_weight[$key][] = $value;


                endwhile;
            endif;


            $maxSum = 0;
            $maxKeys = array();
            foreach ($total_weight as $key => $values) {
                // Calculate the sum of the current key's values
                $sum = array_sum($values);

                if ($sum > $maxSum) {
                    $maxSum = $sum;
                    $maxKeys = array($key); // Reset the array with the new max key
                } elseif ($sum == $maxSum) {
                    $maxKeys[] = $key; // Add the key to the array of max keys
                }
            }
           
            $max_val = 0;
            $max_key = '';

            $result = $maxKeys[0];

            if (sizeof($maxKeys) > 1) {
                foreach ($total_weight as $key => $weight) {
                    if (max($weight) > $max_val) {
                        $max_key = $key;
                    }
                }
                $result = $max_key;
            }

            $result = strtolower($result);

            wp_redirect("/result/the-$result");
            
        }
    }
}
