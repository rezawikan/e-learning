$(document).ready(function() {

  $('.footable').footable();

  $('#form-add-student #datePicker').datepicker({
      format: "mm/dd/yyyy"
  })
  .on('changeDate', function(e) {
        // Revalidate the date field
        $('#form-add-student').formValidation('revalidateField', 'date');
  });


  $('#form-data-update #datePicker').datepicker({
      format: "mm/dd/yyyy"
  })
  .on('changeDate', function(e) {
        // Revalidate the date field
        $('#form-data-update').formValidation('revalidateField', 'date');
  });

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


    loadDataStudent();
    function loadDataStudent()
    {
      $.ajax({
        url: 'function/Student/ViewDataStudent.php',
        type: 'POST',
        success: function(result){
            console.log(result);
            var resultObj = JSON.parse(result);

            var handler = $('#data-students');

            handler.html("");

            $.each(resultObj, function(index, el) {
              var rows    = $('<tr>');
              rows.html("<td>"+el.email+"</td><td>"+el.username+"</td><td>"+el.first_name+"</td><td>"+el.last_name+"</td><td>"+el.gender +"</td><td>"+el.date_of_birth+"</td><td>"+el.update_at+"</td><td><a href='#modal-form-update' data-toggle='modal' id='"+el.id+"' class='edit_student'><i class='fa fa-edit' aria-hidden='true'></i></a> | <a href='#modal-form-delete' data-toggle='modal' id='"+el.id+"' class='delete_student'><i class='fa fa-trash' aria-hidden='true'></i></a></td>");
              handler.append(rows).trigger('footable_redraw');
            });

        }
      })
    }

    // edit product show when clicked
    $(document).on('click', '.edit_student', function(e){
        e.preventDefault();

        var dataID = $(this).attr('id'); // get data from attribute id
        $('#form-data-update input[name=username]').attr('disabled','disabled');
        $('#form-data-update input[name=password]').attr('disabled','disabled');
        $('#form-data-update input[name=id]').val(dataID);

        $.ajax({
            url     : 'function/Student/EditDataStudent.php',
            type    : 'POST',
            data    : {id : dataID},
            success : function(result){
                var resultObj = JSON.parse(result);
                console.log(resultObj);

                // replace data that loaded to form

                $('#form-data-update input[name=email]').val(resultObj.email);
                $('#form-data-update input[name=username]').val(resultObj.username);
                $('#form-data-update input[name=password]').val(resultObj.password);
                $('#form-data-update input[name=firstName]').val(resultObj.first_name);
                $('#form-data-update input[name=lastName]').val(resultObj.last_name);
                $('#form-data-update select[name=gender]').val(resultObj.gender);
                $('#form-data-update input[name=date]').val(resultObj.date_of_birth);
            }
        })
    });

    var a = Ladda.create(document.querySelector('button[name=btn-update-student]'));
    //
    $('#form-data-update').formValidation({
        framework: 'bootstrap',
        fields: {
          email: {
              verbose: false, validators: {
                  notEmpty: {
                      message: 'The email address is required'
                  }
                  , emailAddress: {
                      message: 'The input is not a valid email address'
                  }
                  , remote: {
                      async: true, url: 'function/Auth/CheckEmail.php', type: 'POST', data: {
                          type: 'email'
                      }
                      , message: 'The email already used'
                  } // end remote
              } // end validators
          }
          , // end email
          username: {
              verbose: false, validators: {
                  notEmpty: {
                      message: 'The username is required'
                  }
                  , stringLength: {
                      min: 6, max: 30, message: 'The username must be more than 6 and less than 30 characters long'
                  }
                  , regexp: {
                      regexp: /^[a-z0-9_]+$/, message: 'The username can only consist of alphabetical lower case, number, and underscore'
                  }
                  , remote: {
                      async: true, url: 'function/auth/checkUsername.php', type: 'POST', data: {
                          type: 'username'
                      }
                      , message: 'The username already used'
                  } // end remote
              } // end validators
          },
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
        a.start();

        $.ajax({
          url: 'function/Student/UpdateDataStudent.php',
          type: 'POST',
          data: $form.serialize(),
          success: function(result){
            console.log(result);
              loadDataStudent();

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




    var l = Ladda.create(document.querySelector('button[name=btn-add-student]'));
    //
    $('#form-add-student').formValidation({
      framework: 'bootstrap',
      fields: {
          email: {
              verbose: false, validators: {
                  notEmpty: {
                      message: 'The email address is required'
                  }
                  , emailAddress: {
                      message: 'The input is not a valid email address'
                  }
                  , remote: {
                      async: true, url: 'function/Auth/CheckEmail.php', type: 'POST', data: {
                          type: 'email'
                      }
                      , message: 'The email already used'
                  } // end remote
              } // end validators
          }
          , // end email
          username: {
              verbose: false, validators: {
                  notEmpty: {
                      message: 'The username is required'
                  }
                  , stringLength: {
                      min: 6, max: 30, message: 'The username must be more than 6 and less than 30 characters long'
                  }
                  , regexp: {
                      regexp: /^[a-z0-9_]+$/, message: 'The username can only consist of alphabetical lower case, number, and underscore'
                  }
                  , remote: {
                      async: true, url: 'function/auth/checkUsername.php', type: 'POST', data: {
                          type: 'username'
                      }
                      , message: 'The username already used'
                  } // end remote
              } // end validators
          },
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
          password: {
              validators: {
                  notEmpty: {
                      message: 'The password is required'
                  }
                  , different: {
                      field: 'username', message: 'The password cannot be the same as username'
                  }
                  , stringLength: {
                      min: 8, message: 'The password must be more than 8 characters long'
                  } // end string length
              } // end validators
          },
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

        $.ajax({
          url: 'function/Student/createDataStudent.php',
          type: 'POST',
          data: $form.serialize(),
          success: function(result){
            console.log(result);

            var resultObj = JSON.parse(result);
            console.log(resultObj); // log processing
            if(resultObj.success) {
                $('#message-add').html("<div class='alert alert-success alert-dismissable'><button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button><strong>Success!</strong></div>");

            }
            else {
                $('#message-add').html("<div class='alert alert-success alert-dismissable'><button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button>Something Wrong!!</div>");
            }
            $form.formValidation('resetForm', true);
            loadDataStudent();
            $('#form-add-student').children().removeClass('has-success'); // remove class has-success
            $('#form-add-student')[0].reset(); // reset all fields
            $('button').removeAttr('disabled'); // remove atrribute disabled
            $('button').removeClass('disabled'); // remove class disabled
            $('#message-add').fadeIn('slow', function() {
                $('#message-add').fadeOut(7000);
            });
            l.stop();
          }
        })
    });


  var d = Ladda.create(document.querySelector('button[name=btn-delete]'));
    // delete data bank
  $(document).on('click', '.delete_student', function(e) {
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
              url: 'function/Student/DeleteDataStudent.php',
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
                      loadDataStudent();
                  }
                  d.stop();
              }
          }); // end ajax
      }); // end sure
  }); // end delete
});
