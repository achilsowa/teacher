<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>

    <link href="app/styles/bootstrap.min.css" rel="stylesheet">
    <link href="app/styles/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="app/styles/animate.css" rel="stylesheet">
    <link href="app/styles/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

<div class="middle-box text-center loginscreen  animated fadeInDown">
    <div>
        <div>
            <h2 class="logo-name">sk+</h2>
        </div>
        <h5>MAKE TEACHING EASIER AND SHARE YOUR EXPERIENCE AROUND THE WORLD</h5>

        <form class="m-t" role="form" action="server/register/signin" method="POST">
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="email" required="">
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password" required="">
            </div>
            <button type="submit" class="btn btn-success block full-width m-b">Login</button>

            <?php if (!empty($_GET['error'])) echo '<p class="alert-danger">'.$_GET['error'].'</p>'; ?>
            <a href="#"><small>Forgot password?</small></a>
            <p class="text-muted text-center"><small>Do not have an account?</small></p>
            <a class="btn btn-sm btn-white btn-block" href="register.php">Create an account</a>
        </form>
    </div>
</div>

<!-- Mainly scripts -->
<script src="app/scripts/vendors/jquery-2.1.1.js"></script>
<script src="app/scripts/vendors/bootstrap.min.js"></script>

</body>

</html>
