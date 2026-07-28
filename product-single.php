<?php
include('./inc/header.php');
require_once('./DB/util.php');
require_once('./DB/dbhelper.php');
$id = intval(getGet('id'));
if ($id <= 0) {
	$id = 1;
}
$product = executeResult('select * from product where id = ' . $id, true);

if ($product == null) {
	header('Location: index.php');
	die();
}
$cart = [];
if (isset($_COOKIE['cart'])) {
	$json = $_COOKIE['cart'];
	$cart = json_decode($json, true);
}

$prodName = htmlspecialchars($product['name'], ENT_QUOTES, 'UTF-8');
$prodImg = htmlspecialchars($product['img'], ENT_QUOTES, 'UTF-8');
$prodDes = htmlspecialchars($product['des'], ENT_QUOTES, 'UTF-8');
$prodPrice = floatval($product['price']);
$prodSale = ($product['sale'] !== null) ? floatval($product['sale']) : null;
?>
<!-- END nav -->

<div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span class="mr-2"><a href="shop.php">Product</a></span> <span>Product Single</span></p>
				<h1 class="mb-0 bread"><?= $prodName ?></h1>
			</div>
		</div>
	</div>
</div>

<section class="ftco-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 mb-5 ftco-animate">
				<a href="<?= $prodImg ?>" class="image-popup"><img src="<?= $prodImg ?>" class="img-fluid" alt="<?= $prodName ?>"></a>
			</div>
			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
				<h3><?= $prodName ?></h3>
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
				<?php if ($prodSale === null || $prodSale <= 0) {
					echo '<p class="price"><span>$' . number_format($prodPrice, '2', '.', '.') . '</span></p>';
				} else echo '<p class="price"><span class="mr-2 price-dc">$' . number_format($prodPrice, '2', '.', '.') . '</span>
				<span class="price-sale">$' . number_format($prodPrice * (100 - $prodSale) * 0.01, '2', '.', '.') . '</span></p>';
				?>
				<p><?= $prodDes ?></p>
				<div class="row mt-4">
					<div class="col-md-6">
						<div class="form-group d-flex">
							<div class="select-wrap">
								<div class="icon"><span class="ion-ios-arrow-down"></span></div>
								<select name="size" id="size" class="form-control">
									<option value="Small">Small</option>
									<option value="Medium">Medium</option>
									<option value="Large">Large</option>
									<option value="Extra Large">Extra Large</option>
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
						<p style="color: #000;">In Stock</p>
					</div>
				</div>
				<p>
					<button type="button" class="btn btn-black py-3 px-5" onclick="addToCart(<?= $id ?>, $('#quantity').val())">Add to Cart</button>
				</p>
			</div>
		</div>
	</div>
</section>

<!-- Mobile Sticky Add to Cart Bar -->
<div class="mobile-sticky-bar d-block d-md-none fixed-bottom bg-white p-3 border-top shadow-lg" style="z-index: 1050;">
	<div class="d-flex align-items-center justify-content-between">
		<div>
			<small class="text-muted d-block font-weight-bold"><?= $prodName ?></small>
			<strong class="text-success h5 mb-0">$<?= number_format(($prodSale !== null && $prodSale > 0) ? $prodPrice * (100 - $prodSale) * 0.01 : $prodPrice, 2, '.', '.') ?></strong>
		</div>
		<button type="button" class="btn btn-primary py-2 px-4 font-weight-bold" onclick="addToCart(<?= $id ?>, $('#quantity').val())">
			<i class="ion-ios-cart mr-1"></i> Add to Cart
		</button>
	</div>
</div>

<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center mb-3 pb-3">
			<div class="col-md-12 heading-section text-center ftco-animate">
				<span class="subheading">Products</span>
				<h2 class="mb-4">Related Products</h2>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<?php
			$sql = "SELECT * FROM product ORDER BY RAND() LIMIT 4";
			$result = executeResult($sql);

			foreach ($result as $row) {
				$relId = intval($row['id']);
				$relName = htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8');
				$relImg = htmlspecialchars($row['img'], ENT_QUOTES, 'UTF-8');
				$relPrice = floatval($row['price']);
				$relSale = ($row['sale'] !== null) ? floatval($row['sale']) : null;
			?>
				<div class="col-md-6 col-lg-3 ftco-animate">
					<div class="product">
						<a href="product-single.php?id=<?= $relId ?>" class="img-prod"><img class="img-fluid" src="<?= $relImg ?>" alt="<?= $relName ?>">
							<?php if ($relSale !== null && $relSale > 0): ?>
								<span class="status"><?= $relSale ?>%</span>
							<?php endif; ?>
							<div class="overlay"></div>
						</a>
						<div class="text py-3 pb-4 px-3 text-center">
							<h3><a href="product-single.php?id=<?= $relId ?>"><?= $relName ?></a></h3>
							<div class="d-flex">
								<div class="pricing">
									<p class="price">
										<?php if ($relSale !== null && $relSale > 0): ?>
											<span class="mr-2 price-dc">$<?= number_format($relPrice, 2, '.', '.') ?></span>
											<span class="price-sale">$<?= number_format($relPrice * (100 - $relSale) * 0.01, 2, '.', '.') ?></span>
										<?php else: ?>
											<span>$<?= number_format($relPrice, 2, '.', '.') ?></span>
										<?php endif; ?>
									</p>
								</div>
							</div>
							<div class="bottom-area d-flex px-3">
								<div class="m-auto d-flex">
									<a href="product-single.php?id=<?= $relId ?>" class="add-to-cart d-flex justify-content-center align-items-center text-center">
										<span><i class="ion-ios-menu"></i></span>
									</a>
									<button onclick="addToCart(<?= $relId ?>)" class="btn btn-success buy-now d-flex justify-content-center align-items-center mx-1">
										<span><i class="ion-ios-cart"></i></span>
									</button>
									<button onclick="addToWishList(<?= $relId ?>)" class="btn btn-success heart d-flex justify-content-center align-items-center">
										<span><i class="ion-ios-heart"></i></span>
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
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