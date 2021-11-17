<?php
session_start();
$alertMessage="";

if(!$_SESSION['loggedInUser']){
    header("Location:index.php");
}

include("connection.php");
$query="SELECT * from donor";
$result=mysqli_query($conn,$query);

include('hosp_header.php');
?>

<h1>Donor Details</h1>


<table class="table table-striped table-bordered">
    <tr>
        <th>Name</th>
        <th>Age</th>
        <th>Phone</th>
        <th>Gender</th>
        <th>Bloodtype</th>
        <th>Edit</th>
        
    </tr>
    <?php    
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>".$row['name']."</td><td>".$row['age']."</td><td>".$row['phoneNo']."</td><td>".$row['gender']."</td><td>".$row['bloodtype']."</td>";
               echo '<td><a href="hosp_edit.php?donarId='.$row['donarId'].'" type="button" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit"></span></a></td>';
            
        }
        
    }
    else{
        echo"<div class='alert alert-warning'> You have no clients</div>";
    }
    
    ?>
    
      <tr>
        <td colspan="7"><div class="text-center"><a href="hosp_add.php" type="button" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-plus"></span> Add Donor</a></div></td>
    </tr>

</table>

<?php
include('footer.php');
?>