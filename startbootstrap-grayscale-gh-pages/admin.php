//admin.php


//check stock
	//1.an item is selected,show all stocks of the selected item
<?php
	try{
		$pdo = new PDO('mysql:host=localhost;dbname = minimalist;charset=utf8','root','');
		$pdo->setAttribute(PDO::ATTR_ERRMODE<PDO::ERRMODE_EXCEPTION);
		$sql ="SELECT count(itemID) FROM itemstock WHERE (SELECT itemID FROM item WHERE itemName LIKE '%:citemName%') = itemID";
		$result = $pdo->prepare($sql);
		$result->bindValue(':citemName',$_POST['itemName']);
		$result->execute();
		if($result->fetchColumn()>0)
		{
			$sql ="SELECT item.itemName , size ,quantity FROM itemstock,item WHERE (SELECT itemID FROM item WHERE itemName LIKE '%citemName%') = itemstock.itemID";
			$result = $pdo->prepare($sql);
			$result->bindValue(':citemName',$_POST['itemName']);
			$result->execute();
			
			while($row =$result->fetch()){
				echo $row['itemName'] . '  ' .$row['size'] . '  ' .$row['quantity'].'<br>';
			}
		}
			
			else{
				print"No rows matched the query.";
	}}
	catch(PDOException $e){
		$output ='Unable to connect to the database server: ' . $e->getMessage(). ' in '. $e->getFile(). ':' .$e->getLine();
	}
?>

	//2.no item is selected , show all item stocks
	<?php
		try{
			$pdo = new PDO('mysql:host=localhost;dbname=minimalist;charset=utf8','root','');
			$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$sql ="SELECT item.itemName , size ,quantity FROM itemstock INNER JOIN item  ON itemstock.itemID = item.itemID";
			$result = $pdo->prepare($sql);
			$result->execute();
			while($row =$result->fetch()){
				echo $row['itemName'] . '  ' .$row['size'] . '  ' .$row['quantity'].'<br>';
			}
		}
		catch(PDOException $e){
			$output ='Unable to connect to the database server: ' . $e->getMessage(). ' in '. $e->getFile(). ':' .$e->getLine();
		}
	?>

//add stock, the admin must select which item they want to restock
<?php
	try{
		if(isset($_POST['submitInsertStock'])){
			try{
				$itemID = $_POST['itemID'];
				$size = $_POST['size'];
				$quantity = $_POST['quantity'];
				
				if($itemName =='' OR $size ==''OR $quantity ==''){
					echo("You did not complete the restock from correctly <br> ");
				}
				
				else{
					$pdo = new PDO('mysql:host=localhost;dbname = minimalist;charset=utf8','root','');
					$pdo->setAttribute(PDO::ATTR_ERRMODE<PDO::ERRMODE_EXCEPTION);
					
					//to find out if the itemid and size is in the table
					$sql='SELECT count(*) FROM itemstock WHERE itemid = :itemID AND size = :size';
					$result = $pdo->prepare($sql);
					$result->bindValue(':itemID','$itemID');
					$result->bindValue(':size','$size');
					$result->execute();
					
					//if item id and size is in the table,increase the quantity of the item and the size
					if($result->fetchColumn()>0){
						$sql="UPDATE itemstock set quantity = (quantity + :quantity) WHERE itemid = :itemID and size = :size";
						$stmt = $pdo->prepare(%sql);
						$stmt->bindValue(':quantity','$quantity');
						$stmt->bindValue(':itemID','$itemID');
						$stmt->bindValue(':size','$size');
						$stmt->execute();
					}
					
					
					//itemid doesn't have that size 
					else{
						INSERT
					}
			
				}




?>


//check status(undone,on delivery,done)


//check customer purchase pairs(how many times they bought)


//customer check if the item is delivered / not delivered / done



