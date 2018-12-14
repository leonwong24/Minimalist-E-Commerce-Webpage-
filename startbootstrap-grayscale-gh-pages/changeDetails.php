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


<?php
		include_once 'connector.php';
		$custId=$_SESSION['custid'];
		
		
		//get all the information from sql and assign value
		$sql = 'SELECT * from customer WHERE custId ='.$custId;
		$result=$pdo->prepare($sql);
		$result->execute();
		
		while($row = $result->fetch()){
			$firstName = $row['firstName'];
			$lastname = $row['lastname'];
			$email = $row['email'];
			$mobileno = $row['mobileno'];
			$address = $row['streetName'];
			$streetName =$row['streetName'];
			$city = $row['city'];
			$postalCode = $row['postalCode'];
			$country = $row['country'];
			$password = $row['password'];
		}
?>

<form action="" method="post" id="submitform">
			<div class="container">
			  <h1>Change Details</h1>
			  <p>Please fill in this form to create an account.</p>
			  <hr>
			  <label for="firstname"><b>First Name</b></label>
			  <input type="text" value="<?php  echo $firstName;  ?>" name="firstname" required>
			  
			  <label for="lastname"><b>Last Name</b></label>
			  <input type="text" value="<?php  echo $lastname; ?>" name="lastname" required>

			  <label for="email"><b>Email</b></label>
			  <input type="text" value="<?php echo $email;?>" name="email" required>
			  
			  <label for="psw"><b>Password</b></label>
			  <input type="password" value="<?php echo $password;?>" name="psw" required>
			  
			  <label for="mobileNo"><b>Mobile No.</b></label>
			  <input type="text" value="<?php echo $mobileno; ?>" name="mobileNo">
			  
			  <label for="address"><b>Address</b></label>
			  <input type="text" value="<?php echo $address; ?>" name="address" required>
			  
			  <label for="street"><b>Street Name</b></label>
			  <input type="text" value="<?php echo $streetName; ?>" name="street" required>
			  
			  <label for="city"><b>City</b></label>
			  <input type="text" value="<?php echo $city; ?>" name="city" required>
			  
			  <label for="postal"><b>Postal Code</b></label>
			  <input type="text" value="<?php echo $postalCode ?>" name="postal">
			  
			  <label for="country"><b>Country</b></label>
			  <select name="country" required>
				<option value="<?php echo$country;?>" > <?php echo$country;?> </option>
				<option value="Ireland">Ireland</option>
				<option value="United Kingdom">United Kingdom</option>
				<option value="Germany">Germany</option>
				<option value="Belgium">Belgium</option>
			  </select>


			  <div class="clearfix">
				<input type="submit" name="detailChangeSubmit" value="Submit Change"> 
			  </div>
			</div>
</form>

<?php
if(isset($_POST['detailChangeSubmit'])){
	$sql = "UPDATE customer SET firstname = '".$_POST['firstname']."', lastname = '".$_POST['lastname']."' , email = '".$_POST['email']."' , 
			password = '".$_POST['psw']."' , mobileno = '".$_POST['mobileNo']."' , address ='".$_POST['address']."' ,streetName = '".$_POST['street']."' , 
			city = '".$_POST['city']."' , postalCode = '".$_POST['postal']."' , country ='".$_POST['country']."' WHERE custId = $custId";
	$result=$pdo->prepare($sql);
	$result->execute();
	
	echo "Your details has been updated";
	echo '<script>
	document.getElementById("submitform").style.display = "none";
		
	</script>';
	echo '<a href="index.php">Click Here</a> to go back to homepage';
}



?>


</body>

</html>