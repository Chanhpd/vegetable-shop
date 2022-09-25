<?php

require('./vendor/autoload.php');
require("./config.php");

use Cloudinary\Api\Upload\UploadApi;

include_once('./inc/header.php');
require('./DB/dbhelper.php');
$name = $_SESSION['user'];
$sql = "select * from user where name='$name'";
$user = executeResult($sql, true);

$_SESSION['img'] = $user['avatar'];

//update information
if (isset($_POST['sub-pro'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $sql = "update user set name = '$name', phone = '$phone', address='$address' where email ='" . $user['email'] . "'";
    execute($sql);

    echo '<script>alert("Save profile successful")</script>';
    echo "<meta http-equiv='refresh' content='0'>";
    $_SESSION['user'] = $name;
}
// update password
if (isset($_POST['save-pass'])) {
    $pass = $_POST['pass'];
    $newPass = $_POST['new-pass'];
    $conPass = $_POST['con-pass'];
    $sql1 = "select password from user where email ='" . $user['email'] . "'";
    $rs = executeResult($sql1, true);
    $pass_corr = $rs['password'];
    if ($newPass == $conPass && $pass == $pass_corr) {
        $sql = "update user set password='$newPass' where email ='" . $user['email'] . "'";
        execute($sql);
        echo '<script>alert("Save successful")</script>';
    } elseif ($pass != $pass_corr) {
        echo '<script>alert("Incorrect password")</script>';
    } else echo '<script>alert("Password is Wrong")</script>';
}
// change profile picture
if (isset($_POST['srcImg'])) {
    $img = $_POST['srcImg'];
    var_dump($img);
    $data = (new UploadApi())->upload($img);
    $url = $data['secure_url'];
    $sql = "update user set avatar = '$url' where email ='" . $user['email'] . "'";
    execute($sql);
    $_SESSION['img']= $url;
}
?>

<div class="container-xl px-4 mt-4">
    <!-- Account page navigation-->
    <nav class="nav nav-borders">
        <a class="nav-link active ms-0" href="https://www.bootdey.com/snippets/view/bs5-edit-profile-account-details" target="__blank">Profile</a>
        <a class="nav-link" href="https://www.bootdey.com/snippets/view/bs5-profile-billing-page" target="__blank">Billing</a>
        <a class="nav-link" href="https://www.bootdey.com/snippets/view/bs5-profile-security-page" target="__blank">Security</a>
        <a class="nav-link" href="https://www.bootdey.com/snippets/view/bs5-edit-notifications-page" target="__blank">Notifications</a>
    </nav>
    <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Profile Picture</div>
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    <img class="img-account-profile rounded-circle mb-2" id="contain-img" src="<?= $user['avatar'] ?>" alt="">

                    <!-- Profile picture help block-->
                    <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                    <!-- Profile picture upload button-->
                    <form id="form-save-img">
                        <div>
                        <label for="upload-btn" class="btn btn-primary"><i class="fa fa-upload"></i>Upload Image</label>
                        <input class="btn btn-primary file" id="upload-btn" name="input-file" type="file" onchange="readURL(this);"></input>
                        </div>

                        <input type="submit" name="save-img" class="btn btn-primary" value="Save">

                    </form>

                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Account Details</div>
                <div class="card-body">
                    <form method="POST">
                        <!-- Form Group (username)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">Username</label>
                            <input name="name" class="form-control" id="inputUsername" type="text" readonly="readonly" placeholder="Enter your username" value="<?= $user['name'] ?>">
                        </div>
                        <!-- Form Row-->

                        <!-- Form Row        -->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (organization name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputOrgName">Phone</label>
                                <input name="phone" class="form-control" id="inputOrgName" type="text" placeholder="Enter your organization name" value="<?= $user['phone'] ?>">
                            </div>
                            <!-- Form Group (location)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLocation">Address</label>
                                <input name="address" class="form-control" id="inputLocation" type="text" placeholder="Enter your location" value="<?= $user['address'] ?>">
                            </div>
                        </div>
                        <!-- Form Group (email address)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputEmailAddress">Email address</label>
                            <input class="form-control" id="inputEmailAddress" type="email" readonly="readonly" placeholder="Email address" value="<?= $user['email'] ?>">
                        </div>

                        <!-- Save changes button-->
                        <input type="submit" name="sub-pro" class="btn btn-primary" value="Save changes"></input>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="col-lg-8">
        <!-- Change password card-->
        <div class="card mb-4">
            <div class="card-header">Change Password</div>
            <div class="card-body">
                <form method="POST">
                    <!-- Form Group (current password)-->
                    <div class="mb-3">
                        <label class="small mb-1" for="currentPassword">Current Password</label>
                        <input name="pass" class="form-control" id="currentPassword" type="password" placeholder="Enter current password" required="You must">
                    </div>
                    <!-- Form Group (new password)-->
                    <div class="mb-3">
                        <label class="small mb-1" for="newPassword">New Password</label>
                        <input name="new-pass" class="form-control" id="newPassword" type="password" placeholder="Enter new password" required>
                    </div>
                    <!-- Form Group (confirm password)-->
                    <div class="mb-3">
                        <label class="small mb-1" for="confirmPassword">Confirm Password</label>
                        <input name="con-pass" class="form-control" id="confirmPassword" type="password" placeholder="Confirm new password" required>
                    </div>
                    <input name="save-pass" class="btn btn-primary" type="submit" value="Save"></input>
                </form>
            </div>
        </div>
    </div>
</div>


<?php
include_once('./inc/footer.php')
?>



<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
    </svg></div>


<script src="js/jquery.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="js/google-map.js"></script>
<script src="js/main.js"></script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#contain-img').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(document).ready(function() {

        $("#form-save-img").submit(function(event) {
            event.preventDefault();
            $.ajax({
                type: "POST",
                url: "./profile.php",
                data: {
                    srcImg: $("#contain-img").attr('src')
                },

                success: function(response) {
                     alert("Change success");
                }
            })
        })
    });
</script>