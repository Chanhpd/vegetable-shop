<?php
include('./inc/header.php');
require_once('./DB/util.php');
require_once('./DB/dbhelper.php');
$id = getGet('id');

$product = executeResult('select * from product where id = ' . $id, true);
if ($id == null) {
	$id = 1;
}
if ($product == null) {
	header('Location: index.php');
	die();
}
$cart = [];
if (isset($_COOKIE['cart'])) {
	$json = $_COOKIE['cart'];
	$cart = json_decode($json, true);
}

?>
<!-- END nav -->

<div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span class="mr-2"><a href="index.html">Product</a></span> <span>Product Single</span></p>
				<h1 class="mb-0 bread">Product Single</h1>
			</div>
		</div>
	</div>
</div>

<section class="ftco-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 mb-5 ftco-animate">
				<a href="images/<?= $product['img'] ?>" class="image-popup"><img src="images/<?= $product['img'] ?>" class="img-fluid" alt="Colorlib Template"></a>
			</div>
			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
				<h3><?= $product['name'] ?></h3>
				<div class="rating d-flex">
					<p class="text-left mr-4">
						<a href="#" class="mr-2">5.0</a>
						<a href="#"><span class="ion-ios-star-outline"></span></a>
						<a href="#"><span class="ion-ios-star-outline"></span></a>
						<a href="#"><span class="ion-ios-star-outline"></span></a>
						<a href="#"><span class="ion-ios-star-outline"></span></a>
						<a href="#"><span class="ion-ios-star-outline"></span></a>
					</p>
					<p class="text-left mr-4">
						<a href="#" class="mr-2" style="color: #000;">100 <span style="color: #bbb;">Rating</span></a>
					</p>
					<p class="text-left">
						<a href="#" class="mr-2" style="color: #000;">500 <span style="color: #bbb;">Sold</span></a>
					</p>
				</div>
				<p class="price"><span>$<?= number_format($product['price'], '2', '.', '.') ?></span></p>
				<p><?= $product['des'] ?>
				</p>
				<div class="row mt-4">
					<div class="col-md-6">
						<div class="form-group d-flex">
							<div class="select-wrap">
								<div class="icon"><span class="ion-ios-arrow-down"></span></div>
								<select name="" id="" class="form-control">
									<option value="">Small</option>
									<option value="">Medium</option>
									<option value="">Large</option>
									<option value="">Extra Large</option>
								</select>
							</div>
						</div>
					</div>
					<div class="w-100"></div>
					<div class="input-group col-md-6 d-flex mb-3">
						<span class="input-group-btn mr-2">
							<button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
								<i class="ion-ios-remove"></i>
							</button>
						</span>
						<input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
						<span class="input-group-btn ml-2">
							<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
								<i class="ion-ios-add"></i>
							</button>
						</span>
					</div>
					<div class="w-100"></div>
					<div class="col-md-12">
						<p style="color: #000;">600 kg available</p>
					</div>
				</div>
				<p>
					<a class="btn btn-black py-3 px-5" onclick="addToCart(<?= $id ?>)">Add to Cart</a>
					<!-- <button class="btn btn-dark py-3 px-5" onclick="addToCart(<?= $id ?>)">Add to Cart</button> -->
				</p>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center mb-3 pb-3">
			<div class="col-md-12 heading-section text-center ftco-animate">
				<span class="subheading">Products</span>
				<h2 class="mb-4">Related Products</h2>
				<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<?php
			$con = mysqli_connect('localhost', 'root', '', 'Vegefood');
			$sql = "SELECT * FROM product";
			$result = mysqli_query($con, $sql);
			$i = 0;
			while (($row = mysqli_fetch_array($result)) && $i < 4) {
				$i++;
				if ($row['status'] !== null) {
					echo '<div class="col-md-6 col-lg-3 ftco-animate">
	<div class="product">
		<a href="product-single.php?id=' . $row['id'] . '" class="img-prod"><img class="img-fluid" src="images/' . $row['img'] . '" alt="Colorlib Template">
			<span class="status">' . $row['status'] . '%</span>
			<div class="overlay"></div>
		</a>
		<div class="text py-3 pb-4 px-3 text-center">
			<h3><a href="#">' . $row['name'] . '</a></h3>
			<div class="d-flex">
				<div class="pricing">
					<p class="price"><span class="mr-2 price-dc">$' . number_format($row['price'], '2', '.', '.') . '</span><span class="price-sale">' . number_format($row['price']*(100-$row['status'])*0.01, '2', '.', '.') . '$</span></p>
				</div>
			</div>
			';
				} else {
					echo '<div class="col-md-6 col-lg-3 ftco-animate">
		<div class="product">
			<a href="product-single.php?id=' . $row['id'] . '" class="img-prod"><img class="img-fluid" src="images/' . $row['img'] . '" alt="Colorlib Template">
				<div class="overlay"></div>
			</a>
			<div class="text py-3 pb-4 px-3 text-center">
				<h3><a href="#">' . $row['name'] . '</a></h3>
				<div class="d-flex">
					<div class="pricing">
						<p class="price"><span>$' . number_format($row['price'], '2', '.', '.') . '</span></p>
					</div>
				</div>
				';
				}
				echo 	'<div class="bottom-area d-flex px-3">
					<div class="m-auto d-flex">
						<a href="" class="add-to-cart d-flex justify-content-center align-items-center text-center">
							<span><i class="ion-ios-menu"></i></span>
						</a>
						<a href="" onclick=addToCart('.$row['id'].') class="buy-now d-flex justify-content-center align-items-center mx-1">
							<span><i class="ion-ios-cart"></i></span>
						</a>
						<a onclick=addToWishList('.$row['id'].') href="" class="heart d-flex justify-content-center align-items-center ">
							<span><i class="ion-ios-heart"></i></span>
						</a>
						
					</div>
				</div>
			</div>
		</div>
	</div>';
			}
			mysqli_close($con);
			?>
			
			
			
			
		</div>
	</div>
</section>

<?php
include_once('./inc/footer.php');
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