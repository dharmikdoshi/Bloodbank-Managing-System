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
$choice;    
    if(isset($_POST['login'])) {
        $choice=1;
    $formEmail=validateformdata($_POST['email']);
    $formPass=validateformdata($_POST['password']);
  
    
    

    
    $query="SELECT name,password FROM users WHERE email='$formEmail'";
    
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            $name=$row['name'];
            $hashedPass=$row['password'];
        }
        
        if(password_verify($formPass,$hashedPass)){

            $_SESSION['loggedInUser']=$name;
            
            header("Location: clients.php");
        }
        
        else{
            $loginError="<div class='alert alert-danger'>WRONG PASSWORD<a class='close' data-dismiss='alert'>&times;</a></div>";
        }
        
    }
    else{
         $loginError="<div class='alert alert-danger'>No such user in Database<a class='close' data-dismiss='alert'>&times;</a></div>";
    }
    
}

    if(isset($_POST['hospital'])) {
        $choice=0;
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

if($choice=1){
include('header.php');
}
else{
    include('hosp_header');
}
?>

<?php echo $loginError;?>



<div class="container">
	<h1 class="w3-center">Login into Blood Bank</h1>
	<div class="row">
		<div class="col-md-6">
			<div class="w3-light-grey w3-border w3-panel w3-padding-16">
				<h3>For Admin</h3>
                <br>
                <form class="form-inline" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
				<div class="form-group">
				    <label for="user_username">Username</label>
				    <input type="text" class="form-control user_login" id="user_username" placeholder="Enter username" value="" name="email">
				</div>
                    <br><br>
				<div class="form-group">
				    <label for="user_password">Password</label>
				    <input type="password" class="form-control user_login" id="user_password" name="password" value="" placeholder="Password" >
				</div>
                    <br><br>
				 <button type="submit" class="btn btn-primary" name="login">Login</button>
                </form>
			</div>
		</div>

		<div class="col-md-6">
			<div class="w3-light-grey w3-border w3-panel w3-padding-16">
				<h3>For Hospital</h3>
                <br>
                <form class="form-inline" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
				<div class="form-group">
				    <label for="hospital_username">Username</label>
				    <input type="text" class="form-control hospital_login" id="hospital_username" placeholder="Enter username" value="" name="username">
				</div>
                    <br><br>
				<div class="form-group">
				    <label for="hospital_password">Password</label>
				    <input type="password" class="form-control hospital_login" id="hospital_password" value="" name="password" placeholder="Password" >
				</div>
                    <br><br>
				<button type="submit" class="btn btn-primary" name="hospital">Login</button>
                </form>
			</div>
		</div>
	</div>
</div>
<?php
include('footer.php');

?>