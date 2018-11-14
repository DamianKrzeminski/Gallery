<?php require("init.php");?>
<?php
$user = new User();
if(isset($_POST['image_name'])){
    $user->ajaxSaveUserImage($_POST['image_name'], $_POST['user_id']);
}
if(isset($_POST['photo_id'])){
    echo "OK";
    Photo::displaySidebarData($_POST['photo_id']);
}
?>