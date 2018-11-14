<?php include("includes/init.php"); ?>
<?php if(!$session->isSignedIn()){redirect("login.php");}?>
<?php if(!$session->isAdmin()){redirect("../index.php");}?>
<?php
if(empty($_GET['id'])){
    redirect("photos.php");
}
$photo = Photo::findByID($_GET['id']);
if($photo){
    $photo->delete_photo();
    $session->message("The {$photo->filename} has been deleted");
    redirect("photos.php");
}else{
    redirect("photos.php");
}
?>