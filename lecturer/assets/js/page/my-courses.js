$(document).ready(function() {


    $('.footable').footable();




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
              rows.html("<td>"+el.subject_id+"</td><td>"+el.name+"</td><td>"+el.description+"</td><td><a href='#modal-form-update' data-toggle='modal' id='"+el.id+"' class='edit_course'><i class='fa fa-edit' aria-hidden='true'></i></a> | <a href='#modal-form-delete' data-toggle='modal' id='"+el.id+"' class='delete_course'><i class='fa fa-trash' aria-hidden='true'></i></a></td>");
              handler.append(rows).trigger('footable_redraw');
            });

        }
      })
    }

});
