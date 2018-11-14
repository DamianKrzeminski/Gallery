<?php include("includes/init.php"); ?>
<?php if(!$session->isSignedIn()){redirect("login.php");}?>
<?php if(!$session->isAdmin()){redirect("../index.php");}?>
<?php
if(empty($_GET['id'])){
    redirect("users.php");
}
$user = User::findByID($_GET['id']);
if($user){
    $session->message("The {$user->username} user has been deleted");
    $user->delete_photo();
    redirect("users.php");
}else{
    redirect("users.php");
}
?>