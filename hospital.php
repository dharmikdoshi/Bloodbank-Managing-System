<?php
session_start();
$alertMessage="";

if(!$_SESSION['loggedInUser']){
    header("Location:index.php");
}

include("connection.php");
$query="SELECT * from hospital";
$result=mysqli_query($conn,$query);

include('header.php');
?>

<h1>Donor Details</h1>


<table class="table table-striped table-bordered">
    <tr>
        <th>Name</th>
        <th>Location</th>
        <th>Phone</th>
        
    </tr>
    <?php    
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>".$row['name']."</td><td>".$row['location']."</td><td>".$row['phoneNo'];
            
        }
        
    }
    
    ?>

</table>

<?php
include('footer.php');
?>