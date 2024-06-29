jQuery(document).ready(function ($) {
  // Navigate to Next Step
  $(".utpd-step_btn .step_btn").on("click", function (e) {
    e.preventDefault();

    const stepIndex = $(this).data("step");
    const nxtStepIndex = $(this).data("next_step");
    const stepBlock = $(`.utpd-step[data-step_index="${stepIndex}"]`);
    const nxtStepBlock = $(`.utpd-step[data-step_index="${nxtStepIndex}"]`);

    const radios = stepBlock.find("input[type='radio']");
    const increaseWidth = 100 / $(".utpd-step").length;

    if (!radios.is(":checked")) {
      alert("Please select an option to proceed.");
      return false;
    }

    stepBlock.removeClass("step_active");
    nxtStepBlock.addClass("step_active");

    $(".form-progress_bar .progress_inner").width(
      `${increaseWidth * nxtStepIndex}%`
    );
    $(".form-progress_bar span.que-index").html(nxtStepIndex);
  });

  // Navigate to Prev State

  $(".utpd-prev-state p").on("click", function () {
    const stepIndex = $(this).data("step");
    const prevStepIndex = $(this).data("prev_step");
    const stepBlock = $(`.utpd-step[data-step_index="${stepIndex}"]`);
    const prevStepBlock = $(`.utpd-step[data-step_index="${prevStepIndex}"]`);
    stepBlock.removeClass("step_active");
    prevStepBlock.addClass("step_active");
    const increaseWidth = 100 / $(".utpd-step").length;
    $(".form-progress_bar .progress_inner").width(
      `${increaseWidth * prevStepIndex}%`
    );
    $(".form-progress_bar span.que-index").html(prevStepIndex);
  });

  // Check final Step
  $(".utpd-step_btn .result_btn").on("click", function (e) {
    const stepIndex = $(this).data("step");
    const stepBlock = $(`.utpd-step[data-step_index="${stepIndex}"]`);
    const radios = stepBlock.find("input[type='radio']");

    if (!radios.is(":checked")) {
      alert("Please select an option to proceed.");
      e.preventDefault();
    }
  });
});
