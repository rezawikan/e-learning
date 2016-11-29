<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>E-Learning | Forgot password</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

    <!-- Animation CSS -->
    <link rel="stylesheet" href="../assets/css/animate.css">
    <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="../assets/css/style.css">

</head>

<body class="gray-bg">

    <div class="passwordBox animated fadeInDown">
        <div class="row">

            <div class="col-md-12">
                <div class="ibox-content">
                    <h2 class="font-bold">Forgot password</h2>

                    <p>
                        Enter your email address and your password will be reset and emailed to you.
                    </p>
                    <div id="message"></div>

                    <div class="row">

                        <div class="col-lg-12">
                            <form id="form-forgotPassword" class="m-t" role="form" method="POST">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email address" name="email" required>
                                </div>

                                <button type="submit" class="btn btn-primary block full-width m-b" name="btn-email">Send Confirmation Link</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6">
                Copyright E-Learning
            </div>
            <div class="col-md-6 text-right">
               <small>© 2016</small>
            </div>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="../assets/js/jquery-2.2.3.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>

</body>

</html>
