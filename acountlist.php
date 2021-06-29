<?php
require_once'connect.php';
require_once'header.php';
authenticate();


echo "<div class='container' style='border: 1px solid red';>";
?>
<?php
//delete
  if(isset($_POST['delete'])){
    $sql = "DELETE FROM acounts WHERE acount_code =" .$_POST['acount_code'];

     if($con->query($sql)===TRUE){
      echo"<div class='alert alert-success'>Deleted Successfully</div>";
    }else{
              echo"<div class='alert alert-danger'>Error while deleting</div>";
    }
  }
//

  $sql = "SELECT * from acounts";
  $result = $con->query($sql);
  
 if($result->num_rows > 0){

?>
<table class="table table-bordered table-striped">
	<h2>Acount Names</h2>
	<tr>
   <td>Acount code</td>
   <td>Name</td>
   <td>Contact</td>
   <td>Address</td>
   <td>Head Name</td>
   <td>Head code</td>
   <td>Delete</td>

	</tr>
    <?php
while($row = $result->fetch_assoc()){
   echo"<form action='' method='POST' />";
        echo"<input type='hidden' value='".$row['acount_code']."' name='acount_code' />";
        echo "<tr>";
        echo "<td>".$row['acount_code']."</td>";
        echo "<td>".$row['name']."</td>";
        echo "<td>".$row['contact']."</td>";
        echo "<td>".$row['address']."</td>";
        echo "<td>".$row['headname']."</td>";
        echo "<td>".$row['headcode']."</td>";
        echo "<td><input type='submit' name='delete' value='Delete' class='btn btn-danger'/></td>";
        echo "";
       
  }

    ?>
</table>
<?php	
}else{
	echo"<br>NO record found";
}
?>
</div>
