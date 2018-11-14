<?php include("includes/init.php"); ?>
<?php if(!$session->isSignedIn()){redirect("login.php");}?>
<?php if(!$session->isAdmin()){redirect("../index.php");}?>
<?php
if(empty($_GET['id'])){
    redirect("comments.php");
}
$comment = Comment::findByID($_GET['id']);
if($comment){
    $comment->delete();
    redirect("comments.php");
}else{
    redirect("comments.php");
}
?>