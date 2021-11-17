<?php
session_start();
$alertMessage="";

if(!$_SESSION['loggedInUser']){
    header("Location:index.php");
}

include("connection.php");
$query="SELECT * from orders";
$result=mysqli_query($conn,$query);
if(isset($_GET['alert'])){
 if($_GET['alert']=='success'){
        $alertMessage="<div class='alert alert-success'>New order placed by hospital<a class='close' data-dismiss='alert'>&times;</a></div>";
    }
}
include('header.php');
?>

<h1>Orders Placed By Hospital</h1>

<?php echo $alertMessage;?>
<table class="table table-striped table-bordered">
    <tr>
        <th>Bloodtype</th>
        <th>Quantity</th>
        <th>Date Added</th>
        
    </tr>
    <?php    
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>".$row['bloodtype']."</td><td>".$row['quantity']." ml</td><td>".$row['date']."</td>";
            
        }
        
    }
    else{
        echo"<div class='alert alert-warning'> You have no order</div>";
    }
    
    ?>
    
    

</table>

<?php
include('footer.php');
?>