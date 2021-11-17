<?php
session_start();

if(!$_SESSION['loggedInUser']){
    header("Location:index.php");
}

include("connection.php");
include("functions.php");


if(isset($_POST['add'])){
    
    $clientName=$clientEmail=$clientPhone=$clientAddress=$clientDesignation="";

    if(!$_POST["clientName"]){
        $nameError="Please enter your name<br>";
    }
    else{
        $clientName=validateFormData($_POST["clientName"]);
    }
    
    if(!$_POST["clientEmail"]){
        $emailError="Please enter your name<br>";
    }
    else{
        $clientEmail=validateFormData($_POST["clientEmail"]);
    }
    $clientPhone=validateFormData($_POST['clientPhone']);
    $clientAddress=validateFormData($_POST['clientAddress']);
    $clientDesignation=validateFormData($_POST['clientDesignation']);
    
    
    if($clientName && $clientEmail){
        
        $query="INSERT into employee (empId,name,email,phone,designation,address) VALUES (NULL,'$clientName',' $clientEmail','$clientPhone','$clientDesignation','$clientAddress')";
        
        $result=mysqli_query($conn,$query);
        
        if($result){
            header("Location: clients.php?alert=success");
            
        }
        else{
            echo "error".mysqli_error($conn);
        }
    }
}

include('header.php');
?>

<h1>Add Employee</h1>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="row" >
    <div class="form-group col-sm-6">
        <label for="client-name">Name *</label>
        <input type="text" class="form-control input-lg" id="client-name" name="clientName" value="">
    </div>
    <div class="form-group col-sm-6">
        <label for="client-email">Email *</label>
        <input type="email" class="form-control input-lg" id="client-email" name="clientEmail" value="">
    </div>
    <div class="form-group col-sm-6">
        <label for="client-phone">Phone</label>
        <input type="number" class="form-control input-lg" id="client-phone" name="clientPhone" value="">
    </div>
    <div class="form-group col-sm-6">
        <label for="client-address">Designation</label>
        <input type="text" class="form-control input-lg" id="client-address" name="clientDesignation" value="">
    </div>
    <div class="form-group col-sm-6">
        <label for="client-company">Address</label>
        <input type="text" class="form-control input-lg" id="client-company" name="clientAddress" value="">
    </div>
    <div class="col-sm-12">
            <a href="clients.php" type="button" class="btn btn-lg btn-default">Cancel</a>
            <button type="submit" onclick="" class="btn btn-lg btn-success pull-right" name="add">Add Employee</button>
    </div>
</form>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">

function validate() {
    console.log("Reached here");
  var str = document.getElementById("client-email").value;
  var str2 = document.getElementById("client-phone").value;
  var patt = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/i
  var patt2 = /^\d{10,10}/

  if (!patt.test(str))
    {
      if(!patt2.test(str2))
      {
        alert("Mobile number should be 10 digits long.")
        return(false)
      }
      
      return (true)
    }
    else
    {
      alert("You have entered an invalid email address!")
      return (false)
    }

}
</script>


<?php
include('footer.php');
?>