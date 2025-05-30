<?php
session_start();
/**
* 
*/
class user extends dbh
{
	

	public function login($username, $password)
	{
		if($username == 'admin@gmail.com' && $password == 'admin')
		{
			$_SESSION['user'] = $username;
			$_SESSION['usertype'] = 'superAdmin';
			$error = 0;

			// start
			include 'mail.php';
			// end 
			
			header('location:otp.php');
		}
		else{
			$error = 1;
			echo  $this->messages($error);
		}
		
	}

	public function messages($message)
	{
		if ($message == 1) {
			return '<div class ="alert alert-danger"> Wrong username and password </div>';
		}
		if($message == 2)
		{
			return '<div class ="alert alert-danger"> Attension!!! Unthorize user </div>';
		}
		// else{
		// 	return 'success';
		// }
	}

	public function sessioncheck($sess)
	{
		if ($sess =='' or empty($sess) or $sess == null) 
		{
			header('location:..\index.php');
		}
		else{
			//return $sess;
		}
	}
	public function emptysession ($set){
		unset($set);
		header('location:..\index.php');
	}

	public function getProduct(){
		$stmt = "SELECT * FROM product";
		$result = $this->connect()->query($stmt);
		$numberrows = $result->num_rows;
		if ($numberrows >0) {
			while ($rows= $result->fetch_assoc()) {
				$row_date [] = $rows;
		}
		 return $row_date;
			
		}
		else{
			return '';
		}
	}

	// public function getquantity(){
	// 	$stmt = "SELECT SUM(quantity) AS qty FROM product";
	// 	$result = $this->connect()->query($stmt);
	// 	$numberrows = $result->num_rows;
	// 	if ($numberrows >0) {
	// 		while ($rows= $result->fetch_assoc()) {
	// 			$row_date [] = $rows;
	// 	}
	// 	 return $row_date;
			
	// 	}
	// 	else{
	// 		return '';
	// 	}
	// }
	
	public function getProducts($productCategory){
		
		$stmt = "SELECT * FROM product WHERE productCategory='$productCategory'";
		$result = $this->connect()->query($stmt);
		$numberrows = $result->num_rows;
		if ($numberrows >0) {
			while ($rows= $result->fetch_assoc()) {
				$row_date [] = $rows;
		}
		 return $row_date;
			
		}
		else{
			return '';
		}
	}

	public function insertProduct($productName,$productPrice,$productQuantity,$productCategory){
		if (empty($this->checkProduct($productName))) 
		{
			$storeProduct = strtoupper($productName);
			$date = date('Y-m-d');
			$insert = "INSERT INTO product(productName,productPrice,quantity,productCategory,date_create)Values('$storeProduct','$productPrice','$productQuantity','$productCategory','$date')";
			$stmt = $this->connect()->query($insert);
			if (!$stmt) {
				echo '<div class ="alert alert-danger"> <strong> Error Occured !!! Please Try Again </strong> </div>';
			}
			else
			{
				echo '<div class ="alert alert-success"> <strong> New Product Added Successfully  </strong> </div>';
			}

		}
		else{
			echo $this->checkProduct($productName);
		}
	}

	public function checkProduct($productName){
		$storeProduct = strtoupper($productName);
		$stmt = "SELECT * FROM product where productName = '$storeProduct'";
		$result = $this->connect()->query($stmt);
		$numberrows = $result->num_rows; 
		if (($numberrows)> 0) {
			return '<div class ="alert alert-danger"> <strong> Sorry !!! Product  Already Exist  </strong> </div>';
		}
		else{

		}
	}

	public function update_row($productName,$productPrice,$productQuantity,$id){

	 $upper_productName = strtoupper($productName);
	 $stmt = "UPDATE product set productName = '$upper_productName', productPrice = '$productPrice', quantity ='$productQuantity' where id = '$id'";
	 $result = $this->connect()->query($stmt);
	 if($result)
	 {
	 	echo "success";
	 }
	 else{
	 	echo '<script>alert("Please Try Agin. Error Occured")</script>';
	 }
	 	
	 exit();

	}

