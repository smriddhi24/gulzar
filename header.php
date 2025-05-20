<?php
session_start()
?>
<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <link rel="icon" href="images/favicon.png" type="image/gif" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Gulzar Jewellers</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

  <!-- header section strats -->
  <header class="header_section innerpage_header">
    <div class="container-fluid">
      <nav class="navbar navbar-expand-lg custom_nav-container">
        <a class="navbar-brand" href="index.php">
          <span><h1> Gulzar Jewellers</h1>
          </span>
        </a>
        
        <div class="" id="">

          <div class="custom_menu-btn">
            
            <button onclick="openNav()">
              <span class="s-1"> </span>
              <span class="s-2"> </span>
              <span class="s-3"> </span>
            </button>
            
            <div id="myNav" class="overlay">
              <div class="overlay-content">
                <ul>
                
              <li><a href="index.php">Home</a></li>
               <li> <a href="about.php">About</a></li>
                <li><a href="usercategory.php">Shop By Category</a>
              <li><a href="userproduct.php">Jewellery</a></li>
              <li><a href="contact.php">Contact</a></li>
              <?php
                if(isset($_SESSION["email"])){
                $query_cart_item="SELECT count(id) as items from `cart` where `email`='$_SESSION[email]'";
                include("config.php");
                $result_cart_item=mysqli_query($connect,$query_cart_item);
                $data_item=mysqli_fetch_array($result_cart_item);
                ?>
                <div class="cart">
                    <li><a href="cart.php"><i class="bi bi-shopping-cart" ></i> <span>Cart <span class="cart-quantity">(<?php echo $data_item['items']?>)</span></span></a></li>
                </div>
                
                <li><a href="userorder.php">Order</a></li>
                <li><a href="logout.php">Logout</a></li>
              <?php
              }else{
                ?>
                  <li><a href="userregister.php">Register</a></li>
                  <li><a href="userlogin.php">Login</a></li>
                <?php
            }
            ?>


            </ul>
              </div>
            </div>
          </div>

        </div>
      </nav>
    </div>
  </header>
