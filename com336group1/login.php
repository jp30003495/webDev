<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Shoe Store - Products</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
	<link href="login.css" rel="stylesheet" type="text/css" />

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
                                echo '<li>
									    <form method="post" action="signout.php">
                                            <button type="submit" name="signout" class="btn" style="border: none;">Sign Out</button>
										</form>
									</li>';
                            }else{
                                echo '<a href="login.php" class="btn">Login</a>';
                            }
                         ?>
                    </ul>
                </nav>
                <span class="material-icons" id="menu" onclick="menuToggle()">menu</span>
            </div>

            <div class="page-intro">
                <h1>Login</h1>
            </div>
            <div class="info">
                <p>Login into your account and browse our products!</p>
                <p>Don't have an account? Register today!</p>
                <a href="signup.php" class="btn">Sign up &#8594</a>
            </div>
        </div>
    </div>

    </div>

    <!-- Description -->
	<div class="account">
		<div class="container">
			<div class="row">
				<div class="col-2">
					<img src="images/logo.png" alt="logo" width="100%">
				</div>
				<div class="form-contain">
					<div class="form-btn">
						<h1 style="text-align: center;">Login</h1>
					</div>

					<!--Login Form-->
					<form action="signin.php" method="POST">
                        <br>
						<input name="email" type="text" placeholder="Email" style="margin-bottom: 10%;" maxlength="50" required>
						<input name="password" type="text" placeholder="Password" maxlength="20" required>
						<button name="submit" type="submit" class="btn"><strong>Login</strong></button>
					</form>

                    <div>
                        <p>Don't have an account? <a href="signup.php" style="color: #d03156;">Register here<a></p>
                    </div>

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
            <hr>
            <p class="copyright">Copyright 2023 - The Shoe Store</p>
        </div>
    </div>

<script src="script.js"></script>
</body>

</html>