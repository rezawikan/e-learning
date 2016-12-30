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
              rows.html("<td>"+el.subject_id+"</td><td>"+el.name+"</td><td>"+el.description+"</td><td>"+el.day+"</td><td>"+el.time+"</td>");
              handler.append(rows).trigger('footable_redraw');
            });

        }
      })
    }

});
