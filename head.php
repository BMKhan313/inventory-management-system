<?php
require_once'connect.php';
require_once'header.php';
?>
<!-- Links -->

<?php
$table = "head";
        $col = "headcode";
	    include('max.php');
        $headcode = $max;
         
?>
<?php
  if(isset($_POST['addnew'])){
  	if(!empty($_POST['headcode']) || !empty($_POST(['headname'])))
  	{
  	$headcode = $_POST['headcode'];
  	$headname = $_POST['headname'];

  	$sql = "INSERT INTO head(headcode,headname) values('$headcode','$headname')";
    // if
  	if($con->query($sql) === true){ ?>

         <div class='alert alert-success '>successfully added new Head</div>

  	<?php }else{
				?>
     <div class='alert alert-danger'>Error: There was an error while adding new Head</div>
			<?php }

  } //if end
    else
    {
  	echo"fill out all fields";
  }
 }
?>

<div class="container">
	<div class="col-xs-5">
	<div class="jumbotron ">
		<div class="row ">
     <div class="col-md-8 col-md-offset-2">

		<h3><i class="glyphicon glyphicon-plus"></i>&nbsp; Add New Head</h3> <hr>
			<form action="" method="POST">
				<table >
				<label for="headcode">Head Code</label>
				<input type="number" id="headcode"  name="headcode" value="<?php echo $headcode   ?>" readonly="readonly" class="form-control" >
				<label for="headname">Head Name</label>
				<input type="text"  name="headname" id="headname"  autofocus class="form-control">
				
				<input type="submit" name="addnew" class="btn btn-info" value="Add New Head"><br>
			</table>
			</form>	
		</div>
		</div>
	</div>
</div>
</div>