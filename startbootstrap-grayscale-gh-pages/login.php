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
	
	<style>
	/* Bordered form */
form {
    border: 3px solid #f1f1f1;
}

/* Full-width inputs */
input[type=text], input[type=password] {
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

/* Center the avatar image inside this container */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
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
    margin: 5px auto; /* 15% from the top and centered */
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

	</style>
	
	
	<?php
	//start cart session
	if(isset($_POST['buy'])){
		session_start();
		$_SESSION['itemId'] = $_POST['itemid'];
		$_SESSION['size'] = $_POST['size'];
		$_SESSION['quantity']=$_POST['quantity'];
	}
	/*if( is_null($_SESSION["custid"])){
		echo '<script type="text/javascript">
				window.location = "cart.php"
			  </script>';
	}*/
	?>

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
              <a class="nav-link js-scroll-trigger" href="adminPage.php">Admin</a>
            </li>

            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#signup">Contact</a>
            </li>

          </ul>
        </div>
      </div>
    </nav>
		<!-- Button to open the modal login form -->
		<button onclick="document.getElementById('login-modal').style.display='block'">Login</button>
		<!-- Button to open the modal signup form -->
		<button onclick="document.getElementById('signup-modal').style.display='block'">Sign Up</button>

		<!-- The Modal -->
		<div id="login-modal" class="modal">
		  <span onclick="document.getElementById('login-modal').style.display='none'" 
			class="close" title="Close Modal">&times;</span>

		  <!-- Modal Content -->
		  <form class="modal-content animate" action="loginValidation.php" method="post">

			<div class="container">
			  <label for="email"><b>Email</b></label>
			  <input type="text" placeholder="Enter Username" name="email" required>

			  <label for="psw"><b>Password</b></label>
			  <input type="password" placeholder="Enter Password" name="psw" required>

			  <button type="login-submit">Login</button>
			</div>

			  <button type="button" onclick="document.getElementById('login-modal').style.display='none'" class="cancelbtn">Cancel</button>
		  </form>
		</div>
		
		<!-- The Modal (contains the Sign Up form) -->
		<div id="signup-modal" class="modal">
		  <span onclick="document.getElementById('signup-modal').style.display='none'" class="close" title="Close Modal">&times;</span>
		  <form class="modal-content" action="customerRegister.php" method="post">
			<div class="container">
			  <h1>Sign Up</h1>
			  <p>Please fill in this form to create an account.</p>
			  <hr>
			  <label for="firstname"><b>First Name</b></label>
			  <input type="text" placeholder="Enter first name" name="firstname" required>
			  
			  <label for="lastname"><b>Last Name</b></label>
			  <input type="text" placeholder="Enter last name" name="lastname" required>

			  <label for="email"><b>Email</b></label>
			  <input type="text" placeholder="Enter email" name="email" required>
			  
			  <label for="psw"><b>Password</b></label>
			  <input type="password" placeholder="Enter password" name="psw" required>
			  
			  <label for="mobileNo"><b>Mobile No.</b></label>
			  <input type="text" placeholder="Enter mobile no" name="mobileNo">
			  
			  <label for="address"><b>Address</b></label>
			  <input type="text" placeholder="Enter address" name="address" required>
			  
			  <label for="street"><b>Street Name</b></label>
			  <input type="text" placeholder="Enter street name" name="street" required>
			  
			  <label for="city"><b>City</b></label>
			  <input type="text" placeholder="Enter city" name="city" required>
			  
			  <label for="postal"><b>Postal Code</b></label>
			  <input type="text" placeholder="Enter postal code" name="postal">
			  
			  <label for="country"><b>Country</b></label>
			  <select name="country" required>
				<option value="Ireland">Ireland</option>
				<option value="United Kingdom">United Kingdom</option>
				<option value="Germany">Germany</option>
				<option value="Belgium">Belgium</option>
			  </select>


			  <div class="clearfix">
				<button type="button" onclick="document.getElementById('signup-modal').style.display='none'" class="cancelbtn">Cancel</button>
				<button type="signup-submit" class="signup">Sign Up</button>
			  </div>
			</div>
		  </form>
		</div>
	</body>
</html>