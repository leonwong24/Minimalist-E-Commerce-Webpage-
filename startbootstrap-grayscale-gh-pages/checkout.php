<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!-- this is taken from https://bootsnipp.com/snippets/q8k0N -->

<?php
	session_start();
	include 'functions.php';
?>
<!--CREDIT CART PAYMENT-->
<div class="panel panel-info">
    <div class="panel-heading"><span><i class="glyphicon glyphicon-lock"></i></span> Secure Payment</div>
    <div class="panel-body">
	<form name="" action=""> <!---start of form--->
        <div class="form-group">
            <div class="col-md-12"><strong>Credit Card Number:</strong></div>
            <div class="col-md-12"><input type="text" class="form-control" name="card_number" value="" /></div>
        </div>
        <div class="form-group">
            <div class="col-md-12"><strong>Card CVV:</strong></div>
            <div class="col-md-12"><input type="text" class="form-control" name="card_code" value="" maxlength="3"/></div>
        </div>
        <div class="form-group">
            <div class="col-md-12">
                <strong>Expiration Date</strong>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <select class="form-control" name="expire_month">
                    <option value="">Month</option>
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
                    <option value="09">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
            </select>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <select class="form-control" name="expire_year">
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
            </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <button type="submit" class="btn btn-primary btn-submit-fix" name="placeOrder">Place Order</button>
            </div>
        </div>
	</form> <!----end of form--->
    </div>
</div>
  <!--CREDIT CART PAYMENT END-->
					
					
					
<!----process payment and orderand save into database---->
<?php
if(isset($_POST['placeOrder'])){
	//$sql for payments
	$sql='INSERT INTO payments(accno,secno,exmonth,exyear) VALUES(:accno,:secno,:exmonth,:year)';
	$result=$pdo->prepare($sql);
	$result->bindValue(':accno',$_POST['card_number']);
	$result->bindValue(':secno',$_POST['card_code']);
	$result->bindValue(':exmonth',$_POST['expire_month']);
	$result->bindValue(':year',$_POST['expire_year']);
	$result->execute();
	
	//getPayId
	$sql = 
	
	//sql for putting orders
	$sql='INSERT INTO orders(custid,orderdate,payid,totalPrice,itemId,size,quantity) VALUES (:custid,:orderdate,:payid,:totalPrice,:itemId,;size,:quantity)';
	$result=$pdo->prepare($sql);
	//get total price
		//get quantity
		(double)$quantity = $_SESSION['quantity'];
		//get price
		(double)$price = getProductPrice();
	//get price
	$total = getTotalPrice($price ,$quantity);
	
	$result->bindValue(':custid',$_SESSION['custid']);
	$result->bindValue(':orderdate',date("d-m-Y");
	$result->bindValue(':payid',$_POST['expire_month']);
	$result->bindValue(':totalPrice',$total);
	$result->bindValue(':itemId',$_SESSION['itemId']);
	$result->bindValue(':size',$_SESSION['size']);
	$result->bindValue(':quantity',$_SESSION['quantity']);
	$result->execute();
	
}


?>
					