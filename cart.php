<?php
include('./inc/header.php');
require_once('./DB/dbhelper.php');
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
?>
<!-- END nav -->

<div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
				<h1 class="mb-0 bread">My Cart</h1>
			</div>
		</div>
	</div>
</div>

<section class="ftco-section ftco-cart">
	<div class="container">
		<div class="row">
			<div class="col-md-12 ftco-animate">
				<div class="cart-list">
					<table class="table">
						<thead class="thead-primary">
							<tr class="text-center">
								<th>&nbsp;</th>
								<th>&nbsp;</th>
								<th>Product name</th>
								<th>Price</th>
								<th>Quantity</th>
								<th>Total</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$total = 0;
							foreach ($cartList as $item) {

								$num = 0;
								foreach ($cart as $val) {
									if ($val['id'] == $item['id']) {
										$num = $val['num'];
										$total += $num * $item['price'];
										break;
									}
								}

								echo '<tr class="text-center">
							<td class="product-remove"><a onclick="deleteCart(' . $item['id'] . ')"><span class="ion-ios-close"></span></a></td>
							

							<td class="image-prod">
								<div class="img" style="background-image:url(images/' . $item['img'] . ');"></div>
							</td>

							<td class="product-name">
								<h3>' . $item['name'] . '</h3>
								<p>Far far away, behind the word mountains, far from the countries</p>
							</td>

							<td class="price">$' . number_format($item['price'], '2', '.', '.')  . '</td>

							<td class="quantity">
								<div class="input-group mb-3">
									<input type="text" name="quantity" class="quantity form-control input-number" value="' . $num . '" min="1" max="100">
								</div>
							</td>

							<td class="total">$' . number_format($item['price'] * $num, '2', '.', '.') . '</td>
						</tr>';
							}
							?>
							<!-- END TR-->


					</table>
				</div>
			</div>
		</div>
		<div class="row justify-content-end">
			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
				<div class="cart-total mb-3">
					<h3>Coupon Code</h3>
					<p>Enter your coupon code if you have one</p>
					<form action="#" class="info">
						<div class="form-group">
							<label for="">Coupon code</label>
							<input type="text" class="form-control text-left px-3" placeholder="">
						</div>
					</form>
				</div>
				<p><a href="checkout.html" class="btn btn-primary py-3 px-4">Apply Coupon</a></p>
			</div>
			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
				<div class="cart-total mb-3">
					<h3>Estimate shipping and tax</h3>
					<p>Enter your destination to get a shipping estimate</p>
					<form action="#" class="info">
						<div class="form-group">
							<label for="">Country</label>
							<input type="text" class="form-control text-left px-3" placeholder="">
						</div>
						<div class="form-group">
							<label for="country">State/Province</label>
							<input type="text" class="form-control text-left px-3" placeholder="">
						</div>
						<div class="form-group">
							<label for="country">Zip/Postal Code</label>
							<input type="text" class="form-control text-left px-3" placeholder="">
						</div>
					</form>
				</div>
				<p><a href="checkout.html" class="btn btn-primary py-3 px-4">Estimate</a></p>
			</div>
			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
				<div class="cart-total mb-3">
					<h3>Cart Totals</h3>
					<?php
					$delivery = $total * .08;
					$discount = $total * 0.01;
					$totalAll = $total - $delivery - $discount;
					?>
					<p class="d-flex">
						<span>Subtotal</span>
						<span>$<?= number_format($total, '2', '.', '.') ?></span>
					</p>
					<p class="d-flex">
						<span>Delivery</span>
						<span>$<?= number_format($delivery, '2', '.', '.') ?></span>
					</p>
					<p class="d-flex">
						<span>Discount</span>
						<span>$<?= number_format($discount, '2', '.', '.') ?></span>
					</p>
					<hr>
					<p class="d-flex total-price">
						<span>Total</span>
						<span>$<?= number_format($totalAll, '2', '.', '.') ?></span>
					</p>
				</div>
				<p><a href="checkout.php" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
			</div>
		</div>
	</div>
</section>

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
	$(document).ready(function() {

		var quantitiy = 0;
		$('.quantity-right-plus').click(function(e) {

			// Stop acting like a button
			e.preventDefault();
			// Get the field name
			var quantity = parseInt($('#quantity').val());

			// If is not undefined

			$('#quantity').val(quantity + 1);


			// Increment

		});

		$('.quantity-left-minus').click(function(e) {
			// Stop acting like a button
			e.preventDefault();
			// Get the field name
			var quantity = parseInt($('#quantity').val());

			// If is not undefined

			// Increment
			if (quantity > 0) {
				$('#quantity').val(quantity - 1);
			}
		});

	});
</script>

<script type="text/javascript">
	function deleteCart(id) {
		$.post('api/cookie.php', {
			'action': 'delete',
			'id': id,
			 
		}, function(data) {
			location.reload();
		})
	}
</script>
</body>

</html>