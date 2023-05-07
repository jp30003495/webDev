

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Shoe Store - Products</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
	<link href="productsstyle.css" rel="stylesheet" type="text/css" />
    <link href="checkout.css" rel="stylesheet" type="text/css" />


    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Anton">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
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
                <h1>OUR PRODUCTS</h1>
            </div>
            <div class="info">
                <p>View our full range of products below!</p>
                <p>Looking for something else? Send us a message and we'll consider bringing them in!</p>
                <a href="contact.html" class="btn">Contact Us &#8594</a>
            </div>
        </div>
    </div>

    </div>

    <!-- Descriptions -->
    <div class="small-container">
		<div class="check-row">
			<div class="col-75">
				<div class="container">
					<h3 style="text-align: center;">Please fill out the checkout form below to complete your purchase.
					</h3>
					<sub>An asterisk (*) denotes a required field.</sub>
					<form action="createOrder.php" method="POST">
						<div class="check-row">
							<div class="col-50 check-section">
								<h3><span class="material-symbols-outlined">account_circle </span>Customer Details</h3>
								<label for="fname">Full Name *</label>
								<input type="text" id="fname" name="firstname" placeholder="Enter name here" required>
								<label for="email">Email *</label>
								<input type="text" id="email" name="email" placeholder="Enter email here" required>
							</div>

							<div class="col-50 check-section">
								<h3><span class="material-symbols-outlined">credit_card </span>Payment</h3>

								<label for="cname">Name on Card *</label>
								<input type="text" id="cname" name="cname" placeholder="Cardholder Name">
								<label for="ccnum">Card number *</label>
								<input type="text" id="ccnum" name="ccnum" placeholder="Card number">
								<div class="check-row">
									<div class="col-50">
										<label for="expdate">Expiry Date *</label>
										<input type="text" id="expdate" name="expmonth" placeholder="Exipry Date">
									</div>
									<div class="col-50">
										<label for="cvv">CVV *</label>
										<input type="text" id="cvv" name="cvv" placeholder="CVV Number">
									</div>
								</div>
							</div>
						</div>

						<div class="check-row">
							<div class="col-50 check-section">
								<h3><span class="material-symbols-outlined">home_pin </span>Billing Address</h3>
								<label for="address">Address</label>
								<input type="text" id="adr" name="address" placeholder="Address line 1 *" required>
								<input type="text" id="adr" name="address2" placeholder="Address line 2">
								<input type="text" id="city" name="city" placeholder="Enter City here*" required>

								<div class="check-row">
									<div class="col-50">
										<label for="county">County</label>
										<input type="text" id="county" name="county" placeholder="Enter county here">
									</div>
									<div class="col-50">
										<label for="postcode">Postcode</label>
										<input type="text" id="postcode" name="postcode"
											placeholder="Enter postcode here *" required>
									</div>
								</div>
							</div>
						</div>
				</div>
				<!-- <input type="submit" value="Complete payment" class="btn" style="vertical-align: middle;"> -->
                <input id="submit_btn" class="btn" name="checkout" type="submit" value="SUBMIT">
				</form>
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