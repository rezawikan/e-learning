<?php require_once 'templates/data.php'; ?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>E-Learning | My Profile</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- FormValidation CSS file -->
    <link rel="stylesheet" href="assets/css/formValidation.min.css">

    <!-- Ladda style -->
    <link rel="stylesheet" href="assets/css/plugins/ladda/ladda-themeless.min.css">

    <!-- Date Picker -->
    <link rel="stylesheet" href="assets/css/plugins/datapicker/datepicker3.css" >


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
                <li class="active">
                    <a href="my-profile.php"><i class="fa fa-user"></i> <span class="nav-label">My Profile</span> </a>
                </li>
                <li>
                    <a href="list-courses.php"><i class="fa fa-book"></i> <span class="nav-label">List Courses</span> </a>
                </li>
                <li >
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
                        <a href="logout.php">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                    </li>
                </ul>

            </nav>
        </div>
        <div class="row wrapper border-bottom white-bg page-heading">
          <div class="col-lg-10">
              <h2>Profile</h2>
              <ol class="breadcrumb">
                  <li>
                      <a href="index.html">Home</a>
                  </li>
                  <li class="active">
                      <strong>Profile</strong>
                  </li>
              </ol>
          </div>
          <div class="col-lg-2">

          </div>
        </div>

        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
            <div class="col-lg-7">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Data Profile</h5>
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
                        <div class="row">
                            <div class="col-sm-12">
                              <div id="message">

                              </div>
                                <form role="form" id="update-user" method="POST">
                                    <div class="form-group">
                                      <label>Email</label>
                                      <input type="email" placeholder="Email" name="email" class="form-control">
                                    </div>
                                    <div class="form-group">
                                      <label>Username</label>
                                      <input type="username" placeholder="Username" name="username" class="form-control" disabled>
                                    </div>
                                    <div class="form-group">
                                      <label>First Name</label>
                                      <input type="text" placeholder="First Name" name="firstName" class="form-control">
                                    </div>
                                    <div class="form-group">
                                      <label>Last Name</label>
                                      <input type="text" placeholder="Last Name" name="lastName" class="form-control">
                                    </div>
                                    <div class="form-group">
                                      <label>Gender</label>
                                      <select name="gender" class="form-control">
                                        <option>Select</option>
                                        <option value="man">Man</option>
                                        <option value="women">Women</option>
                                      </select>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group input-append date" id="datePicker">
                                          <span class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                          </span>
                                          <input type="text" name="date" class="form-control">
                                        </div>
                                    </div>
                                    <div>
                                        <button class="btn btn-sm btn-primary pull-right m-t-n-xs ladda-button" data-style="expand-right" type="submit" name="btn-update">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Update Password</h5>
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
                          <div class="row">
                              <div class="col-sm-12">
                                  <form role="form" id="form-change-password" method="POST">
                                      <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" placeholder="Password" name="password" class="form-control">
                                      </div>
                                      <div class="form-group">
                                        <label>Confirmation Password</label>
                                        <input type="password" placeholder="Confirmation Password" name="confirm_password" class="form-control">
                                      </div>
                                      <div>
                                          <button class="btn btn-sm btn-primary pull-right m-t-n-xs" data-style="expand-right" type="submit" name="btn-change-password">Update</button>
                                      </div>
                                  </form>
                              </div>
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

<!-- FormValidation plugin and the class supports validating Bootstrap form -->
<script src="assets/js/formValidation.min.js"></script>
<script src="assets/js/framework/bootstrap.min.js"></script>

<!-- Ladda -->
<script src="assets/js/plugins/ladda/spin.min.js"></script>
<script src="assets/js/plugins/ladda/ladda.min.js"></script>
<script src="assets/js/plugins/ladda/ladda.jquery.min.js"></script>


<!-- Data picker -->
<script src="assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>

<!-- My Profile -->
<script src="assets/js/page/my-profile.js"></script>


</body>

</html>
