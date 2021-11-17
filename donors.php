<?php
session_start();
$alertMessage="";

if(!$_SESSION['loggedInUser']){
    header("Location:index.php");
}

include("connection.php");
$query="SELECT * from donor";
$result=mysqli_query($conn,$query);


  

include('header.php');
?>

<h1>Donor Details</h1>

<table class="table table-striped table-bordered">
    <tr>
        <th>Name</th>
        <th>Age</th>
        <th>Phone</th>
        <th>Gender</th>
        <th>Blo0dtype</th>
        
    </tr>
    <?php    
    if(mysqli_num_rows($result)>0){
        $n=mysqli_num_rows($result);
        while($row=mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>".$row['name']."</td><td>".$row['age']."</td><td>".$row['phoneNo']."</td><td>".$row['gender']."</td><td>".$row['bloodtype']."</td>";
            
        }
        
    }
    else{
        echo"<div class='alert alert-warning'> You have no clients</div>";
    }
    
    ?>
    
    

</table>

<?php
include('footer.php');
?>