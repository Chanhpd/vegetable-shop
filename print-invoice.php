<?php
include('./inc/header.php');
require_once('./DB/util.php');
require_once('./DB/dbhelper.php');

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $sql = "select * from orders where id =$id";
    $product = executeResult($sql, true);
}

$sql = "select * from order_details where id_order = $id";
$or_de = executeResult($sql);
$idList = [];
foreach ($or_de as $d) {
    $idList[] = $d['product_id'];
}
if (count($idList) > 0) {
    $idList = implode(',', $idList);
    $sql = "select * from product where id in ($idList)";

    $cartList = executeResult($sql);
} else {
    $cartList = [];
}
?>
<link rel="stylesheet" href="./css/print-bill.css">

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

        <p style="padding-left: 14em;"><b>Date order: </b><?= $product['order_date'] ?> </p>
        <table class="TableData">
            <tr>
                <th>STT</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total Price<br>

                </th>
            </tr>
            <?php
            $total = 0;
            $pos = 1;
            foreach ($cartList as $item) {

                $num = 0;

                foreach ($or_de as $val) {
                    if ($val['product_id'] == $item['id']) {
                        $num = $val['num'];
                        $total += $num * $item['price'];
                        break;
                    }
                }
                echo "<tr>";
                echo "<td class=\"cotSTT\">" . $pos++ . "</td>";
                echo "<td class=\"cotTenSanPham\">" . $item['name'] . "</td>";
                echo "<td class=\"cotGia\">$" . number_format($item['price'], '2', '.', '.') . "</div></td>";
                echo "<td class=\"cotSoLuong\" align='center'>" . $num . "</td>";
                echo "<td class=\"cotSo\">
                $" . number_format(($num * $item['price']), '2', '.', '.') . "</td>";
                echo "</tr>";
            }
            $delivery = $total * .08;
            $discount = $total * 0.05;
            $totalAll = $total - $delivery - $discount;
            ?>
            <tr>
                <td colspan="4" class="tong">Delivery(8%) <br>Discount(5%)</td>
                <td class="cotSo">
                    $<?php echo number_format(($delivery), '2', '.', '.') ?><br>
                    $<?php echo number_format(($discount), '2', '.', '.') ?><br>
            </tr>
            <tr>
                <td colspan="4" class="tong">Total</td>
                <td class="cotSo">
                    
                    $<?php echo number_format(($total), '2', '.', '.') ?></td>
            </tr>

        </table>
        <div class="footer-left"><?php echo date('d,m-Y') ?> , Vietnam<br />
            CUSTOMER </div>
        <div class="footer-right">
            Email: vegeshop@gmail.com <br>
            Phone : 090978855
            <hr>
            Thank you for business with us<br />
        </div>
    </div>
</body>