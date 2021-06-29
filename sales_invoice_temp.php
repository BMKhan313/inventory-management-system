
<?php
require_once('connect.php');
authenticate();
 require_once('header.php');
$userid = $_SESSION['username']['id'];
 echo "<div class='container' style='border: 2px solid red;'>";
 
?>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<div>

 <?php

     if(isset($_POST['addToPermanentTable'])){
    

    // For autoIncrement sales_invoice
$table = "sales_invoice";
$col = "invoice_no";
include('max.php');
$invoice_no = $max;

//# select from temp_table
  $sql = "SELECT * FROM sales_invoice_temp where userid = '$userid' ";
  $result = $con->query($sql);
  while($row = $result->fetch_assoc()){                 //while
  
  
  $item_code = $row['item_code'];
   $item_code = $row['item_code'];
   $item_name = $row['item_name'];
   $dated = $row['dated'];
   $purchaserate = $row['purchaserate'];
   $salerate = $row['salerate'];
   $quantity = $row['quantity'];
   $amount = $row['amount'];
   $acount_code = $row['acount_code'];
   $name = $row['name'];
   $contact = $row['contact'];
   $address = $row['address'];
   $headname = $row['headname'];
   //$userid = $row['userid'];
    

    $sql3 = "SELECT total_quantity from itemsnames WHERE item_code = '$item_code' ";
    $result3 = $con->query($sql3);
    $row3 = $result3->fetch_assoc();

    $existingQty = $row3['total_quantity'];
    $newQty = $existingQty - $quantity;
    
    $qry3 = "UPDATE itemsnames SET total_quantity = '$newQty' WHERE item_code = '$item_code' "; 
     
   if($con->query($qry3)){ ?>
      <div class="alert alert-success">Sale successfuly done </div> 
             <?php }else{
        ?>
     <div class='alert alert-danger'>Error: <?php echo $con->error; ?></div>
 
      <?php }



    //insert into permanent_table 
    $sql = "INSERT INTO sales_invoice (invoice_no, item_code, item_name, dated, purchaserate,salerate ,quantity, amount,acount_code,name,contact,address,headname,userid)
    values ('$invoice_no','$item_code','$item_name', '$dated', '$purchaserate','$salerate' ,'$quantity', '$amount',
    '$acount_code','$name','$contact','$address','$headname','$userid')"; 

if(!$con->query($sql)){ ?>
       <div class='alert alert-danger'>Error: <?php echo $con->error; ?></div>
             <?php }else{
        ?>
     
 
      <?php }

                     
}  //endwhile
  

  $sql = "DELETE from sales_invoice_temp where userid='$userid' ";  //delete from temp
  if(!$con->query($sql)){ ?>
       <div class='alert alert-danger'>Error: <?php echo $con->error; ?></div>
             <?php }else{?>
              <div class='alert alert-success'>Succesfully Saved And You have no Data</div>
            <?php }
         
  }

  


  $sql = "SELECT * from sales_invoice_temp WHERE userid = '$userid'";
  $result = $con->query($sql);
  if($result->num_rows > 0){

 ?>
<div>
    <table class="table table-bordered table-striped"><br>
      <tr>
        <td>Invoice No</td>
        <td>Item code</td>
        <td>Item Name</td>
        <!-- <td>Purchase Rate</td> -->
        <td>Sale Rate</td>
        <td>Quantity </td>
        <td>Amount</td>
      </tr>
    
  </div> 
  <?php
  while($row = $result->fetch_assoc()  ){
    echo"<form action='' method='POST' >";
    echo"<input type='hidden' value='".$row['invoice_no']."' name='invoice_no'  >";
    echo"<input type='hidden' value='".$row['userid']."' name='userid'  >";
    echo"<tr>";
    echo"<td>".$row['invoice_no']. "</td>";
    echo"<td>".$row['item_code']. "</td>";
    echo"<td>".$row['item_name']."</td>";
    // echo"<td>".$row['purchaserate']. "</td>";
    echo"<td>".$row['salerate']. "</td>";
    echo"<td>".$row['quantity']. " </td>";
    echo"<td>".$row['amount']. "</td>"; 
    $total_amount = $total_amount + $row['amount'];  //total amount
    $total_qty = $total_qty + $row['quantity'];
    
  }
    
 
 }?>
 <?php if($result->num_rows > 0) { ?>
 <input type='submit' value='Save' name='addToPermanentTable' />
 <?php
    echo "<hr>"."total_amount= "." ".$total_amount."<br>";
    echo "total_qty= "." ".$total_qty."<hr>";
?>
<?php }else{ ?>
  <input type='hidden' value='Save' name='addToPermanentTable' />

<?php
}
 echo"</form>";
  // echo"<td> <input type='submit' name='add' value='Add' class='btn btn-info'/></td> ";
?>

  </table>

 
</div>
</div


 