<?php include("includes/header.php");?>
    <?php include("includes/photo_library_modal.php");?>
    <?php if(!$session->isSignedIn()){redirect("login.php");}?>
    <?php
    $user = User::findById($session->user_id);
    if(isset($_POST['update'])){
        if($user){
            $user->username = $_POST['username'];
            $user->email = $_POST['email'];
            $user->first_name = $_POST['first_name'];
            $user->last_name = $_POST['last_name'];
            $user->password = password_hash($_POST['password'], PASSWORD_BCRYPT, array('cost'=>10));     
            if(empty($_FILES['user_image'])){
                $user->save();
                redirect("users.php");
                $session->message("The user has been updated");
            }else{
                $user->setFile($_FILES['user_image']);
                $user->uploadPhoto();
                $user->save();
                $session->message("The user has been updated");
                redirect("profile.php");
            }
        }
    }
    ?>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <?php include("includes/top_nav.php");?>
        <?php include("includes/side_nav.php");?>
        <!-- /.navbar-collapse -->
    </nav>
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Profile</h1>
                    <p class="bg-success"><?php echo $message;?></p>
                    <div class="col-md-6 user_image_box">
                        <a href="#" data-toggle="modal" data-target="#photo-library"><img class="img-responsive" src="<?php echo $user->imagePathAndPlaceholder();?>" alt=""></a>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="col-md-6">
                           <div class="form-group">
                                <input type="file" name="user_image" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" value="<?php echo $user->username;?>">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" value="<?php echo $user->email;?>">
                            </div>
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" name="first_name" class="form-control" value="<?php echo $user->first_name;?>">
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" name="last_name" class="form-control" value="<?php echo $user->last_name;?>">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="role">User Role</label>
                                <br>
                                <option value="<?php echo $user->role;?>"><?php echo $user->role;?></option>
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary pull-right" type="submit" name="update" value="Update">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
<?php include("includes/footer.php"); ?>