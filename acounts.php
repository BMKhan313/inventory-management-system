<?php
require_once'connect.php';
authenticate();
require_once'header.php';
?>
 
<div class="container">
	<?php 
  //
   $table = "acounts";
        $col = "acount_code";
      include('max.php');
        $acount_code = $max;
        //

  if(isset($_POST['addnewacount'])){

  	if( empty($_POST['acount_code']) || empty($_POST['name']) || empty($_POST['address']) || empty($_POST['contact']) || 
  		empty($_POST['headname']) )
  	
  	{   
        echo "<div class='alert alert-danger'>Please fill out all fields</div>";
  	}else{
  		$acount_code = $_POST['acount_code'];
  		$name = $_POST['name'];
  	    $contact = $_POST['contact'];
  	    $address = $_POST['address'];
  	    $headname = $_POST['headname'];
        $hdsplit = explode("|",$headname);
        $hn = $hdsplit[1];
        $hc = $hdsplit[0];
        
  	    // $headcode = $_POST['headcode'];

  	    $sql = "INSERT INTO acounts(acount_code,name,contact,address,headcode,headname) VALUES('$acount_code','$name','$contact','$address','$hc','$hn')";
  	    // $result = $con->query($sql) or die("Failed");
    
        if($con->query($sql) === TRUE){
  
         ?>
         <div class="alert alert-success">Acount added successfully</div>
         <?php
        }else{
         ?>
         <div class="alert alert-danger">Error: There was an error while adding new user</div>
         <?php
        }

  	}
  }



	?>
  <div class="col-xs-4 ">
	<div class="box">
    
	<div class="row" style="border: 2px solid silver; padding: 10px;">	
    <h3><i class="glyphicon glyphicon-plus"></i>&nbsp;Add New Acount</h3> 
			<form action="" method="POST">
 	<label for="acount_code">acount_code</label>
 	<input type="number" name="acount_code"  class="form-control" value="<?php echo $acount_code  ?>"><br>

 	<label for="name">Name</label>
 	<input type="text" name="name" class="form-control"><br>
    
    <label for="contact">contact</label>
 	<input type="number" name="contact" class="form-control"><br>

    <label for="address">Address</label>
 	<input type="text" name="address" class="form-control"><br>
    
    

   <label for="headname" onclick="">Heads Name</label><br>
   <select class="js-example-basic-single" name="headname" id="headname"  style="width: 100%" >
    <?php 
     $sql = "SELECT * FROM head";
     $res = $con->query($sql);
     ?>
     <option><?php echo "Head Code | Head Name"  ?></option>
     <?php
      while($row = $res->fetch_assoc()){ 
    ?>
    <option value="<?php echo $row['headcode']."|". $row['headname']; ?>" ><?php echo $row['headcode']." | ". $row['headname']; ?></option>
    <?php }
    ?>
   </select><a href="head.php">Add New Head</a><br><br>

 	<input type="submit" name="addnewacount" class="btn btn-info" value="Save">
</form>
	</div>
	</div>

</div>
</div>
<?php
require_once'acountlist.php';
?>