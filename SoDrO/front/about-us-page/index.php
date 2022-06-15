<?php 
	session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us</title>
  <link rel="stylesheet" href="css/about-us.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet'>
  <link href="https://fonts.googleapis.com/css?family=Inter" rel='stylesheet'>
</head>

<body>
  <header>
    <p class="logo">Soft<span style="color:#FF7426">Drinks</span>Organizer<span style="color:#FF7426">.</span></p>
    <nav>
      <ul class="nav-links">
        <li><a href="#">Home</a></li>
        <li><a class="active" href="">About</a></li>
        <li><a href="../contact-us-page/index.php">Contact</a></li>
      </ul>
    </nav>
    <?php
                if(isset($_SESSION["userId"]) ){
                  echo "<a class='login' href='../../back/phpFiles/logout.php'>Log Out</a>";
                  echo "<a class='login' href='../profile-page/index.php'>Profile</a>";
                }
                else{
                  echo " <a class='login' href='../login-page/index.php'>Login/Register</a> ";;
                }
                ?>
    <!-- <a class="login" href="../login-page/index.php">Login/Register</a> -->
  </header>

  <div class="middle-container">
    <h1>About us</h1>
    <p>SoftDrinksOrganizer is a helpful website for soft drink lovers. Here you can find drinks from soda to coffee, or
      if you prefer the healthier choices, smoothies.</p>
    <p>We are your digital encyclopedia on soft drinks.</p>
    <img src="images/soft-drinks-bar.jpg" alt="soft-drinks-bar">
    <div class="question">
      <h2>What is our site good for?</h2>
      <p class="answer">Soft Drinks Organizer is a web app that you can use to manage your preferences in soft drinks.
        You can discover a lot of great drinks sold on the entire globe. You can study their ingredients, nutritional
        values and if you really like them you can add to your shopping list. Based on your activity we will try to give
        you the best recommendation.</p>
      <p class="answer">Don't hesitate to contact us if you have a problem with the website, or a suggestion.</p>
    </div>

    <div class="question">
      <h2>Who is the team?</h2>
      <p class="answer">We are three students in second year working for a project at Web Technology. Our name is
        Tabalae Ioan-Sebastian, Balteanu Andrei and Iordache Alexandru. We are new to web development but we hope this
        website achieves his initial purpose. </p>
    </div>

  </div>
  <div class="bottom-container">
    <div>
      <p class="logo">Soft<span style="color:#FF7426">Drinks</span>Organizer<span style="color:#FF7426">.</span></p>
      <p class="logo-description">Best place to find the drinks you want.</p>
    </div>
    <ul class="bottom-links">
      <li><a href="../contact-us-page/index.html">Contact</a></li>
      <li><a href="#top">About Us</a></li>
    </ul>
  </div>
  <footer>
    <ul>
      <li><a href="https://www.instagram.com/">Instagram</a></li>
      <li><a href="https://www.facebook.com/">Facebook</a></li>
    </ul>
    <a class="copyright">© 2022 Soft Drinks Organizer(SoDrO)</a>
  </footer>
</body>

</html>