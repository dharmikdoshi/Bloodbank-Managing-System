<?php
session_start();
if(!$_SESSION['loggedInUser'])
{
    header("Location: hosp_index.php");
}
include('connection.php');
include('functions.php');

$donorID=$_GET['donarId'];

if(isset($_POST['update'])){
    $donorID2 = $_POST['donorID'];
  $donorName=validateFormData($_POST['donorName']);
  $donorAge=validateFormData($_POST['donorAge']);
    $donorPhone=validateFormData($_POST['donorPhone']);
  $donorGender=validateFormData($_POST['donorGender']);
  $donorBloodtype=validateFormData($_POST['donorBloodtype']);
    
    $query="UPDATE donor 
    SET name='$donorName',
     age='$donorAge',
     phoneNo='$donorPhone',
     gender='$donorGender',
     bloodtype='$donorBloodtype'
    WHERE donarId='$donorID2'";
    
$result=mysqli_query($conn,$query);
//    die($result);
if($result){
    header("Location:hosp_donors.php?alert=updatesuccess");
}
    else{
        echo "Error".mysqli_error($conn);
    }
}




$query="SELECT * from donor where donarId='$donorID'";
$result=mysqli_query($conn,$query);
if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){
        $donorID=$row['donarId'];
        $donorName=$row['name'];
        $donorAge=$row['age'];
        $donorPhone=$row['phoneNo'];
        $donorGender=$row['gender'];
        $donorBloodtype=$row['bloodtype'];
        }
}
else{
      $alertMessage="<div class='alert alert-success'>Nothing to see here<a href='clients.php'>Head Back</a></div>";
}
if(isset($_POST['delete'])){
    
    $donorID = $_POST['donorID'];
    $query="DELETE FROM donor WHERE donarId='$donorID'";
    $result=mysqli_query($conn,$query);
    
    if($result){
        header("Location: hosp_donors.php?alert=deleted");
    }
    else{
        echo "Error".mysqli_error($conn);
    
    }
    
    
}
include('hosp_header.php');
?>

<h1>Edit Donor Details</h1>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" class="row">
    <div class="form-group col-sm-6">
        <label for="donor-name">Name*</label>
        <input type="hidden" name="donorID" value="<?php echo $donorID; ?>">
        <input type="text" class="form-control input-lg" id="donor-name" name="donorName" value="<?php echo $donorName;?>">
    </div>
    <div class="form-group col-sm-6">
        <label for="client-email">Age*</label>
        <input type="text" class="form-control input-lg" id="client-email" name="donorAge" value="<?php echo $donorAge;?>">
    </div>
    <div class="form-group col-sm-6">
        <label for="client-phone">Phone*</label>
        <input type="number" class="form-control input-lg" id="client-phone" name="donorPhone" value="<?php echo $donorPhone; ?>">
    </div>
    <div class="form-group col-sm-6">
        <label for="client-designation">Gender*</label>
        <input type="text" class="form-control input-lg" id="client-designation" name="donorGender" value="<?php echo $donorGender; ?>">
    </div>
    <div class="form-group col-sm-6">
        <label for="client-address">Bloodtype*</label>
        <input type="text" class="form-control input-lg" id="client-address" name="donorBloodtype" value="<?php echo $donorBloodtype?>">
    </div>

    <div class="col-sm-12">
        <hr>
        <button type="submit" class="btn btn-lg btn-danger pull-left" name="delete">Delete</button>
        <div class="pull-right">
            <a href="hosp_donors.php" type="button" class="btn btn-lg btn-default">Cancel</a>
            <button type="submit" class="btn btn-lg btn-success" name="update">Update</button>
        </div>
    </div>
</form>

<?php
include('footer.php');
?>