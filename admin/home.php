<?php require_once 'templates/data.php'; ?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>e-Learning | Home</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

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
                            <a href="#">
                                <span class="clear">
                                    <span class="block m-t-xs"> <strong class="font-bold"><?php echo $user->fullName; ?></strong></span>
                                    <span class="text-muted text-xs block">Administrator</span>
                                </span>
                            </a>
                    </div>
                    <div class="logo-element">
                        EL
                    </div>
                </li>
                <li class="active">
                    <a href="home.php"><i class="fa fa-th-large" aria-hidden="true"></i> <span class="nav-label">Home</span></a>
                </li>
                <li>
                    <a href="my-profile.php"><i class="fa fa-user" aria-hidden="true"></i> <span class="nav-label">My Profile</span> </a>
                </li>
                <li>
                    <a href="courses.php"><i class="fa fa-bookmark" aria-hidden="true"></i> <span class="nav-label">Courses</span> </a>
                </li>
                <li>
                    <a href="student.php"><i class="fa fa-exchange" aria-hidden="true"></i> <span class="nav-label">Student</span> </a>
                </li>
                <li>
                    <a href="lecturer.php"><i class="fa fa-area-chart" aria-hidden="true"></i> <span class="nav-label">Lecturer</span> </a>
                </li>
                <li>
                    <a href="news.php"><i class="fa fa-newspaper-o" aria-hidden="true"></i> <span class="nav-label">News</span> </a>
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
                        <a href="logout.php">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                    </li>
                </ul>

            </nav>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
          <div class="row">
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-success pull-right">All</span>
                        <h5>Courses</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins total-courses"></h1>
                        <small>Total courses</small>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-success pull-right">All</span>
                        <h5>Students</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins total-students"></h1>
                        <small>Total students</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-success pull-right">All</span>
                        <h5>Lecturers</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins total-lecturers"></h1>
                        <small>Total lecturers</small>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-success pull-right">All</span>
                        <h5>News</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins total-news"></h1>
                        <small>Total news</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
              <div class="ibox float-e-margins">
                  <div class="ibox-title">
                      <h5>News</h5>
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
                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="footable table table-stripped shoping-cart-table" data-page-size="6" data-filter=#filter>
                            <tbody id="data-news">
                            <!-- <tr class="border-bottom">
                                <td class="desc">
                                    <h3>
                                    <a href="#" class="text-navy">
                                        Title
                                    </a>
                                    </h3>
                                    <p class="small">
                                        Description
                                    </p>
                                </td>
                                <td>
                                  <a href='#modal-form-update' data-toggle='modal' id='"+el.id+"' class='edit_course'><i class='fa fa-edit' aria-hidden='true'></i></a> |
                                  <a href='#modal-form-delete' data-toggle='modal' id='"+el.id+"' class='delete_course'><i class='fa fa-trash' aria-hidden='true'></i></a>
                                </td>
                            </tr>
                            <tr class="border-bottom">
                                <td class="desc">
                                    <h3>
                                    <a href="#" class="text-navy">
                                        Title
                                    </a>
                                    </h3>
                                    <p class="small">
                                        Description
                                    </p>
                                </td>
                                <td>
                                  <a href='#modal-form-update' data-toggle='modal' id='"+el.id+"' class='edit_course'><i class='fa fa-edit' aria-hidden='true'></i></a> |
                                  <a href='#modal-form-delete' data-toggle='modal' id='"+el.id+"' class='delete_course'><i class='fa fa-trash' aria-hidden='true'></i></a>
                                </td>
                            </tr> -->
                            </tbody>
                            <tfoot>
                            <tr>
                              <td colspan="2">
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
        </div>

        <div class="footer">
            <div class="pull-right">
                <strong>Copyright</strong> e-learning Co., Ltd. &copy; 2016
            </div>
        </div>

    </div>
</div>

<!-- Mainly scripts -->
<script src="assets/js/jquery-2.2.3.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="assets/js/theme.js"></script>
<script src="assets/js/plugins/pace/pace.min.js"></script>

<!-- FooTable -->
<script src="assets/js/plugins/footable/footable.all.min.js"></script>

<script src="assets/js/page/home.js"></script>


</body>

</html>
