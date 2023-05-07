<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>replit</title>
  <link href="faq.css" rel="stylesheet" type="text/css" />

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Anton">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <title>FAQ's</title>

  <style>
    a {
      decoration: none;
    }
  </style>


<body>

  <div class="header">
    <div class="container">
      <div class="navbar">
        <div class="logo">
          <img src="images/logo.png" width="100px">
        </div>

        <nav>
          <ul id="MenuItems">
            <li><a href="index.php" class="ATag">Home</a> </li>
            <li><a href="products.php" class="ATag">Products</a></li>
            <li><a href="contact.php" class="ATag">Contact</a></li>
            <li><a href="about.php" class="ATag">About</a></li>
            <li><a href="faq.php" class="ATag">FAQs</a></li>
            <li><a href="reviews.php" class="ATag">Reviews</a></li>
            <li><a href="basket.php" class="ATag">Basket</a></li>
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
    </div>
  </div>

  <section class="intro ATag">

    <H1>FAQ's</H1>

    <p>This is the questions that are frequently asked to us, if you cannot find an answer to you queries please
      submit a question in the form below. </p>



  </section>




  <section class="container">

    <section class="accord-wrap ">

      <div id="accordion">

        <div class="card">
          <div class="card-header " colors="btn-primary">
            <a class="card-link ATag" data-toggle="collapse" href="#collapseOne">
              Do you have a phone number?
            </a>
          </div>
          <div id="collapseOne" class="collapse show" data-parent="#accordion">
            <div class="card-body ATag">
              Yes, We have a contact number and also a contact email located on the <a href="contact.html"> contact us
                page </a>
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-header" colors="btn-primary">
            <a class="collapsed card-link ATag" data-toggle="collapse" href="#collapseTwo">
              Where is my order?
            </a>
          </div>
          <div id="collapseTwo" class="collapse" data-parent="#accordion">
            <div class="card-body ATag">
              Please allow time for your order to arrive it usually take from 3-7 business days, if it takes any longer
              please send us an email using the form below or on the <a href="contact.html"> contact us page.</a>
            </div>
          </div>



          <div class="card">
            <div class="card-header" colors="btn-primary">
              <a class="collapsed card-link ATag" data-toggle="collapse" href="#collapseThree">
                Do you have reviews on products?
              </a>
            </div>
            <div id="collapseThree" class="collapse" data-parent="#accordion">
              <div class="card-body ATag">
                Yes, you can find previous reviews from other customers on the<a href="reviews.html"> reviews page.</a>
              </div>
            </div>
          </div>



        </div>
    </section>

  </section>


  <br>
  <br>
  <br>


  <section class="container">

    <section class="quest-Form ATag">

      <div class="faqForm-title ATag">

        <h1>Any other questions, submit below.</h1>

      </div>


      <form style="text-align: center;">

        <div class="quest-ans" style="text-align: center;">

          <p><span class="faq-des"> 1: Name: </span>


          </p>

          <p><span style="text-align: center;"><input id="FaqName" type="text" name="FaqName" placeholder="Name"
                required></span>

          </p>

        </div>

        <hr>
        <br>

        <div class="quest-ans" style="text-align: center;">

          <p><span class="faq-des"> 2: Email: </span>


          </p>

          <p>
            <span style="text-align: center;"><input id="FaqName" type="email" name="FaqEmail" placeholder="Email"
                required></span>

          </p>

        </div>

        <hr>
        <br>

        <div class="quest-ans" style="text-align: center;">

          <p class="faq-des
            ">3: Enter question below (Max characters is 400):</p>
          <textarea id="textAreaFAQ" name="comments" placeholder="Question..." maxlength="400" required></textarea>

        </div>


        <hr>

        <section class="submitReg " style="text-align: center; font-weight: bold;">
          <input type="submit" class="btn-FAQ" name="Btn_FAQ">
        </section>


        <br>

      </form>

    </section>

  </section>


  <!--Footer-->
  <div class="footer">
    <div class="container">
      <div class="row">
        <div class="footer-col-3 ATag">
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