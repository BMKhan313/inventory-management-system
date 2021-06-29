<?php
require_once'connect.php';
authenticate();
require_once'header.php';

echo"<div class='container'>";
?>
<?php



//delete    

if(isset($_POST['delete'])){
  

$invoice_no = $_POST['invoice_no'];

$sql4 = "SELECT * from purchase_invoice WHERE invoice_no = '$invoice_no' ";

$result4 = $con->query($sql4) or die("failed to retrieve from purchase_invoice");

while ($row = $result4->fetch_assoc()) {

$item_code = $row['item_code'];
$quantity = $row['quantity'];

$sql5 = "SELECT * from itemsnames WHERE item_code = '$item_code' ";

$existingQty = $row['quantity'];
$newQty = $existingQty - $quantity;

$sql6 = "UPDATE itemsnames SET total_quantity = '$newQty' WHERE item_code = '$item_code' ";
 $con->query($sql6); 
  # code...
}
$sql7 = "DELETE FROM purchase_invoice WHERE invoice_no = '".$_POST['invoice_no']."'";


    if($con->query($sql7)===TRUE){
      echo"<div class='alert alert-success'>Deleted Successfully</div>";
    }else{
              echo"<div class='alert alert-danger'>Error : echo $con->error; </div>";
    }

  

    

}
//

 $sql = "SELECT invoice_no,item_name,dated,purchaserate,quantity,amount,acount_code,name,address from purchase_invoice GROUP BY invoice_no";

  $result = $con->query($sql) or die("failed to retrieve data");

  if($result->num_rows > 0){

?>

<table class="table table-striped table-bordered">
	<tr>
		  <h2>Purchase Invoices List</h2>

           <td>Invoice No</td>
           <!-- <td>Item Code</td> -->
           <td>Item Name</td>
           <td>Dated</td>
           <td>Purchase Rate</td>
           <td>Quantity</td>
           <td>Amount</td>
           <td>Acount Code</td>
           <!-- <td>Name</td> -->
           <!-- <td>Contact</td> -->
           <td>HeadName</td>
           <td>Address</td>
           <td>Delete</td>
	</tr>


<?php
  while($row = $result->fetch_assoc()){
   echo"<form action='' method='POST'>";
   // echo"<input type='hidden' value='".$row['item_code']."' name='item_code'/> ";
   echo"<input type='hidden' value='".$row['invoice_no']."' name='invoice_no'/> ";
    echo"<input type='hidden' value='".$row['acount_code']."' name='acount_code'/> ";
    echo"<tr>";
    echo"<td>".$row['invoice_no']. "</td>";
    // echo"<td>".$row['item_code']. "</td>";
    echo"<td>".$row['item_name']. "</td>";
    echo"<td>".$row['dated']. "</td>";
    echo"<td>".$row['purchaserate']. "</td>";
  	echo"<td>".$row['quantity']. "</td>";
  	echo"<td>".$row['amount']. "</td>";
  	echo"<td>".$row['acount_code']. "</td>";
  	// echo"<td>".$row['contact']. "</td>";
    echo"<td>".$row['name']. "</td>";
  	echo"<td>".$row['address']. "</td>";
    // echo "<td>".$row['headcode']."</td>";
  	// echo"<td>" .$row['headname']. "</td>";
    echo"<td> <input type='submit' name='delete' value='Delete' class='btn btn-danger'/></td> ";
    echo"</form>";

  }

?>
</table>
<?php }else{
	echo"No record found";
} ?>
<?php echo"</div>"; ?>