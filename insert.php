<?php
require_once'connect.php';
authenticate();
require_once'header.php';






?>
<?php
$table = "itemsnames";
        $col = "item_code";
	    include('max.php');
        $item_code = $max;
// insertion
if(isset($_POST['addnew'])){
	if(empty($_POST['item_code']) || empty($_POST['item_name']) || empty($_POST['englishname']) || empty($_POST['purchaserate']) || empty($_POST['salerate']) ||empty($_POST['wholesalerate']) ||empty($_POST['madrasarate'])||empty($_POST['viprate']) ||empty($_POST['brand']) ||empty($_POST['total_quantity']) )
	{
      echo "Fill out all the fields";
	}//empty if end
	else{
		
        
		 // $code = $_POST['code'];
		$item_name = $_POST['item_name'];
		$englishname = $_POST['englishname'];
		$purchaserate  = $_POST['purchaserate'];
		$salerate = $_POST['salerate'];
		$wholesalerate = $_POST['wholesalerate'];
		$madrasarate = $_POST['madrasarate'];
		$viprate = $_POST['viprate'];
		$brand = $_POST['brand'];
		$total_quantity = $_POST['total_quantity'];

		$sql = "INSERT INTO itemsnames(item_code, item_name, englishname, purchaserate, salerate, wholesalerate, madrasarate, viprate, brand,total_quantity)
		values('$item_code','$item_name','$englishname','$purchaserate','$salerate','$wholesalerate','$madrasarate','$viprate','$brand','$total_quantity') ";

		if( $con->query($sql) === TRUE){ ?>
				<div class='alert alert-success'>Successfully added new item</div>

			<?php

			 }else{
				?>
     <div class='alert alert-danger'>Error: There was an error while adding new item</div>
			<?php }
   
	}
	 
          
	  
}
// header('location: insert.php');  
 ?>
<div class="container">
	<div class="col-xs-3">
		<div class="jumbotron">
		<div class="row">
			<h3><i class="glyphicon glyphicon-plus"></i>&nbsp; Add New Item</h3> <hr>
			<form action="" method="POST">
				<table >
				<label for="code">Code</label>
				<input type="number" id="item_code"  name="item_code" value="<?php echo $item_code  ?>" readonly="readonly" class="form-control" >

				<label for="item_name" >Name</label>
				<input type="text"  name="item_name" id="item_name"  autofocus class="form-control">
				<label for="englishname">English Name</label>
				<input type="text" name="englishname" id="englishname" class="form-control"><br>
				<label for="purchaserate">Purchase Rate</label> 
				<input type="number"  name="purchaserate" id="purchaserate" class="form-control">
					<label for="salerate">Sale Rate</label> 
				<input type="number"  name="salerate" id="salerate" class="form-control">
					<label for="wholesalerate">Wholehsale Rate</label> <br>
				<input type="number"  name="wholesalerate" id="wholesalerate" class="form-control">
					<label for="madrasarate">Madrasa Rate</label> 
				<input type="number"  name="madrasarate" id="madrasarate" class="form-control">
					<label for="viprate">VIP Rate</label> 
				<input type="number"  name="viprate" id="viprate" class="form-control">
					<label for="brand">Brand</label> 
				<input type="text"  name="brand" id="brand" class="form-control"><br>
				<label for="total_quantity">Total Quantity</label> 
				<input type="number"  name="total_quantity" id="total_quantity" class="form-control"><br>
				<input type="submit" name="addnew" class="btn btn-info" value="Add New item">
			</table>
			</form>
		</div>
	</div>
</div>
<?php
require_once'list.php';
?>