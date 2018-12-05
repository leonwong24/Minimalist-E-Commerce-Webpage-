<!--include connector php-->
	<?php
		include_once 'connector.php';
		include 'functions.php';
	?>


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
		
	  </head>
	  
	  <body>
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
              <a class="nav-link js-scroll-trigger active" href="shop.html">Shop</a>
            </li>

            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="login.php">Login</a>
            </li>

            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="admin.html">Admin</a>
            </li>

            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#signup">Contact</a>
            </li>

          </ul>
        </div>
      </div>
    </nav>
	
	<!-- Button to open the modal login form -->
	<button onclick="document.getElementById('login-modal').style.display='block'">Check Stock</button>
	<!-- Button to open the modal signup form -->
	<button onclick="document.getElementById('signup-modal').style.display='block'">Add Stock</button>
	  
	  <form method="POST" action="" name="checkStock">
			<label for="productName"><b>Product Name:</b></label>
			<select name="productName">
				<option value="*" selected = "selected">All</option>
				<option value="3">Ultraboost</option>
				<option value="2">Common Project</option>
				<option value="1">Converse</option>
			</select>
			<br>
			<input type="submit" value="Submit Check Stock" name="checkStockSubmit">
	  </form>
	  
	  <?php
		if(isset($_POST['checkStockSubmit'])){
			displayCheckStockTable();
		}
	  ?>
		
		
		
	  </body>
	  