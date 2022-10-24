<?php
include('./inc/header.php');
require_once('./DB/util.php');
require_once('./DB/dbhelper.php');
require('./mail/sendmail.php');
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $sql = "select * from orders where id =$id";
    $order = executeResult($sql, true);
}
$time = date_create($order['order_date']);

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
<div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Complete</span></p>
                <h1 class="mb-0 bread">Complete Bill</h1>
            </div>
        </div>
    </div>
</div>
<hr>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container bootstrap snippets bootdeys">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default invoice" id="invoice">
                <div class="panel-body">

                    <div class="row">

                        <div class="col-sm-6 top-left">
                            <i class="fa fa-rocket"></i>
                        </div>

                        <div class="col-sm-6 top-right">
                            <h3 class="marginright"><b>INVOICE #<?= $order['id'] ?></b></h3>
                            <span class="marginright"><?= date_format($time, 'd M Y') ?></span>
                        </div>

                    </div>
                    <hr>
                    <div class="row">

                        <div class="col-xs-4 from">
                            <p class="lead marginbottom"><b>From</b> : Vegeshop</p>
                            <p>470 Tran Dai Nghia Street</p>
                            <p>Ngu Hanh Son District</p>
                            <p>Da Nang City</p>

                            <p><b>Phone</b>: 089-767-3600</p>
                            <p><b>Email</b>: contact@gmail.com</p>
                        </div>

                        <div class="col-xs-4 to">
                            <p class="lead marginbottom"><b>To</b> : <?= $order['fullname'] ?></p>
                            <p><?= $order['address'] ?></p>

                            <p><b>Phone</b>: <?= $order['phone'] ?></p>
                            <p><b>Email</b>: <?= $order['email'] ?></p>

                        </div>

                        <div class="col-xs-4 text-right payment-details">
                            <p class="lead marginbottom payment-info">Payment details</p>
                            <p>Date: <?= date_format($time, 'd M Y') ?></p>
                            <p>VAT: DK888-777 </p>
                        </div>

                    </div>

                    <div class="row table-row">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width:5%">#</th>
                                    <th style="width:50%">Name</th>
                                    <th class="text-right" style="width:15%">Quantity</th>
                                    <th class="text-right" style="width:15%">Unit Price</th>
                                    <th class="text-right" style="width:15%">Total Price</th>
                                </tr>
                            </thead>
                            <tbody>
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
                                    echo '<tr>
                                        <td class="text-center"> ' . $pos++ . '</td>
                                        <td>' . $item['name'] . '</td>
                                        <td class="text-right">' . $num . '</td>
                                        <td class="text-right">$' . number_format($item['price'], '2', '.', '.') . '</td>
                                        <td class="text-right">$' . number_format(($num * $item['price']), '2', '.', '.') . '</td>
                                    </tr>';
                                }
                                ?>
                            </tbody>
                        </table>

                    </div>

                    <div class="row">
                        <div class="col-xs-6 margintop">
                            <p class="lead marginbottom">THANK YOU!</p>

                            <form action="" method="POST">
                                <a class="btn btn-success" href="print-invoice.php?id=<?= $id ?>" id="invoice-print"><i class="fa fa-print"></i> Print Invoice</a>
                                <button type="submit" class="btn btn-danger" name="btn-mail"><i class="fa fa-envelope-o"></i> Mail Invoice</button>
                            </form>
                            <?php
                            if (isset($_POST['btn-mail'])) {
                                $title = "Order website Vegetable Food successful";
                                $content = "<p>Thank for your orders with order id #$id</p>
                                <h4>The order has been set included :</h4>";
                                foreach ($cartList as $item) {
                                    $num = 0;
                                    foreach ($or_de as $val) {
                                        if ($val['product_id'] == $item['id']) {
                                            $num = $val['num'];
                                            $total += $num * $item['price'];
                                            break;
                                        }
                                    }
                                    $content .= "<ul style='border:1px solid blue;margin:10px'>
                                                    <li>Product: " . $item['name'] . "</li>
                                                    <li>Price: $" . number_format($item['price'], '2', '.', '.') . "</li>
                                                    <li>Quantity: " . $num . "</li> </ul>";
                                }
                                $mailOrder = $order['email'];
                                // echo $mailOrder;
                                $mailer = new Mailer();
                                $mailer->ordermail($title, $content, $mailOrder);
                                
                                // var_dump($_POST['btn-mail']);
                                unset($_POST);
                                
                            }
                            ?>
                        </div>
                        <div class="col-xs-6 text-right pull-right invoice-total">
                            <?php

                            $delivery = $total * .08;
                            $discount = $total * 0.05;
                            $totalAll = $total - $delivery - $discount;
                            ?>
                            <p><b>Subtotal</b> : $<?= number_format($total, '2', '.', '.') ?></p>
                            <p><b>Delivery</b> (8%) : $<?= number_format($delivery, '2', '.', '.') ?></p>
                            <p><b>Discount</b> (5%) : $<?= number_format($discount, '2', '.', '.') ?></p>
                            <p><b>Total</b> : $<?= number_format($totalAll, '2', '.', '.') ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once('./inc/footer.php')
?>