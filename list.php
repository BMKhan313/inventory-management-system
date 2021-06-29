<?php
require_once'connect.php';
authenticate();
require_once'header.php';

echo "<div class='container'>";

//delete

if(isset($_POST['delete'])){
	$sql = "DELETE FROM itemsnames WHERE item_code =" .$_POST['item_code'];
    
    if($con->query($sql)===TRUE){
    	echo"<div class='alert alert-success'>Deleted Successfully</div>";
    }else{
              echo"<div class='alert alert-danger'>Error while deleting</div>";
    }
}

$sql = "SELECT * from itemsnames";
$result = $con->query($sql);
if($result->num_rows > 0 ){
 
?>
<table class="table table-bordered table-striped">
 <tr>
 	<td>Item code</td>
 	<td>Item Name</td>
    <td>EnglishName</td>
    <td>PurchaseRate</td>
    <td>SaleRate</td>
    <td>WholeSale</td>
    <td>Madrasarate</td>
    <td>VIP</td>
    <td>Brand</td>
    <td>Total Quantity</td>
    <td width="70px">Delete</td>
	<td width="70px">EDIT</td>
    

 </tr>
<?php	
  while($row = $result->fetch_assoc()){
  	echo"<form action='' method='POST'>";
    echo"<input type='hidden' value='" .$row['item_code']."' name='item_code' />";
    echo"<tr>";
    echo"<td>".$row['item_code']. "</td>";
    echo"<td>".$row['item_name']. "</td>";
    echo"<td>".$row['englishname']. "</td>";
  	echo"<td>".$row['purchaserate']. "</td>";
  	echo"<td>".$row['salerate']. "</td>";
  	echo"<td>".$row['wholesalerate']. "</td>";
  	echo"<td>".$row['madrasarate']. "</td>";
  	echo"<td>".$row['viprate']. "</td>";
  	echo"<td>".$row['brand']. "</td>";
    echo"<td>".$row['total_quantity']. "</td>";
  	echo"<td> <input type='submit' name='delete' value='Delete' class='btn btn-danger'/></td> ";
  	echo"<td><a href='edit.php?item_code=".$row['item_code']."' class='btn btn-info'>Edit</a></td>";

  	echo"</form>";
  }

?>
</table>
<?php
}else{
	echo"No Record found";
}
?>
</div>


