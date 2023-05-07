<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "assignment");
// print_r($_SESSION);

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

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["product_id"] == $_GET["id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				echo '<script>alert("item removed from cart")</script';
				echo '<script>window.location="basket.php"</script>';
			}
		}
	}
}

if(isset($_POST["checkout"]))
{
    // echo "Inside If  ";

	// Insert the order into the database
	foreach($_SESSION["shopping_cart"] as $keys => $values)
	{
		$product_id = $values["product_id"];
		$product_name = $values["product_name"];
		$product_price = $values["product_price"];
		$product_stock = $values["product_stock"];

		$query = "INSERT INTO orders (product_id, product_name, product_price) VALUES ('$product_id', '$product_name', '$product_price')";
		mysqli_query($connect, $query);
	}

    // echo "Code injected   ";

	// Clear the shopping cart after checkout
	unset($_SESSION["shopping_cart"]);

    // echo "ASession unset   ";


	// Redirect to the success page
	// header("location: index.php");
	exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Shoe Store - Products</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
	<link href="basket.css" rel="stylesheet" type="text/css" />

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
                            // session_start();
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
                <h1>Customer Basket</h1>
            </div>
            <div class="info">
                <p>View your current order!</p>
                <p>Looking for something else? Head back to our products page!</p>
                <a href="products.php" class="btn">Products &#8594</a>
            </div>
        </div>
    </div>

    </div>

        <!-- <h4>Order details</h4> -->
        <br>
        <div class="basketRow" style="margin-bottom: 2%; display: inline-block; width: 100%;">
            <div class="cartContainer" style="float: left;">
                <h1 style="text-align: center; font-size: 48px;">My Cart</h1>
                <?php
                    if(!empty($_SESSION["shopping_cart"]))
                    {
                        $total = 0;
                        foreach($_SESSION["shopping_cart"] as $keys => $values)
                    {
                ?>
                <div style="padding-top: 3%; padding-left: 3%;">
                    <h3 style="padding-bottom: 3%;"><?php echo $values["product_name"]; ?></h3>
                    <span>Price: &emsp; £<?php echo $values["product_price"]; ?></span>
                    <span style="margin-left: 5%; margin-right: 5%;">Quantity: &emsp; <?php echo $values["product_stock"]; ?></span>
                    <span>Overall Price: &emsp; £<?php echo number_format($values["product_stock"] * $values["product_price"], 2);?></span>
                    <span style="margin-left: 10%;"><a href="basket.php?action=delete&id=<?php echo $values["product_id"]; ?>"><span class="text-danger">Remove</span></a></span>

                    <hr style="width: 100%; margin-left: -1%; margin-top: 5%; margin-bottom: 1%; border: 1px solid  rgba(0, 0, 0, 0.1);">
                </div>

                <?php
                    $total = $total + ($values["product_stock"] * $values["product_price"]);
                    }
                ?>
                
            </div>

                <div style="width: 25%; box-shadow: 0 0 20px 0px rgba(0, 0, 0, 0.1); border-radius: 25px; margin-right: 5%; float: left;
                padding-top: 1%; padding-left: 2%;">
                        <h2>Total</h2>
                        <hr style="width: 90%; margin-left: -1%; margin-top: 4%; margin-bottom: 2%; border: 1px solid  rgba(0, 0, 0, 0.1);">
                        <h3>Order Total: &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; £ <?php echo number_format($total, 2); ?></h3>
                        <br>
                        <h4><label for="delivery">Delivery</label></h4>
                        <select name="delivery" id="delivery" style="width: 90%; height: 25px; border-radius: 10px; margin-top: 2%;">
                            <option value="select">Please Choose...</option>
                            <option value="Premium">Premuim Delivery</option>
                            <option value="Standard">Standard Delivery</option>
                        </select>
                        <br>

                        <!-- <a href="checkout.php" class="btn">Checkout &#8594</a> -->

                        <?php
                            // session_start();
                            if(isset($_SESSION["customerID"])){
                                echo '<li>
										<form method="post" action="signout.php">
                                        <a href="checkout.php" class="btn">Checkout &#8594</a>
										</form>
									</li>';
                            }else{
                                echo '<a href="login.php" class="btn">Login</a>';
                            }
                        ?>
                </div>

            <?php
                    }
                ?> 
        </div>
        <br>

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