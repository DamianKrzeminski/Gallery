<?php include("includes/header.php");?>
    <?php if(!$session->isSignedIn()){redirect("login.php");}?>
    <?php if(!$session->isAdmin()){redirect("../index.php");}?>
    <?php
    $user = new User();
        if(isset($_POST['create'])){
            if($user){
                $user->username = $_POST['username'];
                $user->email = $_POST['email'];
                $user->first_name = $_POST['first_name'];
                $user->last_name = $_POST['last_name'];
                $user->password = password_hash($_POST['password'], PASSWORD_BCRYPT, array('cost'=>10));
                $user->setFile($_FILES['user_image']);
                $user->uploadPhoto();
                $user->role = $_POST['role'];
                $session->message("The {$user->username} has been added");
                $user->save();
                redirect("users.php");
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
                    <h1 class="page-header">ADD USER</h1>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="col-md-6 col-md-offset-3">
                           <div class="form-group">
                                <input type="file" name="user_image" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" name="first_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" name="last_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="form_group">
                                <select name="role" id="">
                                    <option value="Subscriber">User Role</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Subscriber">Subscriber</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary pull-right" type="submit" name="create" value="Add User">
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