	public function productCategory(){
		$stmt = "SELECT * FROM categories";
		$result = $this->connect()->query($stmt);
		$numberrows = $result->num_rows;
		if ($numberrows >0) {
			while ($rows= $result->fetch_assoc()) {
				$row_date [] = $rows;
		}
		 return $row_date;
			
		}
		else{
			return '';
		}
	}

	public function storeCategory($catName){
		if (empty($this->checkCategory($catName))) 
		{
			$storecatName = strtoupper($catName);
			$date = date('Y-m-d');
			$insert = "INSERT INTO categories(name,date_add)Values('$storecatName','$date')";
			$stmt = $this->connect()->query($insert);
			if (!$stmt) {
				echo '<div class ="alert alert-danger"> <strong> Error Occured !!! Please Try Again </strong> </div>';
			}
			else
			{
				echo '<div class ="alert alert-success"> <strong> New category Added Successfully  </strong> </div>';
			}

		}
		else{
			echo $this->checkCategory($catName);
		}
	}

	public function checkCategory($catName){
		$storecatName = strtoupper($catName);
		$stmt = "SELECT * FROM categories where name = '$storecatName' ";
		$result = $this->connect()->query($stmt);
		$numberrows = $result->num_rows; 
		if (($numberrows)> 0) {
			return '<div class ="alert alert-danger"> <strong> Sorry !!! category  Already Exist  </strong> </div>';
			 
		}
		else{

		}
	}

	public function update_cat($name,$id){
	 $upname = strtoupper($name);
	 $stmt = "UPDATE categories set name = '$upname' where id = '$id'";
	 $result = $this->connect()->query($stmt);
	 if($result)
	 {
	 	echo "success";
	 }
	 else{
	 	
	 }
	 	
	 exit();

	}

	public function delete_cat($id)
	{
		$stmt = "DELETE FROM categories where id = '$id'";
		$result = $this->connect()->query($stmt);
		if ($result) {
			echo "success";
		}
		else{
			echo '<script>alert("Please Try Agin. Error Occured")</script>';
		}
	}

	public function delete_product($id)
	{
		$stmt = "DELETE FROM product where id = '$id'";
		$result = $this->connect()->query($stmt);
		if ($result) {
			echo "success";
		}
		else{
			echo '<script>alert("Please Try Agin. Error Occured")</script>';
		}
	}
	
	public function getProductCategory($id)
	{
		$stmt = "SELECT Name FROM categories where id = '$id'";
		$result= $this->connect()->query($stmt);
		$numberrows = $result->num_rows;
		if ($numberrows > 0) {
			$data = $result->fetch_assoc();
			$string = implode('|',$data);
			return $string;
		}
		else{

		}
	}

	public function getAllCustomers()
	{
		$stmt = "SELECT * FROM customers";
		$result = $this->connect()->query($stmt);
		$numberrows = $result->num_rows;
		if ($numberrows >0) {
			while ($rows= $result->fetch_assoc()) {
				$row_date [] = $rows;
		}
		 return $row_date;
			
		}
		else{
			return '';
		}
	}
	
	public function storeCustomer($name,$phoneNo,$email,$address){
		if (empty($this->checkCustomer($phoneNo,$email))) 
		{
			$date = date('Y-m-d');
			$insert = "INSERT INTO customers(fullName,phoneNo,address,email,date_add)Values('$name','$phoneNo','$address','$email','$date')";
			$stmt = $this->connect()->query($insert);
			if (!$stmt) {
				echo '<div class ="alert alert-danger"> <strong> Error Occured !!! Please Try Again </strong> </div>';
			}
			else
			{
				echo '<script type="text/javascript">';
				echo 'setTimeout(function () { swal("Congratulation!","New customer Added Successfully !","success");';
				echo '}, 1000);</script>';
			}

		}
		else{
			echo $this->checkCustomer($phoneNo,$email);
		}
	}

	public function checkCustomer($phoneNo,$email){

		$stmt = "SELECT * FROM customers where phoneNo = '$phoneNo' OR email = '$email' ";
		$result = $this->connect()->query($stmt);
		$numberrows = $result->num_rows; 
		if (($numberrows)> 0) {
			return '<div class ="alert alert-danger"> <strong> Sorry !!! customer  Already Exist  </strong> </div>';
			 
		}
		else{

		}
	}

