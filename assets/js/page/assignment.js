$(document).ready(function() {


    $('.footable').footable();

    loadDataCourses();
    function loadDataCourses()
    {
      $.ajax({
        url: 'function/Assignment/ViewDataAssignment.php',
        type: 'POST',
        success: function(result){
            console.log(result);
            var resultObj = JSON.parse(result);

            var handler = $('#data-assignments');

            handler.html("");

            if (resultObj.empty) {
              var row    = $('<tr>');
              row.html("<td colspan='6' style=' height:100px; padding-top:50px; text-align:center;'>"+resultObj.empty+"</td>");
              handler.append(row);
              console.log('asdasd');
            } else {
                $.each(resultObj, function(index, el) {
                  var rows    = $('<tr>');
                  rows.html("<td>"+el.subject_id+"</td><td><a href='../uploads/assignment/"+el.assignment_one+"' target='_blank'>Assignment 1</a></td><td><a href='../uploads/assignment/"+el.assignment_two+"' target='_blank'>Assignment 2</a></td>");
                  handler.append(rows).trigger('footable_redraw');
                });
            }



        }
      })
    }

});
