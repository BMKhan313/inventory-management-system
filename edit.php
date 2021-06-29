<?php 
require_once'connect.php';
require_once'header.php';

 ?>
<div class="container">
	<!-- select max(item_code) as item_code from itemsnames 'condtion' ; -->
<?php

if(isset($_POST['update'])){
	// if(empty($_POST['item_code']) || empty($_POST['item_name']) || empty($_POST['englishname']) || empty($_POST['purchaserate']) || empty($_POST['salerate']) ||empty($_POST['wholesalerate']) ||empty($_POST['madrasarate'])||empty($_POST['viprate']) ||empty($_POST['brand']) ||empty($_POST['total_quantity']))
	// {
 //      echo"Please Fill out All the Fields";
	// }else{
		
		$item_code = $_POST['item_code'];
		$item_name = $_POST['item_name'];
		$englishname = $_POST['englishname'];
		$purchaserate  = $_POST['purchaserate'];
		$salerate = $_POST['salerate'];
		$wholesalerate = $_POST['wholesalerate'];
		$madrasarate = $_POST['madrasarate'];
		$viprate = $_POST['viprate'];
		$brand = $_POST['brand'];
		$total_quantity = $_POST['total_quantity'];

		$sql = "UPDATE itemsnames SET item_code='{$item_code}',item_name='{$item_name}',englishname='{$englishname}',purchaserate='{$purchaserate}',salerate='{$salerate}',wholesalerate='{$wholesalerate}',madrasarate='{$madrasarate}',viprate='{$viprate}',brand='{$brand}',total_quantity='{$total_quantity}' WHERE item_code = " . $_POST['item_code'];

		
		if($con->query($sql)===TRUE){

			echo"<div class='alert alert-success'>Record succesfully Updated</div>";
			
		}else{
			
			echo"<div class='alert alert-danger'>Error while Updating record</div>";

			
		}
	}

 

   $item_code = isset($_GET['item_code']) ? (int) $_GET['item_code'] : 0;
   //echo $item_code;
	$sql = "SELECT * FROM itemsnames WHERE item_code='$item_code'";
	$result = $con->query($sql) or die('failed');

	if($result->num_rows < 1){
		header('Location: index.php');
		exit;
	}
	$row = $result->fetch_assoc();
?>
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="box">
			<h3><i class="glyphicon glyphicon-plus"></i>&nbsp;MODIFY User</h3> 
			<form action="" method="POST" >
				
				<input type="hidden" value="<?php echo $row['item_code']; ?>" name="item_code">
				
				<label for="item_code">Item code</label>
				<input type="number"   name="item_code" value="<?php echo $row['item_code']; ?>" class="form-control" required="required"><br>

				<label for="item_name">Item name</label>
				<input type="text" name="item_name" value="<?php echo $row['item_name']; ?>" class="form-control" required="required"><br>

				<label for="englishname">English Name</label>
				<input type="text" name="englishname" value="<?php echo $row['englishname']; ?>" class='form-control' required="required">
				<br>

				<label for="purchaserate">Purchase rate</label> 
				<input type="number"  name="purchaserate" id="purchaserate"  value="<?php echo $row['purchaserate']; ?>" class="form-control" required="required"><br>

				<label for="salerate">Sale Rate</label>
                <input type="number" name="salerate" value="<?php echo $row['salerate'] ?>" class='form-control' required="required"><br>

                 <label for="wholesalerate">WholeSale Rate</label>  
                <input type="number" name="wholesalerate" value="<?php echo $row['wholesalerate'] ?>" class='form-control' required="required"><br>
                <label for="madrasarate">Madrasa Rate</label>
                <input type="number" name="madrasarate" value="<?php echo $row['madrasarate'] ?>" class='form-control' required="required"><br>

                <label for="viprate">VIP Rate</label>
                <input type="number" name="viprate" value="<?php echo $row['viprate'] ?>" class='form-control' required="required" required="required"><br>

                <label for="brand">Brand</label>
                <input type="text" name="brand" value="<?php echo $row['brand'] ?>" class='form-control' required="required"><br>
               
                <label for="total_quantity">Total Quantity</label>
                <input type="text" name="total_quantity" value="<?php echo $row['total_quantity'] ?>" class='form-control' required="required"><br>

				<input type="submit" name="update" class="btn btn-success" value="Update">
			</form>
		
				</div>
	</div>
	</div>
</div>
<?php

