<?php
	include_once 'connector.php';
	session_start();
?>



<?php
	$sql = 'SELECT COUNT(*) from customer WHERE email =:email and password =:password';
        $result = $pdo->prepare($sql);
		$result->bindValue(':email', $_POST['email']); 
		$result->bindValue(':password', $_POST['psw']); 
        $result->execute();

            if($result->fetchColumn() >0){
				//login success
				$sql = 'SELECT * FROM customer WHERE email =:email and password =:password';
				$result=$pdo->prepare($sql);
				$result->bindValue(':email', $_POST['email']); 
				$result->bindValue(':password', $_POST['psw']);
				$result->execute();

				while($row = $result->fetch()){
					$_SESSION['custid'] = $row['custId'];
					echo "Login successful";
	
					
					//redirect to cart page if cart exist
					if(isset($_SESSION['itemId'])){
						echo '<script type="text/javascript">
						window.location = "cart.php"
							</script>';
					}
					else{
						header('location:shop.php');
					}
				}
			}
			
			else{
				echo 'You might enter the wrong email or password,please check again';
				echo '<a href="login.php">CLick here to go back</a>';
			}
			include'shop.php';
?>