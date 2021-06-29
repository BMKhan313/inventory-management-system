<?php 
require_once'connect.php';
require_once'header.php';
?>
<?php
$table = "acount_ledger_temp";
        $col = "voucher_no";
	    include('max.php');
        $voucher_no = $max;
         
?>

  <!-- PHP -->
    <?php
            if(isset($_POST['save'])){
            	if( empty($_POST['voucher_no']) || empty($_POST['dated']) || empty($_POST['acounts']) || 
            		empty($_POST['previous_blc']) || empty($_POST['amount']) || empty($_POST['remarks']))
  	
  	{   
        echo "<div class='alert alert-danger'>Please fill out all fields </div>";
  	} 
  	else  

  	{

         $voucher_no = $_POST['voucher_no'];
         $dated = $_POST['dated'];
         $acounts = $_POST['acounts'];
         $account_split = explode("|",$acounts);
         $ac_code = $account_split[0];
         $ac_name = $account_split[1];
         $ac_address = $account_split[2];

         $previous_blc = $_POST['previous_blc'];
         $amount = $_POST['amount'];
         $remarks = $_POST['remarks'];
         $headcode = $_POST['headcode'];
         $headname = $_POST['headname'];
         // $cash_hsplit = explode("|",$headname);
         // $cash_hcode = $cash_hsplit[1];
         // $cash_hname = $cash_hsplit[0];


         $sql = "INSERT INTO acount_ledger_temp(voucher_no,dated,acount_code,acount_name,acount_address,previous_blc,credit,remarks,headcode,headname) 
         VALUES('$voucher_no','$dated','$ac_code','$ac_name','$ac_address','$previous_blc','$amount','$remarks','$headcode','$headname')"; 

         if($con->query($sql) === TRUE){
  
         ?>
         <div class="alert alert-success"> added to temp ledger successfully</div>
         <?php
        }else{
         ?>
         <div class="alert alert-danger">Error: There was an error adding to temp Ledger</div>
         <?php
        }

  	 }
            }

     ?>


<!-- HTML -->
<div class="container">
	<div class="col-xs-40">
	<div class="jumbotron" > 
		<!-- <div class="row"> -->
          <h3><i class="glyphicon glyphicon-plus"></i>&nbsp; Cash Receipt</h3> <hr>
			<form action="" method="POST">
				<table >
				<label for="voucher">voucher</label>
				<input type="number" id="voucher_no"  name="voucher_no" value="<?php echo $voucher_no  ?>" readonly="readonly" >&nbsp;&nbsp;
                 <label for="Dated" >Dated</label>
				<input type="date"  name="dated" id="dated" value="<?php echo date('Y-m-d'); ?>"  >&nbsp;&nbsp;
				<label for="acounts">Acounts</label>
				<select class="js-example-basic-single" name="acounts" id="acounts" autofocus style="width: 35%" >
              <?php 
           $sql = "SELECT * FROM acounts";
          $res = $con->query($sql);
          ?>
         <option><?php echo "Acount code | Acount Name | Head Code | Head Name"  ?></option>
        <?php
         while($row = $res->fetch_assoc()){ 
       ?>
        <option value="<?php echo $row['acount_code']."|". $row['name']."|". $row['headcode']."|". $row['headname']; ?>" ><?php echo $row['acount_code']." | ". $row ['name']." | ". $row['headcode']." | ". $row['headname']; ?></option>
      <?php }
      ?>
       </select><br><br>
				
				<label for="previous_blc">Previous Balance</label> 
				<input type="number"  name="previous_blc" id="previous_blc" >&nbsp;&nbsp;
					<label for="amount">Amount(Crd)</label> 
				<input type="number"  name="amount" id="amount"  >&nbsp;&nbsp;
					<label for="remarks">Remarks</label> 
				<input type="text"  name="remarks" id="remarks"  >&nbsp;&nbsp;&nbsp;&nbsp;
				
				<input type="submit" name="save" class="btn btn-info" value="Save">
			</table>
			</form>
			
		</div>
	</div>
	</div>
</div>
<?php
 require_once"cash-receipt-report.php";
    ?>