<!--connect file-->
<!--connect file-->
<?php
include('./includes/connect.php');
include('./functions/common_function.php');
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E Commerce Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" 
    integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <style>
      body{
        overflow-x:hidden;
      }
    </style>

</head>
  <body>
    <!---navbar-->
    <div class="container-fluid p-0">
<!--first Child-->
  <nav class="navbar navbar-expand-lg navbar-light bg-info fixed-top ">
  <div class="container-fluid">
  
    <img src="./images/giphy.gif" alt="cart Image" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto   my-2 mb-lg-0">
      <li class="<?php echo basename($_SERVER['PHP_SELF'])=='index.php'?'active':'';?>">
          <a class="nav-link" aria-current="page" href="index.php">
            <i class="fa-solid fa-house-user"></i>Home</a>
        </li>

        
        <li class="<?php echo basename($_SERVER['PHP_SELF'])=='display_all.php'?'active':'';?>">
          <a class="nav-link" href="display_all.php"><i class="fa-brands fa-product-hunt">
          </i>Product</a>
         
                 
        <li class="<?php echo basename($_SERVER['PHP_SELF'])=='./users_area/contact.php'?'active':'';?>">
          <a class="nav-link" href="./users_area/contact.php"><i class="fa-solid fa-id-badge">
          </i>Contact</a>
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

<!-- calling cart function-->
<?php
cart();
?>
<!--second child-->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary ">
  <div class=" navbar-nav me-auto">
        <?php
         if(!isset($_SESSION['username'])){
          echo "<li class='nav-item'>
          <a class='nav-link' href=''>Welcome Guest</a>
        </li>";
        }
        else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='./users_area/profile.php'>Your Info ". $_SESSION['username']."</a>
          
        </li>";
        }


    
        ?>
      </div>
      
</nav> 

<!--third child-->
<div class="bg-light">
<p class="text-center text-dark" style="font-size:20px;font-weight:bold;">Smart POS Software</p>
    <p class="text-center">Communication is at the heart of e-commerce and community</p>
    </div>
    <?php
        if(isset($_GET['brand_view'])){
    $category_id=$_GET['brand_view'];
    $select_query="Select * from `products` where category_id=$category_id";
    $result_query=mysqli_query($con,$select_query);
    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows==0){
      echo "<h2 class='text-center text-danger'>NO Stock for this category</h2>";
    }
   // $row=mysqli_fetch_assoc($result_query);
    while( $row=mysqli_fetch_assoc($result_query)){
      $product_id=$row['product_id'];
      $product_title=$row['product_title'];
      $product_description=$row['product_description'];
      $product_image1=$row['product_image1'];
      $product_price=$row['product_price'];
      $category_id=$row['category_id'];
      $brand_id=$row['brand_id'];
      echo "<div class='col-md-4 mb-2'>
      <div class='card' >
<img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
<div class='card-body'>
<h5 class='card-title'>$product_title</h5>
<p class='card-text'>$product_description</p>
<p class='card-text'>Price : $product_price /-</p>
<a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
<a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
</div>
</div>
      </div>";
    }
        }
    ?>
    
<!--footer-->
<!--include footer-->

<?php include('./includes/footer.php') ?>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>



