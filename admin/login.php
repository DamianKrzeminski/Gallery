<?php require_once("includes/header.php");?>
<?php
if($session->isSignedIn()){
    redirect("../index.php");
}
if(isset($_POST['submit'])){
    $user = new User();
    $username = $database->escapeString($_POST['username']);
    $password = $database->escapeString($_POST['password']);  
    $user_found = $user->verifyUser($username, $password);
    if($user_found != -1){
        $session->login($user_found);
        redirect("../index.php");
    }else{
        $the_message = "Your password or username are incorrect";
    }
}else{
    $username = "";
    $password = "";
    $the_message = "";
}
?>
<div class="col-md-4 col-md-offset-3">
    <h4 class="bg-danger"><?php echo $the_message;?></h4>
    <form id="login-id" action="" method="post">
        <div class="form-group">
	        <label for="username">Username</label>
	        <input type="text" class="form-control" name="username" value="<?php echo htmlentities($username);?>" >
        </div>
        <div class="form-group">
	        <label for="password">Password</label>
	        <input type="password" class="form-control" name="password" value="<?php echo htmlentities($password);?>">	
        </div>
        <div class="form-group">
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
        </div>
    </form>
    <p class="color-white">If you don't have account click here.</p>
    <h5><a class="btn btn-info" href="register.php">Registration</a></h5>
</div>