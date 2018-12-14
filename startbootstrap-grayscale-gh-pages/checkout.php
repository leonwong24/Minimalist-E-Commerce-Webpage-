<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Minimalist</title>
	


<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/grayscale.min.css" rel="stylesheet">
<!------ Include the above in your HEAD tag ---------->

<!-- this is taken from https://bootsnipp.com/snippets/q8k0N -->

<?php
	session_start();
	include 'functions.php';
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
<!--CREDIT CART PAYMENT-->
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
				if(isset($_SESSION['itemid'])){
					echo '<li class="nav-item">
							  <a class="nav-link js-scroll-trigger" href="cart.php">Check Out</a>
							</li>';
				}
			 ?>

          </ul>
        </div>
      </div>
    </nav>
<!--end of navigation-->

<div class="panel panel-info" style="margin:0 20%;">
    <div class="panel-heading"><span><i class="glyphicon glyphicon-lock"></i></span> Secure Payment</div>
    <div class="panel-body">
	<form name="checkoutForm" action="" method="post"> <!---start of form--->
        <div class="form-group">
            <div class="col-md-12"><strong>Credit Card Number:</strong></div>
            <div class="col-md-12"><input type="text" class="form-control" name="card_number" value="" maxlength="16"/></div>
        </div>
        <div class="form-group">
            <div class="col-md-12"><strong>Card CVV:</strong></div>
            <div class="col-md-12"><input type="text" class="form-control" name="card_code" value="" maxlength="3"/></div>
        </div>
        <div class="form-group">
            <div class="col-md-12">
                <strong>Expiration Date</strong>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <select class="form-control" name="expire_month">
                    <option value="">Month</option>
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
                    <option value="09">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
            </select>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <select class="form-control" name="expire_year">
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
            </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12 col-sm-12 col-xs-12" style="text-align:center; margin-top:5%;">
                <input type="submit" class="btn btn-primary btn-submit-fix" name="placeOrder" value="Place Order">
            </div>
        </div>
	</form> <!----end of form--->
    </div>
</div>

<div class="thank-ms-box">



</div>
  <!--CREDIT CART PAYMENT END-->
					
<!--- reduce the itemstock in database---->
<?php
if(isset($_POST['placeOrder'])){
	//bind value into variables
		//get quantity
		$quantity = $_SESSION['quantity'];
		//get itemid
		$itemId = $_SESSION['itemId'];
		//get size
		$size = $_SESSION['size'];
		
		//get the quantity of selected shoe before reducing the stock quantity
		$sql  = "SELECT * from itemstock WHERE itemid=$itemId AND size= $size";
		$result=$pdo->prepare($sql);
		$result->execute();
		while($row = $result->fetch()){
			$quantiyBefore = $row['quantity'];
		}
		
		$quantityUpdated = ($quantiyBefore - $quantity);
		//update the quantity in itemstock
		$sql ="UPDATE itemstock SET quantity = $quantityUpdated WHERE itemid = $itemId and size = $size";
		$result=$pdo->prepare($sql);
		$result->execute();
}




?>					
					
					
<!----process payment and orderand save into database---->
<?php
if(isset($_POST['placeOrder'])){
	/*//$sql for payments
	$sql='INSERT INTO payments(accno,secno,exmonth,exyear) VALUES(:accno,:secno,:exmonth,:year)';
	$result=$pdo->prepare($sql);
	$result->bindValue(':accno',$_POST['card_number']);
	$result->bindValue(':secno',$_POST['card_code']);
	$result->bindValue(':exmonth',$_POST['expire_month']);
	$result->bindValue(':year',$_POST['expire_year']);
	$result->execute();*/ //not needed anymore
	
	//bind value into variables
		//get quantity
		(double)$quantity = $_SESSION['quantity'];
		//get price
		(double)$price = getProductPrice();
		//get custid
		$custId = $_SESSION['custid'];
		//get itemid
		$itemId = $_SESSION['itemId'];
		//get size
		$size = $_SESSION['size'];
		//get price
		$total = getTotalPrice($price ,$quantity);
		
	//sql for putting orders
	$sql="INSERT INTO orders(custid,orderdate,totalPrice,itemId,size,quantity) VALUES(:custId,CURDATE(),:total,:itemId,:size,:quantity)";
	$result=$pdo->prepare($sql);
	$result->bindValue(':custId',$custId);
	$result->bindValue(':total',$total);
	$result->bindValue(':itemId',$itemId);
	$result->bindValue(':size',$size);
	$result->bindValue(':quantity',$quantity);
	$result->execute();
	
	echo 'You just placed an order. Thanks for buying with us.<br>
	     <a href="index.php">Click here</a> to go back to homepage.<br>
		 <a href="test.php">Click here</a>to check your order status';;
		 
	//unset cart variables
	unset($_SESSION['itemId']);
	unset($_SESSION['quantity']);
	unset($_SESSION['size']);
}


?>
					