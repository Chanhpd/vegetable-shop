<?php
include('./inc/header.php');
require_once('./DB/util.php');
require_once('./DB/dbhelper.php');
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $sql = "select * from orders where id =$id";
    $product = executeResult($sql, true);
}
?>
<!-- <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Complete</span></p>
                <h1 class="mb-0 bread">Complete Bill</h1>
            </div>
        </div>
    </div>
</div> -->
<link rel="stylesheet" href="css/print-bill.css">

<body onload="window.print();">
    <div id="page" class="page">
        <div class="header">
            <div class="logo"><img src="../images/logo.jpg" /></div>
            <div class="company">Vegefoods</div>
        </div>
        <br />
        <div class="title">
            INVOICE
            <br />
            -------oOo-------
        </div>
        <br />
        <br />
        <p><b>Fullname :</b> <?= $product['fullname'] ?></p>
        <p><b>Address :</b> <?= $product['address'] ?></p>
        <p><b>Phone number :</b> <?= $product['phone'] ?></p>
        <p><b>Email : </b><?= $product['email'] ?><span style="padding-left: 8em;"><b>Invoice# </b><?= $product['id'] ?></span></p>
        
        <p style="padding-left: 22em;"><b>Date order: </b><?= $product['order_date'] ?> </p>
        <table class="TableData">
            <tr>
                <th>STT</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
            <?php
            $cart = [];
            if (isset($_COOKIE['cart'])) {
                $json = $_COOKIE['cart'];
                $cart = json_decode($json, true);
            }
            $idList = [];
            foreach ($cart as $item) {
                $idList[] = $item['id'];
            }
            if (count($idList) > 0) {
                $idList = implode(',', $idList);
                //[2, 5, 6] => 2,5,6

                $sql = "select * from product where id in ($idList)";

                $cartList = executeResult($sql);
            } else {
                $cartList = [];
            }
            $total = 0;
            $pos = 1;
            foreach ($cartList as $item) {

                $num = 0;
                
                foreach ($cart as $val) {
                    if ($val['id'] == $item['id']) {
                        $num = $val['num'];
                        $total += $num * $item['price'];
                        break;
                    }
                }
                echo "<tr>";
                echo "<td class=\"cotSTT\">" . $pos++ . "</td>";
                echo "<td class=\"cotTenSanPham\">" . $item['name'] . "</td>";
                echo "<td class=\"cotGia\"><div id='giasp" . $item['id'] . "' name='giasp" . $item['id'] . "' value='" . $item['price'] . "'>$" . number_format($item['price'], '2', '.', '.') . "</div></td>";
                echo "<td class=\"cotSoLuong\" align='center'>" . $num . "</td>";
                echo "<td class=\"cotSo\">$" . number_format(($num * $item['price']), '2', '.', '.') . "</td>";
                echo "</tr>";
                setcookie('cart', '[]', time()-1000, '/');
            }
            ?>
            <tr>
                <td colspan="4" class="tong">Total</td>
                <td class="cotSo">$<?php echo number_format(($total), '2', '.', '.') ?></td>
            </tr>
        </table>
        <div class="footer-left"><?php echo date('d,m-Y')?> , Vietnam<br />
            CUSTOMER </div>
        <div class="footer-right"> 
            Email: vegeshop@gmail.com <br>
            Phone : 090978855    
        <hr>
         Thank you for business with us<br />
             </div>
    </div>
</body>