<?php
    if(isset($_POST['login-submit'){
        try{
            $pdo = new PDO('mysql:host=localhost;dbname=minimalist; charset=utf8', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = 'SELECT COUNT(email) from customer WHERE email = :emailLogin and password = :passwordLogin';
            $result = $pdo->prepare($sql);
            $result->bindValue('emailLogin' , $_POST['emailLogin']);
            $result->bindValue('passwordLogin',$_POST['passwordLogin']);
            $result->execute();

            if($result->fetchColumn() >0){
				$sql = 'SELECT * FROM customer WHERE email = :emailLogin and password = :passwordLogin';
				$result = pdo->prepare($sql);
				$result->bindValue('emailLogin' , $_POST['emailLogin']);
				$result->bindValue('passwordLogin',$_POST['passwordLogin']);
				$result->execute();

				while($row = $result->fetch()){
					echo 'Welcome back , ' . $row['firstName'] . ' ' . $row['lastName'];
				}
			}
			else{
				echo 'You might enter the wrong email or password,please check again';
			}
		}
		catch (PDOException $e) {
			$output = 'Unable to connect to the database server: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
		}
	}
?>
