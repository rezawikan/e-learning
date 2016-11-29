<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>E-Learning | Login</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

    <!-- Animation CSS -->
    <link rel="stylesheet" href="../assets/css/animate.css">
    <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="../assets/css/style.css">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name block-center">EL</h1>

            </div>
            <h3>Welcome to E-Learning</h3>
            <p>Administrator of HELP University</p>
            <p id="message"></p>
            <form id="form-signin" class="m-t" role="form" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Username or Email" name="username" required>
                </div>
                <div id="password" class="form-group">
                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b" name="btn-login">Login</button>

                <a href="forgot_password.php"><small>Forgot password?</small></a>
                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="signup.php">Create an account</a>
            </form>
            <p class="m-t"> <small>E-Learning we app framework base on Bootstrap 3 &copy; 2016</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="../assets/js/jquery-2.2.3.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
</body>

</html>
