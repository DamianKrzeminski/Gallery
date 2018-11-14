<?php include("includes/header.php");?>
    <?php if($session->isSignedIn()){redirect("../index.php");}?>
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
                $user->role = "Subscriber";
                $user->save();
                redirect("../index.php");
            }
        }
    ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">REGISTRATION</h1>
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
                            <div class="form-group">
                                <input class="btn btn-primary pull-right" type="submit" name="create" value="Regidter">
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