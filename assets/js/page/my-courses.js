$(document).ready(function() {

  $('.footable').footable();
  loadDataEnrollment();
  function loadDataEnrollment()
  {
    $.ajax({
      url: 'function/Course/ViewDataCourse.php',
      type: 'POST',
      success: function(result){
          console.log(result);

          var resultObj = JSON.parse(result);
          var handler = $('#data-course');
          handler.html("");


          $.each(resultObj, function(index, el) {
            var rows    = $('<tr>');
                rows.html("<td>"+el.subject_id+"</td><td>"+el.name+"</td><td>"+el.description+"</td><td>"+el.day+"</td><td>"+el.time+"</td><td>"+el.assignment_number+"</td><td><a href='lecturer/uploads/assignment/"+el.assignment_name+"' target='_blank' title='Download'><i class='fa fa-cloud-download' aria-hidden='true'></i></a></td>");
                handler.append(rows).trigger('footable_redraw');

          });

      }
    })
  }

});
