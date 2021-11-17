<?php
session_start();
$alertMessage="";
if(!$_SESSION['loggedInUser']){
    header("Location:hosp_index.php");
}

include("connection.php");
include("functions.php");
if(isset($_POST['order'])){
    $date = date('m/d/Y h:i:s', time());
    $orderBloodtype=validateFormData($_POST["orderBloodtype"]);
    $orderQuantity=validateFormData($_POST["orderQuantity"]);   
    if($orderQuantity && $orderBloodtype){
        
        $query="INSERT into orders (orderId,bloodtype,quantity,date) VALUES (NULL,'$orderBloodtype',' $orderQuantity',now())";
        
        $result=mysqli_query($conn,$query);
        
        if($result){
            header("Location: hosp_order.php?alert=success");
            
        }
        else{
            echo "error".mysqli_error($conn);
        }
    }
    
    
}
include('hosp_header.php');

if(isset($_GET['alert'])){
 if($_GET['alert']=='success'){
        $alertMessage="<div class='alert alert-success'>New order placed by hospital<a class='close' data-dismiss='alert'>&times;</a></div>";
    }
}
?>

<br><br><br>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" class="row">
    <div class="form-group col-sm-4">
        <label for="donor-name">Blood type</label>
        <select class="form-control input-lg" name="orderBloodtype">
            <option>A+</option>
            <option>A-</option>
            <option>B+</option>
            <option>B-</option>
            <option>AB+</option>
            <option>AB-</option>
            <option>O+</option>
            <option>O-</option>
            </select>
    </div>
    
  <div class="form-group col-sm-4">
        <label for="client-phone">Quantity</label>
        <input type="text" class="form-control input-lg" id="client-phone" name="orderQuantity" placeholder="Enter value in ml">
    </div>

   <div class="col-sm-12">
            <a href="hosp_donors.php" type="button" class="btn btn-lg btn-default">Cancel</a>
            <button type="submit" class="btn btn-lg btn-success pull-right" name="order">Place Order</button>
    </div>
</form>


<?php
include('footer.php');
?>