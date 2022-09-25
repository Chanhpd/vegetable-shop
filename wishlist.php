<?php
include('./inc/header.php');
require_once('./DB/dbhelper.php');
$wish = [];
if (isset($_COOKIE['wish'])) {
	$json = $_COOKIE['wish'];
	$wish = json_decode($json, true);
}
$idList = [];
foreach ($wish as $item) {
	$idList[] = $item['id'];
}
if (count($idList) > 0) {
	$idList = implode(',', $idList);
	//[2, 5, 6] => 2,5,6
	

	$sql = "select * from product where id in ($idList)";

	$wishList = executeResult($sql);
} else {
	$wishList = [];
}
?>
<!-- END nav -->

<div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Wishlist</span></p>
				<h1 class="mb-0 bread">My Wishlist</h1>
			</div>
		</div>
	</div>
</div>

<section class="ftco-section ftco-cart">
	<div class="container">
		<div class="row">
			<div class="col-md-12 ftco-animate">
				<div class="cart-list">
					<table class="table table-striped">
						<thead class="thead-primary">
							<tr class="text-center">
								<th>&nbsp;</th>
								<th>Product List</th>
								<th>Name</th>
								<th>Price</th>
								<th>Add to cart</th>
								
							</tr>
						</thead>
						<tbody>
							<?php

							foreach ($wishList as $item) {
								echo '<tr class="text-center">
								<td class="product-remove"><a href ="" onclick=deleteToWishList(' . $item['id'] . ') >
								<span class="ion-ios-close"></span></a>
								</td>

								<td class="image-prod">
									<div class="img" style="background-image:url(' . $item['img'] . ');"></div>
								</td>

								<td class="product-name">
									<h3>' . $item['name'] . '</h3>
									
								</td>

								<td class="price">$' . number_format($item['price'], '2', '.', '.'). '</td>
								<td class="add-to-cart">
									<button onclick=addToCart('.$item['id'].') class="btn btn-add"><i class="fa-sharp fa-solid fa-cart-plus"></i></button>
								</td>
								
								
								
							</tr>';
							}
							?>
							<!-- END TR-->

						</tbody>
					</table>
				</div>
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
<script src="js/action-cookie.js"></script>
</body>

</html>