<?php include("includes/header.php");?>
    <?php if(!$session->isSignedIn()){redirect("login.php");}?>
    <?php if(!$session->isAdmin()){redirect("../index.php");}?>
    <?php
    $photos = Photo::findAll();
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
                    <h1 class="page-header">PHOTOS</h1>
                    <p class="bg-success"><?php echo $message;?></p>
                    <div class="col-md-12">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Photo</th>
                                    <th>Id</th>
                                    <th>File Name</th>
                                    <th>Title</th>
                                    <th>Size</th>
                                    <th>Comments</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach($photos as $photo) : ?>
                                <tr>
                                    <td>
                                        <img class="admin-photo-thumbnail margin" src="<?php echo $photo->picturePath()?>" alt="">
                                        <div class="action_links">
                                            <a class="btn btn-info" href="../photo.php?id=<?php echo $photo->id;?>">View</a>
                                            <a class="btn btn-primary" href="edit_photo.php?id=<?php echo $photo->id;?>">Edit</a>
                                            <a class="delete_link btn btn-danger" href="delete_photo.php?id=<?php echo $photo->id;?>">Delete</a>
                                        </div>
                                    </td>
                                    <td><?php echo $photo->id;?></td>
                                    <td><?php echo $photo->filename;?></td>
                                    <td><?php echo $photo->title;?></td>
                                    <td><?php echo $photo->size;?></td>
                                    <td>
                                        <p>
                                            <?php
                                            $comments = Comment::findTheComments($photo->id);
                                            echo count($comments);
                                            ?>
                                        </p>
                                        <a class="btn btn-info" href="comment_photo.php?id=<?php echo $photo->id;?>">View Comments</a>
                                    </td>
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