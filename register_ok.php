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

        <?php
        if (!empty($_GET['email'])) {
            echo 'Welcome to Sukull '.$_GET['email'].'<br/>And email has been sent to you. Please check it to confirm your registration';
        }
        ?>
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
