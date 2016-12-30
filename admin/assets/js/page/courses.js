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

    loadDataTutor('#add-course #tutorid');
    function loadDataTutor(id) {

      var dataID = getCookie('admin');

        $.ajax({
            url: 'function/Lecturer/ViewDataLecturer.php',
            dataType: 'json',
            success: function(response) {
              console.log(response);
              $(id).html("");
              $(id).html("<option value=''>Select</option>");
                $.each(response, function(key, val) {
                  console.log(val.id);
                    tutor = '<option value="' + val.id+ '" >' + val.first_name +" "+ val.last_name + '</option>';

                    $(id).append(tutor);
                });
            }
        })
    }

    loadDataCourses();
    function loadDataCourses()
    {
      $.ajax({
        url: 'function/Course/ViewDataCourse.php',
        type: 'POST',
        success: function(result){
            console.log(result);
            var resultObj = JSON.parse(result);

            var handler = $('#data-courses');

            handler.html("");

            $.each(resultObj, function(index, el) {
              var rows    = $('<tr>');
              rows.html("<td>"+el.subject_id+"</td><td>"+el.name+"</td><td>"+el.description+"</td><td>"+el.day+"</td><td>"+el.time+"</td><td><a href='#modal-form-update' data-toggle='modal' id='"+el.id+"' class='edit_course'><i class='fa fa-edit' aria-hidden='true'></i></a> | <a href='#modal-form-delete' data-toggle='modal' id='"+el.id+"' class='delete_course'><i class='fa fa-trash' aria-hidden='true'></i></a></td>");
              handler.append(rows).trigger('footable_redraw');
            });

        }
      })
    }

    // edit product show when clicked
    $(document).on('click', '.edit_course', function(e){
        e.preventDefault();

        var dataID = $(this).attr('id'); // get data from attribute id
        loadDataTutor('#form-data-update #tutorid');

        $.ajax({
            url     : 'function/Course/EditDataCourse.php',
            type    : 'POST',
            data    : {id : dataID},
            success : function(result){
                var resultObj = JSON.parse(result);
                console.log(resultObj);

                // replace data that loaded to form

                $('#form-data-update input[name=id]').val(resultObj.id);
                $('#form-data-update input[name=subjectID]').val(resultObj.subject_id);
                $('#form-data-update input[name=name]').val(resultObj.name);
                $('#form-data-update input[name=description]').val(resultObj.description);
                $('#form-data-update select[name=tutorID]').val(resultObj.tutors_id);
                $('#form-data-update select[name=day]').val(resultObj.day);
                $('#form-data-update input[name=time]').val(resultObj.time);
            }
        })
    });

    var a = Ladda.create(document.querySelector('button[name=btn-update-courses]'));
    //
    $('#form-data-update').formValidation({
        framework: 'bootstrap',
        fields: {
            subjectID: {
                validators: {
                    notEmpty: {
                        message: 'The Subject ID is required'
                    }
                } // end validators
            }
            , // end email
            name: {
                validators: {
                    notEmpty: {
                        message: 'The Name is required'
                    }
                } // end validators
            },
            description: {
                validators: {
                    notEmpty: {
                        message: 'The Description is required'
                    }
                } // end validators
            }, // end lastName
            tutorID: {
                validators: {
                    notEmpty: {
                        message: 'The tutor Name is required'
                    }
                } // end validators
            }, // end lastName
            day: {
                validators: {
                    notEmpty: {
                        message: 'The Day is required'
                    }
                } // end validators
            }, // end lastName
            time: {
                validators: {
                    notEmpty: {
                        message: 'The Time is required'
                    }
                } // end validators
            } // end lastName
        } // end fiedls
    })

    .on('success.form.fv', function(e) {
        // Prevent form submission
        e.preventDefault();
        var $form = $(e.target),
            fv = $form.data('formValidation');
        // start button loading
        a.start();

        $.ajax({
          url: 'function/Course/UpdateDataCourse.php',
          type: 'POST',
          data: $form.serialize(),
          success: function(result){
            console.log(result);
              loadDataCourses();

            var resultObj = JSON.parse(result);
            console.log(resultObj); // log processing
            if(resultObj.success) {
                $('#message').html("<div class='alert alert-success alert-dismissable'><button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button><strong>Success!</strong></div>");

            }
            else {
                $('#message').html("<div class='alert alert-success alert-dismissable'><button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button>Something Wrong!!</div>");
            }
            $form.formValidation('resetForm', true);
            $('#form-data-update').children().removeClass('has-success'); // remove class has-success
            $('#form-data-update')[0].reset(); // reset all fields
            $('button').removeAttr('disabled'); // remove atrribute disabled
            $('button').removeClass('disabled'); // remove class disabled
            $('#modal-form-update').modal('hide');
            $('#message').fadeIn('slow', function() {
                $('#message').fadeOut(7000);
            });
            a.stop();
          }
        })

    });




    var l = Ladda.create(document.querySelector('button[name=btn-add-courses]'));
    //
    $('#add-course').formValidation({
        framework: 'bootstrap',
        fields: {
            subjectID: {
                validators: {
                    notEmpty: {
                        message: 'The Subject ID is required'
                    }
                } // end validators
            }
            , // end email
            name: {
                validators: {
                    notEmpty: {
                        message: 'The Name is required'
                    }
                } // end validators
            },
            description: {
                validators: {
                    notEmpty: {
                        message: 'The Description is required'
                    }
                } // end validators
            }, // end lastName
            tutorID: {
                validators: {
                    notEmpty: {
                        message: 'The tutor Name is required'
                    }
                } // end validators
            }, // end lastName
            day: {
                validators: {
                    notEmpty: {
                        message: 'The Day is required'
                    }
                } // end validators
            }, // end lastName
            time: {
                validators: {
                    notEmpty: {
                        message: 'The Time is required'
                    }
                } // end validators
            } // end lastName
        } // end fiedls
    })

    .on('success.form.fv', function(e) {
        // Prevent form submission
        e.preventDefault();
        var $form = $(e.target),
            fv = $form.data('formValidation');
        // start button loading
        l.start();

        $.ajax({
          url: 'function/Course/createDataCourse.php',
          type: 'POST',
          data: $form.serialize(),
          success: function(result){
            console.log(result);

            var resultObj = JSON.parse(result);
            console.log(resultObj); // log processing
            if(resultObj.success) {
                $('#message').html("<div class='alert alert-success alert-dismissable'><button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button><strong>Success!</strong></div>");

            }
            else {
                $('#message').html("<div class='alert alert-success alert-dismissable'><button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button>Something Wrong!!</div>");
            }
            $form.formValidation('resetForm', true);
            loadDataCourses();
            $('#add-course').children().removeClass('has-success'); // remove class has-success
            $('#add-course')[0].reset(); // reset all fields
            $('button').removeAttr('disabled'); // remove atrribute disabled
            $('button').removeClass('disabled'); // remove class disabled
            $('#message').fadeIn('slow', function() {
                $('#message').fadeOut(7000);
            });
            l.stop();
          }
        })
    });

    // delete data bank
  $(document).on('click', '.delete_course', function(e) {
      e.preventDefault(); /* prevent link address */
      var dataID = $(this).attr('id'); /* get data id */

      $("#confirm").html("Are you sure want to delete?"); /* pop up modals confirmation */
      $('#modal-form-delete').modal('show');
      $('#cancel').click(function() {

          $('#modal-form-delete').modal('hide');
      });

      $('#sure').on('click', function(e) {
          e.preventDefault();

          $.ajax({
              url: 'function/Course/DeleteDataCourse.php',
              type: 'POST',
              data: {
                  id: dataID
              },
              success: function(result) {
                  var resultObj = JSON.parse(result);
                  console.log(result);
                  $('#modal-form-delete').modal('hide'); // hide modal form add
                  if (resultObj.success) {
                      $('#message').html("<div class='alert alert-success alert-dismissable'><button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button>Data has been delete</div>");
                      $('#message').fadeIn('slow', function() {
                          $('#message').fadeOut(7000);
                      });
                      loadDataCourses();
                  }
              }
          }); // end ajax
      }); // end sure
  }); // end delete
});
