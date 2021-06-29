
<?php
require_once('connect.php');
authenticate();

require_once('header.php');
$userid = $_SESSION['username']['id'];
 echo "<div class='container'>";
 
?>
<div class="jumbotron" style="justify-content: space-around; ">
<?php 
// For autoIncrement sales_invoice
$table = "sales_invoice_return";
$col = "invoice_no";
include('max.php');
$invoice = $max;
?>
<!-- insert data to sales_invoice table -->
<?php  
     if(isset($_POST['addnewsalesreturn'])){
    

    // For autoIncrement sales_invoice
$table = "sales_invoice_return";
$col = "invoice_no";
include('max.php');
$invoice_no = $max;

    
    $dated = $_POST['dated'];
 //splitting   
    $item = $_POST['item'];
    $item_split = explode("|",$item);
    $item_code = $item_split[0];
    $item_name = $item_split[1];
   

    $purchaserate = $_POST['purchaserate'];
    $salerate = $_POST['salerate'];
    $quantity  = $_POST['quantity'];
    $amount = $_POST['amount'];

     
     
     $acount = $_POST['acounts'];
     $acc_split = explode("|", $acount);

     $acount_code = $acc_split[0];
     $name = $acc_split[1];
     $contact = $acc_split[2];
     $address = $acc_split[3];
     $headname = $acc_split[4];


    $sql2 = "SELECT total_quantity from itemsnames WHERE item_code = '$item_code' ";
    $result2 = $con->query($sql2);
    $row2 = $result2->fetch_assoc();

    $existingQty = $row2['total_quantity'];
    $newQty = $existingQty + $quantity;
    
    $qry2 = "UPDATE itemsnames SET total_quantity = '$newQty' WHERE item_code = '$item_code' "; 
     
    if($con->query($qry2)){ ?>
       <!-- <div class="alert alert-success">sale succesfully returned</div> -->
             <?php }else{
        ?>
     <div class='alert alert-danger'>Error: <?php echo $con->error; ?></div>
 
      <?php }
        

     
    $sql = "INSERT INTO sales_invoice_return (invoice_no, item_code, item_name, dated, purchaserate,salerate, quantity, amount,acount_code,name,contact,address,headname,userid)
    values ('$invoice_no','$item_code','$item_name', '$dated', '$purchaserate','$salerate' ,'$quantity', '$amount','$acount_code','$name','$contact','$address','$headname','$userid')";  
   

     if($con->query($sql)){ ?>
       <div class="alert alert-success">Return Data succesfully added</div>
             <?php }else{
        ?>
     <div class='alert alert-danger'>Error: <?php echo $con->error; ?></div>
 
      <?php }  
  }
?>
<!-- end -->
<form action="" method="POST">
  <!-- <input type="hidden" name="userid" > -->
Invoice:<input type="number" name="invoice_no" value="<?php echo $invoice ?>" readonly="readonly"/>
Dated: <input type="date" name="dated" value="<?php echo date('Y-m-d'); ?>" />
<?php   
    $sql = "SELECT * from acounts";
    $res = $con->query($sql);
?>
 <div id="acount" style="width: 53%; margin-left: 55px;">
    <table class="table table-bordered table-striped"><br>
      <tr>
        <td>Acount Code</td>
        <td>Name</td>
        <td>Contact</td>
        <td>Adddress</td>
        <td>HeadName</td>
      </tr>
    </table>
  </div> 
 Acounts: <select class="js-example-basic-single" name="acounts" id="acounts"  style="width: 53%" >
   
     <option><?php echo "acount_Code/Name/Contact/Address/Headname";  ?></option> 
    <?php 
    while($row = $res->fetch_assoc()){
     ?>
      <option value="<?php echo $row['acount_code']."|". $row['name']."|". $row['contact']."|". $row['address']."|". $row['headname']; ?>" ><?php echo $row['acount_code']." | ". $row['name']." | ". $row['contact']." | ". $row['address']." | ". $row['headname'];  ?></option>
<?php
}
?>

 </select><br>

<br><br>

<?php	

?>
<!-- </table> -->
<?php   
    $sql = "SELECT * from itemsnames";
    $res = $con->query($sql);


?>
<div id="search" style="width: 53%; margin-left: 88px;">
    <table class="table table-bordered table-striped"><br>
      <tr>
        <td>Item Code</td>
        <td>Item Name</td>
        <!-- <td>Purchase Rate</td> -->
        <td>Sale Rate</td>
        
      </tr>
    </table>
  </div> 

Search items: <select class="js-example-basic-single" name="item" id="item"   onchange="getSRate();" style="width: 53%;">
 <option ><?php echo "ItemCode/ItemName/Sale Rate"; ?></option>
  <?php 

    while($row = $res->fetch_assoc()){
     ?>
       
      <option value="<?php echo $row['item_code']."|".$row['item_name']."|".$row['salerate']; ?>"><?php echo $row['item_code']." | ".$row['item_name']."  |  ".$row['salerate'] ;
       ?></option>
<?php

}

?>

 </select><br>
<br><br>
<!-- Purchase Rate: <input type="number" name="purchaserate" id="purchaserate"  /> -->
Sale Rate: <input type="number" name="salerate" id="salerate"  />
Quantity:<input type="number" name="quantity" id="quantity" onkeyup="saletotal();" />
Amount: <input type="number" name="amount" id="amount" readonly="readonly" />
<input type="submit" name="addnewsalesreturn" class="btn btn-info" value="Add"><br>

<!-- <button><a href="purchaselist.php">Purchase InvoiceList</a></button> -->

</form>

 </div>
 <?php
 require_once('sales_invoice_temp.php');
?>
