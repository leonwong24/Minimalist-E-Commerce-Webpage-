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
	<link href="css/dropdown.css" rel="stylesheet">
	
	<?php
		session_start();
		include_once 'connector.php';
		$custId=$_SESSION['custid'];
	?>
	
	<style>
	table ,th ,td{
		 border: 1px solid black;
	}
	</style>
	
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
	
	<h1>Check Status</h1>
	<form action="" method="post" name="custCheckStatus">
		<label for="status">Select Status</label>
		<select name="checkStatus">
			<option value="A" selected="selected">All</option>
			<option value="U">Pending delivery</option>
			<option value="D">Delivering</option>
			<option value="S">Delivered</option>
		</select>
		
		<input type="submit" value="checkStatusSubmit" name="checkStatusSubmit">
	</form>
	<?php
	if(isset($_POST['checkStatusSubmit'])){
		if($_POST['checkStatus'] =="A"){
			$sql="SELECT * FROM orders WHERE custid = $custId";
		}
		else{
			$sql="SELECT * FROM orders WHERE custid = $custId AND status =:status";
		}
		$result=$pdo->prepare($sql);
		$result->bindValue(':status',$_POST['checkStatus']);
		$result->execute();
		
		echo '<br><table width="auto">
					<tr>
						<th>Item Name</th>
						<th>Size</th>
						<th>Quantity</th>
						<th>Status></th>
						<th>Order Date</th>
					</tr>';
					
		while($row = $result->fetch()){
			$status = $row['status'];
			$itemId = $row['itemid'];
			
			if($status == 'U'){
				$statusToPrint = "Pending Delivery";
			}
			else if($status == 'D'){
				$statusToPrint ="Delivering";
			}
			else if($status == 'S'){
				$statusToPrint ="Delivered";
			}
			
			//get item name
			$sql="SELECT item.itemName FROM item INNER JOIN orders ON item.itemID = orders.itemid WHERE orders.itemid =:itemid";
			$result2=$pdo->prepare($sql);
			$result2->bindValue(':itemid',$itemId);
			$result2->execute();
			
			while($row2 = $result2->fetch()){
				$itemName = $row2['itemName'];
			}
			
			//echo the table
			echo "<tr>
					<td>".$itemName."</td><td>".$row['size']."</td><td>".$row['quantity']."</td><td>".$statusToPrint."</td><td>".$row['orderdate']."</td>
				 </tr>";
		}
		
		echo "</table>";
	}
	?>
	
	
	
	
	</body>
	
	
	
	
	</html>