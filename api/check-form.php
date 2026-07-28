<?php
if (file_exists('DB/util.php')) {
    require_once('DB/util.php');
    require_once('DB/dbhelper.php');
} else {
    require_once('../DB/util.php');
    require_once('../DB/dbhelper.php');
}

if (!empty($_POST)) {
    $cart = [];
    if (isset($_COOKIE['cart'])) {
        $json = $_COOKIE['cart'];
        $cart = json_decode($json, true);
    }
    if ($cart == null || !is_array($cart) || count($cart) == 0) {
        header('Location: index.php');
        exit();
    }

    $fullname = escapeSql(getPost('fullname'));
    $address = escapeSql(getPost('address'));
    $phone = escapeSql(getPost('phone'));
    $email = escapeSql(getPost('email'));
    $note = escapeSql(getPost('note'));
    $order_date = date('Y-m-d H:i:s');
    $orderId = 0;

    if (!empty($fullname) && !empty($address) && !empty($email)) {
        $sql = "INSERT INTO orders (fullname, email, phone, address, note, order_date) VALUES 
            ('$fullname', '$email', '$phone', '$address', '$note', '$order_date')";
        $orderId = executeGetId($sql);

        $idList = [];
        foreach ($cart as $item) {
            if (isset($item['id'])) {
                $idList[] = intval($item['id']);
            }
        }
        if (count($idList) > 0) {
            $idStr = implode(',', $idList);
            $sql = "SELECT * FROM product WHERE id IN ($idStr)";
            $cartList = executeResult($sql);
        } else {
            $cartList = [];
        }

        foreach ($cartList as $item) {
            $num = 0;
            foreach ($cart as $value) {
                if ($value['id'] == $item['id']) {
                    $num = intval($value['num']);
                    break;
                }
            }

            $pId = intval($item['id']);
            $pPrice = floatval($item['price']);

            $sql = "INSERT INTO order_details (id_order, price, num, product_id) VALUES ($orderId, $pPrice, $num, $pId)";
            execute($sql);
        }

        setcookie('cart', '[]', time() - 1000, '/');
        if (isset($_SESSION['coupon'])) {
            unset($_SESSION['coupon']);
        }

        header("Location: complete.php?id=$orderId");
        exit();
    } else {
        header("Location: checkout.php");
        exit();
    }
}

 