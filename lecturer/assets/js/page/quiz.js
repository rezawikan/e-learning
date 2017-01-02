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


  loadDataCourseCode('#form-data-add select[name=courses_id]');
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

  loadDataQuiz();
  function loadDataQuiz()
  {
    $.ajax({
      url: 'function/Quiz/ViewDataQuiz.php',
      type: 'POST',
      success: function(result){
          console.log(result);
          var resultObj = JSON.parse(result);

          var handler = $('#data-quiz');

          handler.html("");

          if (resultObj.empty) {
            var row    = $('<tr>');
            row.html("<td colspan='6' style=' height:100px; padding-top:50px; text-align:center;'>"+resultObj.empty+"</td>");
            handler.append(row);
          } else {
              $.each(resultObj, function(index, el) {
                var rows    = $('<tr>');
                rows.html("<td>"+el.subject_id+"</td><td>"+el.name+"</td><td>"+el.question+"</td><td>"+el.a+"</td><td>"+el.b+"</td><td>"+el.c+"</td><td>"+el.d+"</td><td>"+el.answer+"</td><td><a href='#modal-form-update' data-toggle='modal' id='"+el.id+"' class='edit_quiz' title='Edit'><i class='fa fa-edit' aria-hidden='true'></i></a> | <a href='#modal-form-delete' data-toggle='modal' id='"+el.id+"' class='delete_quiz' title='Delete'><i class='fa fa-trash' aria-hidden='true'></i></a></td>");
                handler.append(rows).trigger('footable_redraw');
              });
          }



      }
    })
  }



  // create a new instance for loading
  var l = Ladda.create(document.querySelector('button[name=btn-data-add]'));

  $('#form-data-add').formValidation({
          framework: 'bootstrap',
          fields: {
              courses_id: {
                  validators: {
                      notEmpty: {
                          message: 'Subject is required'
                      }
                  }
              },
              question: {
                  validators: {
                      notEmpty: {
                          message: 'Quiestion is required'
                      }
                  }
              },
              answer_a: {
                  validators: {
                      notEmpty: {
                          message: 'Answer A is required'
                      }
                  }
              },
              answer_b: {
                  validators: {
                      notEmpty: {
                          message: 'Answer B is required'
                      }
                  }
              },
              answer_c: {
                  validators: {
                      notEmpty: {
                          message: 'Answer C is required'
                      }
                  }
              },
              answer_d: {
                  validators: {
                      notEmpty: {
                          message: 'Answer D is required'
                      }
                  }
              },
              answer: {
                  validators: {
                      notEmpty: {
                          message: 'Answer is required'
                      }
                  }
              }
          } // end fields
      })

      .on('success.form.fv', function(e) {
          // Prevent form submission
          e.preventDefault();
          var $form = $(e.target),
              fv = $form.data('formValidation');
          // start button loading
          l.start();

          $.ajax({
            url: 'function/Quiz/CreateDataQuiz.php',
            type: 'POST',
            data: $form.serialize(),
            success: function(result){
              console.log(result);
                loadDataQuiz();

              var resultObj = JSON.parse(result);
              console.log(resultObj); // log processing
              if(resultObj.success) {
                  $('#message-add').html("<div class='alert alert-success alert-dismissable'><button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button><strong>Success!</strong></div>");

              }
              else {
                  $('#message-add').html("<div class='alert alert-success alert-dismissable'><button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button>Something Wrong!!</div>");
              }
              $form.formValidation('resetForm', true);
              $('#form-data-add').children().removeClass('has-success'); // remove class has-success
              $('#form-data-add')[0].reset(); // reset all fields
              $('button').removeAttr('disabled'); // remove atrribute disabled
              $('button').removeClass('disabled'); // remove class disabled
              $('#modal-form-add').modal('hide');
              $('#message-add').fadeIn('slow', function() {
                  $('#message-add').fadeOut(7000);
              });
              l.stop();
            }
          })

      });

      // edit product show when clicked
      $(document).on('click', '.edit_quiz', function(e){
          e.preventDefault();

          var dataID = $(this).attr('id'); // get data from attribute id

          $('#form-data-update select[name=courses_id]').attr('disabled','disabled');
          $('#form-data-update input[name=id]').val(dataID);

          $.ajax({
              url     : 'function/Quiz/EditDataQuiz.php',
              type    : 'POST',
              data    : {id : dataID},
              success : function(result){
                console.log(result);
                  var resultObj = JSON.parse(result);
                  console.log(resultObj);

                  // replace data that loaded to form
                  $('#form-data-update textarea[name=question]').val(resultObj.question);
                  $('#form-data-update input[name=answer_a]').val(resultObj.a);
                  $('#form-data-update input[name=answer_b]').val(resultObj.b);
                  $('#form-data-update input[name=answer_c]').val(resultObj.c);
                  $('#form-data-update input[name=answer_d]').val(resultObj.d);
                  $('#form-data-update input[name=answer]').val(resultObj.answer);
              }
          })
      });

      // create a new instance for loading
      var a = Ladda.create(document.querySelector('button[name=btn-update-quiz]'));

      $('#form-data-update').formValidation({
          framework: 'bootstrap',
          fields: {
            courses_id: {
                validators: {
                    notEmpty: {
                        message: 'Subject is required'
                    }
                }
            },
            question: {
                validators: {
                    notEmpty: {
                        message: 'Quiestion is required'
                    }
                }
            },
            answer_a: {
                validators: {
                    notEmpty: {
                        message: 'Answer A is required'
                    }
                }
            },
            answer_b: {
                validators: {
                    notEmpty: {
                        message: 'Answer B is required'
                    }
                }
            },
            answer_c: {
                validators: {
                    notEmpty: {
                        message: 'Answer C is required'
                    }
                }
            },
            answer_d: {
                validators: {
                    notEmpty: {
                        message: 'Answer D is required'
                    }
                }
            },
            answer: {
                validators: {
                    notEmpty: {
                        message: 'Answer is required'
                    }
                }
            }
          } // end fields
      })
      .on('success.form.fv', function(e) {
          // Prevent form submission
          e.preventDefault();
          var $form = $(e.target),
              fv = $form.data('formValidation');
          // start button loading
          a.start();

          $.ajax({
            url: 'function/Quiz/UpdateDataQuiz.php',
            type: 'POST',
            data: $form.serialize(),
            success: function(result){
              console.log(result);
                loadDataQuiz();

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

      var d = Ladda.create(document.querySelector('button[name=btn-delete]'));
        // delete data bank
      $(document).on('click', '.delete_quiz', function(e) {
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
                  url: 'function/Quiz/DeleteDataQuiz.php',
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
                          loadDataQuiz();
                      }
                      d.stop();
                  }
              }); // end ajax
          }); // end sure
      }); // end delete


});
