<?php require_once 'templates/data.php'; ?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>e-Learning | Quiz</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- FormValidation CSS file -->
    <link rel="stylesheet" href="assets/css/formValidation.min.css">

    <!-- Ladda style -->
    <link rel="stylesheet" href="assets/css/plugins/ladda/ladda-themeless.min.css">

    <!-- FooTable -->
    <link rel="stylesheet" href="assets/css/plugins/footable/footable.core.css">


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
                                    <span class="text-muted text-xs block">Lecturer</span>
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
                    <a href="my-courses.php"><i class="fa fa-bookmark"></i> <span class="nav-label">My Courses</span> </a>
                </li>
                <li>
                    <a href="assignment.php"><i class="fa fa-exchange"></i> <span class="nav-label">Assignment</span> </a>
                </li>
                <li>
                    <a href="student.php"><i class="fa fa-users"></i> <span class="nav-label">Student</span> </a>
                </li>
                <li>
                    <a href="Score.php"><i class="fa fa-area-chart"></i> <span class="nav-label">Score</span> </a>
                </li>
                <li class="active">
                    <a href="quiz.php"><i class="fa fa-users"></i> <span class="nav-label">Quiz</span> </a>
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
              <h2>Quiz</h2>
              <ol class="breadcrumb">
                  <li>
                      <a href="index.html">Home</a>
                  </li>
                  <li class="active">
                      <a href="#">Quiz</a>
                  </li>
              </ol>
          </div>
          <div class="col-lg-2">

          </div>
        </div>

        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins border-bottom">
                    <div class="ibox-title">
                        <h5>Create Question</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-down"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content" style="display: none;">
                        <div class="row">
                            <div class="col-sm-12">
                              <div id="message-add">

                              </div>
                                <form role="form" method="POST" id="form-data-add">
                                    <!-- Form Quiz -->
                                    <?php include 'templates/part/form-quiz.php'; ?>
                                    <div>
                                        <button class="btn btn-sm btn-primary pull-right m-t-n-xs ladda-button data-style="expand-right"" type="submit" name="btn-data-add">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>List Question</h5>

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
                          <div id="message">

                          </div>
                          <input type="text" class="form-control input-sm m-b-xs" id="filter" placeholder="Search">
                          <table class="footable table table-stripped" data-page-size="10" data-filter=#filter>
                                <thead>
                                <tr>
                                  <th>Subject ID</th>
                                  <th>Name</th>
                                  <th data-hide="phone,tablet">Question</th>
                                  <th data-hide="phone,tablet">Answer A </th>
                                  <th data-hide="phone,tablet">Answer B </th>
                                  <th data-hide="phone,tablet">Answer C </th>
                                  <th data-hide="phone,tablet">Answer D </th>
                                  <th data-hide="phone,tablet">Answer</th>
                                  <th>Action</th>
                                </tr>
                                </thead>
                                <tbody id="data-quiz">
                                <!-- <tr class="ScoreX">
                                    <td>BIT308</td>
                                    <td>1</td>
                                    <td>How are You?</td>
                                    <td>I'm fine</td>
                                    <td>I'm sick</td>
                                    <td>I'm Happy</td>
                                    <td>I'm Alone</td>
                                    <td>I'm fine</td>
                                    <td><i class="fa fa-edit" aria-hidden="true"></i> | <i class="fa fa-trash" aria-hidden="true"></i></td>
                                </tr> -->

                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="9">
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

        <!-- Start Modals Edit Assignment -->
        <div id="modal-form-update" class="modal fade" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <h3 class="m-t-none m-b">Edit Lecturer</h3>
                                <p>Make sure your data</p>

                                <form role="form" id="form-data-update" method="POST">

                                  <!-- Form Quiz -->
                                  <?php include 'templates/part/form-quiz.php'; ?>

                                    <input type="hidden" name="id" class="form-control">
                                    <div>
                                      <button class="btn btn-sm btn-primary ladda-button padding-btn" data-style="expand-right" type="submit" name="btn-update-quiz">OK</button>
                                      <button id="cancel-btn-update" class="btn btn-sm btn-primary padding-btn" type="submit">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modals Edit Assignment -->

        <!-- Starts Modals Confirmation Delete -->
              <div id="modal-form-delete" class="modal fade" aria-hidden="true">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-body">
                              <div class="row">
                                  <div class="col-sm-12">
                                      <h3 class="m-t-none m-b">Delete Confirmation</h3>
                                      <div id="confirm"></div>
                                      <div>
                                          <button id="sure" type="button" name="btn-delete" class="btn btn-primary padding-btn ladda-button" type="submit" data-style="expand-right">Ok</button>
                                          <button id="cancel" type="button" class="btn btn-primary padding-btn">Cancel</button>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- End Modals Confirmation Delete-->

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

<!-- Data picker -->
<script src="assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>

<!-- FormValidation plugin and the class supports validating Bootstrap form -->
<script src="assets/js/formValidation.min.js"></script>
<script src="assets/js/framework/bootstrap.min.js"></script>

<!-- Ladda -->
<script src="assets/js/plugins/ladda/spin.min.js"></script>
<script src="assets/js/plugins/ladda/ladda.min.js"></script>
<script src="assets/js/plugins/ladda/ladda.jquery.min.js"></script>

<!-- FooTable -->
<script src="assets/js/plugins/footable/footable.all.min.js"></script>


<!-- Quiz -->
<script src="assets/js/page/quiz.js"></script>


</body>

</html>
