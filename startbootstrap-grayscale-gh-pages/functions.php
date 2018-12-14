
<?php

	
	
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
	
	function addStockMessage(){
		$pdo = new PDO('mysql:host=localhost;dbname=minimalist;charset=utf8','root','');
		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		
		//get number of quantity to be restock
		$qtyToAdd = $_POST['qty'];
		
		//get productName
		$sql = "SELECT itemName FROM item WHERE itemid = :itemId";
		$result=$pdo->prepare($sql);
		$result->bindValue(':itemId',$_POST['productName']);
		$result->execute();
		
		while($row=$result->fetch()){
			$productName = $row['itemName'];
		}
		
		//check if stock is in the database
		$sql = "SELECT COUNT(size) from itemStock WHERE itemid =:itemId and size =:size";
		$result=$pdo->prepare($sql);
		$result->bindValue(':itemId',$_POST['productName']);
		$result->bindValue(':size',$_POST['size']);
		$result->execute();
		
		while($row=$result->fetch()){
			$count = $row['COUNT(size)'];
		}
		
		//size exist
		if(!($count == 0)){
			//get previous quantity
			$sql = "SELECT quantity FROM itemstock WHERE itemid = :itemId and size = :size";
			$result=$pdo->prepare($sql);
			$result->bindValue(':itemId',$_POST['productName']);
			$result->bindValue(':size',$_POST['size']);
			$result->execute();
			
			while($row=$result->fetch()){
				$qty = $row['quantity'];
			}
			
			//set the updated quantity
			$qtyUpdated = $qty+$qtyToAdd;
			
			$sql ="UPDATE itemstock SET quantity = $qtyUpdated WHERE itemid = :itemId and size = :size";
			$result=$pdo->prepare($sql);
			$result->bindValue(':itemId',$_POST['productName']);
			$result->bindValue(':size',$_POST['size']);
			$result->execute();
			
			echo "You just restock " . $productName ."  with size ". $_POST['size'] ."<br>Now the current quantity of this shoe is  ".$qtyUpdated .".";
		}
		
		//size does not exist
		else{
			$sql ="INSERT INTO itemStock VALUES(:itemid,:size,:quantity) ";
			$result=$pdo->prepare($sql);
			$result->bindValue(':itemid',$_POST['productName']);
			$result->bindValue(':size',$_POST['size']);
			$result->bindValue(':quantity',$_POST['qty']);
			$result->execute();
			
			echo "You just added a new stock of ".$productName." with new size of ".$_POST['size'] ."<br>Now the current quantity of this shoe is ".$_POST['qty'] .".";
		}
	}
	
	function displayCartImage(){
		if($_SESSION['itemId'] == 1 ){
			//converse shoe picture
			echo "img/converse/1.webp";
		}
		else if($_SESSION['itemId'] == 2 ){
			//common project
			echo "img/common/1.jfif";
		}
		else{
			//ultraboost
			echo "img/ultraboost/1.webp";
		}
	}
	
	function getProductName(){
		if($_SESSION['itemId'] == 1 ){
			//converse shoe picture
			echo "Converse";
		}
		else if($_SESSION['itemId'] == 2 ){
			//common project
			echo "Common Project";
		}
		else{
			//ultraboost
			echo "Ultraboost";
		}
	}
	
	function getProductPrice(){
		$pdo = new PDO('mysql:host=localhost;dbname=minimalist;charset=utf8','root','');
		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		if($_SESSION['itemId'] == 1 ){
			//converse shoe picture
			$sql="SELECT price FROM ITEM WHERE itemName LIKE '%converse%'";
			$result = $pdo->query($sql);
			while ($row = $result->fetch()) { 
				 return $row['price'];
			}
		}
		else if($_SESSION['itemId'] == 2 ){
			//common project
			$sql="SELECT price FROM ITEM WHERE itemName LIKE '%common%'";
			$result = $pdo->query($sql);
			while ($row = $result->fetch()) { 
				 return $row['price'];
			}
		}
		else{
			//ultraboost
			$sql="SELECT price FROM ITEM WHERE itemName LIKE '%ultraboost%'";
			$result=$pdo->query($sql);
			while ($row = $result->fetch()) { 
				return $row['price'];
			}
		}
	}

	function getTotalPrice($price ,$quantity){
		$total = $price * $quantity;
		return number_format((double)$total,2,'.','');
	}
	
	function changeStatus(){
		$pdo = new PDO('mysql:host=localhost;dbname=minimalist;charset=utf8','root','');
		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$sql="SELECT * FROM Orders WHERE orderid =:orderId";
		$result=$pdo->prepare($sql);
		$result->bindValue(':orderId',$_POST['orderId']);
		$result->execute();
		
		echo '<form method="POST" action="adminPage.php" name="changeStatusText">';
			echo "<br><table>
					<tr><th>Customer Id</th>
					<th>Item Id</th>
					<th>Size</th>
					<th>Quantity</th>
					<th>Order Date</th>
					<th>Status</th></tr>";
			while ($row = $result->fetch()) { 	
			$status = $row['status'];
			$orderId =$row['orderid'];
			
			//pass the orderid back to the form
			echo '<input type="hidden" name="orderIdInput" value="'.$orderId.'">';
				echo "<tr>
						<td>".$row['custid']."</td><td>".$row['itemid']."</td><td>".$row['size']."</td><td>".$row['quantity']."</td><td>".$row['orderdate']."</td><td><input name ='statusSubmit' type='text' value=".$row['status']."></td></tr>";
			}
			echo '<input type="submit" value="Submit Change" name="changeStatusTextSubmit">';
	}
	
	function deleteItem(){
		$pdo = new PDO('mysql:host=localhost;dbname=minimalist;charset=utf8','root','');
		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		
		$itemid=$_POST['itemid'];
		
		$sql = "SELECT itemstock.size,itemstock.quantity,item.itemname FROM itemstock INNER JOIN item ON item.itemID=itemstock.itemId WHERE item.itemId =$itemid";
		$result=$pdo->prepare($sql);
		$result->bindValue(':itemid',$itemid);
		$result->execute();
		
		echo '<form method="POST" action="adminPage.php" name="deleteItemRow">';
		echo '<input type="hidden" name="itemid" value="'.$itemid.'">';
		echo '<table>
				<tr><th>Item Name</th>
				<th>Size</th>
				<th>Quantity</th>
				<th>Action</th></tr>';
				
		while($row=$result->fetch()){
			echo "<tr><td>".$row['itemname']."</td><td>".$row['size']."</td><td>".$row['quantity']."</td><td><input name ='deleteSize' type='radio' value='".$row['size']."'></td></tr>";
		}
		
		echo '<input type="submit" value="submit" name="deleteItemRowSubmit">';
	}
	
?>