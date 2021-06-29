<?php 
require_once'connect.php';
authenticate();
require_once'header.php';

?>
 
 <?php
  $sql = "SELECT voucher_no,dated,acount_code,acount_name,headcode,headname,previous_blc,credit,remarks from acount_ledger_temp GROUP BY voucher_no";
  $result = $con->query($sql) or die("failed to retrieve data");
   // echo $con->connect_error;
  // echo $voucher_no;
  if($result->num_rows > 0) {

 ?>

<div class="container">

 <div class="jumbotron">
 	<h2>Cash Receipt Report</h2>
   <table class="table table-bordered table-striped">
   	<tr>
   		<td>Voucher No.</td>
   		<td>Date</td>
   		<td>Account Code</td>
   		<td>Account Name</td>
   		<td>Head Code</td>
   		<td>Head Name</td>
   		<td>Previous Balanace</td>
   		<td>Amount</td>
   		<td>Remarks</td>
   		<!-- <td></td> -->
   	</tr>
   
<?php 
       while($row = $result->fetch_assoc()){
       	
         echo"<form action='' method='POST' />";
        echo"<input type='hidden' value='".$row['voucher_no']."' name='voucher_no' />";
        echo "<tr>";
        echo "<td>".$row['voucher_no']."</td>";
        echo "<td>".$row['dated']."</td>";
        echo "<td>".$row['acount_code']."</td>";
        echo "<td>".$row['acount_name']."</td>";
        echo "<td>".$row['headcode']."</td>";
        echo "<td>".$row['headname']."</td>";
        echo "<td>".$row['previous_blc']."</td>";
        echo "<td>".$row['credit']."</td>";
        echo "<td>".$row['remarks']."</td>";
         }
         ?>
</table>
<?php 
  }else{
  	echo"<br><h2>NO record found</h2>";
  }	
  ?>
</div>
</div>
<?php

?>