 (function ($) {

    // Max date to today
    var dtToday = new Date();

    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();

    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();

    var maxDate = year + '-' + month + '-' + day;
    $('.datepkr').attr('max', maxDate);


    // Toggle Password Icon
    $(".toggle-password").click(function() {

        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        console.log(input);
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });

    // Hide Message of Session
    $(".hide500").delay(5000).fadeOut(800);

    $('[data-toggle="tooltip"]').tooltip();

    var bouncer = new Bouncer('[data-validate]', {
        disableSubmit: false,
        customValidations: {
            valueMismatch: function (field) {

                // Look for a selector for a field to compare
                // If there isn't one, return false (no error)
                var selector = field.getAttribute('data-bouncer-match');
                if (!selector) return false;

                // Get the field to compare
                var otherField = field.form.querySelector(selector);
                if (!otherField) return false;

                // Compare the two field values
                // We use a negative comparison here because if they do match, the field validates
                // We want to return true for failures, which can be confusing
                return otherField.value !== field.value;

            }
        },
        messages: {
            valueMismatch: function (field) {
                var customMessage = field.getAttribute('data-bouncer-mismatch-message');
                return customMessage ? customMessage : 'Please make sure the fields match.'
            }
        }
    });

    document.addEventListener('bouncerFormInvalid', function (event) {
        // console.log(event.detail.errors);
        // console.log(event.detail.errors[0].offsetTop);
        window.scrollTo(0, event.detail.errors[0].offsetTop);
    }, false);

    document.addEventListener('bouncerFormValid', function () {
        // alert('Form submitted successfully!');
        // window.location.reload();
    }, false);



})(jQuery);

