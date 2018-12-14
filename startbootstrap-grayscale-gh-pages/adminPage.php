<!--include connector php-->
	<?php
		include_once 'connector.php';
		include 'functions.php';
		session_start();
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
		
		
		<style>
			/* Bordered form */
form {
    border: 3px solid #f1f1f1;
}

/* Full-width inputs */
input {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 10%;
	margin-right:10%;
	margin-left:20%;
}

/* Add a hover effect for buttons */
button:hover {
    opacity: 0.8;
}

/* Extra style for the cancel button (red) */
.cancelbtn {
    width: 10%;
    padding: 10px 18px;
    background-color: #f44336;

}


/* Avatar image */
img.avatar {
    width: 40%;
    border-radius: 50%;
}

/* Add padding to containers */
.container {
    padding: 16px;
		text-align:center;
}

/* The "Forgot password" text */
span.psw {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
        display: block;
        float: none;
    }
    .cancelbtn {
        width: 100%;
    }
}
	
		/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5%; /* 15% from the top and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.close {
    /* Position it in the top right corner outside of the modal */
    position: absolute;
    right: 25px;
    top: 0; 
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

/* Close button on hover */
.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}

@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

#result{
margin-left:40%;	
}


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
					echo '<li class="nav-item dropdown">
							<a class="nav-link js-scroll-trigger" href="logout.php">Log out</a>
						  </li>
							<li class="nav-item dropdown">
							<a class="nav-link js-scroll-trigger" href="checkStatus.php">Check Status</a>
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
	
	<!-- Button to open the modal check stock form -->
	<button onclick="document.getElementById('checkstock-modal').style.display='block'">Check Stock</button>
	<!-- Button to open the modal add stock form -->
	<button onclick="document.getElementById('addstock-modal').style.display='block'">Add Stock</button>
	<!-- Button to open the modal change order status form -->
	<button onclick="document.getElementById('changeStatus-modal').style.display='block'">Change Status</button>
	<!-- Button to open the modal delete item form -->
	<button onclick="document.getElementById('removeItem-modal').style.display='block'">Remove Item</button>
	  
	  
	<!-- check stock modal-->
	<div id ="checkstock-modal" class="modal">
	<span onclick="document.getElementById('checkstock-modal').style.display='none'" class="close" title="Close Modal">&times;</span> <!--Close button-->
	  <form method="POST" action="" name="checkStock" class="modal-content animate">
			<div class="container">
				<label for="productName"><b>Product Name:</b></label>
				<select name="productName">
					<option value="*" selected = "selected">All</option>
					<option value="3">Ultraboost</option>
					<option value="2">Common Project</option>
					<option value="1">Converse</option>
				</select>
				<br>
				<input type="submit" value="Submit Check Stock" name="checkStockSubmit">
			</div>
	  </form>
	</div>
	
	<!-- add stock modal-->
	<div id ="addstock-modal" class="modal">
	<span onclick="document.getElementById('addstock-modal').style.display='none'" class="close" title="Close Modal">&times;</span> <!--Close button-->
	  <form method="POST" action="" name="addStock" class="modal-content animate">
		<div class="container">		
			<label for="productName"><b>Product Name:</b></label> <!-- select product-->
				<select name="productName">
					<option value="3">Ultraboost</option>
					<option value="2">Common Project</option>
					<option value="1">Converse</option>
				</select>
				
				<label for="size"><b>Size:</b></label>
				<input type="number" step="0.5" min="6" max="12" value="Please input the size you want to restock" name="size"> <!-- shoe size-->
				
				<label for="qty"><b>Quantity:</b></label>
				<input type="number" step="1" min="1" value="Please input the quantity you want to restock" name="qty"> <!-- quantity -->
				
				
				<input type="submit" value="Submit Add Stock" name="addStockSubmit">
		</div>
		</form>
	</div>
	
	
	<!--change status modal -->
	<div id ="changeStatus-modal" class="modal">
	<span onclick="document.getElementById('changeStatus-modal').style.display='none'" class="close" title="Close Modal">&times;</span> <!--Close button-->
	  <form method="POST" action="" name="changeStatus" class="modal-content animate">
		<div class="container">		
			<label for="orderId"><b>Select Order ID:</b></label>
				<select name="orderId">
				<?php
				$sql="SELECT * FROM Orders";
				$result = $pdo->query($sql);
				while ($row = $result->fetch()) { 
					echo '<option value ="'.$row['orderid'].'">'.$row['orderid'].'</option>';
				}
				?>
				</select>
				
				<input value="Submit" name="changeStatusSubmit" type="submit">
		</div>
		</form>
	</div>
	
	<!--show remove item modal -->
	<div id ="removeItem-modal" class="modal">
	<span onclick="document.getElementById('removeItem-modal').style.display='none'" class="close" title="Close Modal">&times;</span> <!--Close button-->
	  <form method="POST" action="" name="removeItem" class="modal-content animate">
		<div class="container">
			<label for="itemid"></b>Select Item:</b></label>
			<select name="itemid">
					<?php
						$sql="SELECT itemName,itemid FROM item";
						$result = $pdo->query($sql);
						while ($row = $result->fetch()) { 
							echo '<option value ="'.$row['itemid'].'">'.$row['itemName'].'</option>';
						}
					?>
			</select>
			<input type="submit" name="showItemToDelete" value="showItemToDelete">
		</div>
	  </form>
	 </div>
	 
	 
	<div id="result">
		<?php
			if(isset($_POST['checkStockSubmit'])){
				displayCheckStockTable();
			}
			
			else if(isset($_POST['addStockSubmit'])){
				addStockMessage();
			}
			
			else if(isset($_POST['changeStatusSubmit'])){
				changeStatus();
			}
			
			else if(isset($_POST['showItemToDelete'])){
				deleteItem();
			}
			
			
			if(isset($_POST['changeStatusTextSubmit'])){
				$sql="UPDATE orders SET status = :status WHERE orderid = :orderid";
				$result=$pdo->prepare($sql);
				$result->bindValue(':status',$_POST['statusSubmit']);
				$result->bindValue(':orderid',$_POST['orderIdInput']);
				$result->execute();
				
				echo "You just update the order status of ".$_POST['orderIdInput'];
			}
			
			if(isset($_POST['deleteItemRowSubmit'])){
				$sql ="DELETE FROM itemstock WHERE itemid=:itemid AND size=:size";
				$result=$pdo->prepare($sql);
				$result->bindValue(':itemid',$_POST['itemid']);
				$result->bindValue(':size',$_POST['deleteSize']);
				$result->execute();
				
				echo "You have delete item with itemid".$_POST['itemid']."size ".$_POST['deleteSize'];
			}
		  ?>

	</div>	
		
	  </body>
	  