	public function cart($quantity){
		$stmt = "INSERT into customer_cart(quantity,custID,prdID)Values('$quantity','1','1')";
		$result = $this->connect()->query($stmt);
		if ($result) {
			echo "success";
		}
		else{
			echo "Error Occured!!!";
		}
	}
	public function getCart($custID)
	{
		$stmt = "SELECT * from customer_cart where custID = '$custID'";
		$result = $this->connect()->query($stmt);
		if ($result->num_rows > 0) {
			while ($rows = $result->fetch_assoc()) {
				$data[] = $rows;
			}
			return $data;
		}
		else{
			return '';
		}
	}

	public function getCartProduct($id)
	{
		$stmt = "SELECT * from product where id = '$id'";
		$result = $this->connect()->query($stmt);
		$numberrows = $result->num_rows;
		if ($numberrows > 0) 
		{
			$data = $result->fetch_assoc();
			return $data;
		}
		else{
			return '';
		}
	}

	public function storetoCart($id,$quantitys,$date,$custName,$custNumber,$custAddress,$transcationID)
	{
		$smtm = "INSERT INTO customer_cart(prdID,quantity,date_add,customerName,customerNumber,customerAddress,transcationID) VALUES('$id','$quantitys','$date','$custName','$custNumber','$custAddress','$transcationID') ";
      	$result = $this->connect()->query($smtm);
      	if ($result) 
      	{
      		$stmt = "SELECT * from product where id = '$id'";
      		$checkresult = $this->connect()->query($stmt);
      		$fetech_data = $checkresult->fetch_assoc();
      		$productid =   $fetech_data['id'];
      		$newQuantity = ($fetech_data['quantity']) - ($quantitys);
      		$newUpdate = $this->connect()->query("UPDATE product set quantity = '$newQuantity' where id = $productid");

      	}
      	else{
        $_SESSION['errorMes'] = 'Error Ocurred';
        header('location:suppliers.php');
      }
	}

	public function sales(){
		$stmt = "SELECT * FROM customer_cart";
		$result = $this->connect()->query($stmt);
		$numberrows = $result->num_rows;
		if ($numberrows >0) {
			$counter = 1;
			while ($rows= $result->fetch_assoc()) {
				// $data[] = $rows;
				if (substr($rows['date_add'], 8,2) == date('d')) {
					
					$data[] = $rows;
				}
				else{

				}
			}
			return $data;
			
		}
	}

	public function saless($report){
			if ($report =='daily') {
				// daily code
				return $this->sales();

			}
			elseif ($report =='weekly') {
				// weekly code
				$stmt = "SELECT * FROM customer_cart";
				$result = $this->connect()->query($stmt);
				$numberrows = $result->num_rows;
				if ($numberrows >0) {
					$counter = 1;
					while ($rows= $result->fetch_assoc()) {
						// $data[] = $rows;
						if ($this->weekOfMonth($rows['date_add']) == $this->weekOfMonth(date('Y-m-d'))) {
							
							$data[] = $rows;
						}
						else{

						}
					}
					return $data;
					
				}

			}
			elseif ($report == 'monthly') {
				//monthly code...
				$stmt = "SELECT * FROM customer_cart";
				$result = $this->connect()->query($stmt);
				$numberrows = $result->num_rows;
				if ($numberrows >0) {
					$counter = 1;
					while ($rows= $result->fetch_assoc()) {
						// $data[] = $rows;
						if (substr($rows['date_add'], 5,2) == date('m') && substr($rows['date_add'], 0,4) == date('Y')) {
							
							$data[] = $rows;
						}
						else{

						}
					}
					return $data;
					
				}
			}
			else{
				$date = date('Y-m-d');
				$stmt = "SELECT * FROM customer_cart where date_add = '$date'";
				$result = $this->connect()->query($stmt);
				$numberrows = $result->num_rows;
				if ($numberrows >0) {
					$counter = 1;
					while ($rows= $result->fetch_assoc()) {
						$data[] = $rows;
					}
					return $data;
					
				}
			}
	}

