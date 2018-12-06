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
	  
	  <form method="POST" action="" name="addStock">
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
		</form>
	  
	  <?php
		if(isset($_POST['addStockSubmit'])){
			addStockMessage();
		}
	  ?>
		
	  </body>
	  