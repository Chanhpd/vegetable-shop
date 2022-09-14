<!DOCTYPE php>
<php lang="en">

	<head>
		<title>Shop vegetables</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

		<link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
		<link rel="stylesheet" href="css/animate.css">

		<link rel="stylesheet" href="css/owl.carousel.min.css">
		<link rel="stylesheet" href="css/owl.theme.default.min.css">
		<link rel="stylesheet" href="css/magnific-popup.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<link rel="stylesheet" href="css/aos.css">

		<link rel="stylesheet" href="css/ionicons.min.css">

		<link rel="stylesheet" href="css/bootstrap-datepicker.css">
		<link rel="stylesheet" href="css/jquery.timepicker.css">


		<link rel="stylesheet" href="css/flaticon.css">
		<link rel="stylesheet" href="css/icomoon.css">
		<link rel="stylesheet" href="css/style.css">
		
		<script type="text/javascript">
			$(document).on('click', 'ul li', function() {
				$(this).addClass('active').siblings().removeClass('active');
			})
		</script>
	</head>

	<body class="goto-here">
		</div>
		<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
			<div class="container">
				<a class="navbar-brand" href="index.php">Vegefoods</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="oi oi-menu"></span> Menu
				</button>

				<div class="collapse navbar-collapse" id="ftco-nav">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
							<div class="dropdown-menu" aria-labelledby="dropdown04">
								<a class="dropdown-item" href="shop.php">Shop</a>
								<a class="dropdown-item" href="wishlist.php">Wishlist</a>
								<a class="dropdown-item" href="product-single.php">Single Product</a>
								<a class="dropdown-item" href="cart.php">Cart</a>
								<a class="dropdown-item" href="checkout.php">Checkout</a>
							</div>
						</li>
						<li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
						<li class="nav-item"><a href="blog.php" class="nav-link">Blog</a></li>
						<li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>

						<?php
						session_start();


						$cart = [];
						if (isset($_COOKIE['cart'])) {
							$json = $_COOKIE['cart'];
							$cart = json_decode($json, true);
						}
						$count = 0;
						foreach ($cart as $item) {
							$count += $item['num'];
						}
						?>
						<li class="nav-item cta cta-colored"><a href="cart.php" class="nav-link"><span class="icon-shopping_cart"></span>[<?= $count ?>]</a></li>
						

						</li>
						<?php
						if (isset($_SESSION["user"])) {
							echo '
							<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa-solid fa-user"></i> '.$_SESSION["user"].'</a>
							<div class="dropdown-menu" aria-labelledby="dropdown04">
								<a class="dropdown-item" href="profile.php"><i class="fa-sharp fa-solid fa-address-card"></i> Profile</a>
								<a class="dropdown-item" href="Login/logout.php"><i class="fa-solid fa-right-from-bracket"></i> Log out</a>
								
							</div>
						</li>';
						}
						else {
								echo '<li class="nav-item"><a href="Login/login.php" class="nav-link login"><i class="fa-solid fa-user"></i></a>';
						}
						?>
						</a></li>
					</ul>
				</div>
			</div>
		</nav>