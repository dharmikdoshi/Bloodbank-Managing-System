<?php
session_start();

if(!$_SESSION['loggedInUser']){
    header("Location:hosp_index.php");
}

include("connection.php");
include("functions.php");
if(isset($_POST['add'])){
    $donorName=$donorAge=$donorPhone=$donorGender=$donorBloodtype="";
    
    if(!$_POST["donorName"]){
        $nameError="Please enter your name<br>";
    }
    else{
        $donorName=validateFormData($_POST["donorName"]);
    }
    
    if(!$_POST["donorAge"]){
        $ageError="Please enter your Age<br>";
    }
    else{
        $donorAge=validateFormData($_POST["donorAge"]);
    }
    
       if(!$_POST["donorGender"]){
        $genderError="Please enter your Gender<br>";
    }
    else{
        $donorGender=validateFormData($_POST["donorGender"]);
    }
       if(!$_POST["donorBloodtype"]){
        $bloodError="Please select your bloodtype<br>";
    }
    else{
        $donorBloodtype=validateFormData($_POST["donorBloodtype"]);
    }
    $donorPhone=validateFormData($_POST['donorPhone']);

    
    if($donorName && $donorGender && $donorAge && $donorBloodtype){
        
        $query="INSERT into donor (donarId,name,phoneNo,age,gender,bloodtype) VALUES (NULL,'$donorName',' $donorPhone','$donorAge','$donorGender','$donorBloodtype')";
        
        $result=mysqli_query($conn,$query);
        
        if($result){
            header("Location: hosp_donors.php?alert=success");
            
        }
        else{
            echo "error".mysqli_error($conn);
        }
    }
}

include('hosp_header.php');
?>

<h1>Add Donor</h1>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" class="row">
    <div class="form-group col-sm-6">
        <label for="donor-name">Name*</label>
        <input type="text" class="form-control input-lg" id="donor-name" name="donorName" value="">
    </div>
    <div class="form-group col-sm-6">
        <label for="client-email">Age*</label>
        <input type="text" class="form-control input-lg" id="client-email" name="donorAge" value="">
    </div>
    <div class="form-group col-sm-6">
        <label for="client-phone">Phone*</label>
        <input type="number" class="form-control input-lg" id="client-phone" name="donorPhone">
    </div>
    <div class="form-group col-sm-6">
        <label for="client-designation">Gender*</label>
        <input type="text" class="form-control input-lg" id="client-designation" name="donorGender" value="">
    </div>
    <div class="form-group col-sm-6">
        <label for="client-address">Bloodtype*</label>
        <input type="text" class="form-control input-lg" id="client-address" name="donorBloodtype" value="">
    </div>

   <div class="col-sm-12">
            <a href="hosp_donors.php" type="button" class="btn btn-lg btn-default">Cancel</a>
            <button type="submit" class="btn btn-lg btn-success pull-right" name="add">Add Client</button>
    </div>
</form>


<?php
include('footer.php');
?>