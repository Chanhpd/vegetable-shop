<?php
include_once('../DB/dbhelper.php');

$con = mysqli_connect("localhost", "root", "", "vegefood");
$sql1 = 'select count(id) as number from product';
$result1 = executeResult($sql1);
$number = 0;
if ($result1 != null && count($result1) > 0) {
    $number = $result1[0]['number'];
}
$page = ceil($number / 12);

$current_page = 1;

if (isset($_GET['page'])) {
    $current_page = $_GET['page'];
}
$index = ($current_page - 1) * 12;

$sql = "SELECT * FROM product WHERE name LIKE '%" . $_POST["search"] . "%'" . " LIMIT $index , 12";

$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {

        if ($row['sale'] !== null) {
            echo '<div class="col-md-6 col-lg-3 ftco-animate">
            <div class="product">
                <a href="product-single.php?id=' . $row['id'] . '" class="img-prod"><img class="img-fluid" src="' . $row['img'] . '" alt="Colorlib Template">
                    <span class="status">' . $row['sale'] . '%</span>
                    <div class="overlay"></div>
                </a>
                <div class="text py-3 pb-4 px-3 text-center">
                    <h3><a href="#">' . $row['name'] . '</a></h3>
                    <div class="d-flex">
                        <div class="pricing">
                            <p class="price"><span class="mr-2 price-dc">$' . number_format($row['price'], '2', '.', '.') . '</span><span class="price-sale">' . number_format($row['price'] * (100 - $row['sale']) * 0.01, '2', '.', '.') . '$</span></p>
                        </div>
                    </div>
                    ';
        } else {
            echo '<div class="col-md-6 col-lg-3 ftco-animate">
                <div class="product">
                    <a href="product-single.php?id=' . $row['id'] . '" class="img-prod"><img class="img-fluid" src="' . $row['img'] . '" alt="Colorlib Template">
                        <div class="overlay"></div>
                    </a>
                    <div class="text py-3 pb-4 px-3 text-center">
                        <h3><a href="#">' . $row['name'] . '</a></h3>
                        <div class="d-flex">
                            <div class="pricing">
                                <p class="price"><span>$' . number_format($row['price'], '2', '.', '.') . '</span></p>
                            </div>
                        </div>
                        ';
        }
        echo     '<div class="bottom-area d-flex px-3">
                            <div class="m-auto d-flex">
                                <a  href="" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                    <span><i class="ion-ios-menu"></i></span>
                                </a>
                                <a onclick=addToCart(' . $row['id'] . ') href="" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                    <span><i class="ion-ios-cart"></i></span>
                                </a>
                                <a onclick=addToWishList(' . $row['id'] . ') href="" class="heart d-flex justify-content-center align-items-center ">
                                    <span><i class="ion-ios-heart"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
    }
} else {
    echo '<h3>No product is found </h3>';
}
mysqli_close($con);

?>
