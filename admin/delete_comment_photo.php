<?php include("includes/init.php"); ?>
<?php if(!$session->isSignedIn()){redirect("login.php");}?>
<?php if(!$session->isAdmin()){redirect("../index.php");}?>
<?php
if(empty($_GET['id'])){
    redirect("comment_photo.php?id={$comment->photo_id}");
}
$comment = Comment::findByID($_GET['id']);
if($comment){
    $comment->delete();
     $session->message("The comment {$comment->id} has been deleted");
    redirect("comment_photo.php?id={$comment->photo_id}");
}else{
    redirect("comment_photo.php?id={$comment->photo_id}");
}
?>