<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Shoe Store - Products</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
	<link href="signup.css" rel="stylesheet" type="text/css" />

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
                        <li><a href="login.php">Login</a></li>
                    </ul>
                </nav>
                <span class="material-icons" id="menu" onclick="menuToggle()">menu</span>
            </div>

            <div class="page-intro">
                <h1>Sign up Today</h1>
            </div>
            <div class="info">
                <p>Register your account today at The Shoe Store!</p>
                <p>Already have an account? Login today!</p>
                <a href="login.php" class="btn">Login &#8594</a>
            </div>
        </div>
    </div>

    </div>

    <!-- Description -->
	<div class="account">
		<div class="container">
			<div class="row">
				<div class="form-contain">
					<div class="form-btn">
						<h1 style="text-align: center;">Register Today</h1>
					</div>

					<!--Login Form-->
					<form action="newcustomer.php" method="POST">
                        <div>
                            <label for="first_name">First Name:</label>
						    <input id="first_name" type="text" name="first_name" placeholder="First Name" style="margin-bottom: 5%;" maxlength="20" required>
                        </div>

                        <div>
                            <label for="second_name">Second Name:</label>
						    <input id="second_name" type="text" name="second_name" placeholder="Second Name" style="margin-bottom: 5%;" maxlength="20" required>
                        </div>

                        <div>
                            <label for="email_address">Email:</label>
						    <input id="email_address" type="text" name="email_address" placeholder="Email" style="margin-bottom: 5%;" maxlength="50" required>
                        </div>

                        <div>
                            <label for="customer_password">Password:</label>
						    <input id="customer_password" type="password" name="customer_password" placeholder="Password" style="margin-bottom: 5%;" maxlength="20" required>
                        </div>

                        <div>
                            <label for="confirm_password">Confirm Password:</label>
						    <input id="confirm_password" type="password" name="confirm_password" placeholder="Confirm Password" style="margin-bottom: 5%;" maxlength="20" required>
                        </div>

                        <hr>

                        <h1>Delivery Details</h1>

                        <div>
                            <label for="mobile_number">Mobile Number:</label>
						    <input id="mobile_number" type="text" name="mobile_number" placeholder="11 222 333 444" style="margin-bottom: 5%;" maxlength="11" required>
                        </div>

                        <div>
                            <label for="date_of_birth">Date of Birth:</label>
						    <input id="date_of_birth" type="text" name="date_of_birth" placeholder="YYYY/MM/DD" style="margin-bottom: 5%;" maxlength="10" required>
                        </div>

                        <div>
                            <label for="house_number">House Number:</label>
						    <input id="house_number" type="text" name="house_number" placeholder="House Number" style="margin-bottom: 5%;" maxlength="10" required>
                        </div>

                        <div>
                            <label for="address_line_1">Address:</label>
						    <input id="address_line_1" type="text" name="address_line_1" placeholder="Address" style="margin-bottom: 5%;" maxlength="30" required>
                        </div>

                        <div>
                            <label for="town">Town:</label>
						    <input id="town" type="text" name="town" placeholder="Town" style="margin-bottom: 5%;" maxlength="25" required>
                        </div>

                        <div>
                            <label for="city">City:</label>
						    <input id="city" type="text" name="city" placeholder="City" style="margin-bottom: 5%;" maxlength="25" required>
                        </div>

                        <div>
                            <label for="postcode">Postcode:</label>
						    <input id="postcode" type="text" name="postcode" placeholder="Postcode" style="margin-bottom: 5%;" maxlength="8" required>
                        </div>

                        <div>
                            <label for="country">Country:</label>
						    <input id="country" type="text" name="country" placeholder="Country" style="margin-bottom: 5%;" maxlength="30" required>
                        </div>

						<a href="login.php"><button type="submit" class="btn" style="margin-left: 30%;"><strong>Create Account</strong></button></a>
					</form>

                    <div>
                        <p>Already have an account? <a href="login.php" style="color: #d03156;">Login here<a></p>
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