$(document).ready(function() {

    $('.footable').footable();

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

    loadDataCourseCode('select[name=student_data_id]');
    function loadDataCourseCode(id) {

      var dataID = getCookie('tutors');

        $.ajax({
            url: 'function/Assignment/ViewDataSubjectID.php',
            dataType: 'json',
            success: function(response) {
              console.log(response);
              $(id).html("");
              $(id).html("<option value=''>Select</option>");
                $.each(response, function(key, val) {

                    tutor = '<option value="' + val.student_data_id+ '" >' + val.subject_id +'</option>';

                    $(id).append(tutor);
                });

            }
        })
    }




    // create a new instance for loading
    var l = Ladda.create(document.querySelector('button[name=btn-assignment-add]'));

    $('#data-form-add').formValidation({
            framework: 'bootstrap',
            fields: {
                student_data_id: {
                    validators: {
                        notEmpty: {
                            message: 'Subject is required'
                        }
                    }
                },
                number: {
                    validators: {
                        notEmpty: {
                            message: 'Number is required'
                        },
                    }
                },
                assignment_file: {
                    validators: {
                        file: {
                            extension: 'pdf',
                            type: 'application/pdf',
                            maxSize: 2097152, // 2048 * 1024
                            message: 'The selected file is not valid'
                        },
                        notEmpty: {
                          message: 'File is Required'
                        }
                    }
                }
            } // end fields
        })
        .on('success.form.fv', function(e) {

            e.preventDefault();

            var $form = $(e.target),
                formData = new FormData(),
                params = $form.serializeArray(),
                files = $form.find('[name="assignment_file"]')[0].files;

            $.each(files, function(i, file) {
                // Prefix the name of uploaded files with "uploadedFiles-"
                // Of course, you can change it to any string
                formData.append(i, file);
            });

            $.each(params, function(i, val) {
                formData.append(val.name, val.value);
            });

            l.start();

            $.ajax({
                url: 'function/Assignment/AddDataAssignment.php',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                type: 'POST',
                success: function(result) {
                  console.log(result);

                      var resultObj = JSON.parse(result);
                      console.log(resultObj); // log processing
                      if(resultObj.success) {
                          $('#message-add').html("<div class='alert alert-success alert-dismissable'><button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button><strong>Success!</strong></div>");
                      }
                      else {
                          $('#message-add').html("<div class='alert alert-success alert-dismissable'><button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button>Something Wrong!!</div>");
                      }
                      $('#message-add').fadeIn('slow', function() {
                          $('#message-add').fadeOut(7000);
                      });
                      l.stop();
                      $form.formValidation('resetForm', true);
                      $('#data-form-add').children().removeClass('has-success'); // remove class has-success
                      $('#data-form-add')[0].reset(); // reset all fields
                      $('button').removeAttr('disabled'); // remove atrribute disabled
                      $('button').removeClass('disabled'); // remove class disabled
                  }
            });
        });


});
