<?php
include_once('./inc/header.php');
$con = mysqli_connect('localhost', 'root', '', 'Vegefood');
?>
<!-- END nav -->

<div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Products</span></p>
				<h1 class="mb-0 bread">Products</h1>
			</div>
		</div>
	</div>
</div>

<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-10 mb-5 text-center">
				<ul class="product-category">
					<li><a href="#" class="active">All</a></li>
					<li><a href="#">Vegetables</a></li>
					<li><a href="#">Fruits</a></li>
					<li><a href="#">Juice</a></li>
					<li><a href="#">Dried</a></li>
				</ul>
			</div>
			<div class="form">
				<form action="" method="get">
					<input type="text" name="text-search" placeholder="Enter to search">
					<input type="submit" value="Search" class="btn-success" >
				</form>
			</div>
		</div>
		<div class="row">
		<?php
			
			$sql = "SELECT * FROM product";
			$result = mysqli_query($con, $sql);
			
			while ($row = mysqli_fetch_array($result)) {
				
				if ($row['status'] !== null) {
					echo '<div class="col-md-6 col-lg-3 ftco-animate">
				<div class="product">
					<a href="product-single.php?id='. $row['id'] .'" class="img-prod"><img class="img-fluid" src="images/' . $row['img'] . '" alt="Colorlib Template">
						<span class="status">' . $row['status'] . '%</span>
						<div class="overlay"></div>
					</a>
					<div class="text py-3 pb-4 px-3 text-center">
						<h3><a href="#">' . $row['name'] . '</a></h3>
						<div class="d-flex">
							<div class="pricing">
								<p class="price"><span class="mr-2 price-dc">$' . number_format($row['price'], '2', '.', '.') . '</span><span class="price-sale">' . number_format($row['sale_price'], '2', '.', '.') . '$</span></p>
							</div>
						</div>
						';
				} else {
					echo '<div class="col-md-6 col-lg-3 ftco-animate">
					<div class="product">
						<a href="product-single.php?id=' .$row['id']. '" class="img-prod"><img class="img-fluid" src="images/' . $row['img'] . '" alt="Colorlib Template">
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
									<a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
										<span><i class="ion-ios-menu"></i></span>
									</a>
									<a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
										<span><i class="ion-ios-cart"></i></span>
									</a>
									<a href="#" class="heart d-flex justify-content-center align-items-center ">
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
		<div class="row mt-5">
			<div class="col text-center">
				<div class="block-27">
					<ul>
						<li><a href="#">&lt;</a></li>
						<li class="active"><span>1</span></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">5</a></li>
						<li><a href="#">&gt;</a></li>
					</ul>
				</div>
			</div>
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

</body>

</html>