<!DOCTYPE html>
<html>
<head>
	<title>Maktab syed ahmed shaheed</title>
</head>
<script
  src="jquery-3.6.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="select2/dist/css/select2.min.css" rel="stylesheet" />
<script src="select2/dist/js/select2.min.js"></script>

<style>
.dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  padding-bottom: 12px;
}

.dropdown {
  position: relative;
  display: inline-block;
  padding-left: 10px;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>

<style type="text/css">
  .box{
      background: #f0f0f0;
      padding: 20px;
    }
</style>
<body>
  <script type="text/javascript">

// function getAcount(){
//   var acount = document.getElementById('acounts');
//   var 
// }

function getPRate (){
var item = document.getElementById('item').value;
var purchaseRate = item.split("|");
 var item_code = purchaseRate[0];
 var item_name = purchaseRate[1];
var prate = purchaseRate[2];

document.getElementById('purchaserate').value = prate;

}

function getSRate(){
  var item = document.getElementById('item').value;
  var saleRate = item.split("|");
  var item_code = saleRate[0];
  var item_name = saleRate[1];
  var sRate = saleRate[2];

  document.getElementById('salerate').value = sRate;
}

//for multiplication of qty*Prate

 function total(){
    
    var a = Number(document.getElementById('purchaserate').value);
    var b = Number(document.getElementById('quantity').value);
    var c = a * b;
    document.getElementById('amount').value = c;
 }
//sale total
function saletotal(){
    
    var x = Number(document.getElementById('salerate').value);
    var y = Number(document.getElementById('quantity').value);
    var z = x * y;
    document.getElementById('amount').value = z;
 }


  $(document).ready(function() {
    $('.js-example-basic-single').select2();

});   
  </script>
  
  <div class="container">
   <nav class="navbar navbar-default">
   	<div class="navbar-header">
   	 <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
    <a class="navbar-brand" href="index.php" style="color:red;">Maktaba syed ahmed shaheed</a>
</div>
 
 <div id="navbar" class="navbar-collapse collapse">

        <ul class="nav navbar-nav">
          
         <!--  <li><a href="insert.php">Create New Items </a></li>
          <li><a href="list.php">Items list</a></li>
          <li><a href="acounts.php">Create New Acounts</a></li> 
          <li><a href="acountlist.php">Acount list</a></li>
          <li><a href="purchase-invoice.php">Purchase Invoice</a> -->

<li class="active" ><a href="index.php" style=" background-color: #4CAF50; color: white;">Home</a></li>
           
    <div class="dropdown" >       
  <button class="dropbtn" >Create New Items</button>
  <div class="dropdown-content">
    <a href="insert.php">Create New Items</a>
    <a href="list.php">Items List</a>
    
  
        </div>
      </div>
      <!-- end -->
            <div class="dropdown" >       
  <button class="dropbtn" >Open Purchase</button>
  <div class="dropdown-content">
    <a href="purchase_invoice.php">Create Purchase Invoice</a>
    <a href="purchaselist.php">Purchase Invoice report</a>
  
        </div>
      </div>

       <!-- sales   -->
        <div class="dropdown" >       
  <button class="dropbtn" >Open Sales</button>
  <div class="dropdown-content">
    <a href="sales_invoice.php">Create Sales Invoice</a>
    <a href="saleslist.php">Sales Invoice Report</a>
    <a href="sales_invoice_return.php">Sales Invoice return</a>
    <a href="sales_invoice_return_list.php">Sales return Report</a>
   
        </div>
</div>
   <!-- sales end -->
  <!-- Acounts -->
 <div class="dropdown" >       
  <button class="dropbtn" >Accounts</button>
  <div class="dropdown-content">
    <a href="acounts.php">Create New Accounts</a>
    <a href="acountlist.php">Open Account Report</a>
    <a href="head.php">Heads</a>
    <a href="view-ledger.php"> Ledger</a>
    <a href="cash-receipt.php">CASH RECEIPT</a>
    <a href="cash-receipt-report.php">CASH RECEIPT REPORT</a>

        </div>
</div>
<!-- acounts end -->
        </ul>
        
      </div> <?php //navbar-collapse end  ?> 
   </nav> 
  
  </div>

</body>
</html>