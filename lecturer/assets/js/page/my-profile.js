$(document).ready(function() {


  //
  $('#datePicker').datepicker({
      format: "mm/dd/yyyy"
    })
  //   .on('changeDate', function(e) {
  //       // Revalidate the date field
  //       $('#update-user').formValidation('revalidateField', 'date');
  //   });


    // get data cookie
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

    loadDataUser();
    function loadDataUser(){

      var dataID = getCookie('tutors');
      console.log(dataID);

      $.ajax({
          url: 'function/Profile/ViewDataUser.php',
          type: 'POST',
          data: {
              tutors: dataID
          },
          success: function(result) {
            console.log(result);

            var resultObj = JSON.parse(result);

            $('input[name=email]').val(resultObj.email);
            $('input[name=username]').val(resultObj.username);
            $('input[name=firstName]').val(resultObj.first_name);
            $('input[name=lastName]').val(resultObj.last_name);
            $('select[name=gender]').val(resultObj.gender);
            $('input[name=date]').val(resultObj.date_of_birth);
          }
      });
    }


    var l = Ladda.create(document.querySelector('button[name=btn-update]'));

    $('#update-user').formValidation( {
        framework: 'bootstrap',
        fields: {
            email: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required'
                    }
                } // end validators
            }
            , // end email
            firstName: {
                validators: {
                    notEmpty: {
                        message: 'The First Name is required'
                    }
                } // end validators
            },
            lastName: {
                validators: {
                    notEmpty: {
                        message: 'The Last Name is required'
                    }
                } // end validators
            }, // end lastName
            gender: {
                validators: {
                    notEmpty: {
                        message: 'The Gender is required'
                    }
                } // end validators
            }, // end gender
            date: {
              validators: {
                  notEmpty: {
                      message: 'The date is required'
                  },
                  date: {
                        format: 'MM/DD/YYYY',
                        message: 'The date is not a valid'
                    }
              }
            }
        } // end fiedls
    })

    .on('success.form.fv', function(e) {
        // Prevent form submission
        e.preventDefault();
        var $form = $(e.target),
            fv = $form.data('formValidation');
        // start button loading
        l.start();
        // Use Ajax to submit form data
        $.ajax( {
            url: 'function/Profile/updateUser.php',
            type: 'POST',
            data: $form.serialize(),
            success: function(result) {
              console.log(result);
                var resultObj = JSON.parse(result);
                console.log(resultObj); // log processing
                if(resultObj.success) {
                    $('#message').html("<div class='alert alert-success alert-dismissable'><button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button><strong>Success!</strong></div>");

                }
                else {
                    $('#message').html("<div class='alert alert-success alert-dismissable'><button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button>Something Wrong!!</div>");
                }
                $('#update-user').children().removeClass('has-success'); // remove class has-success
                $('#update-user')[0].reset(); // reset all fields
                $('#message').fadeIn('slow', function() {
                    $('#message').fadeOut(7000);
                });
                l.stop();
                loadDataUser();
            }
        }); // end ajax
    }); // end success


    // create a new instance for loading
    var a = Ladda.create(document.querySelector('button[name=btn-change-password]'));

    $("#form-change-password").formValidation({
            framework: 'bootstrap',
            fields: {
                password: {
                    validators: {
                        notEmpty: {
                            message: "Password is required"
                        }
                    }
                },
                confirm_password: {
                    validators: {
                        notEmpty: {
                            message: "Confirm password is required"
                        },
                        identical: {
                            field: "password",
                            message: "Confirm Password doesn't match"
                        }
                    }
                }
            }
        })
        .on('success.form.fv', function(e) {
            // Prevent form submission
            e.preventDefault();

            var $form = $(e.target), // The form instance
                fv = $(e.target).data('formValidation'); // FormValidation instance

            a.start();

            $.ajax({
                url: 'function/Profile/UpdatePassword.php',
                type: 'POST',
                data: $form.serialize(),
                success: function(result) {
                  console.log(result);
                    a.stop();
                    var resultObj = JSON.parse(result);
                    if (resultObj.valid) {
                        $('button').removeAttr('disabled'); // remove atrribute disabled
                        $('button').removeClass('disabled'); // remove class disabled
                        $('#form-change-password')[0].reset(); // reset all fields
                        $('#form-change-password').children().removeClass('has-success'); // remove class has-success
                        window.scrollTo(0, 0);
                        $('#message-password').html("<div class='alert alert-success alert-dismissable'><button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button>Password has been updated!</div>");
                        $('#message-password').fadeIn('slow', function() {
                            $('#message-password').fadeOut(10000);
                        });
                    }
                }
            });
        });
});
