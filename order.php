<?php  
	session_start();
	include 'backend/dbconnect.php';
	$note=$_POST['notes'];
	$total=$_POST['total'];
	$shop_arr=$_POST['shop_arr'];
	$user_id=$_SESSION['loginuser']['id'];

//	echo $note.$total;

	date_default_timezone_set('Asia/Yangon');
	$orderdate=date('Y-m-d');

	$voucherno =strtotime(date("h:i:s"));
	$status=0;

	$sql="INSERT INTO orders (orderdate,voucherno,total,note,status,user_id) VALUES(:orderdate,:voucherno,:total,:note,:status,:user_id)";
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(':orderdate',$orderdate);
	$stmt->bindParam(':voucherno',$voucherno);
	$stmt->bindParam(':total',$total);
	$stmt->bindParam(':note',$note);
	$stmt->bindParam(':status',$status);
	$stmt->bindParam(':user_id',$user_id);
	$stmt->execute();

	if ($stmt->rowCount()) {
		echo "Ok";	
	}else{
		echo "Error";
	}


	$sql="SELECT * FROM orders ORDER BY id DESC LIMIT 1";
	$stmt=$pdo->prepare($sql);
	$stmt->execute();
	$order=$stmt->fetch(PDO::FETCH_ASSOC);

	$order_id=$order['id'];

	foreach ($shop_arr as $shop) {
		$qty=$shop['qty'];
		$item_id=$shop['id'];
		echo $qty.$item;

		$sql="INSERT INTO item_order (qty,item_id,order_id) VALUES(:qty,:item_id,:order_id)";
		$stmt=$pdo->prepare($sql);
		$stmt->bindParam(':qty',$qty);
		$stmt->bindParam(':item_id',$item_id);
		$stmt->bindParam(':order_id',$order_id);
		$stmt->execute();

		if ($stmt->rowCount()) {
			echo "Success";	
		}else{
			echo "Error";
		}
	}

	

	



?>
