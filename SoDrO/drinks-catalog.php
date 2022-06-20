<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drinks Catalog</title>
    <link rel="stylesheet" href="./assets/css/header.css">
    <link rel="stylesheet" href="./assets/css/footer.css">
    <link rel="stylesheet" href="css/drinks-catalog.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css?family=Inter" rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="./javascriptFiles/support.js"></script>
  </head>
  <body>
    <?php require("database_con.php");?>
    <?php
      if(isset($_GET['search'])) {
        /*pentru a lua doar primele 400 caractere din descriere*/
        $sql = "SELECT id, name, size, brand, category, LEFT (ingredients, 400) AS ingredients, allergens, calories, fat, carbs, sugar, fiber, protein, salt,
        food_group, nutrigrade, link FROM products WHERE lower(name) LIKE '%" .$_GET['search'] . "%' OR lower(category) LIKE '%" .$_GET['search'] . "%' OR lower(food_group) LIKE '%" .$_GET['search'] .
        "%' OR lower(brand) LIKE '%" .$_GET['search'] . "%'";

        $result = mysqli_query($conn, $sql);
        $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
      }
      else {

        $sql = 'SELECT id, name, size, brand, category, LEFT (ingredients, 400) AS ingredients, allergens, calories, fat, carbs, sugar, fiber protein, salt,
        food_group, nutrigrade, link FROM products ORDER BY id DESC';

        $result = mysqli_query($conn, $sql);
        $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
        shuffle($products);
      }
     ?>
    <?php include "./includes/filters.inc.php" ?>
    <?php include "./assets/header.php" ?>
    <div class="middle-container">
    <h1>Drinks Catalog</h1>
    <div class="search-bar">
      <form class="search-bar" action="drinks-catalog.php" method="GET">
        <input type="text" name="search" placeholder="Search...">
        <button type="submit"  class="btn" >⌕</button>
        <!--TODO --><a class="btn-1" style="float:left; line-height: 40px; margin-left: -70px; margin-top: 5px; background: lightblue; padding: 10px; border-radius:20px;">Filters</a>
      </form>
    </div>
      <div class="categories">
        <div class="category"><a style="all: inherit; cursor: pointer;"href="drinks-catalog.php?category=carbonated-drink">
          <img src="images/categories/carbonated-drink.png" alt="carbonated-drink-img">
          <p>Carbonated Drinks</p>
        </a></div>
        <div class="category"><a style="all: inherit; cursor: pointer;"href="drinks-catalog.php?category=non-carbonated-drink">
          <img src="images/categories/non-carbonated-drink.png" alt="non-carbonated-drink-img">
          <p>Non-carbonated</p>
        </a></div>
        <div class="category"><a style="all: inherit; cursor: pointer;"href="drinks-catalog.php?category=coffee">
          <img src="images/categories/coffee.png" alt="coffee-img">
          <p style="line-height:5px;">Coffee Drinks</p>
        </a></div>
        <div class="category"><a style="all: inherit; cursor: pointer;"href="drinks-catalog.php?category=tea">
          <img src="images/categories/tea.png" alt="tea-img">
          <p style="line-height: 10px">Tea</p>
        </a></div>
        <div class="category"><a style="all: inherit; cursor: pointer;"href="drinks-catalog.php?category=plant-milk">
          <img src="images/categories/plant-milk.png" alt="plant-img">
          <p style="line-height: 5px;">Plant dairy</p>
        </a></div>
        <div class="category"><a style="all: inherit; cursor: pointer;"href="drinks-catalog.php?category=energy-drink">
          <img src="images/categories/energy-drink.png" alt="energy-img">
          <p>Energy Drink</p>
        </a></div>
        <div class="category"><a style="all: inherit; cursor: pointer;"href="drinks-catalog.php?category=non-alcoholic-beer">
          <img src="images/categories/non-alcoholic-beer.png" alt="non-alcohol-img">
          <p>Non Alcoholic</p>
        </a></div>
        <div class="category"><a style="all: inherit; cursor: pointer;"href="drinks-catalog.php?category=milk">
          <img src="images/categories/milk.png" alt="milk-img">
          <p>Animal dairy</p>
        </a></div>
        <div class="category"><a style="all: inherit; cursor: pointer;"href="drinks-catalog.php?category=water">
          <img src="images/categories/waters.png" alt="water-img">
          <p>Waters</p>
        </a></div>
      </div>

    <?php if(empty($products)): ?>
      <h2 class="idk momentan" style="color: #FF7426; margin-top: 100px;">no such drink yet...</h2>
      <a href="contact-us.php#newsletterHref"<p style="color: #FF7426; margin-bottom: 100px;">You can still subscribe to our newsletter to get the latest news about our page.</p></a>
    <?php endif; ?>

    <?php foreach($products as $item): ?>
      <a style="all: unset; cursor: pointer;"href="product-page.php?id=<?php echo $item['id'] ?>">
      <div class="product-card">
        <div class="column">
          <img src="images/products/<?php echo $item['id'] ?>.png" alt="drink-image">
        </div>
        <div class="column">
          <h2><?php echo $item['name'] . ' - ' . $item['size']; ?></h2>
          <p><?php echo $item['ingredients'] ?></p>
          <p style="font-style: italic;">Brand: <?php if($item['brand']=='') echo "-"; else echo $item['brand']; ?></p>
          <p style="font-style: italic; text-align: center;">Allergens: <?php if($item['allergens']=='') echo "-"; else echo $item['allergens']; ?></p>
          <img src="images/nutriscore/<?php if($item['nutrigrade']=='') echo 'non'; else echo $item['nutrigrade']; ?>.svg" alt="">
        </div>
      </div>
      </a>
    <?php endforeach; ?>
    </div>
    <?php include "./assets/footer.php" ?>
  </body>
</html>
