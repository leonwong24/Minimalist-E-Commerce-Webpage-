<?php
	
	//function login validation
	/*function loginValidation($email,$password){
		$pdo = new PDO('mysql:host=localhost;dbname=minimalist;charset=utf8','root','');
		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$sql = 'SELECT COUNT(email) from customer WHERE email = $email and password = $password';
        $result = $pdo->prepare($sql);
        $result->execute();

            if($result->fetchColumn() >0){
				//login success
				$sql = 'SELECT * FROM customer WHERE email = $email and password = $password';
				$result=pdo->prepare($sql);
				$result->execute();

				while($row = $result->fetch()){
					$_SESSION['custid'] = $row['custId'];
					echo "Login successful";
					
					//redirect to car page
					/*echo '<script type="text/javascript">
							window.location = "cart.php"
						 </script>';
				}
			}
			else{
				echo 'You might enter the wrong email or password,please check again';
				echo '<a href="login.php">CLick here to go back</a>';
			}
	}*/
	
	
	//function that display the form that allows admin to check stock
	function displayCheckStockForm(){
		echo '<form method="POST" action="" name="checkStock">
			<label for="productName"><b>Product Name:</b></label>
			<select name="productName">
				<option value="*" selected = "selected">All</option>
				<option value="3">Ultraboost</option>
				<option value="2">Common Project</option>
				<option value="1">Converse</option>
			</select>
			<input type="submit" value="checkStockSubmit">
		</form>';
	}
	
	function displayCheckStockTable(){
		//if select all product
			$pdo = new PDO('mysql:host=localhost;dbname=minimalist;charset=utf8','root','');
			$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			if($_POST['productName'] == "*"){
				$sql = "SELECT item.itemName,itemstock.size,itemstock.quantity FROM itemstock INNER JOIN item ON item.itemID=itemstock.itemID";
				$result = $pdo->prepare($sql);
				$result->execute();
			}
			//select particular product
			else{
				$itemId = $_POST['productName'];
				$sql ="SELECT item.itemName,itemstock.size,itemstock.quantity FROM itemstock INNER JOIN item ON item.itemID=itemstock.itemID WHERE itemstock.itemID = $itemId ";
				$result =$pdo->prepare($sql);
				$result->execute();
			}
			
			echo "<br><table>
					<tr>
						<th>Item Name</th>
						<th>Size</th>
						<th>Quantity</th>
					</tr>";
			while($row = $result->fetch()){
				echo "<tr>
						<td>".$row['itemName'] ."</td> <td>".$row['size']."</td> <td>".$row['quantity']."</td> </tr>";
			}
			echo "</table>";	
	}


?>