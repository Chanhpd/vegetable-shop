<?php
require('../DB/dbhelper.php');
$mess = '';
if (isset($_POST['submit']) && $_POST['name'] && $_POST['email']) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $pass = $_POST['password'];
    $re_pass = $_POST['repeat-password'];
    $created_at = date('Y-m-d H:i:s');
    // if($name =='' && $email==''&&$phone==''&& $address =='' && $pass =='' ){
    //     $mess = "No empty input";
    // }
    $sqlo = "select email from user where email ='$email'";
    $rs = executeResult($sqlo);
    if ($rs != null) {
        $mess = 'Email is exist !';
    } else {
        if ($pass == $re_pass) {
            $sql = "Insert into user (id_role,name,password,email,phone,address,created_at) 
                values(2,'$name', '$pass','$email','$phone','$address','$created_at')
                ";
            execute($sql);
        } else {
            echo '<script>alert("Password is not valid")</script>';
        }
        echo '<script>alert("Register successful")</script>';
    }

    // header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <section class="vh-100 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
        <div class="mask d-flex align-items-center gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5 title">Create an account</h2>
                                <p style="color:red ;">
                                    <?= $mess ?></p>
                                <form method="POST">

                                    <div class="form-outline mb-4">
                                        <input type="text" name="name" id="form3Example1cg" class="form-control form-control-lg" placeholder="Your name" />

                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="email" name="email" id="form3Example3cg" class="form-control form-control-lg" placeholder="Email" />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="text" name="phone" id="form3Example3cg" class="form-control form-control-lg" placeholder="Phone number" />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="text" name="address" id="form3Example3cg" class="form-control form-control-lg" placeholder="Address" />
                                    </div>
                                    <div class="form-outline mb-4">
                                        <input type="password" name="password" id="form3Example4cg" class="form-control form-control-lg" placeholder="Password" />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="password" name="repeat-password" id="form3Example4cdg" class="form-control form-control-lg" placeholder="Repeat your password" />
                                    </div>
                                    <!-- 
                                    <div class="form-check d-flex justify-content-center mb-5">
                                        
                                        <label class="form-check-label" for="form2Example3g">
                                            I agree all statements in<a href="#" class="text-body"><u>Terms of service</u></a>
                                        </label>
                                        <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3cg" />
                                    </div> -->

                                    <div class="d-flex justify-content-center">
                                        <input type="submit" name="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" value="Register"></input>
                                    </div>

                                    <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="./login.php" class="btn btn-info fw-bold text-body"><u>Login here</u></a></p>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>