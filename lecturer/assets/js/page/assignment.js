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

    loadDataAssignment();
    loadDataCourseCode('select[name=id_course]');
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
                  console.log(val.id);
                    tutor = '<option value="' + val.id+ '" >' + val.subject_id +'</option>';

                    $(id).append(tutor);
                });

            }
        })
    }


    function loadDataAssignment()
    {
      $.ajax({
        url: 'function/Assignment/ViewDataAssignment.php',
        type: 'POST',
        success: function(result){
            console.log(result);
            var resultObj = JSON.parse(result);

            var handler = $('.data-assignment');

            handler.html("");

            $.each(resultObj, function(index, el) {
              var rows    = $('<tr>');
              rows.html("<td>"+el.subject_id+"</td><td>"+el.name+"</td><td>"+el.assignment_number+"</td><td>"+el.assignment_name+"</td><td>"+el.update_at+"</td><td><a href='uploads/assignment/"+el.assignment_name+"' target='_blank' title='Download'><i class='fa fa-cloud-download' aria-hidden='true'></i></a> | <a href='#modal-form-update' data-toggle='modal' id='"+el.id+"' class='edit_assignment' title='Edit'><i class='fa fa-edit' aria-hidden='true'></i></a> | <a href='#modal-form-delete' data-toggle='modal' id='"+el.id+"' class='delete_assignment' title='Delete'><i class='fa fa-trash' aria-hidden='true'></i></a></td>");
              handler.append(rows).trigger('footable_redraw');
            });

        }
      })
    }



    // create a new instance for loading
    var l = Ladda.create(document.querySelector('button[name=btn-assignment-add]'));

    $('#data-form-add').formValidation({
            framework: 'bootstrap',
            fields: {
                id_course: {
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
                      loadDataAssignment();
                  }
            });
        });

        // edit product show when clicked
        $(document).on('click', '.edit_assignment', function(e){
            e.preventDefault();

            var dataID = $(this).attr('id'); // get data from attribute id

            $('#form-data-update select[name=id_course]').attr('disabled','disabled');
            $('#form-data-update select[name=number]').attr('disabled','disabled');
            $('#form-data-update input[name=id]').val(dataID);

            $.ajax({
                url     : 'function/Assignment/EditDataAssignment.php',
                type    : 'POST',
                data    : {id : dataID},
                success : function(result){
                  console.log(result);
                    var resultObj = JSON.parse(result);
                    console.log(resultObj);

                    // replace data that loaded to form
                    $('#form-data-update select[name=id_course]').val(resultObj.id_courses);
                    $('#form-data-update select[name=number]').val(resultObj.assignment_number);
                }
            })
        });

        // create a new instance for loading
        var a = Ladda.create(document.querySelector('button[name=btn-update-assignment]'));

        $('#form-data-update').formValidation({
            framework: 'bootstrap',
            fields: {
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

            a.start();

            $.ajax({
                url: 'function/Assignment/UpdateDataAssignment.php',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                type: 'POST',
                success: function(result) {

                    var resultObj = JSON.parse(result);
                    console.log(resultObj); // log processing
                    if(resultObj.success) {
                        $('#message').html("<div class='alert alert-success alert-dismissable'><button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button><strong>Success!</strong></div>");
                    }
                    else {
                        $('#message').html("<div class='alert alert-success alert-dismissable'><button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button>Something Wrong!!</div>");
                    }
                    $('#message').fadeIn('slow', function() {
                        $('#message').fadeOut(7000);
                    });
                    l.stop();
                    $form.formValidation('resetForm', true);
                    $('#form-data-update').children().removeClass('has-success'); // remove class has-success
                    $('#form-data-update')[0].reset(); // reset all fields
                    $('button').removeAttr('disabled'); // remove atrribute disabled
                    $('button').removeClass('disabled'); // remove class disabled
                    $('#modal-form-update').modal('hide');
                    loadDataAssignment();
              }
            });
        });


        var d = Ladda.create(document.querySelector('button[name=btn-delete]'));
          // delete data bank
        $(document).on('click', '.delete_assignment', function(e) {
            e.preventDefault(); /* prevent link address */
            var dataID = $(this).attr('id'); /* get data id */

            $("#confirm").html("Are you sure want to delete?"); /* pop up modals confirmation */
            $('#modal-form-delete').modal('show');
            $('#cancel').click(function() {

                $('#modal-form-delete').modal('hide');
            });

            $('#sure').on('click', function(e) {
                e.preventDefault();

                d.start();

                $.ajax({
                    url: 'function/Assignment/DeleteDataAssignment.php',
                    type: 'POST',
                    data: {
                        id: dataID
                    },
                    success: function(result) {
                      console.log(result);
                        var resultObj = JSON.parse(result);
                        console.log(result);
                        $('#modal-form-delete').modal('hide'); // hide modal form add
                        if (resultObj.success) {
                            $('#message').html("<div class='alert alert-success alert-dismissable'><button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button>Data has been delete</div>");
                            $('#message').fadeIn('slow', function() {
                                $('#message').fadeOut(7000);
                            });
                            loadDataAssignment();
                        }
                        d.stop();
                    }
                }); // end ajax
            }); // end sure
        }); // end delete


});