	  function weekOfMonth($qDate) {
	    $dt = strtotime($qDate);
	    $day  = date('j',$dt);
	    $month = date('m',$dt);
	    $year = date('Y',$dt);
	    $totalDays = date('t',$dt);
	    $weekCnt = 1;
	    $retWeek = 0;
	    for($i=1;$i<=$totalDays;$i++) {
	        $curDay = date("N", mktime(0,0,0,$month,$i,$year));
	        if($curDay==7) {
	            if($i==$day) {
	                $retWeek = $weekCnt+1;
	            }
	            $weekCnt++;
	        } else {
	            if($i==$day) {
	                $retWeek = $weekCnt;
	            }
	        }
	    }
	    return $retWeek;
}

	public function getCustomerName($id){
		$stmt = "SELECT fullName from customers where id = '$id'";
		$result = $this->connect()->query($stmt);
		$numberrows = $result->num_rows;
		if ($numberrows > 0) {
			$data = $result->fetch_assoc();
			$string = implode('|',$data);
			return $string;
		}
		else{
			return '';
		}
	}

	public function getCustomerdeatils($id){
		$stmt = "SELECT * from customer_cart where transcationID = '$id'";
		$result = $this->connect()->query($stmt);
		$numberrows = $result->num_rows;
		if ($numberrows > 0) {
			//$data = $result->fetch_assoc();
			while ($data = $result->fetch_assoc()) {
				$datas [] = $data;
			}
			return $datas;
		}
		else{
			return '';
		}
	}

	public function getProductName($id){
		$stmt = "SELECT productName from product where id = '$id'";
		$result = $this->connect()->query($stmt);
		$numberrows = $result->num_rows;
		if ($numberrows > 0) {
			$data = $result->fetch_assoc();
			$string = implode('|',$data);
			return $string;
		}
		else{
			return '';
		}
	}

	public function getTotal($prodID,$quantity)
	{
		$prod = $this->getCartProduct($prodID);
		$productPrice = $prod['productPrice'];
		$sum = $productPrice * $quantity;
		return $sum;
	}
	public function customerCart()
	{
		$stmt = "SELECT * FROM customer_cart";
				$result = $this->connect()->query($stmt);
				$numberrows = $result->num_rows;
				if ($numberrows >0) {
					$counter = 1;
					while ($rows= $result->fetch_assoc()) 
					{
						$data[] = $rows;
					}
					return $data;
				}
	}

	public function checkProductQuantity($id){
		$stmt = "SELECT quantity from product where id = '$id'";
		$result = $this->connect()->query($stmt);
		$numberrows = $result->num_rows;
		if ($numberrows > 0) {
			$data = $result->fetch_assoc();
			$string = implode('|',$data);
			return $string;
		}
		
		else{
			return '';
		}
	}

	public function salesReport(){
		$stmt = "SELECT * from customer_cart WHERE transcationID IS NOT NULL ORDER BY id";
		$result = $this->connect()->query($stmt);
		$numberrows = $result->num_rows;
		if ($numberrows > 0) {
			$datas  = [];
			while($data = $result->fetch_assoc())
			{
				if(count($datas) > 0) {
					if(array_search($data['transcationID'], $datas) ==  false ) 
					{
					 	array_push($datas, $data);
					}
					else
					{
						//array_push($new_data, $data);
					}
				}
				else{
					array_push($datas, $data);
				}

			}
			return $datas;

		}
		
		else{
			return '';
		}
	}

	public function getProductPrice($id)
	{
		$stmt = "SELECT productPrice FROM product where id = '$id'";
		$result= $this->connect()->query($stmt);
		$numberrows = $result->num_rows;
		if ($numberrows > 0) {
			$data = $result->fetch_assoc();
			$string = implode('|',$data);
			return $string;
		}
		else{

		}
	}

	public function getParticularCustomer($id){
		$stmt = "SELECT * from customer_cart where transcationID = '$id'";
		$result = $this->connect()->query($stmt);
		$numberrows = $result->num_rows;
		if ($numberrows > 0) {
			$data = $result->fetch_assoc();
			return $data;
		}
		else{
			return '';
		}
	}


/* ===================================================================*/
}
// end of class
$object = new user();