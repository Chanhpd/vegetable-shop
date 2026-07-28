<?php
if (file_exists('DB/util.php')) {
	require_once('DB/util.php');
} else {
	require_once('../DB/util.php');
}

header('Content-Type: application/json; charset=utf-8');

if (!empty($_POST)) {
	$action = getPost('action');
	$id = intval(getPost('id'));
	$num = intval(getPost('num'));

	$cart = [];
	if (isset($_COOKIE['cart'])) {
		$json = $_COOKIE['cart'];
		$cart = json_decode($json, true);
		if (!is_array($cart)) {
			$cart = [];
		}
	}

	$wish = [];
	if (isset($_COOKIE['wish'])) {
		$json = $_COOKIE['wish'];
		$wish = json_decode($json, true);
		if (!is_array($wish)) {
			$wish = [];
		}
	}

	switch ($action) {
		case 'add':
			$isFind = false;
			for ($i = 0; $i < count($cart); $i++) {
				if ($cart[$i]['id'] == $id) {
					$cart[$i]['num'] += $num;
					$isFind = true;
					break;
				}
			}
			if (!$isFind) {
				$cart[] = [
					'id' => $id,
					'num' => $num
				];
			}
			setcookie('cart', json_encode($cart), time() + 30 * 24 * 60 * 60, '/');
			break;

		case 'update':
			for ($i = 0; $i < count($cart); $i++) {
				if ($cart[$i]['id'] == $id) {
					if ($num <= 0) {
						array_splice($cart, $i, 1);
					} else {
						$cart[$i]['num'] = $num;
					}
					break;
				}
			}
			setcookie('cart', json_encode($cart), time() + 30 * 24 * 60 * 60, '/');
			break;

		case 'delete':
			for ($i = 0; $i < count($cart); $i++) {
				if ($cart[$i]['id'] == $id) {
					array_splice($cart, $i, 1);
					break;
				}
			}
			setcookie('cart', json_encode($cart), time() + 30 * 24 * 60 * 60, '/');
			break;

		case 'addW':
			$isFind = false;
			for ($i = 0; $i < count($wish); $i++) {
				if ($wish[$i]['id'] == $id) {
					$isFind = true;
					break;
				}
			}
			if (!$isFind) {
				$wish[] = ['id' => $id];
			}
			setcookie('wish', json_encode($wish), time() + 30 * 24 * 60 * 60, '/');
			break;

		case 'deleteW':
			for ($i = 0; $i < count($wish); $i++) {
				if ($wish[$i]['id'] == $id) {
					array_splice($wish, $i, 1);
					break;
				}
			}
			setcookie('wish', json_encode($wish), time() + 30 * 24 * 60 * 60, '/');
			break;
	}

	$cartCount = 0;
	foreach ($cart as $item) {
		if (isset($item['num'])) {
			$cartCount += intval($item['num']);
		}
	}

	echo json_encode([
		'status' => 'success',
		'cartCount' => $cartCount,
		'wishCount' => count($wish)
	]);
	exit();
}

