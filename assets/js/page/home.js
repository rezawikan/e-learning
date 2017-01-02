$(document).ready(function() {

  $('.footable').footable();

  // LoadTotalStudents();
  // loadTotalNews();
  // loadTotalLecturers();
  // loadTotalCourses();
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
            rows.html("<td class='desc'><h3><a href='#' class='text-navy'>"+el.title+"</a></h3><p class='small'>"+el.description+"</p></td><td>"+el.update_at+"</td>");
            handler.append(rows).trigger('footable_redraw');
          });

      }
    })
  }


  // function loadTotalCourses(){
  //   $.ajax({
  //     url: 'function/Home/TotalCourses.php',
  //     type: 'GET',
  //     success: function(result){
  //       console.log(result);
  //
  //        $('.total-courses').text(result);
  //     }
  //   })
  // }
  //
  // function loadTotalLecturers(){
  //   $.ajax({
  //     url: 'function/Home/TotalLecturers.php',
  //     type: 'GET',
  //     success: function(result){
  //       console.log(result);
  //
  //        $('.total-lecturers').text(result);
  //     }
  //   })
  // }
  //
  // function loadTotalNews(){
  //   $.ajax({
  //     url: 'function/Home/TotalNews.php',
  //     type: 'GET',
  //     success: function(result){
  //       console.log(result);
  //
  //        $('.total-news').text(result);
  //     }
  //   })
  // }
  //
  // function LoadTotalStudents(){
  //   $.ajax({
  //     url: 'function/Home/TotalStudents.php',
  //     type: 'GET',
  //     success: function(result){
  //       console.log(result);
  //
  //        $('.total-students').text(result);
  //     }
  //   })
  // }

});
