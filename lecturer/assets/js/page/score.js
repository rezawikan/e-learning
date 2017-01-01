$(document).ready(function() {


    $('.footable').footable();

    loadDataCourses();
    function loadDataCourses()
    {
      $.ajax({
        url: 'function/Score/ViewDataScore.php',
        type: 'POST',
        success: function(result){
            console.log(result);
            var resultObj = JSON.parse(result);

            var handler = $('#data-score');

            handler.html("");

            if (resultObj.empty) {
              var row    = $('<tr>');
              row.html("<td colspan='6' style=' height:100px; padding-top:50px; text-align:center;'>"+resultObj.empty+"</td>");
              handler.append(row);
              console.log('asdasd');
            } else {
                $.each(resultObj, function(index, el) {
                  var rows    = $('<tr>');
                  rows.html("<td>"+el.id+"</td><td>"+el.first_name+" "+el.last_name+"</td><td>"+el.subject_id+"</td><td>"+el.quiz+"</td><td>"+el.assignment_one+"</td><td>"+el.assignment_two+"</td>");
                  handler.append(rows).trigger('footable_redraw');
                });
            }



        }
      })
    }

});