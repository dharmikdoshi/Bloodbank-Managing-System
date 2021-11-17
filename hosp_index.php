<?php
session_start();
$loginError="";

    //creating a connection  
    $server="localhost";
    $username="root";
    $password="";
    $db="bloodbank_manager";
    $conn=mysqli_connect($server,$username,$password,$db);

if(!$conn)
{
    die("connection failed:".mysqli_connect_error());
}

include("functions.php");
    
    if(isset($_POST['login'])) {
    $formUsername=validateformdata($_POST['username']);
    $formPass=validateformdata($_POST['password']);
  
    
    

    
    $query="SELECT username,password FROM hospitalusers WHERE username='$formUsername'";
    
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            $name=$row['username'];
            $hashedPass=$row['password'];
        }
        
        if(password_verify($formPass,$hashedPass)){

            $_SESSION['loggedInUser']=$name;
            
            header("Location: hosp_donors.php");
        }
        
        else{
            $loginError="<div class='alert alert-danger'>WRONG PASSWORD<a class='close' data-dismiss='alert'>&times;</a></div>";
        }
        
    }
    else{
         $loginError="<div class='alert alert-danger'>No such Hospital in Database<a class='close' data-dismiss='alert'>&times;</a></div>";
    }
    
}

mysqli_close($conn);

include('hosp_header.php');
?>



<h1>Welcome To Hospital Page</h1>
<p class="lead">Log in to your account.</p>

<?php echo $loginError;?>



<form class="form-inline" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    <div class="form-group">
        <label for="login-email" class="sr-only">Username</label>
        <input type="text" class="form-control" id="login-email" placeholder="email" name="username">
    </div>
    <div class="form-group">
        <label for="login-password" class="sr-only">Password</label>
        <input type="password" class="form-control" id="login-password" placeholder="password" name="password">
    </div>
    <button type="submit" class="btn btn-primary" name="login">Login</button>
</form>

<?php
include('footer.php');

?>