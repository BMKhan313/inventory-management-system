<?php
require_once'connect.php';
authenticate();
require_once'header.php';

echo"<div class='container'>";
?>
<?php
 $sql = "SELECT * from sales_invoice_return";
  $result = $con->query($sql) or die("failed to retrieve data");

  if($result->num_rows > 0){

?>

<table class="table table-striped table-bordered">
	<tr>
		  <h2>Sales return Invoices List</h2>

           <td>Invoice No</td>
           <td>Item Code</td>
           <td>Item Name</td>
           <td>Dated</td>
           <td>Purchase Rate</td>
           <td>Sale Rate</td>
           <td>Quantity</td>
           <td>Amount</td>
           <td>Acount Code</td>
           <td>Name</td>
           <td>Contact</td>
		       <td>Address</td>
           <td>HeadName</td>
	</tr>


<?php
  while($row = $result->fetch_assoc()){
   echo"<form action='' method='POST'>";
   echo"<input type='hidden' value='".$row['item_code']."' name='item_code'/> ";
    echo"<input type='hidden' value='".$row['acount_code']."' name='acount_code'/> ";
    echo"<tr>";
    echo"<td>".$row['invoice_no']. "</td>";
    echo"<td>".$row['item_code']. "</td>";
    echo"<td>".$row['item_name']. "</td>";
    echo"<td>".$row['dated']. "</td>";
    echo"<td>".$row['purchaserate']. "</td>";
    echo"<td>".$row['salerate']. "</td>";
  	echo"<td>".$row['quantity']. "</td>";
  	echo"<td>".$row['amount']. "</td>";
  	echo"<td>".$row['acount_code']. "</td>";
  	echo"<td>".$row['name']. "</td>";
  	echo"<td>".$row['contact']. "</td>";
  	echo"<td>".$row['address']. "</td>";
  	echo"<td>" .$row['headname']. "</td>";
    echo"</form>";

  }

?>
</table>
<?php }else{
	echo"No record found";
} ?>
<?php echo"</div>"; ?>