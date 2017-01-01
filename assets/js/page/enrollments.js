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


    loadDataEnrollment();
    function loadDataEnrollment()
    {
      $.ajax({
        url: 'function/Enrollments/ViewDataEnrollments.php',
        type: 'POST',
        success: function(result){
            console.log(result);

            var resultObj = JSON.parse(result);
            var handler = $('#data-enrollments');
            handler.html("");


            $.each(resultObj, function(index, el) {
              var rows    = $('<tr>');
              if (el.status != 'enrolled'){
                  rows.html("<td>"+el.subject_id+"</td><td>"+el.subject_name+"</td><td>"+el.status+"</td><td>"+el.tutors_name+"</td><td>"+el.description+"</td><td class='center'><button id='"+el.id+"' class='btn btn-primary submit_enrollment' type='button'>"+el.status+"</button></td>");
                  handler.append(rows).trigger('footable_redraw');
              } else {
                  rows.html("<td>"+el.subject_id+"</td><td>"+el.subject_name+"</td><td>"+el.status+"</td><td>"+el.tutors_name+"</td><td>"+el.description+"</td><td class='center'><button class='btn btn-primary' type='button' name='enrolled'>"+el.status+"</button></td>");
                  handler.append(rows).trigger('footable_redraw');
              }

            });

        }
      })
    }

    //



      // submit data bank
    $(document).on('click', '.submit_enrollment', function(e) {
        e.preventDefault(); /* prevent link address */
        var dataID = $(this).attr('id'); /* get data id */
        console.log(dataID);

        $.ajax({
            url: 'function/Enrollments/CreateDataEnrollments.php',
            type: 'POST',
            data: {
                courses_id: dataID
            },
            success: function(result) {
              console.log(result);
                var resultObj = JSON.parse(result);

                console.log(result);
                $('#modal-form-submit').modal('hide'); // hide modal form add
                if (resultObj.success) {
                    $('#message').html("<div class='alert alert-success alert-dismissable'><button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button>Data has been enrolled</div>");
                    $('#message').fadeIn('slow', function() {
                        $('#message').fadeOut(7000);
                    });
                    loadDataEnrollment();
                }

            }
        }); // end ajax

    }); // end submit
});
