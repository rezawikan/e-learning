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


    loadDataStudent();
    function loadDataStudent()
    {
      $.ajax({
        url: 'function/Student/ViewDataStudent.php',
        type: 'POST',
        success: function(result){
            console.log(result);
            var resultObj = JSON.parse(result);

            var handler = $('#data-students');

            handler.html("");

            if (resultObj.empty) {
              var row    = $('<tr>');
              row.html("<td colspan='6' style=' height:100px; padding-top:50px; text-align:center;'>"+resultObj.empty+"</td>");
              handler.append(row);

            } else {
                $.each(resultObj, function(index, el) {
                  var rows    = $('<tr>');
                  rows.html("<td>"+el.student_id +"</td><td>"+el.first_name+ " "+el.last_name+"</td><td>"+el.subject_id +"</td><td>"+el.email+"</td>><td>"+el.username+"</td>");
                  handler.append(rows).trigger('footable_redraw');
                });
            }

        }
      })
    }
});
