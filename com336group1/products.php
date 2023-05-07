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
				echo '<script>window.location="products.php"</script>';
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
	<link href="productsstyle.css" rel="stylesheet" type="text/css" />

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
    <div style="width: 100%;">
        <div class="row">
            <h2 class="subheading">Shop Our Nike Selection</h2>
        </div>
        <?php
				$query = "SELECT * FROM products ORDER BY product_id ASC";
				$result = mysqli_query($connect, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
						$productid = $row["product_id"];
						$url = "http://localhost/assignmenttest/productsinfo.php?product_id=$productid";
				?>
        <div style="width:90%; margin-left: 5%;">
            <form method="post" action="products.php?action=add&id=<?php echo $row["product_id"]; ?>" style="width: 25%; float: left;">
                <div style="padding:16px;" align="center">

                    <img src="images/<?php echo $row["product_image"]; ?>" class="img-responsive"  width="50%"/><br />

                    <h5 class="text-body" style="text-align: left;">
                        <?php echo $row["product_name"]; ?>
					</h5>
                    <h5 class="text-body" style="text-align: left;">£
                        <?php echo $row["product_price"]; ?>
					</h5>

                    <input type="text" name="quantity" value="1" class="form-control" style="width: 15%; float: left;" />

                    <input type="hidden" name="hidden_name" value="<?php echo $row["product_name"]; ?>" />

                    <input type="hidden" name="hidden_price" value="<?php echo $row["product_price"]; ?>" />

                    <button type="submit" name="add_to_cart"
                        style="float: right; border: none;cursor: pointer; appearance: none; background-color: inherit; width: 15%; height: 15%; margin-right: 15%;"
                        value="Add to Cart">
                        <img src="images/cart2.jpg" / width="100%" height="100%">
                    </button>

                    <br>
					
                    <a href="productsinfo.php?product_id=<?php echo $row["product_id"]; ?>" class="btn" style="float: center;">View Product</a>
                </div>
            </form>
        </div>
        <?php
					}}
			?>
        <div style="clear:both"></div>
        <br />
        
    </div>
    </div><br />
</body>

</html>



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