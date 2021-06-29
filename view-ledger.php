<?php
require_once'connect.php';
require_once'header.php';
?>



<div class="main">
	<div class="container">
        <h2>Ledger</h2>
        <div class="jumbotron">
	      <div class="row ">
           <!-- <div class="col-md-8 col-md-offset-2"> -->
           <form action="" method="POST" style="background-color: skyblue;">

           	Account: <select class="js-example-basic-single" name="acounts" id="acounts"  style="width: 33%" >
              <option><?php echo "Acc_Code/AccName/AccCont/AccAddr/Headname";  ?></option>
            </select> 
            Voucher Type:<input type="number" name="voucher_type"> From:<input type="date" name="fromdate"> To:<input type="date" name="todate"><br>
           
           </form><br><br>

     <table class="table table-bordered table-striped">
                <tr>
               <td> DATED</td>
               <td>INVOICE</td>
               <td>VOUCHER</td>
               <td>ENTRY TYPE</td>
               <td>DEBIT</td>
               <td>CREDIT</td>
               <td>BALANCE</td>
               <td>hhhhh</td>
               <td>REMARKS</td>

               </tr>
                
                 <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>Total</td>

            </tr>

            </table>
            
           </div>
                     </div>
        </div>	
	</div>

</div>
