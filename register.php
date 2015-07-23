<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Register</title>

    <link href="app/styles//bootstrap.min.css" rel="stylesheet">
    <link href="app/styles/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="app/styles/animate.css" rel="stylesheet">
    <link href="app/styles/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

<div class="middle-box text-center loginscreen   animated fadeInDown">
    <div>
        <div>

            <h1 class="logo-name">sk+</h1>

        </div>
        <h3>Register to SK+</h3>
        <h5>MAKE TEACHING EASIER AND SHARE YOUR EXPERIENCE AROUND THE WORLD</h5>
        <p>Create account to see it in action.</p>
        <form class="m-t" role="form" action="server/register/signup" method="POST">
            <div class="form-group">
                <input type="email" class="form-control" placeholder="Email" name="email" required="">
            </div>
            <button type="submit" class="btn btn-success block full-width m-b">Register</button>

            <?php if (!empty($_GET['error'])) echo '<p class="alert-danger">'.$_GET['error'].'</p>'; ?>
            <p class="text-muted text-center"><small>Already have an account?</small></p>
            <a class="btn btn-sm btn-white btn-block" href="login.php">Login</a>
        </form>
    </div>
</div>

<!-- Mainly scripts -->
<script src="app/scripts/vendors/jquery-2.1.1.js"></script>
<script src="app/scripts/vendors/bootstrap.min.js"></script>
<!-- iCheck
<script src="js/plugins/iCheck/icheck.min.js"></script>
<script>
    $(document).ready(function(){
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue'
        });
    });
</script>
-->
</body>

</html>
