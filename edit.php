<?php
session_start();
if(!$_SESSION['loggedInUser'])
{
    header("Location: index.php");
}
include('connection.php');
include('functions.php');


$clientID=$_GET['empId'];
if(isset($_POST['update'])){
  $clientName=validateFormData($_POST['clientName']);
  $clientEmail=validateFormData($_POST['clientEmail']);
$clientPhone=validateFormData($_POST['clientPhone']);
  $clientAddress=validateFormData($_POST['clientAddress']);
  $clientDesignation=validateFormData($_POST['clientDesignation']);
    
    $query="UPDATE employee 
    SET name='$clientName',
     email='$clientEmail',
     phone='$clientPhone',
     address='$clientAddress',
     designation='$clientDesignation'
    WHERE empId='$clientID'";
    
$result=mysqli_query($conn,$query);
if($result){
    header("Location: clients.php?alert=updatesuccess");
}
    else{
        echo "Error".mysqli_error($conn);
    }
}






$query="SELECT * from employee where empId='$clientID'";
$result=mysqli_query($conn,$query);
if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){
        $clientName=$row['name'];
        $clientEmail=$row['email'];
        $clientPhone=$row['phone'];
        $clientAddress=$row['address'];
        $clientDesignation=$row['designation'];
        }
}
else{
      $alertMessage="<div class='alert alert-success'>Nothing to see here<a href='clients.php'>Head Back</a></div>";
}
if(isset($_POST['delete'])){
    
    $query="DELETE FROM employee WHERE empId='$clientID'";
    $result=mysqli_query($conn,$query);
    
    if($result){
        header("Location: clients.php?alert=deleted");
    }
    else{
        echo "Error".mysqli_error($conn);
    
    }
    
    
}
include('header.php');
?>

<h1>Edit Employee</h1>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?empId=<?php echo $clientID;?>" method="post" class="row">
    <div class="form-group col-sm-6">
        <label for="client-name">Name</label>
        <input type="text" class="form-control input-lg" id="client-name" name="clientName" value="<?php echo $clientName;?>">
    </div>
    <div class="form-group col-sm-6">
        <label for="client-email">Email</label>
        <input type="email" class="form-control input-lg" id="client-email" name="clientEmail" value="<?php echo $clientEmail;?>">
    </div>
    <div class="form-group col-sm-6">
        <label for="client-phone">Phone</label>
        <input type="number" class="form-control input-lg" id="client-phone" name="clientPhone" value="<?php echo $clientPhone; ?>">
    </div>
    <div class="form-group col-sm-6">
        <label for="client-designation">Designation</label>
        <input type="text" class="form-control input-lg" id="client-designation" name="clientDesignation" value="<?php echo $clientDesignation; ?>">
    </div>
    <div class="form-group col-sm-6">
        <label for="client-address">Address</label>
        <input type="text" class="form-control input-lg" id="client-address" name="clientAddress" value="<?php echo $clientAddress?>">
    </div>

    <div class="col-sm-12">
        <hr>
        <button type="submit" class="btn btn-lg btn-danger pull-left" name="delete">Delete</button>
        <div class="pull-right">
            <a href="clients.php" type="button" class="btn btn-lg btn-default">Cancel</a>
            <button type="submit" class="btn btn-lg btn-success" name="update">Update</button>
        </div>
    </div>
</form>

<?php
include('footer.php');
?>