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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<style>
		.gallery-wrap .img-big-wrap img {
    height: 450px;
    width: auto;
    display: inline-block;
    cursor: zoom-in;
}


.gallery-wrap .img-small-wrap .item-gallery {
    width: 60px;
    height: 60px;
    border: 1px solid #ddd;
    margin: 7px 2px;
    display: inline-block;
    overflow: hidden;
}

.gallery-wrap .img-small-wrap {
    text-align: center;
}
.gallery-wrap .img-small-wrap img {
    max-width: 100%;
    max-height: 100%;
    object-fit: cover;
    border-radius: 4px;
    cursor: zoom-in;
}
	
	  /* Make the image fully responsive */
  .carousel-inner img {
      width: 100%;
      height: 100%;
  }
	</style>

<!--include connector php-->
	<?php
		include_once 'connector.php';
		session_start();
	?>
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
	

	<div class="card">
	<div class="row">
		<aside class="col-sm-5 border-right">
<div id="demo" class="carousel slide" data-ride="carousel">
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/converse/1.webp" alt="converse">
    </div>
    <div class="carousel-item">
      <img src="img/converse/2.webp" alt="converse">
    </div>
    <div class="carousel-item">
      <img src="img/converse/3.webp" alt="converse">
    </div>
	<div class="carousel-item">
      <img src="img/converse/4.webp" alt="converse">
    </div>
	<div class="carousel-item">
      <img src="img/converse/5.webp" alt="converse">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>

</div>
		</aside>
		<aside class="col-sm-7">
<article class="card-body p-5">
	<h3 class="title mb-3">Converse</h3>

<p class="price-detail-wrap"> 
	<span class="price h3 text-warning"> 
		<span class="currency">EUR €</span><span class="num">
		<?php
			$sql="SELECT price FROM ITEM WHERE itemName LIKE '%converse%'";
			$result = $pdo->query($sql);
			while ($row = $result->fetch()) { 
				 echo $row['price'];
			} 
		?>
		</span>
	</span> 
</p> <!-- price-detail-wrap .// -->
<dl class="item-property">
  <dt>Description</dt>
  <dd><p>Here goes description consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco </p></dd>
</dl>
<dl class="param param-feature">
  <dt>Model#</dt>
  <dd>12345612</dd>
</dl>  <!-- item-property-hor .// -->
<dl class="param param-feature">
  <dt>Color</dt>
  <dd>White</dd>
</dl>  <!-- item-property-hor .// -->

<hr>
	<form action="login.php" method="post" name="converse_buyform"> <!--start of buy form-->
	<input type="hidden" value=1 name="itemid"> <!--converse itemid = 1 -->
	<div class="row">
		<div class="col-sm-5">
			<dl class="param param-inline">
			  <dt>Quantity: </dt>
			  <dd>
			  	<select class="form-control form-control-sm" style="width:70px;" name="quantity">
			  		<option value = 1> 1 </option>
			  		<option value = 2> 2 </option>
			  		<option value = 3> 3 </option>
			  	</select>
			  </dd>
			</dl>  <!-- item-property .// -->
		</div> <!-- col.// -->
		<div class="col-sm-7">
			<dl class="param param-inline">
				  <dt>Size: </dt>
				  <dd>
			  	<select class="form-control form-control-sm" style="width:70px;" name="size">
			  		<?php
						$sql = 'SELECT size from itemstock WHERE itemId = 1 AND quantity > 0'; //converse id= 1
						$result = $pdo->query($sql); 
						while ($row = $result->fetch()) { 
							   echo '<option value="'.$row['size'].'"selected>'.$row['size'].'</option><br>';
						}
					?>
			  	</select>
			  </dd>
			</dl>  <!-- item-property .// -->
		</div> <!-- col.// -->
	</div> <!-- row.// -->
	<hr>
	<input type="submit" class="btn btn-lg btn-primary text-uppercase" value="Buy now" name="buy"> 
	<!--<a href="#" class="btn btn-lg btn-outline-primary text-uppercase"> <i class="fas fa-shopping-cart"></i> Add to cart </a>-->
	
	</form>  <!--end of buy form-->
</article> <!-- card-body.// -->
		</aside> <!-- col.// -->
	</div> <!-- row.// -->
</div> <!-- card.// -->


</div>
<!--container.//-->
	
	
	</body>
	
</html>