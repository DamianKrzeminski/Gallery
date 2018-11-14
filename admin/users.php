<?php include("includes/header.php");?>
    <?php if(!$session->isSignedIn()){redirect("login.php");}?>
    <?php if(!$session->isAdmin()){redirect("../index.php");}?>
    <?php $users = User::findAll();?>
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
                    <p class="bg-success"><?php echo $message;?></p>
                    <h1 class="page-header">USERS</h1>
                    <a class="btn btn-primary" href="add_user.php">Add User</a>
                    <div class="col-md-12">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Photo</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Role</th>
                                    <th>Edit User</th>
                                    <th>Delete User</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach($users as $user) : ?>
                                <tr>
                                    <td><?php echo $user->id;?></td>
                                    <td><img class="admin-photo-thumbnail user-image" src="<?php echo $user->imagePathAndPlaceholder();?>" alt=""></td>
                                    <td><?php echo $user->username;?></td>
                                    <td><?php echo $user->email;?></td>
                                    <td><?php echo $user->first_name;?></td>
                                    <td><?php echo $user->last_name;?></td>
                                    <td><?php echo $user->role;?></td>
                                    <td><a class="btn btn-info" href="edit_user.php?id=<?php echo $user->id;?>">Edit</a></td>
                                    <td><a class="btn btn-danger" href="delete_user.php?id=<?php echo $user->id;?>">Delete</a></td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
<?php include("includes/footer.php"); ?>