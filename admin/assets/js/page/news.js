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


    loadDataNews();
    function loadDataNews()
    {
      $.ajax({
        url: 'function/News/ViewDataNews.php',
        type: 'POST',
        success: function(result){
            console.log(result);
            var resultObj = JSON.parse(result);

            var handler = $('#data-news');

            handler.html("");

            $.each(resultObj, function(index, el) {
              var rows    = $('<tr class="border-bottom">');
              rows.html("<td class='desc'><h3><a href='#' class='text-navy'>"+el.title+"</a></h3><p class='small'>"+el.description+"</p></td><td><a href='#modal-form-update' data-toggle='modal' id='"+el.id+"' class='edit_news'><i class='fa fa-edit' aria-hidden='true'></i></a> |<a href='#modal-form-delete' data-toggle='modal' id='"+el.id+"' class='delete_news'><i class='fa fa-trash' aria-hidden='true'></i></a></td>");
              handler.append(rows).trigger('footable_redraw');
            });

        }
      })
    }

    // edit product show when clicked
    $(document).on('click', '.edit_news', function(e){
        e.preventDefault();

        var dataID = $(this).attr('id'); // get data from attribute id
        $('#form-data-update input[name=id]').val(dataID);

        $.ajax({
            url     : 'function/News/EditDataNews.php',
            type    : 'POST',
            data    : {id : dataID},
            success : function(result){
                var resultObj = JSON.parse(result);
                console.log(resultObj);

                // replace data that loaded to form

                $('#form-data-update input[name=title]').val(resultObj.title);
                $('#form-data-update textarea[name=description]').val(resultObj.description);
            }
        })
    });

    var a = Ladda.create(document.querySelector('button[name=btn-update-news]'));
    //
    $('#form-data-update').formValidation({
        framework: 'bootstrap',
        fields: {
          title: {
              validators: {
                  notEmpty: {
                      message: 'The email address is required'
                  }
              } // end validators
          }
          , // end email
          description: {
            validators: {
                  notEmpty: {
                      message: 'The Description is required'
                  }
              } // end validators
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
          url: 'function/News/UpdateDataNews.php',
          type: 'POST',
          data: $form.serialize(),
          success: function(result){
            console.log(result);
              loadDataNews();

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




    var l = Ladda.create(document.querySelector('button[name=btn-add-news]'));
    //
    $('#form-add-news').formValidation({
      framework: 'bootstrap',
      fields: {
        title: {
            validators: {
                notEmpty: {
                    message: 'The email address is required'
                }
            } // end validators
        }
        , // end email
        description: {
          validators: {
                notEmpty: {
                    message: 'The Description is required'
                }
            } // end validators
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
          url: 'function/News/createDataNews.php',
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
            loadDataNews();
            $('#form-add-news').children().removeClass('has-success'); // remove class has-success
            $('#form-add-news')[0].reset(); // reset all fields
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
  $(document).on('click', '.delete_news', function(e) {
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
              url: 'function/News/DeleteDataNews.php',
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
                      loadDataNews();
                  }
                  d.stop();
              }
          }); // end ajax
      }); // end sure
  }); // end delete
});
