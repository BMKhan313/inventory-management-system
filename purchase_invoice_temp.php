
<?php
require_once('connect.php');
authenticate();
 require_once('header.php');
$userid = $_SESSION['username']['id'];
 echo "<div class='container' style='border: 2px solid silver;'>";
 
?>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<div>

 <?php
//delete 

     if(isset($_POST['delete'])){
           $sql = "DELETE FROM purchase_invoice_temp WHERE item_code =" .$_POST['item_code'];
           $con->query($sql)or('die');
     }

//add
     if(isset($_POST['addToPermanentTable'])){
    

    // For autoIncrement purchase_invoice
$table = "purchase_invoice";
$col = "invoice_no";
include('max.php');
$invoice_no = $max;

//# select from temp_table
  $sql = "SELECT * FROM purchase_invoice_temp where userid = '$userid' ";
  $result = $con->query($sql);
  while($row = $result->fetch_assoc()){                 //while
  
  
  
   $item_code = $row['item_code'];
   $item_name = $row['item_name'];
   $dated = $row['dated'];
   $purchaserate = $row['purchaserate'];
   $quantity = $row['quantity'];
   $amount = $row['amount'];
   $acount_code = $row['acount_code'];
   $name = $row['name'];
   $contact = $row['contact'];
   $address = $row['address'];
   $headcode = $row['headcode'];
   $headname = $row['headname'];
   //$userid = $row['userid'];
    

    $sql2 = "SELECT total_quantity from itemsnames WHERE item_code = '$item_code' ";
    $result2 = $con->query($sql2);
    $row2 = $result2->fetch_assoc();

    $existingQty = $row2['total_quantity'];
    $newQty = $existingQty + $quantity;
    
    $qry2 = "UPDATE itemsnames SET total_quantity = '$newQty' WHERE item_code = '$item_code' "; 
     
    if($con->query($qry2)){ ?>
      <!--  <div class="alert alert-success">Total Qty Succefully updated</div> -->
             <?php }else{
        ?>
     <div class='alert alert-danger'>Error: <?php echo $con->error; ?></div>
 
      <?php }



    //insert into permanent_table 
    $sql = "INSERT INTO purchase_invoice (invoice_no, item_code, item_name, dated, purchaserate, quantity, amount,acount_code,name,contact,address,headcode,headname,userid)
    values ('$invoice_no','$item_code','$item_name', '$dated', '$purchaserate', '$quantity', '$amount',
    '$acount_code','$name','$contact','$address','$headcode','$headname','$userid')"; 

if(!$con->query($sql)){ ?>
       <div class='alert alert-danger'>Error: <?php echo $con->error; ?></div>
             <?php }else{
        ?>
     
 
      <?php }

                     
}  //endwhile
  

  $sql = "DELETE from purchase_invoice_temp where userid='$userid' ";  //delete from temp
  if(!$con->query($sql)){ ?>
       <div class='alert alert-danger'>Error: <?php echo $con->error; ?></div>
             <?php }else{?>
       <?php    if($result->num_rows > 0){ ?>
              <div class='alert alert-success'>Succesfully Saved And You have no Data</div>
          <?php }else{ ?> 

        <?php } ?>
            <?php }
         
  }


  


  $sql = "SELECT * from purchase_invoice_temp WHERE userid = '$userid'";
  $result = $con->query($sql);
  if($result->num_rows > 0){

 ?>
<div>
    <table class="table table-bordered table-striped"><br>
      <tr>
        <td>Invoice No</td>
        <td>Item code</td>
        <td>Item Name</td>
        <td>Purchase Rate</td>
        <td>Quantity </td>
        <td>Amount</td>
        <td>Delete</td>
      </tr>
    
  </div> 
  <?php
  while($row = $result->fetch_assoc()  ){
    echo"<form action='' method='POST' >";
    echo"<input type='hidden' value='".$row['item_code']."' name='item_code'  />";
    echo"<input type='hidden' value='".$row['invoice_no']."' name='invoice_no'  >";
    echo"<input type='hidden' value='".$row['userid']."' name='userid'  >";
    echo"<tr>";
    echo"<td>".$row['invoice_no']. "</td>";
    echo"<td>".$row['item_code']. "</td>";
    echo"<td>".$row['item_name']."</td>";
    echo"<td>".$row['purchaserate']. "</td>";
    echo"<td>".$row['quantity']. " </td>";
    echo"<td>".$row['amount']. "</td>"; 
    
    echo"<td> <input type='submit' name='delete' value='Delete' class='btn btn-danger'/></td> ";
    $total_amount = $total_amount + $row['amount'];  //total amount
    $total_qty = $total_qty + $row['quantity'];
    
  }
 } ?>
 <?php if($result->num_rows > 0) { ?>
 <input type='submit' value='Save' name='addToPermanentTable' />
 <?php
    
    
?>
<?php }else{ ?>
  <input type='hidden' value='Save' name='addToPermanentTable' />

<?php
}
 echo"</form>";
  // echo"<td> <input type='submit' name='add' value='Add' class='btn btn-info'/></td> ";
?>

      <tr>
        <td> </td>
        <td></td>
        <td></td>
        <td>
     <?php if($result->num_rows>0){ ?> Total <?php } ?>
        </td>
        <td><?php  echo ""." ".$total_qty.""; ?></td>
        <td><?php echo ""." "." ".$total_amount.""; ?></td>
        
       </tr>

  </table>

 
</div>
</div>