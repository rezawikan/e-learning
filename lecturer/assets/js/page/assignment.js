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


    loadDataCourseCode('select[name=subjectID]');
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

                $.each(response, function(key, val) {
                  console.log(val.id);
                    tutor = '<option value="' + val.id+ '" >' + val.subject_id +'</option>';

                    $(id).append(tutor);
                });
            }
        })
    }

    // loadDataLecturer();
    function loadDataLecturer()
    {
      $.ajax({
        url: 'function/Lecturer/ViewDataLecturer.php',
        type: 'POST',
        success: function(result){
            console.log(result);
            var resultObj = JSON.parse(result);

            var handler = $('#data-lecturers');

            handler.html("");

            $.each(resultObj, function(index, el) {
              var rows    = $('<tr>');
              rows.html("<td>"+el.email+"</td><td>"+el.username+"</td><td>"+el.first_name+"</td><td>"+el.last_name+"</td><td>"+el.gender +"</td><td>"+el.date_of_birth+"</td><td>"+el.update_at+"</td><td><a href='#modal-form-update' data-toggle='modal' id='"+el.id+"' class='edit_lecturer'><i class='fa fa-edit' aria-hidden='true'></i></a> | <a href='#modal-form-delete' data-toggle='modal' id='"+el.id+"' class='delete_lecturer'><i class='fa fa-trash' aria-hidden='true'></i></a></td>");
              handler.append(rows).trigger('footable_redraw');
            });

        }
      })
    }

    // edit product show when clicked
    // $(document).on('click', '.edit_lecturer', function(e){
    //     e.preventDefault();
    //
    //     var dataID = $(this).attr('id'); // get data from attribute id
    //     $('#form-data-update input[name=username]').attr('disabled','disabled');
    //     $('#form-data-update input[name=password]').attr('disabled','disabled');
    //     $('#form-data-update input[name=id]').val(dataID);
    //
    //     $.ajax({
    //         url     : 'function/Lecturer/EditDataLecturer.php',
    //         type    : 'POST',
    //         data    : {id : dataID},
    //         success : function(result){
    //             var resultObj = JSON.parse(result);
    //             console.log(resultObj);
    //
    //             // replace data that loaded to form
    //
    //             $('#form-data-update input[name=email]').val(resultObj.email);
    //             $('#form-data-update input[name=username]').val(resultObj.username);
    //             $('#form-data-update input[name=password]').val(resultObj.password);
    //             $('#form-data-update input[name=firstName]').val(resultObj.first_name);
    //             $('#form-data-update input[name=lastName]').val(resultObj.last_name);
    //             $('#form-data-update select[name=gender]').val(resultObj.gender);
    //             $('#form-data-update input[name=date]').val(resultObj.date_of_birth);
    //         }
    //     })
    // });
    //
    // var a = Ladda.create(document.querySelector('button[name=btn-update-lecturer]'));
    // //
    // $('#form-data-update').formValidation({
    //     framework: 'bootstrap',
    //     fields: {
    //       email: {
    //           verbose: false, validators: {
    //               notEmpty: {
    //                   message: 'The email address is required'
    //               }
    //               , emailAddress: {
    //                   message: 'The input is not a valid email address'
    //               }
    //               , remote: {
    //                   async: true, url: 'function/Auth/CheckEmail.php', type: 'POST', data: {
    //                       type: 'email'
    //                   }
    //                   , message: 'The email already used'
    //               } // end remote
    //           } // end validators
    //       }
    //       , // end email
    //       username: {
    //           verbose: false, validators: {
    //               notEmpty: {
    //                   message: 'The username is required'
    //               }
    //               , stringLength: {
    //                   min: 6, max: 30, message: 'The username must be more than 6 and less than 30 characters long'
    //               }
    //               , regexp: {
    //                   regexp: /^[a-z0-9_]+$/, message: 'The username can only consist of alphabetical lower case, number, and underscore'
    //               }
    //               , remote: {
    //                   async: true, url: 'function/auth/checkUsername.php', type: 'POST', data: {
    //                       type: 'username'
    //                   }
    //                   , message: 'The username already used'
    //               } // end remote
    //           } // end validators
    //       },
    //       firstName: {
    //           validators: {
    //               notEmpty: {
    //                   message: 'The First Name is required'
    //               }
    //           } // end validators
    //       },
    //       lastName: {
    //           validators: {
    //               notEmpty: {
    //                   message: 'The Last Name is required'
    //               }
    //           } // end validators
    //       }, // end lastName
    //       gender: {
    //           validators: {
    //               notEmpty: {
    //                   message: 'The Gender is required'
    //               }
    //           } // end validators
    //       }, // end gender
    //       date: {
    //         validators: {
    //             notEmpty: {
    //                 message: 'The date is required'
    //             },
    //             date: {
    //                   format: 'MM/DD/YYYY',
    //                   message: 'The date is not a valid'
    //               }
    //         }
    //       }
    //   } // end fiedls
    // })
    //
    // .on('success.form.fv', function(e) {
    //     // Prevent form submission
    //     e.preventDefault();
    //     var $form = $(e.target),
    //         fv = $form.data('formValidation');
    //     // start button loading
    //     a.start();
    //
    //     $.ajax({
    //       url: 'function/Lecturer/UpdateDataLecturer.php',
    //       type: 'POST',
    //       data: $form.serialize(),
    //       success: function(result){
    //         console.log(result);
    //           loadDataLecturer();
    //
    //         var resultObj = JSON.parse(result);
    //         console.log(resultObj); // log processing
    //         if(resultObj.success) {
    //             $('#message').html("<div class='alert alert-success alert-dismissable'><button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button><strong>Success!</strong></div>");
    //
    //         }
    //         else {
    //             $('#message').html("<div class='alert alert-success alert-dismissable'><button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button>Something Wrong!!</div>");
    //         }
    //         $form.formValidation('resetForm', true);
    //         $('#form-data-update').children().removeClass('has-success'); // remove class has-success
    //         $('#form-data-update')[0].reset(); // reset all fields
    //         $('button').removeAttr('disabled'); // remove atrribute disabled
    //         $('button').removeClass('disabled'); // remove class disabled
    //         $('#modal-form-update').modal('hide');
    //         $('#message').fadeIn('slow', function() {
    //             $('#message').fadeOut(7000);
    //         });
    //         a.stop();
    //       }
    //     })
    //
    // });




    // create a new instance for loading
    // var l = Ladda.create(document.querySelector('button[name=btn-profile-update]'));

    // $('#form-profile').formValidation({
    //         framework: 'bootstrap',
    //         fields: {
    //             assignment_file: {
    //                 validators: {
    //                     file: {
    //                         extension: 'jpeg,jpg,png',
    //                         type: 'image/jpeg,image/png',
    //                         maxSize: 2097152, // 2048 * 1024
    //                         message: 'The selected file is not valid'
    //                     }
    //                 }
    //             },
    //             firstName: {
    //                 validators: {
    //                     notEmpty: {
    //                         message: 'First Name is required'
    //                     }
    //                 }
    //             },
    //             lastName: {
    //                 validators: {
    //                     notEmpty: {
    //                         message: 'Last Name is required'
    //                     },
    //                 }
    //             }
    //         } // end fields
    //     })
    //     .on('success.form.fv', function(e) {
    //
    //         e.preventDefault();
    //
    //         var $form = $(e.target),
    //             formData = new FormData(),
    //             params = $form.serializeArray(),
    //             files = $form.find('[name="uploadedFiles"]')[0].files;
    //
    //         $.each(files, function(i, file) {
    //             // Prefix the name of uploaded files with "uploadedFiles-"
    //             // Of course, you can change it to any string
    //             formData.append(i, file);
    //         });
    //
    //         $.each(params, function(i, val) {
    //             formData.append(val.name, val.value);
    //         });
    //
    //         l.start();
    //
    //         $.ajax({
    //             url: 'function/user/UpdateDataProfile.php',
    //             data: formData,
    //             cache: false,
    //             contentType: false,
    //             processData: false,
    //             type: 'POST',
    //             success: function(result) {
    //                 // $form.formValidation('resetForm', true);
    //                 // $('#form-profile')[0].reset(); // reset all fields
    //                 // $('button').removeAttr('disabled'); // remove atrribute disabled
    //                 // $('button').removeClass('disabled'); // remove class disabled
    //                 l.stop();
    //                 var resultObj = JSON.parse(result);
    //                 if (resultObj.valid) {
    //                     $('#form-profile').children().removeClass('has-success'); // remove class has-success
    //                     $('#form-profile')[0].reset(); // reset all fields
    //                     loadData(); // load data
    //                     window.scrollTo(0, 0);
    //                     $('#message').html("<div class='alert alert-success alert-dismissable'><button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button>Data profile has been updated!</div>");
    //                     $('#message').fadeIn('slow', function() {
    //                         $('#message').fadeOut(10000);
    //                     });
    //                 }
    //             }
    //         });
    //     });

  // var d = Ladda.create(document.querySelector('button[name=btn-delete]'));
    // delete data bank
  // $(document).on('click', '.delete_lecturer', function(e) {
  //     e.preventDefault(); /* prevent link address */
  //     var dataID = $(this).attr('id'); /* get data id */
  //
  //     $("#confirm").html("Are you sure want to delete?"); /* pop up modals confirmation */
  //     $('#modal-form-delete').modal('show');
  //     $('#cancel').click(function() {
  //
  //         $('#modal-form-delete').modal('hide');
  //     });
  //
  //     $('#sure').on('click', function(e) {
  //         e.preventDefault();
  //
  //         d.start();
  //
  //         $.ajax({
  //             url: 'function/Lecturer/DeleteDataLecturer.php',
  //             type: 'POST',
  //             data: {
  //                 id: dataID
  //             },
  //             success: function(result) {
  //                 var resultObj = JSON.parse(result);
  //                 console.log(result);
  //                 $('#modal-form-delete').modal('hide'); // hide modal form add
  //                 if (resultObj.success) {
  //                     $('#message').html("<div class='alert alert-success alert-dismissable'><button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button>Data has been delete</div>");
  //                     $('#message').fadeIn('slow', function() {
  //                         $('#message').fadeOut(7000);
  //                     });
  //                     loadDataLecturer();
  //                 }
  //                 d.stop();
  //             }
  //         }); // end ajax
  //     }); // end sure
  // }); // end delete
});
