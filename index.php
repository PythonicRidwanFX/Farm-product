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
                        <img src="bg.jpg" class="">

                    </div>
                </div>
                <div class="w3_info">
                    <?php
						if (isset($_POST['submit'])) {

							include 'connect.php';
							$email = mysqli_real_escape_string($conn, $_POST['email']);
							$pass = mysqli_real_escape_string($conn, $_POST['password']);

							$sql = "SELECT * FROM user WHERE email='$email' and pass='$pass'";
							$query = mysqli_query($conn, $sql);

							if ($row = mysqli_num_rows($query) > 0) {

								$row = mysqli_fetch_array($query);

								$_SESSION['email'] = $email;
								$_SESSION['email'] = $row["email"];
								// $_SESSION['otp'] = $otpp;

								$otpp = rand(100000, 999999);
                                $_SESSION['otp'] = $otpp;

								// $mess = "Your Otp is".' '.$otpp	

								$mes = "your otp is" . $otpp;

								$mess = '<style>

								#herobg_white{
									background: #4dc6fb;
								}
								#herobg_light{
									background: #4dc6fb;
								}
								
								h1,h2,h3,h4,h5,h6{
									font-family:tahoma;
									color: #000000;
									margin-top: 0;
									font-weight: 400;
								}
								
								body{
									font-family:tahoma;
									font-weight: 400;
									font-size: 15px;
									line-height: 1.8;
									color: rgba(0,0,0,.4);
									margin: 0; 
									padding: 0 !important;  
									background-color: #f1f1f1;
								}
								
								#hero{
									position: relative;
									z-index: 0;
								}
								
								#hero #text{
									color: rgba(0,0,0,.3);
								}
								#hero #text h2{
									color: #000;
									font-size: 40px;
									margin-bottom: 0;
									font-weight: 400;
									line-height: 1.4;
								}
								#hero #text h3{
									font-size: 24px;
									font-weight: 300;
								}
								#hero #text h2 span{
									font-weight: 600;
									color: #30e3ca;
								}
								
								</style>
								<body width="100%">
								<div style="max-width: 600px; margin: 0 auto;" id="email-container">
								<table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
								<tr>
								<td valign="middle" id="herobg_white" style="padding: 3em 0 2em 0; background: ##ffffff;">
								<img src="https://www.10duke.com/wp-content/uploads/2019/01/OTP-1-e1650544725265-600x337.png" alt style="width: 300px; max-width: 600px; height: auto; margin: auto; display: block;">
								</td>
								</tr>
								<tr>
								<td valign="middle" id="herobg_light" style="padding: 2em 0 4em 0; background: #4dc6fb;">
								<table>
								<tr>
								<td>
								<div id="text" style="padding: 0 2.5em; text-align: center;">
								<h2 style="padding: 0 2.5em; text-align: center;">Please Verify It You</h2>
								<h3 style="padding: 0 2.5em; text-align: center;">Your One Time Password Is' . ' ' . $otpp . '</h3>
								</td>
								</tr>
								</table>
								</td>
								</tr>
								</body>';

								include 'mail-otp.php';

								$sql = "UPDATE user SET otp='$otpp', message='$mes' WHERE email='$email'";
								$query = mysqli_query($conn, $sql);

								echo "<script> window.location='otp.php'; </script>";
							} else {
								echo "<div class='alert alert-danger'>Email or Password is Incorrect</div>";
							}
							// echo 'Your Email is: '.$email.' and Password is: '.$pass;
						}
						?>
                    <!-- end of php code -->
                    <h2>Login to your Account</h2>
                    <p>Enter your details to login.</p>
                    <?php require_once('assets/constants/check-reply.php'); ?>
                    <form action="" method="POST" autocomplete="OFF">
                        <label>Email Address</label>
                        <div class="input-group">
                            <span class="fa fa-envelope" aria-hidden="true"></span>
                            <input type="email" name="email" placeholder="Enter Your Email" required="">
                        </div>
                        <label>Password</label>
                        <div class="input-group">
                            <span class="fa fa-lock" aria-hidden="true"></span>
                            <input type="password" name="password" placeholder="Enter Password" required="">
                        </div>
                        <button class="btn btn-success btn-block text-white" type="submit" name="submit">Login</button>
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