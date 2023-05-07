<?php

session_start();
$connect = mysqli_connect("localhost", "root", "", "assignment");

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Shoe Store - Products</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link href="reviews.css" rel="stylesheet" type="text/css" />

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
                <h1>OUR REVIEWS</h1>
            </div>
            <div class="info">
                <p>View all of the reviews on our products</p>
                <p>Go on see for yourself!</p>
                <a href="contact.html" class="btn">Contact Us &#8594</a>
            </div>
        </div>
    </div>

    </div>

    <div class="center">
        <h2 class="subheading">Dont be shy, leave a review!</h2>
    </div>
   

   
    <div class="InsertForm">
                <h1 id="AddProductHeading">Review one of our products</h1>

                    <hr>

                <div id="form" >
                    <form action="createReview.php" method="POST">
                        <div class="center">

                            <label for="product_id"><h3>Product ID: </h3></label>
                            <input id="product_id" type="text" name="productID">
                           
                            <label for="review_rating"><h3>Review Rating: </h3></label>
                            <input id="review_rating" type="text" name="reviewRating">

                                <Br>

                            <label for="reviewDescription"><h3>Review Description: </h3></label>
                               
                                <br>

                            <textarea name="reviewDescription" id="review_description" cols="100" rows="5"></textarea>

                        </div>
                        <div id="submitDiv">
                            <input id="submit_btn" class="btn" name="submit" type="submit" value="SUBMIT">
                        </div>
                    </form>
                </div>
    </div>
    <!-- Reviews -->
    <div style="width: 100%;">
       
        <?php
                $query = "SELECT * FROM reviews ORDER BY review_id ASC";
                $result = mysqli_query($connect, $query);
                if(mysqli_num_rows($result) > 0)
                {
                    while($row = mysqli_fetch_array($result))
                    {
        ?>
                        <div class="" style="width:90%; margin-left: 5%;">

                                <div class="center" style="padding:16px; align-content: center; background-color: #f4b2c1; border-radius: 15px; border: solid; box-shadow: 3px 5px; margin-top: 2%;">
                                   
                                    <h5 class="text-body" style="text-align: left;">Review No.  
                                        <?php echo $row["review_id"]; ?>
                                    </h5>
                                    <h5 class="text-body" style="text-align: left; float: right; padding-right: 85%;">Rating:
                                        <?php echo $row["review_rating"]; ?>
                                     *</h5>
                                    <h5 class="text-body" style="text-align: left;">Product ID:
                                        <?php echo $row["product_id"]; ?>
                                    </h5>
                                    <br>
                                    <h5 class="text-body" style="text-align: left;">Review:
                                        <?php echo $row["review_description"]; ?>
                                    </h5>
                                    <br>
                                    <h5 class="text-body" style="text-align: left;">Submission Date:
                                        <?php echo $row["review_date"]; ?>
                                    </h5>
                                   
                </div>

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