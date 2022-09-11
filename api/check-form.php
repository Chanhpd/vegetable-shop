<?php
require_once('DB/util.php');
require_once('DB/dbhelper.php');
if (!empty($_POST)) {
    $cart = [];
    if (isset($_COOKIE['cart'])) {
        $json = $_COOKIE['cart'];
        $cart = json_decode($json, true);
    }
    if($cart == null || count($cart) ==0){
        header('Location: index.php');
    }

    $fullname = getPost('fullname');
    $address = getPost('address');
    $phone = getPost('phone');
    $email = getPost('email');
    $note = getPost('note');
    $oder_date = date('Y-m-d H:i:s');
    if ($fullname != null && $address!=null && $email!=null) {
        $sql = "insert into orders (fullname, email, phone, address, note, order_date) values 
            ('$fullname','$email','$phone','$address','$note','$oder_date')";
            execute($sql);

        $sql = "select * from orders where order_date = '$oder_date'";
        $order = executeResult($sql, true);

        $orderId = $order['id'];

        $idList = [];
        foreach ($cart as $item) {
            $idList[] = $item['id'];
        }
        if (count($idList) > 0) {
            $idList = implode(',', $idList);

            $sql = "select * from product where id in ($idList)";
            $cartList = executeResult($sql);
        } else {
            $cartList = [];
        }

        foreach ($cartList as $item) {
            $num = 0;
            foreach ($cart as $value) {
                if ($value['id'] == $item['id']) {
                    $num = $value['num'];
                    break;
                }
            }

            $sql = "insert into order_details (id_order, price, num, product_id) values ($orderId, " . $item['price'] . ", $num, " . $item['id'] . ")";
            execute($sql);
        }
        
    }

    header("Location: complete.php?id=$orderId");
    setcookie('cart', '[]', time()-1000, '/');
}
 