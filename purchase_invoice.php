
<?php
require_once('connect.php');
authenticate();

require_once('header.php');
$userid = $_SESSION['username']['id'];
 echo "<div class='container'>";
 
?>
<div class="jumbotron" style="justify-content: space-around; ">
<?php 
// For autoIncrement purchase_invoice
$table = "purchase_invoice";
$col = "invoice_no";
include('max.php');
$invoice = $max;
?>
<!-- insert data to purchase_invoice table -->
<?php  
     if(isset($_POST['addnewpurchase'])){
    

    // For autoIncrement purchase_invoice
$table = "purchase_invoice";
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
    $quantity  = $_POST['quantity'];
    $amount = $_POST['amount'];

     
     
     $acount = $_POST['acounts'];
     $acc_split = explode("|", $acount);

     $acount_code = $acc_split[0];
     $name = $acc_split[1];
     $contact = $acc_split[2];
     $address = $acc_split[3];
     $headcode = $acc_split[4];
     $headname = $acc_split[5];

     
    $sql = "INSERT INTO purchase_invoice_temp (invoice_no, item_code, item_name, dated, purchaserate, quantity, amount,acount_code,name,contact,address,headcode,headname,userid)
    values ('$invoice_no','$item_code','$item_name', '$dated', '$purchaserate', '$quantity', '$amount','$acount_code','$name','$contact','$address','$headcode','$headname','$userid')";  
     
        
    if( $con->query($sql) === TRUE){ ?>
        <div class='alert alert-success'>Successfully added new item</div>
      <?php }else{
        ?>
     <div class='alert alert-danger'>Error: <?php echo $con->error; ?></div>
      <?php }
      // header('location:purchase_invoice.php');

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

 <div id="acount" style="width: 53%; margin-left: 55px; ">
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
      <option value="<?php echo $row['acount_code']."|". $row['name']."|". $row['contact']."|". $row['address']." | ". $row['headcode']."|". $row['headname']; ?>" ><?php echo $row['acount_code']." | ". $row['name']." | ". $row['contact']." | ". $row['address']." | ".$row['headname'];  ?></option>
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
        <td>Purchase Rate</td>
        
      </tr>
    </table>
  </div> 

Search items: <select class="js-example-basic-single" name="item" id="item"   onchange="getPRate ();" style="width: 53%;">
 <option ><?php echo "ItemCode/ItemName/Purchase Rate"; ?></option>
  <?php 

    while($row = $res->fetch_assoc()){
     ?>
       
      <option value="<?php echo $row['item_code']."|".$row['item_name']."|".$row['purchaserate']; ?>"><?php echo $row['item_code']." | ".$row['item_name']."  |  ".$row['purchaserate'] ;
       ?></option>
<?php

}

?>

 </select><br>
<br><br>
Purchase Rate: <input type="number" name="purchaserate" id="purchaserate"  />
Quantity:<input type="number" name="quantity" id="quantity" onkeyup="total();" />
Amount: <input type="number" name="amount" id="amount" readonly="readonly" />
<input type="submit" name="addnewpurchase" class="btn btn-info" value="Add"><br>

<!-- <button><a href="purchaselist.php">Purchase InvoiceList</a></button> -->

</form>

 </div>
 <?php
 require_once('purchase_invoice_temp.php');
?>
