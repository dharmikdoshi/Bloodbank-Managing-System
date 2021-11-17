<?php
session_start();
$alertMessage="";

if(!$_SESSION['loggedInUser']){
    header("Location:index.php");
}

include("connection.php");
$query="SELECT * from employee";
$result=mysqli_query($conn,$query);

if(isset($_GET['alert'])){
    if($_GET['alert']=='success'){
        $alertMessage="<div class='alert alert-success'>New Employee Added<a class='close' data-dismiss='alert'>&times;</a></div>";
    }
    elseif($_GET['alert']=='updatesuccess'){
        $alertMessage="<div class='alert alert-success'>Employee Updated<a class='close' data-dismiss='alert'>&times;</a></div>";
    }
    elseif($_GET['alert']=='deleted'){
        $alertMessage="<div class='alert alert-danger'>Employee Delete<a class='close' data-dismiss='alert'>&times;</a></div>";
    }
    }

include('header.php');
?>

<h1>Employee Details</h1>

<?php echo $alertMessage;?>

<table class="table table-striped table-bordered">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Designation</th>
        <th>Address</th>
        <th>Edit</th>
        
        
    </tr>
    <?php    
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>".$row['name']."</td><td>".$row['email']."</td><td>".$row['phone']."</td><td>".$row['designation']."</td><td>".$row['address']."</td>";
            
            echo '<td><a href="edit.php?empId='.$row['empId'].'" type="button" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit"></span></a></td>';
            
        }
        
    }
    else{
        echo"<div class='alert alert-warning'> You have no clients</div>";
    }
    
    ?>

    <tr>
        <td colspan="7"><div class="text-center"><a href="add.php" type="button" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-plus"></span> Add Employee</a></div></td>
    </tr>
</table>

<?php
include('footer.php');
?>