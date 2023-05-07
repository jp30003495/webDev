<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Shoe Store - Contact</title>
  <link href="style.css" rel="stylesheet" type="text/css" />
  <link href="contact.css" rel="stylesheet" type="text/css" />
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
    </div>
  </div>


  <div class="container">
    <h1>Connect With Us</h1>
    <p>We would love to respond to your queries and help you succeed. <br> Feel free to get in touch with us.</p>

    <div class="contact-box">

      <div class="contact-left">

        <h3>Send your request.</h3>
        <form action="createContact.php" method="POST">

          <div class="input-row">

            <div class="input-group">

              <label for="contact_name">Name</label>
              <input id="contact_name" type="text" name="contactName" placeholder="Odhrán Doherty">

            </div>

            <div class="input-group">

              <label for="contact_number">Phone</label>
              <input id="contact_number" type="text" name="contactNumber" placeholder="02870123210">

            </div>

          </div>


          <div class="input-row">

            <div class="input-group">

              <label for="contact_email">Email</label>
              <input id="contact_email" type="email" name="contactEmail" placeholder="TheShoeShop@gmail.com">

            </div>

            <div class="input-group">

              <label for="contact_subject">Subject</label>
              <input id="contact_subject" type="text" name="contactSubject" placeholder="Size Restock">

            </div>

          </div>

          <label for="message_contents">Message</label>
          <!-- <textarea rows="5" id="message_contents" name="messageContents" placeholder="Your Message..."></textarea> -->
          <textarea name="messageContents" id=message_contents"" cols="120" rows="7"></textarea>


          <!-- <button type="submit">Send</button> -->

          <div id="submitDiv">
            <input id="submit_btn" class="btn" name="submit" type="submit" value="SUBMIT">
          </div>

        </form>

      </div>

      <div class="contact-right">

        <h3>Reach Us.</h3>

        <table>

          <tr>

            <td>Email:</td>
            <td>TheShoeShop@gmail.com</td>

          </tr>

          <tr>

            <td>Phone:</td>
            <td>02870123210</td>

          </tr>

        </table>


        <h1 style="color: #d03156;text-align: center; padding: 10px; ">Headquarters location</h1>

        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d73218.77405327016!2d-7.3816849039012595!3d55.006645438176584!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x485fdde434d09363%3A0xbd21fa2ac755f32f!2sDerry%2C%20Londonderry!5e0!3m2!1sen!2suk!4v1682429640678!5m2!1sen!2suk"
          width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"></iframe>


      </div>

    </div>

  </div>

  <br>

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