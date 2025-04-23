<?php
//session_start();
include('dbh.php');
include('user.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Farm Inventroy System</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/uploads/settings/<?=$fevicon?>">
    <!-- Meta-Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <script>
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
    </script>
    <!-- //Meta-Tags -->

    <!-- css files -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" type="text/css" href="assets/admin/css/bootstrap.css">
    <!-- //css files -->

    <!-- google fonts -->
    <link
        href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- //google fonts -->
    <style>
    .alert-warning {
        border-color: #FF9149 !important;
        background-color: #FFBC90 !important;
        color: #963B00 !important;
    }

    .alert {
        position: relative;
    }

    .mb-2,
    .my-2 {
        margin-bottom: 1.5rem !important;
    }

    .alert {
        padding: .75rem 1rem;
        margin-bottom: 1rem;
        border: 1px solid transparent;
        border-radius: .25rem;
    }
    </style>
</head>

<body>

    <div class="signupform">
        <div class="container">
            <!-- main content -->
            <div class="agile_info">
                <div class="w3l_form">
                    <div class="left_grid_info">
                        <h2>Manage Your Farm Product and Customer</h2>
                        <p>DESIGN AND IMPLEMENTATION OF 2 FACTORS AUTHENTICATION FOR MANAGING FARM PRODUCTS RECORDS</p>
                        <!-- <small>Kindly Upload your farm image here</small> -->
                        <img src="otpp.png" class="">
                    </div>
                </div>
                <div class="w3_info">
                    <?php 
							if(isset($_POST['submit'])){

								include 'connect.php';
								
								$otp = mysqli_real_escape_string($conn, $_POST['otp']);

								if($_SESSION['otp'] == $otp){
								echo "<script> window.location='admin/index.php'; </script>";

							}else{
								echo "<div class='alert alert-danger'>OTP is Incorrect</div>";

							}
						}
						?>
                    <h2>Enter OTP Sent to Your Email</h2>
                    <p>Enter your details to login.</p>
                    <?php require_once('assets/constants/check-reply.php'); ?>
                    <form action="" method="POST" autocomplete="OFF">
                        <label>Enter OTP:</label>
                        <div class="input-group">
                            <span class="fa fa-envelope" aria-hidden="true"></span>
                            <input type="password" name="otp" maxlength="6" placeholder="Enter OTP" required="">
                        </div>
                        <button class="btn btn-success btn-block text-white" type="submit" name="submit">Confirm
                            OTP</button>
                    </form>
                </div>
            </div>
            <!-- //main content -->
        </div>
        <!-- footer -->
        <div class="footer">
            <p>&copy; <?php echo date('Y'); ?> All Rights Reserved | Design by Bamidele Stephen Temitope
                CS/HND/F22/3268 Supervised By:TOYE N.T. (MISS).</p>
        </div>
        <!-- footer -->
    </div>

</body>

</html>