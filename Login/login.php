<?php
require('../DB/dbhelper.php');
session_start();
$message = '';
if (isset($_POST['submit'])) {
    $acc = $_POST['account'];
    $pass = $_POST['password'];
    $sql = "select * from user where email = '$acc' and password='$pass'";
    $rs = executeResult($sql, true);
    if ($rs == null) {
        $message = 'Wrong account or password. Please try again !';
    } else {
        $_SESSION["user"] = $rs['name'];
        if ($_SESSION["user"] != null) {
            header('Location: ../profile.php');
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Login</title>
</head>

<body>
    <section class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-8">
                                <div class="card-body p-md- mx-md-8">

                                    <div class="text-center">
                                        <img src="https://res.cloudinary.com/dxzr2klk5/image/upload/v1662902407/product/mint_vheujt.jpg" style="width: 185px;" alt="logo">
                                        <h4 class="mt-1 mb-5 pb-1">We are The Vegefoods Team</h4>
                                    </div>
                                    <h6 style="color:red">
                                        <?=$message?>
                                    </h6>
                                    <form method="POST">
                                        <div class="form-outline mb-4">
                                            <input type="text" id="form2Example11" name="account" class="form-control" placeholder="Email address" />
                                            <!-- <label class="form-label" for="form2Example11">Username</label> -->
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="password" name="password" id="form2Example22" class="form-control" placeholder="Password" />
                                            <!-- <label class="form-label" for="form2Example22">Password</label> -->
                                        </div>

                                        <div class="text-center pt-1 mb-5 pb-1">
                                            <input type="submit" name="submit" class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" value="Login"></input>
                                            <!-- <a class="text-muted" href="#!">Forgot password?</a> -->
                                        </div>

                                        <div class="d-flex align-items-center justify-content-center pb-4">
                                            <p class="mb-0 me-2">Don't have an account?</p>
                                            <a href="./register.php" type="button" class="btn btn-outline-danger">Create new</a>
                                        </div>

                                    </form>

                                </div>
                            </div>
                            <div class="col-lg-4 d-flex align-items-center gradient-custom-2">
                                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                    <h4 class="mb-4">We are more than just a company</h4>
                                    <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>