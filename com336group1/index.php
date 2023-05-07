<?php

$connect = mysqli_connect("localhost", "root", "", "assignment");


?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<title>Shoe Store - Home</title>
	<link href="style.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Anton">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
	<!--Header-->
	<div class="header">
		<div class="container">
			<div class="navbar">
				<div class="logo">
					<img src="images/logo.png" width="100px">
				</div>

				<nav>
					<ul id="MenuItems">
						<li><a href="index.php">Home</a></li>
						<li><a href="products.php">Products</a></li>
						<li><a href="contact.php">Contact</a></li>
						<li><a href="about.php">About</a></li>
						<li><a href="faq.php">FAQs</a></li>
						<li><a href="reviews.php">Reviews</a></li>
						<li><a href="basket.php">Basket</a></li>
						<?php
                            session_start();
                            if(isset($_SESSION["customerID"])){
                                echo '
										<li>
											<form method="post" action="signout.php">
                                        		<button type="submit" name="signout" class="btn" style="border: none;">Sign Out</button>
											</form>
										</li>'
                                    ;
                            }else{
                                echo '<a href="login.php" class="btn">Login</a>';
                            }
                        ?>
					</ul>
				</nav>
				<span class="material-icons" id="menu" onclick="menuToggle()">menu</span>
			</div>

			<div class="row">
				<div class="col-2">
					<h1>THE SHOE STORE!</h1>
					<p>Lorem ipsum dolor sit amet, ex iusto fastidii deterruisset est, dicunt eleifend efficiantur cu
						ius,
						nonumes invidunt pertinax vix te.</p>
					<a href="products.php" class="btn">Explore &#8594</a>
				</div>
				<div class="col-2">
					<img src="images/logo.png">
				</div>
			</div>
		</div>
	</div>

	<!--Featured Products-->
	<div class="categories">
		<div class="small-container">
			<div class="row">
				<h2 class="subheading">Most Wanted ---- Nike Dunks</h2>
			</div>
			<div class="row">
				<a href="products.php" class="btn btn-faded">View full range &#8594</a>
			</div>
			<div class="row">
				<div class="col-3 feat-products">
					<img src="images/1.jpg" alt="Nike Dunk Shoe 1">
					<h3>Nike Dunk Low</h3>
					<p>Panda</p>
				</div>
				<div class="col-3 feat-products">
					<img src="images/2.jpg" alt="Nike Dunk Shoe 2">
					<h3>Nike Dunk Low</h3>
					<p>Valerian Blue</p>
				</div>
				<div class="col-3 feat-products">
					<img src="images/3.jpg" alt="Nike Dunk Shoe 3">
					<h3>Nike Dunk Low</h3>
					<p>Argon</p>
				</div>
			</div>
		</div>
	</div>


	<!--Footer-->
	<div class="footer">
		<div class="container">
			<div class="row">
				<div class="footer-col-3">
					<h3>Quick Links</h3>
					<ul class="">
						<li><a href="index.php">Home</a></li>
						<li><a href="products.php">Products</a></li>
						<li><a href="about.php">About</a></li>
					</ul>
					<ul class="">
						<li><a href="contact.php">Contact</a></li>
						<li><a href="faq.php">FAQs</a></li>
						<li><a href="reviews.php">Reviews</a></li>
					</ul>
				</div>
				<div class="footer-col-3">
					<img src="images/logo.png" width="90%">
				</div>
				<div class="footer-col-3">
					<h3>Follow Us</h3>
					<ul>
						<li><a href="https://www.facebook.com/ulsteruniversity/">Facebook</a></li>
						<li><a href="https://twitter.com/studyatulster?lang=en-GB">Twitter</a></li>
						<li><a href="https://www.instagram.com/ulsteruni/?hl=en">Instagram</a></li>
					</ul>
				</div>
			</div>
			<hr>
			<p class="copyright">Copyright 2023 - The Shoe Store</p>
		</div>
	</div>


	<script src="script.js"></script>
</body>

</html>