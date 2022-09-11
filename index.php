 <?php
	include_once('./inc/header.php');
	$con = mysqli_connect('localhost', 'root', '', 'Vegefood');

	 ?>
 <!-- END nav -->

 <section id="home-section" class="hero">
 	<div class="home-slider owl-carousel">
 		<div class="slider-item" style="background-image: url(images/bg_1.jpg);">
 			<div class="overlay"></div>
 			<div class="container">
 				<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

 					<div class="col-md-12 ftco-animate text-center">
 						<h1 class="mb-2">Fresh Vegestables &amp; Fruits</h1>
 						<h2 class="subheading mb-4">We deliver organic vegetables &amp; fruits</h2>
 						<p><a href="#" class="btn btn-primary">View Details</a></p>
 					</div>

 				</div>
 			</div>
 		</div>

 		<div class="slider-item" style="background-image: url(images/bg_2.jpg);">
 			<div class="overlay"></div>
 			<div class="container">
 				<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

 					<div class="col-sm-12 ftco-animate text-center">
 						<h1 class="mb-2">100% Fresh &amp; Organic Foods</h1>
 						<h2 class="subheading mb-4">We deliver organic vegetables &amp; fruits</h2>
 						<p><a href="#" class="btn btn-primary">View Details</a></p>
 					</div>

 				</div>
 			</div>
 		</div>
 	</div>
 </section>

 <section class="ftco-section">
 	<div class="container">
 		<div class="row no-gutters ftco-services">
 			<div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
 				<div class="media block-6 services mb-md-0 mb-4">
 					<div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
 						<span class="flaticon-shipped"></span>
 					</div>
 					<div class="media-body">
 						<h3 class="heading">Free Shipping</h3>
 						<span>On order over $100</span>
 					</div>
 				</div>
 			</div>
 			<div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
 				<div class="media block-6 services mb-md-0 mb-4">
 					<div class="icon bg-color-2 d-flex justify-content-center align-items-center mb-2">
 						<span class="flaticon-diet"></span>
 					</div>
 					<div class="media-body">
 						<h3 class="heading">Always Fresh</h3>
 						<span>Product well package</span>
 					</div>
 				</div>
 			</div>
 			<div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
 				<div class="media block-6 services mb-md-0 mb-4">
 					<div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
 						<span class="flaticon-award"></span>
 					</div>
 					<div class="media-body">
 						<h3 class="heading">Superior Quality</h3>
 						<span>Quality Products</span>
 					</div>
 				</div>
 			</div>
 			<div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
 				<div class="media block-6 services mb-md-0 mb-4">
 					<div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
 						<span class="flaticon-customer-service"></span>
 					</div>
 					<div class="media-body">
 						<h3 class="heading">Support</h3>
 						<span>24/7 Support</span>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>
 </section>

 <section class="ftco-section ftco-category ftco-no-pt">
 	<div class="container">
 		<div class="row">
 			<div class="col-md-8">
 				<div class="row">
 					<div class="col-md-6 order-md-last align-items-stretch d-flex">
 						<div class="category-wrap-2 ftco-animate img align-self-stretch d-flex" style="background-image: url(images/category.jpg);">
 							<div class="text text-center">
 								<h2>Vegetables</h2>
 								<p>Protect the health of every home</p>
 								<p><a href="shop.php" class="btn btn-primary">Shop now</a></p>
 							</div>
 						</div>
 					</div>
 					<div class="col-md-6">
 						<div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url(images/category-1.jpg);">
 							<div class="text px-3 py-1">
 								<h2 class="mb-0"><a href="shop.php?category=1">Vegetables</a></h2>
 							</div>
 						</div>
 						<div class="category-wrap ftco-animate img d-flex align-items-end" style="background-image: url(images/category-2.jpg);">
 							<div class="text px-3 py-1">
 								<h2 class="mb-0"><a href="shop.php?category=2">Fruits</a></h2>
 							</div>
 						</div>
 					</div>
 				</div>
 			</div>

 			<div class="col-md-4">
 				<div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url(images/category-3.jpg);">
 					<div class="text px-3 py-1">
 						<h2 class="mb-0"><a href="shop.php?category=3">Juices</a></h2>
 					</div>
 				</div>
 				<div class="category-wrap ftco-animate img d-flex align-items-end" style="background-image: url(images/category-4.jpg);">
 					<div class="text px-3 py-1">
 						<h2 class="mb-0"><a href="shop.php?category=4">Dried</a></h2>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>
 </section>

 <section class="ftco-section">
 	<div class="container">
 		<div class="row justify-content-center mb-3 pb-3">
 			<div class="col-md-12 heading-section text-center ftco-animate">
 				<span class="subheading">Featured Products</span>
 				<h2 class="mb-4">Our Products</h2>
 				<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
 			</div>
 		</div>
 	</div>
 	<div class="container">
 		<div class="row">
 			<?php

				$sql = "SELECT * FROM product";
				$result = mysqli_query($con, $sql);
				$i = 0;
				while (($row = mysqli_fetch_array($result)) && $i < 8) {
					++$i;
					if ($row['sale'] !== null) { ?>
 					<div class="col-md-6 col-lg-3 ftco-animate">
 						<div class="product">
 							<a href="product-single.php?id=<?= $row['id'] ?>" class="img-prod"><img class="img-fluid" src="images/product/<?= $row['img'] ?>" alt="Colorlib Template">
 								<span class="status"><?= $row['sale'] ?>%</span>
 								<div class="overlay"></div>
 							</a>
 							<div class="text py-3 pb-4 px-3 text-center">
 								<h3><a href="#"><?= $row['name'] ?></a></h3>
 								<div class="d-flex">
 									<div class="pricing">
 										<p class="price"><span class="mr-2 price-dc">$ <?= number_format($row['price'], '2', '.', '.') ?></span><span class="price-sale">$<?= number_format($row['price']*(100-$row['sale'])*0.01, '2', '.', '.') ?></span></p>
 									</div>
 								</div>
 							<?php ;
							} else {
								?>
 								<div class="col-md-6 col-lg-3 ftco-animate">
 									<div class="product">
 										<a href="product-single.php?id=<?= $row['id'] ?>" class="img-prod"><img class="img-fluid" src="images/product/<?= $row['img'] ?>" alt="Colorlib Template">
 											<div class="overlay"></div>
 										</a>
 										<div class="text py-3 pb-4 px-3 text-center">
 											<h3><a href="#"><?= $row['name'] ?></a></h3>
 											<div class="d-flex">
 												<div class="pricing">
 													<p class="price"><span>$<?= number_format($row['price'], '2', '.', '.') ?></span></p>
 												</div>
 											</div>
 										<?php ;
										} ?>
 										<div class="bottom-area d-flex px-3">
 											<div class="m-auto d-flex">
											 <a  class="add-to-cart d-flex justify-content-center align-items-center text-center">
 													<span><i class="ion-ios-menu"></i></span>
 												</a>
 												<!-- <button class="btn btn-success buy-now d-flex justify-content-center align-items-center mx-1">
 													<span><i class="ion-ios-menu"></i></span>
 												</button> -->

 												<button onclick="addToCart(<?=$row['id']?>)"  id="add_to_cart" class="btn btn-success buy-now d-flex justify-content-center align-items-center mx-1">
 													<span><i class="ion-ios-cart"></i></span>
 												</button>
 												<!-- 
 												<a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
 													<span><i class="ion-ios-cart"></i></span>
 												</a>
 												<a href="#" class="heart d-flex justify-content-center align-items-center ">
 													<span><i class="ion-ios-heart"></i></span>
 												</a> -->
 												<button onclick="addToWishList(<?=$row['id']?>)" class="btn btn-success heart d-flex justify-content-center align-items-center" id="heart">
 													<span><i class="ion-ios-heart"></i></span>
 												</button>
 											</div>
 										</div>

 										</div>
 										<div>

 										</div>
 									</div>
 								</div>
 							<?php ;
							}

							mysqli_close($con);
								?>

 							</div>
 						</div>
 </section>

 <section class="ftco-section img" style="background-image: url(images/bg_3.jpg);">
 	<div class="container">
 		<div class="row justify-content-end">
 			<div class="col-md-6 heading-section ftco-animate deal-of-the-day ftco-animate">
 				<span class="subheading">Best Price For You</span>
 				<h2 class="mb-4">Deal of the day</h2>
 				<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
 				<h3><a href="#">Spinach</a></h3>
 				<span class="price">$10 <a href="#">now $5 only</a></span>
 				<div id="timer" class="d-flex mt-5">
 					<!-- <div class="time" id="days"></div> -->
 					<div class="time pl-3" id="hours"></div>
 					<div class="time pl-3" id="minutes"></div>
 					<div class="time pl-3" id="seconds"></div>
 				</div>
 			</div>
 		</div>
 	</div>
 </section>

 <section class="ftco-section testimony-section">
 	<div class="container">
 		<div class="row justify-content-center mb-5 pb-3">
 			<div class="col-md-7 heading-section ftco-animate text-center">
 				<span class="subheading">Testimony</span>
 				<h2 class="mb-4">Our satisfied customer says</h2>
 				<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
 			</div>
 		</div>
 		<div class="row ftco-animate">
 			<div class="col-md-12">
 				<div class="carousel-testimony owl-carousel">
 					<?php
						$con = mysqli_connect('localhost', 'root', '', 'Vegefood');
						$sql = "SELECT * FROM recommend";
						$result = mysqli_query($con, $sql);

						while ($row = mysqli_fetch_array($result)) {
							echo '<div class="item">
							<div class="testimony-wrap p-4 pb-5">
								<div class="user-img mb-5" style="background-image: url(images/' . $row['thumbnail'] . ')">
									<span class="quote d-flex align-items-center justify-content-center">
										<i class="icon-quote-left"></i>
									</span>
								</div>
								<div class="text text-center">
									<p class="mb-5 pl-4 line">' . $row['comment'] . '</p>
									<p class="name">' . $row['name'] . '</p>
									<span class="position">' . $row['position'] . '</span>
								</div>
								
							</div>
						</div>';
						}
						mysqli_close($con);
						?>

 				</div>
 			</div>
 		</div>
 	</div>
 </section>

 <hr>

 <section class="ftco-section ftco-partner">
 	<div class="container">
 		<div class="row">
 			<div class="col-sm ftco-animate">
 				<a href="#" class="partner"><img src="images/partner-1.png" class="img-fluid" alt="Colorlib Template"></a>
 			</div>
 			<div class="col-sm ftco-animate">
 				<a href="#" class="partner"><img src="images/partner-2.png" class="img-fluid" alt="Colorlib Template"></a>
 			</div>
 			<div class="col-sm ftco-animate">
 				<a href="#" class="partner"><img src="images/partner-3.png" class="img-fluid" alt="Colorlib Template"></a>
 			</div>
 			<div class="col-sm ftco-animate">
 				<a href="#" class="partner"><img src="images/partner-4.png" class="img-fluid" alt="Colorlib Template"></a>
 			</div>
 			<div class="col-sm ftco-animate">
 				<a href="#" class="partner"><img src="images/partner-5.png" class="img-fluid" alt="Colorlib Template"></a>
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

 <script src="js/action-cookie.js"></script>
<script>
	$(document).ready(function(){
		
		$("#add_to_cart").on('click',function(e){
			e.preventDefault();
			$.ajax({
				url : "fetch.php",
				method: "post",
				dataType: "json",
				data : {
					id : $(this).attr("id"),
					num : 1,
					type : "ajax"
				},
				success : function (data){
					console.log(data);
					$("#num-cart").html(data);
				}
			})
		})
	})
</script>

 </body>

 </html>