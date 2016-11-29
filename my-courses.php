<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>e-Learning | My Courses</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- DatePicker -->
    <link href="assets/css/plugins/datapicker/datepicker3.css" rel="stylesheet">

    <!-- FooTable -->
    <link href="assets/css/plugins/footable/footable.core.css" rel="stylesheet">

</head>

<body>

<div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                            <span>
                                <img alt="image" class="img-circle" src="assets/img/profile_small.jpg" />
                            </span>
                            <a href="#">
                                <span class="clear">
                                    <span class="block m-t-xs"> <strong class="font-bold">Daniel Toms</strong></span>
                                    <span class="text-muted text-xs block">Student</span>
                                </span>
                            </a>
                    </div>
                    <div class="logo-element">
                        EL
                    </div>
                </li>
                <li>
                    <a href="home.php"><i class="fa fa-th-large"></i> <span class="nav-label">Home</span></a>
                </li>
                <li>
                    <a href="my-profile.php"><i class="fa fa-user"></i> <span class="nav-label">My Profile</span> </a>
                </li>
                <li>
                    <a href="list-courses.php"><i class="fa fa-book"></i> <span class="nav-label">List Courses</span> </a>
                </li>
                <li class="active">
                    <a href="my-courses.php"><i class="fa fa-bookmark"></i> <span class="nav-label">My Courses</span> </a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-exchange"></i> <span class="nav-label">Assignment</span> </a>
                  <ul class="nav nav-second-level collapse">
                    <li>
                      <a href="upload-assignment.php">Upload Assignment</a>
                    </li>
                    <li>
                        <a href="assignment.php"> View Assignment</a>
                    </li>
                  </ul>
                </li>
                <li>
                    <a href="Score.php"><i class="fa fa-area-chart"></i> <span class="nav-label">Score</span> </a>
                </li>
                <li>
                    <a href="Quiz.php"><i class="fa fa-users"></i> <span class="nav-label">Quiz</span> </a>
                </li>
            </ul>
        </div>
    </nav>

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <a href="#">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                    </li>
                </ul>

            </nav>
        </div>
        <div class="row wrapper border-bottom white-bg page-heading">
          <div class="col-lg-10">
              <h2>My Courses</h2>
              <ol class="breadcrumb">
                  <li>
                      <a href="index.html">Home</a>
                  </li>
                  <li class="active">
                      <strong>My Courses</strong>
                  </li>
              </ol>
          </div>
          <div class="col-lg-2">
          </div>
        </div>

        <div class="wrapper wrapper-content animated fadeInRight">
          <div class="row">
            <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Enrolled Courses</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <input type="text" class="form-control input-sm m-b-xs" id="filter"
                                   placeholder="Search">

                            <table class="footable table table-stripped" data-page-size="8" data-filter=#filter>
                                <thead>
                                <tr>
                                  <th>Subject ID</th>
                                  <th>Name</th>
                                  <th>Status</th>
                                  <th data-hide="phone,tablet">Duration </th>
                                  <th data-hide="phone,tablet">Description </th>
                                  <th data-hide="phone,tablet">Assignment 1</th>
                                  <th data-hide="phone,tablet">Assignment 2</th>
                                </tr>
                                </thead>
                                <tbody>
                                  <tr class="ScoreX">
                                      <td>BIT308</td>
                                      <td>Technology Information</td>
                                      <td>Complete</td>
                                      <td>1 Semester</td>
                                      <td class="center">Learn about technology</td>
                                      <td><i class="fa fa-download" aria-hidden="true"></i></td>
                                      <td><i class="fa fa-download" aria-hidden="true"></i></td>
                                  </tr>
                                  <tr class="ScoreC">
                                      <td>BIT306</td>
                                      <td>Introduction Programming C++</td>
                                      <td>Complete</td>
                                      <td>1 Semester</td>
                                      <td class="center">Learn about technology</td>
                                      <td><i class="fa fa-download" aria-hidden="true"></i></td>
                                      <td><i class="fa fa-download" aria-hidden="true"></i></td>
                                  </tr>
                                  <tr class="ScoreA">
                                      <td>BIT301</td>
                                      <td>Web Interface</td>
                                      <td>Incomplete</td>
                                      <td>1 Semester</td>
                                      <td class="center">Learn about technology</td>
                                      <td><i class="fa fa-download" aria-hidden="true"></i></td>
                                      <td><i class="fa fa-download" aria-hidden="true"></i></td>
                                  </tr>
                                  <tr class="ScoreA">
                                      <td>BIT310</td>
                                      <td>Programming Java</td>
                                      <td>Complete</td>
                                      <td>1 Semester</td>
                                      <td class="center">Learn about technology</td>
                                      <td><i class="fa fa-download" aria-hidden="true"></i></td>
                                      <td><i class="fa fa-download" aria-hidden="true"></i></td>
                                  </tr>

                                  <tr class="ScoreA">
                                      <td>BIT201</td>
                                      <td>Software Engineering</td>
                                      <td>Incomplete</td>
                                      <td>1 Semester</td>
                                      <td class="center">Learn about technology</td>
                                      <td><i class="fa fa-download" aria-hidden="true"></i></td>
                                      <td><i class="fa fa-download" aria-hidden="true"></i></td>
                                  </tr>
                                  <tr class="ScoreA">
                                      <td>BIT206</td>
                                      <td>English 1</td>
                                      <td>Complete</td>
                                      <td>1 Semester</td>
                                      <td class="center">Learn about technology</td>
                                      <td><i class="fa fa-download" aria-hidden="true"></i></td>
                                      <td><i class="fa fa-download" aria-hidden="true"></i></td>
                                  </tr>
                                  <tr class="ScoreA">
                                      <td>BIT306</td>
                                      <td>Web Publishing</td>
                                      <td>Complete</td>
                                      <td>1 Semester</td>
                                      <td class="center">Learn about technology</td>
                                      <td><i class="fa fa-download" aria-hidden="true"></i></td>
                                      <td><i class="fa fa-download" aria-hidden="true"></i></td>
                                  </tr>
                                  <tr class="ScoreA">
                                      <td>BIT108</td>
                                      <td>Programming Python</td>
                                      <td>Complete</td>
                                      <td>1 Semester</td>
                                      <td class="center">Learn about technology</td>
                                      <td><i class="fa fa-download" aria-hidden="true"></i></td>
                                      <td><i class="fa fa-download" aria-hidden="true"></i></td>
                                  </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="5">
                                        <ul class="pagination pull-right"></ul>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
          </div>
        </div>

        <div class="footer">
            <div class="pull-right">
                <strong>Copyright</strong> e-learning Co., Ltd. &copy; 2016
            </div>
        </div>

    </div>
</div>

<!-- Mainly scripts -->
<script src="assets/js/jquery-2.1.1.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="assets/js/inspinia.js"></script>
<script src="assets/js/plugins/pace/pace.min.js"></script>

<!-- Data picker -->
<script src="assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>

<!-- FooTable -->
<script src="assets/js/plugins/footable/footable.all.min.js"></script>


<script type="text/javascript">
  $(document).ready(function() {
    $('.footable').footable();

    $('#data_2 .input-group.date').datepicker({
        startView: 1,
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        autoclose: true,
        format: "dd/mm/yyyy"
      });
  });
</script>

</body>

</html>
