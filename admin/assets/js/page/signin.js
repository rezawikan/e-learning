$(document).ready(function() {

    // create a new instance for loading
    var a = Ladda.create(document.querySelector('button[name=btn-login]'));

    $('#form-signin').formValidation({
            framework: 'bootstrap',
            fields: {
                username: {
                    validators: {
                        notEmpty: {
                            message: 'The username address is required'
                        }
                    }
                },
                password: {
                    validators: {
                        notEmpty: {
                            message: 'The password address is required'
                        }
                    }
                }
            }
        })
        .on('success.form.fv', function(e) {
            // Prevent form submission
            e.preventDefault();

            var $form = $(e.target),
                fv = $form.data('formValidation');

            // start button loading
            a.start();

            // Use Ajax to submit form data
            $.ajax({
                url: 'function/Auth/loginUser.php',
                type: 'POST',
                data: $form.serialize(),
                success: function(result) {
                  console.log(result);
                    var resultObj = JSON.parse(result);
                    a.stop();
                    if (resultObj.wrong) {
                        $('#message').html("<div class='alert alert-success alert-dismissable'><button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button>" + resultObj.wrong + "</div>");
                        $('#form-signin').children().removeClass('has-success'); // remove class has-success
                        $('#password').addClass('has-error'); // remove class has-success
                    } else if (resultObj.reload) {
                        $('#message').html("<div class='alert alert-success alert-dismissable'><button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button><strong>Sorry, </strong>" + resultObj.reload + "</div>");
                        $('#form-signin').children().removeClass('has-success'); // remove class has-success
                    } else {
                        window.location = "home.php";
                    }

                }
            }); // end ajax

        });

});
