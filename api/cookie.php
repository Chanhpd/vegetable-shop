<?php
require_once('../db/util.php');

if(!empty($_POST)) {
	$action = getPost('action');
	$id = getPost('id');
	$num = getPost('num');

	$cart = [];
	if(isset($_COOKIE['cart'])) {
		$json = $_COOKIE['cart'];
		$cart = json_decode($json, true);
	}

	switch ($action) {
		case 'add':
			$isFind = false;
			for ($i=0; $i < count($cart); $i++) {
				if($cart[$i]['id'] == $id) {
					$cart[$i]['num'] += $num;
					$isFind = true;
					break;
				}
			}

			if(!$isFind) {
				$cart[] = [
					'id'=>$id,
					'num'=>$num
				];
			}
			setcookie('cart', json_encode($cart), time() + 30*24*60*60, '/');
			break;
		case 'delete':
			for ($i=0; $i < count($cart); $i++) { 
				if($cart[$i]['id'] == $id) {
					array_splice($cart, $i, 1);
					break;
				}
			}
			setcookie('cart', json_encode($cart), time() + 30*24*60*60, '/');
		break;
	}
}
if(!empty($_POST)) {
	$action = getPost('action');
	$id = getPost('idW');
	$num = getPost('num');
	
	$wish = [];
	if(isset($_COOKIE['wish'])) {
		$json = $_COOKIE['wish'];
		$wish = json_decode($json, true);
	}

	switch ($action) {
		case 'addW':
			$isFind = false;
			for ($i=0; $i < count($wish); $i++) {
				if($wish[$i]['id'] == $id) {
					$wish[$i]['num'] += $num;
					$isFind = true;
					break;
				}
			}

			if(!$isFind) {
				$wish[] = [
					'id'=>$id,
					'num'=>$num
				];
			}
			setcookie('wish', json_encode($wish), time() + 30*24*60*60, '/');
			break;
		case 'deleteW':
			for ($i=0; $i < count($wish); $i++) { 
				if($wish[$i]['id'] == $id) {
					array_splice($wish, $i, 1);
					break;
				}
			}
			setcookie('wish', json_encode($wish), time() + 30*24*60*60, '/');
		break;
	}
}