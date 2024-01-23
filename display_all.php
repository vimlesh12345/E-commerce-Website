<!--index.php code-->
<!--connect file-->

<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>All Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" 
    integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">

</head>
  <body>
    <!---navbar-->
    <div class="container-fluid p-0">
<!--first Child-->
  <nav class="navbar navbar-expand-lg navbar-light bg-info fixed-top">
  <div class="container-fluid">
  
    <img src="./images/giphy.gif" alt="cart Image" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php"><i class="fa-solid fa-house-user"></i>Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php"><i class="fa-brands fa-product-hunt"></i>Product</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./users_area/user_registration.php"><i class="fa-solid fa-id-card"></i>Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./users_area/contact.php"><i class="fa-solid fa-id-badge"></i>Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-sharp fa-solid fa-cart-plus"></i> <sub>1</sub> Cart</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fa-solid fa-tag"></i>Total Price: <?php
          total_cart_price();?> /-</a>
        </li>
        
      </ul>
      <form class="d-flex" action="search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" 
        name="search_data">
        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
      </form>
    </div>
  </div>
</nav>
<hr>
<hr>
<hr>
<!--second child-->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
  <ul class="navbar-nav me-auto">
   
        <?php
        if(!isset($_SESSION['username'])){
          echo "<li class='nav-item'>
          <a class='nav-link' href='#'>Welcome Guest</a>
        </li>";
        }
        else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='#'>Welcome ". $_SESSION['username']."</a>
        </li>";
        }
        if(!isset($_SESSION['username'])){
          echo "<li class='nav-item'>
          <a class='nav-link' href='./users_area/user_login.php'>Login</a>
        </li>";
        }
        else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='./users_area/logout.php'>Logout</a>
        </li>";
        }
        ?>
  </ul>
</nav> 
<!--third child-->
<div class="bg-light">
<p class="text-center text-dark" style="font-size:25px;font-weight:bold;">Smart Market</p>
    <p class="text-center">Communication is at the heart of e-commerce and community</p>
    </div>
    <!--forth child-->
    <div class="row">
      <div class="col-md-10">
        <!--product-->
        <div class="row px-3">
          <!--fechting products-->
          <?php
         get_all_products();
          get_unique_categories();
          get_unique_brands();
          ?>
          <!--row end-->

        </div>
        <!--column end-->
      </div>




      <div class="col-md-2 bg-secondary p-0">
        <!--Brand to dispaly-->
        <ul class="navbar-nav me-auto text-center">
          <li class="nav-item bg-info">
            <a href="" class="nav-link text-light"><h4>Delivary Brand</h4></a>
          </li>
         <?php
         getbrands();
         ?>


          
        </ul>
        <!--Catagary to be dispaly-->
        <ul class="navbar-nav me-auto text-center">
          <li class="nav-item bg-info">
            <a href="" class="nav-link text-light"><h4>Categoties</h4></a>
          </li>
          <?php
        getcategories();
         ?>
        </ul>
        
      </div>
    </div>
    
<!--footer-->
<?php include('./includes/footer.php'); ?>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>