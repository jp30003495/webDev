<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<title>Shoe Store - About</title>
	<link href="style.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2family=Bree+Serif&family=Anton">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link href="aboutstyle.css" rel="stylesheet" type="text/css" />
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
		</div>
	</div>

	<!-- About us -->
	<div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px" id="band">
		<h2 class="w3-wide">ABOUT US</h2>
		<p class="w3-opacity"><i>We love shoes!</i></p>
		<p class="w3-justify">We have created a shopping website. We think that there is a need to make shopping that
			bit easier for everyone. Thats why at THE SHOE STORE, we strive to make your shopping experience efficient and
			easy. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
			dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
			commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
			pariatur.Excepteur sint occaecat cupidatat non proident, sunt in culpa qu officia deserunt mollit anim id est laborum
			consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
			minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>


    <div class="bkground-img w3-center w3-padding-64">
      <div>
        <img src="/images/aboutBground.jpg" style="width: 70%;">
      </div>
      <div class="row">
        <a href="contact.html" class="btn col-md-3" style="">Contact Us Here!</a>
        <p class="col-md-3">OR</p>
        <a href="reviews.html" class="btn col-md-3" style="">View Our Ratings!</a>
      </div>
        
    </div>
    
    
    <div class="w3-row w3-padding-32">
			<h2 class="w3-wide">MEET OUR FOUNDERS</h2>
			<p class="w3-opacity"><i>of THE SHOE STORE!</i></p>
			<div class="w3-third">
				<p>Sean O'Brien</p>
				<img src="/images/ceo1.jpg" class="w3-round w3-margin-bottom" alt="Random Name" style="width:60%">
				<p class="w3-justify" style="padding-left: 2%; padding-right: 2%;">Lorem ipsum dolor sit amet,
					consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
					enim ad minim veniam</p>
			</div>
			<div class="w3-third"">
        <p>Liam Gallagher</p>
        <img src=" /images/ceo2.jpg" class="w3-round w3-margin-bottom" alt="Random Name" style="width:60%">
				<p class="w3-justify" style="padding-left: 2%; padding-right: 2%;">Lorem ipsum dolor sit amet,
					consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enimad minim veniam</p>
			</div>
			<div class="w3-third">
				<p>Aoife Murphy</p>
				<img src="/images/ceo3.jpg" class="w3-round" alt="Random Name" style="width:60%">
				<p class="w3-justify">Lorem ipsum dolor sit amet,
					consectetur adipiscing elit, sed do eiusmod tempor incididunt
					ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
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
						<li><a href="index.html">Home</a></li>
						<li><a href="products.html">Products</a></li>
						<li><a href="about.html">About</a></li>
					</ul>
					<ul class="">
						<li><a href="contact.html">Contact</a></li>
						<li><a href="faq.html">FAQs</a></li>
						<li><a href="reviews.html">Reviews</a></li>
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
			<p class="copyright">Copyright 2023 - The Shoe Store</p>
		</div>
	</div>


	<script src="script.js"></script>
</body>

</html>