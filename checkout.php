<?php
include('./inc/header.php');
require_once('api/check-form.php');

?>
<!-- END nav -->

<div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Checkout</span></p>
				<h1 class="mb-0 bread">Checkout</h1>
			</div>
		</div>
	</div>
</div>

<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-xl-7 ftco-animate">
				<form action="" method="POST" class="billing-form">
					<h3 class="mb-4 billing-heading">Billing Details</h3>
					<div class="row align-items-end">
						<div class="col-md-12">
							<div class="form-group">
								<label for="firstname">Fullname</label>
								<input type="text" name="fullname" class="form-control" placeholder="Your name" required>
							</div>
						</div>

						<div class="w-100"></div>

						<div class="w-100"></div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="streetaddress">Address</label>
								<input type="text" name="address" class="form-control" placeholder="House number and street name" required>
							</div>
						</div>

						<div class="w-100"></div>


						<div class="w-100"></div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="phone">Phone</label>
								<input type="text" name="phone" class="form-control" placeholder="">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="emailaddress">Email Address</label>
								<input type="email" name="email" class="form-control" placeholder="" required>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="country">Note</label>
								<textarea name="note" class="form-control" id="note" rows="3"></textarea>
							</div>
						</div>
						<div class="col-md-6">
							<!-- <div class="form-group">
								<label for="postcodezip">Postcode / ZIP *</label>
								<input type="text" class="form-control" placeholder="">
							</div> -->
						</div>
						<div class="w-100"></div>
						<div class="col-md-12">
							<div class="form-group mt-4">
								<div class="radio">
									<label class="mr-3"><input type="radio" name="optradio"> Create an Account? </label>
									<label><input type="radio" name="optradio"> Ship to different address</label>
								</div>
							</div>
						</div>
					</div>
					<!--form || END -->
			</div>
			<div class="col-xl-5">
				<div class="row mt-5 pt-3">
					<div class="col-md-12 d-flex mb-5">
						<div class="cart-detail cart-total p-3 p-md-4">
							<h3 class="billing-heading mb-4">Cart Total</h3>
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
							foreach ($cartList as $item) {

								$num = 0;
								foreach ($cart as $val) {
									if ($val['id'] == $item['id']) {
										$num = $val['num'];
										$total += $num * $item['price'];
										break;
									}
								}
							}

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
					</div>
					<div class="col-md-12">
						<div class="cart-detail p-3 p-md-4">
							<h3 class="billing-heading mb-4">Payment Method</h3>
							<div class="form-group">
								<div class="col-md-12">
									<div class="radio">
										<label><input type="radio" name="optradio" class="mr-2"> Direct Bank Tranfer</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12">
									<div class="radio">
										<label><input type="radio" name="optradio" class="mr-2"> Check Payment</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12">
									<div class="radio">
										<label><input type="radio" name="optradio" class="mr-2"> Paypal</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12">
									<div class="checkbox">
										<label><input type="checkbox" value="" class="mr-2"> I have read and accept the terms and conditions</label>
									</div>
								</div>
							</div>
							<p> <input type="submit" class="btn btn-primary py-3 px-4" value="Place an order"></p>
						</div>
					</div>
				</div>
			</div> <!-- .col-md-8 -->
			</form>
		</div>
	</div>
</section> <!-- .section -->

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

</body>

</html>