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
                    <a href="list-enrollments.php"><i class="fa fa-book"></i> <span class="nav-label">List Enrollments</span> </a>
                </li>
                <li>
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
                <li class="active">
                    <a href="#"><i class="fa fa-users"></i> <span class="nav-label">Quiz</span> </a>
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
                      <strong>Quiz</strong></strong>
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
                          <h5>Select Quiz</h5>
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

                                <?php

                                if (isset($_COOKIE['student'],
                                          $_POST['courses_id']
                                    )) {
                                    $courses_id  = $_POST['courses_id'];

                                    $response    = $quiz->ViewDataQuiz($courses_id);
                                    $_SESSION['courses_id'] = $_POST['courses_id'];
                                    $_SESSION['question'] = array();
                                    $_SESSION['no'] = 1;
                                    $_SESSION['score'] = 0;
                                    $_SESSION['option'] = array();
                                    $_SESSION['answer'] = array();

                                    foreach ($response as $key => $value) {
                                      $_SESSION['question'][] = $value->question;
                                      $_SESSION['option'][] = array($value->a, $value->b, $value->c, $value->d);
                                      $_SESSION['answer'][] = $value->answer;
                                    }
                                }

                                 ?>

                                <form role="form" id="form-start-quiz" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                    <div class="form-group">
                                      <label>Subject ID</label>
                                      <select name="courses_id" class="form-control">
                                      </select>
                                    </div>
                                    <div>
                                        <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit" name="btn-start-quiz">Submit</button>
                                    </div>
                                </form>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-lg-12 quiz">
                  <div class="ibox float-e-margins">
                      <div class="ibox-title">
                          <h5>Quiz</h5>
                          <div class="ibox-tools">
                              <a class="collapse-link">
                                  <i class="fa fa-chevron-up"></i>
                              </a>
                              <a class="close-link">
                                  <i class="fa fa-times"></i>
                              </a>
                          </div>
                      </div>
                      <div class="ibox-content ">
                          <div class="row">
                              <div class="col-sm-12">

                                <?php

                                if (isset($_SESSION['question'])){

                                $question = $_SESSION['question'];
                                $no       = $_SESSION['no'];
                                $option   = $_SESSION['option'];
                                $answer   = $_SESSION['answer'];


                                if (isset($_POST['next'])){
                                    $_SESSION['answer'][] = $_POST['option'];

                                    if ($_POST['option'] == $answer[$no-2]){

                                        $_SESSION['score'] = $_SESSION['score'] + 10;

                                    }

                                }



                                if (isset($question[$no-1])){
                                 ?>
                                 <a href="quiz.php">Replay from begin</a>
                                 <form action="" method="POST">
                                    <p>
                                    <?php
                                        $a = $no-1;
                                        echo $no.". ";
                                        $_SESSION['no']++;
                                        echo $question[$a];
                                        $answers = $_SESSION['option'][$a];
                                        shuffle($answers);
                                    ?>
                                    </p>

                                    <?php
                                        for ($i=0; $i < 4; $i++) {
                                    ?>

                                    <div class="form-group">
                                        <input type="radio" name="option" value="<?php echo $answers[$i]; ?>" required/> <?php echo $answers[$i]; ?></br>
                                    </div>

                                    <?php

                                        }
                                     ?>

                                    <button class="btn btn-sm btn-primary pull-left m-t-n-xs" type="submit" name="next" value="next">Next</button>
                                </form>
                                <?php } else { ?>

                                <h3 class="text-center text-navy">Your Score is <?php echo $_SESSION['score']; ?> </h3>

                                <?php

                                  $courses_id       = $_SESSION['courses_id'];
                                  $score            = $_SESSION['score'];
                                  $student_id       = $_COOKIE['student'];
                                  $student_data_id  = $quiz->getStudentDataID($student_id, $courses_id);
                                  $quiz->AddQuizScore($student_data_id, $score);
                                }
                              }
                                ?>
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

<!-- FooTable -->
<script src="assets/js/plugins/footable/footable.all.min.js"></script>

<!-- Quiz -->
<script src="assets/js/page/quiz.js"></script>



</body>
</html>
