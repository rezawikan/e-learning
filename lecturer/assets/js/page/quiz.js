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
            console.log('asdasd');
          } else {
              $.each(resultObj, function(index, el) {
                var rows    = $('<tr>');
                rows.html("<td>"+el.subject_id+"</td><td>"+el.name+"</td><td>"+el.question+"</td><td>"+el.a+"</td><td>"+el.b+"</td><td>"+el.c+"</td><td>"+el.d+"</td><td>"+el.answer+"</td><td><a href='#modal-form-update' data-toggle='modal' id='"+el.id+"' class='edit_assignment' title='Edit'><i class='fa fa-edit' aria-hidden='true'></i></a> | <a href='#modal-form-delete' data-toggle='modal' id='"+el.id+"' class='delete_assignment' title='Delete'><i class='fa fa-trash' aria-hidden='true'></i></a></td>");
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
});
