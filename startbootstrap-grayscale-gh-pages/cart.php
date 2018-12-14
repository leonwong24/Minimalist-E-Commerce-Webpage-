<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!--snippet from https://bootsnipp.com/snippets/featured/shopping-cart-panel-bs-3-->
<!------ Include the above in your HEAD tag ---------->

<?php
	session_start();
	include_once 'connector.php';
	include 'functions.php';
	
	//get quantity as double
	(double)$quantity = $_SESSION['quantity'];
	
	//get price--
	(double)$price = getProductPrice();
?>

<?php
	if(isset($_SEESION['itemId']) === null){
		echo '<script type="text/javascript">
				window.location = "shop.html"
			  </script>';
		exit();
	}
	else if((isset($_SESSION['custid'])) === null){
		echo '<script type="text/javascript">
				window.location = "login.php"
			  </script>';
		exit();
	}
?>

<div class="container">
	<div class="row">
		<div class="col-xs-8">
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="panel-title">
						<div class="row">
							<div class="col-xs-6">
								<h5><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</h5>
							</div>
							<div class="col-xs-6">
								<a href="shop.php"  class="btn btn-primary btn-sm btn-block">
									<span class="glyphicon glyphicon-share-alt"></span> Change product?
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-xs-2">
							<img class="img-responsive" src="<?php displayCartImage(); ?>"> <!--display corresponding item image-->
						</div>
						<div class="col-xs-4">
							<h4 class="product-name"><strong><?php getProductName(); ?></strong></h4><h4><small>Size : <?php echo $_SESSION['size']; ?></small></h4> <!--display corresponding item name -->
						</div>
						<div class="col-xs-6">
							<div class="col-xs-6 text-right">
								<h6><strong><?php echo $price;  ?> <span class="text-muted">x</span></strong></h6> <!--php for item unit price-->
							</div>
							<div class="col-xs-4">
								<h6><strong><?php echo $_SESSION['quantity']; ?></strong></h6> <!--php for cart item qty-->
							</div>
							<div class="col-xs-2">
							</div>
						</div>
					</div>
					<hr>
				</div>
				<div class="panel-footer">
					<div class="row text-center">
						<div class="col-xs-9">
							<h4 class="text-right">Total <strong><?php echo (getTotalPrice($price,$quantity)); ?></strong></h4> <!--php total price-->
						</div>
						<div class="col-xs-3">
							<a href="checkout.php" class="btn btn-success btn-block">
								Checkout
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>