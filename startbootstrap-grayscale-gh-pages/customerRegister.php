<?php
	include_once 'connector.php';
	session_start();
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

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
	
	
	<!--start session-->
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
              <a class="nav-link js-scroll-trigger" href="test.php">Admin</a>
            </li>

            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#signup">Contact</a>
            </li>

          </ul>
        </div>
      </div>
    </nav>


<?php
	try{
		$sql = "INSERT INTO CUSTOMER (firstName,lastName,email,mobileNo,address,streetName,city,postalCode,country,password) VALUES(:firstName,:lastName,:email,:mobileNo,:address,:streetName,:city,:postalCode,:country,:password)";
        $result = $pdo->prepare($sql);
		$result->bindValue(':firstName', $_POST['firstname']); 
		$result->bindValue(':lastName', $_POST['lastname']); 
		$result->bindValue(':email', $_POST['email']); 
		$result->bindValue(':mobileNo', $_POST['mobileNo']); 
		$result->bindValue(':address', $_POST['address']); 
		$result->bindValue(':streetName', $_POST['street']); 
		$result->bindValue(':city', $_POST['city']); 
		$result->bindValue(':postalCode', $_POST['postal']); 
		$result->bindValue(':country', $_POST['country']); 
		$result->bindValue(':password', $_POST['psw']); 
		$result->execute();
		
		//set the current session user to registered user
		$sql = 'SELECT * FROM customer WHERE email =:email';
		$result=$pdo->prepare($sql);
		$result->bindValue(':email', $_POST['email']); 
		$result->execute();
		while($row = $result->fetch()){
			$_SESSION['custid'] = $row['custId'];
		}
		$firstName = $_POST['firstname'];
		echo "Hi ".$firstName . " Thank for registering with us<br> 
			 Click the link here to back to shop page <a href='shop.html'>Back to shop</a>";
        $result->execute();
		
	}
	catch (PDOException $e) { 
		$title = 'An error has occurred';
		echo $title;
		$output = 'Database error: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
		echo $output;
	} 
?>