<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="leon" content="">

    <title>Minimalist</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/grayscale.min.css" rel="stylesheet">

<?php
		session_start();
		include_once 'connector.php';
	?>
	
	<style>
	 	/* Dropdown Button */
.dropbtn {
  border: none;
  background-color:rgba(0,0,0,0);
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd;}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {display: block;} 
	
	</style>

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light row bg-dark col-sm-12 mb-5" id="mainNav">
      <div class="container mx-auto">
        <a class="navbar-brand js-scroll-trigger" href="index.php">MINIMALIST</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="index.php#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="index.php#projects">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger active" href="shop.php">Shop</a>
            </li>

             <?php
			//if user already login
				if(isset($_SESSION['custid'])){
					echo '<li class="nav-item">
							<div class="dropdown">
								<button class="dropbtn nav-link js-scroll-trigger">User</button>
									<div class="dropdown-content">
										<a href="logout.php">Log Out</a>
										<a href="checkStatus.php">Check Order Status</a>
										<a href="changeDetails.php">Change Details</a>
									</div>
							</div>
						</li>';
				}
			//no user is login
				else{
					
					echo '<li class="nav-item">
							<a class="nav-link js-scroll-trigger" href="login.php">Login</a>
						  </li>'; 
				}
			?>

            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="adminPage.php">Admin</a>
            </li>

            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="index.php#signup">Contact</a>
            </li>
			
			<?php
			//if an item is in cart
				if(isset($_SESSION['itemId'])){
					echo '<li class="nav-item">
							  <a class="nav-link js-scroll-trigger" href="cart.php">Check Out</a>
						</li>';
				}
			 ?>

          </ul>
        </div>
      </div>
    </nav>
	
	<!--Shop Section -->
	<section id="shop">
		<div class="container mb-5">

  <!-- Page Heading -->
  <h1 class="my-4">Products Page
  </h1>

  <div class="row">
    <div class="col-lg-4 col-sm-6 mb-4">
      <div class="card h-100">
        <a href="shop_boost.php"><img class="card-img-top" src="img/ultraboost/1.webp" alt="Ultraboost" ></a>
        <div class="card-body text-center">
          <h4 class="card-title">
            <a href="shop_boost.php">Adidas Ultraboost</a>
          </h4>
          <p class="card-text">€
		  <?php
			$sql="SELECT price FROM ITEM WHERE itemName LIKE '%ultraboost%'";
			$result = $pdo->query($sql);
			while ($row = $result->fetch()) { 
				 echo $row['price'];
			} 
		?>
		  </p>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-sm-6 mb-4">
      <div class="card h-100">
        <a href="shop_common.php"><img class="card-img-top" src="img/common/1.jfif" alt="Common Projects" ></a>
        <div class="card-body text-center">
          <h4 class="card-title">
            <a href="shop_common.php">Common Projects</a>
          </h4>
          <p class="card-text">€
		  <?php
			$sql="SELECT price FROM ITEM WHERE itemName LIKE '%common%'";
			$result = $pdo->query($sql);
			while ($row = $result->fetch()) { 
				 echo $row['price'];
			} 
		?>
		  </p>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-sm-6 mb-4">
      <div class="card h-100">
        <a href="shop_converse.php"><img class="card-img-top" src="img/converse/1.webp" alt="Converse" height="348px" width="348px"></a>
        <div class="card-body text-center">
          <h4 class="card-title">
            <a href="shop_converse.php">Converse</a>
          </h4>
          <p class="card-text">€
		  <?php
			$sql="SELECT price FROM ITEM WHERE itemName LIKE '%converse%'";
			$result = $pdo->query($sql);
			while ($row = $result->fetch()) { 
				 echo $row['price'];
			} 
		  ?></p>
        </div>
      </div>
    </div>

	</section>