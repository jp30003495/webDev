<?php
    // session_start();
    $mysqli = mysqli_connect("localhost", "root", "", "assignment");

    // if ($mysqli->connect_error) {
    //     die("Connection failed: " . $mysqli->connect_error);
    // }

    // retrieve productID from URL parameter
    if(isset($_GET['product_id'])) {
        $productID = $_GET['product_id'];
    } else {
        echo "Product not found";
    }//

    if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "product_id");
		if(!in_array($_GET["id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'product_id' => $_GET["id"],
				'product_name' => $_POST["hidden_name"],
				'product_price' => $_POST["hidden_price"],
				'product_stock' => $_POST["quantity"]				
			);

            

			$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else
		{
			echo'<script>alert("item already in cart")</script>';
		}
	}
	else{
		$item_array = array(
			'product_id' => $_GET["id"],
			'product_name' => $_POST["hidden_name"],
			'product_price' => $_POST["hidden_price"],
			'product_stock' => $_POST["quantity"]				
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}

    //product review
    $productreview = $mysqli->prepare("SELECT review_description FROM reviews WHERE product_id = ?");
    $productreview->bind_param("s", $productID);
    $productreview->execute();
    $reviewresult = $productreview->get_result();


    // prepare SQL statement using a prepared statement
    $stmt = $mysqli->prepare("SELECT * FROM products WHERE product_id = ?");
    $stmt->bind_param("s", $productID);
    $stmt->execute();
    $result = $stmt->get_result();

    // process query results
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Shoe Store - Home</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Anton">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="style.css">
</head>

<body>



    <!-- Header-->
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
				<h1>Product Information</h1>
			</div>
			<div class="info">
				<p>View the full details of the selected product below!</p>
				<p>Looking for something else? Head back to our products page!</p>
				<a href="products.php" class="btn">View Products &#8594</a>
			</div>
		</div>
	</div>

    <!-- Product section-->
    <div style="Padding-left: 10%; color: grey;">
        <h5><a href="index.html" style="decoration: none; color: grey;">Home</a>&emsp; > &emsp;<a href="products.php"
                style="decoration: none; color: grey;">Products</a>&emsp; > &emsp;<?php echo $row["product_name"]; ?>
        </h5>
    </div>

    <div class="container1">
        <div class="product">
            <div>
                <img src="images/<?php echo $row["product_image"]; ?>" class="img-responsive" width="80%"
                    height="100%" /><br />
            </div>

            <div class="details">
                <!-- <div class="small mb-1"><?php echo $row["product_id"]; ?></div> -->
                <h1 style="color:black; font-family: Anton, sans-serif; font-size: 48px;">
                    <?php echo $row["product_name"]; ?><br></h1>
                <p style="font-family: 'Bree Serif', serif; font-size: 18px; padding-bottom: 20px;">
                    <?php echo $row["product_description"]; ?></p>


                <div>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span><a href="#reviews">Reviews</a></span>
                </div>

                <p style="font-family: 'Bree Serif', serif; font-size: 28px;"><?php echo "£" . $row["product_price"]; ?>
                </p>

                <span><p style="font-family: 'Bree Serif', serif; font-size: 18px; padding-bottom: 10px; float: left;">Quantity:  &emsp;&emsp;&emsp;</p><input type="text" name="quantity" value="1" class="form-control" style="width: 15%; float: left;" /><span>

                <br><br><br>

                <!-- <div class="input-group">
                    <button id="decrementButton" style="width: 50px; margin-right: 10px;">-</button>
                    <input class="form-control text-center me-3" id="inputQuantity" type="number" value="1" style="max-width: 3rem;" />
                    <button id="incrementButton" style="width: 50px; margin-left: 0px;">+</button>
                </div> -->
                <p for="size"
                    style="font-family: 'Bree Serif', serif; font-size: 18px; padding-bottom: 10px; float: left;">Size:
                </p>
                <select name="size" id="size"
                    style="font-family: 'Bree Serif', serif; font-size: 12px; padding-top: 4px; padding-bottom: 4px; margin-left: 20px;">
                    <option value="6">UK 6</option>
                    <option value="7">UK 7</option>
                    <option value="8">UK 8</option>
                    <option value="9">UK 9</option>
                    <option value="10">UK 10</option>
                    <option value="11">UK 11</option>
                    <option value="12">UK 12</option>
                    <option value="13">UK 13</option>
                </select>
                <br>

                <!-- <input type="submit" name="add_to_cart" style="margin-top:15px; margin-left: 25%; width: 50%;"
                    class="btn" value="Add to Cart" /> -->

                <!-- <button type="submit" name="add_to_cart"cstyle="float: right; border: none; cursor: pointer; appearance: none; 
                background-color: inherit; width: 15%; height: 15%; margin-right: 15%;" value="Add to Cart">
                    <input type="submit" name="add_to_cart" value="Add to Cart" />  
                </button> -->


                <button type="submit" name="add_to_cart"
                        style="float: right; border: none;cursor: pointer; appearance: none; background-color: inherit; width: 15%; height: 15%; margin-right: 15%;"
                        value="Add to Cart">
                        <img src="images/cart2.jpg" width="100%" height="100%">
                </button>
            </div>
        </div>
    </div>



    <div class="row2" id="reviews" style="margin-left: 12.5%">
        <div class="col-md-5">
            <h2>Reviews</h2>
            <div>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span>&ensp;5.0 &emsp;(1 review)</span>
            </div>

            <br>
            <h4>Customer Feedback</h4>
            <br>

            <div>
                <h5>Shoe Sizing</h5>
                <div class="bar-container">
                    <div class="bar-1"></div>
                </div>
                <h6>Small Fitting
                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                    Large Fitting</h6>
            </div>

            <br>

            <div>
                <h5>Shoe Quality</h5>
                <div class="bar-container">
                    <div class="bar-2"></div>
                </div>
                <h6>Poor
                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                    Excellent</h6>
            </div>

            <br>
        </div>

        <div class="col-md-5">
            <?php     // process query results
                if ($reviewresult->num_rows > 0) {
                    // output data of each row
                    while($row = $reviewresult->fetch_assoc()) {
            ?> 

                <br>
                <h4>Recent Customer Review</h4>
                <div>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                </div>
                <h5>Perfect Size</h5>
                    <p>"<?php echo $row["review_description"];?>"</p>
                <a href="products.php" class="btn" style="float: center; width: 70%; margin-left: 15%;">View Our Reviews</a>

            <?php 
                } }
                else {
                    echo "There are currently no reviews for this shoe.";
                }
            ?>
        </div>
    </div>

    <!--Footer-->
	<div class="footer" style="margin-top: 35%;">
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

    <?php
        }
    } else {
        echo "Product not found";
    }


    //  close mysqli connection
    $stmt->close();
    $productreview ->close();
    $mysqli->close();
    ?>

</body>