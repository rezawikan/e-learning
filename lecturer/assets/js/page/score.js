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
                  rows.html("<td>"+el.subject_id+"</td><td>"+el.name+"</td><td>"+el.description+"</td><td>"+el.day+"</td><td>"+el.time+"</td>");
                  handler.append(rows).trigger('footable_redraw');
                });
            }



        }
      })
    }

});
