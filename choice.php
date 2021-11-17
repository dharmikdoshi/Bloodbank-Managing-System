<?php include("functions.php");
?>

<form class="form-inline" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    <h1>Welcome to Bloodbank Management System</h1>
    <button type="submit" class="btn btn-warning" name="adminlogin"><a href="index.php">Admin Login</a></button>
    <button type="submit" class="btn btn-warning" name="hospitaklogin"><a href="hospitallogin.php">Hospital Login</a></button>
</form>
