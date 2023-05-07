<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Shoe Store - Home</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Anton">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="staff.css">
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
			<!-- <div class="info">
				<p>View the full details of the selected product below!</p>
				<p>Looking for something else? Head back to our products page!</p>
				<a href="products.php" class="btn">View Products &#8594</a>
			</div> -->
		</div>
	</div>

    <br>
    <div class="InsertForm">
        <h1 id="AddProductHeading">Add a New Product</h1>
        <hr>
        <div id="form" >
            <form action="createProduct.php" method="POST">
             <div class="center">
                <label for="product_name"><h3>Product Name: </h3></label>
                <input id="product_name" type="text" name="productName" style="margin-left: 2%; margin-right: 15%;">

                <label for="product_brand"><h3>Product Brand: </h3></label>
                <input id="product_brand" type="text" name="productBrand" style="margin-left: 2%;">

                <Br>

                <label for="product_description"><h3>Product Description: </h3></label>
                <br>
                <textarea name="productDescription" id=product_description"" cols="120" rows="7"></textarea>
                <!-- <input id="product_description" type="text" name="productDescription" width="80%"> -->
             </div>
             <div class="center">
                <label for="product_type"><h3>Product Type: </h3></label>
                <input id="product_type" type="text" name="productType" style="margin-left: 2%; margin-right: 15%;">

                <label for="product_price"><h3>Product Price: </h3></label>
                <input id="product_price" type="text" name="productPrice" style="margin-left: 2%;">

                <br>

                <label for="product_stock"><h3>Stock Qty: </h3></label>
                <input id="product_stock" type="number" name="productStock" style="margin-left: 6.5%; margin-right: 13.5%;">

                <label for="product_image"><h3>Product Image: </h3></label>
                <input id="product_image" type="text" name="productImage" style="margin-left: 2%;">
             </div>
             <div id="submitDiv">
                    <input id="submit_btn" class="btn" name="submit" type="submit" value="SUBMIT">
             </div>
            </form>
        </div>
    </div>

    <div class="productView">
        <h1 id="productViewID">View and Remove Products</h1>
        <hr>
        <div class="productContainer">

            <?php
                $connect = mysqli_connect("localhost", "root", "", "assignment");



                $query = "SELECT * FROM products";

                echo '<table>
                        <tr>
                            <td>Product ID</td>
                            <td>Product Name</td>
                            <td>Product Desc</td>
                            <td>Product Brand</td>
                            <td>Product Type</td>
                            <td>Product Price</td>
                            <td>Product Stock</td>
                        </tr>';

                if($result = $connect->query($query)){
                    while($row = $result->fetch_assoc()){
                        $productID = $row["product_id"];
                        $productName = $row["product_name"];
                        $productDesc = $row["product_description"];
                        $productBrand = $row["product_brand"];
                        $productType = $row["product_type"];
                        $productPrice = $row["product_price"];
                        $productStock = $row["product_stock"];

                        echo '<tr>
                                <td>'.$productID.'</td>
                                <td>'.$productName.'</td>
                                <td>'.$productDesc.'</td>
                                <td>'.$productBrand.'</td>
                                <td>'.$productType.'</td>
                                <td>'.$productPrice.'</td>
                                <td>'.$productStock.'</td> 
                                <td><a href=deleteProduct.php?id='.$row['product_id'].'>Delete</a></td>
                            </tr>';

                    }
                    $result->free();
                    
                    echo '</table>';
                }
                
            ?>
        </div>
    </div>

    <!--Footer-->
	<div class="footer" style="margin-top: 25%;">
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