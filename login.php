<?php 
$title = "Login";
$login="active";
require_once "includes/header.php";
require_once "includes/navbar.php";
require_once "Database/db_config.php";

// once we submit login form it will post to same page use the post method to get username and password
// if statement checks if their was a post method on this page
if($_SERVER['REQUEST_METHOD']=="POST"){
    $username = strtolower(trim($_POST['username']));
    $password = $_POST["password"];
    $newpassword = md5($password.$username);
    $result = $userdb->getUser($username, $newpassword);

    if (!$result){
        echo "<div class='alert alert-danger'>Username or Password Was Incorrect</div>";
    }else{
        $_SESSION['username'] = $username;
        $_SESSION['userid'] = $result["id"];
        header("location:viewrecords.php");
        
    }

    
}


?>


<div class="pagecontentdiv">
<form action="<?php echo htmlentities($_SERVER["PHP_SELF"]) ?>" method="post">
<tr>
    <td><label for="username">Username</label></td>
    <td><input type="text" name="username" class=form-control id="username" value="<?php if($_SERVER['REQUEST_METHOD']=="POST"){echo $_POST["username"];} ?>"></td>
</tr>
<tr>
    <td><label for="username">Password</label></td>
    <td><input type="text" name="password" class=form-control id="password"></td>

</tr>
<tr>
<button id="loginbutton" name="login" type="submit" class="btn btn-primary btn-block">Login</button>
<a href="#">Forgot Password</a>



</form>
</div>







<?php
require_once "includes/footer.php";
?>