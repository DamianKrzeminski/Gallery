<?php include("includes/header.php");?>
    <?php if(!$session->isSignedIn()){redirect("login.php");}?>
    <?php
    $message = "";
if(isset($_FILES['file'])){
        $photo = new Photo();
        $user = User::findById($session->user_id);
        $photo->title = $_POST['title'];
        $photo->user_id = $user->id;
        $photo->setFile($_FILES['file']);
        if($photo->save()){
            $message = "Photo uploaded Successfully";
        }else{
            $message = join("<br>", $photo->errors);
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
                    <h1 class="page-header">UPLOADS</h1>
                    <div class="row">
                        <div class="col-md-6">
                            <?php echo $message;?>
                            <form action="upload.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input class="form-control" type="text" name="title">
                                </div>
                                <div class="form-group">
                                    <input type="file" name="file">
                                </div>
                                <input class="btn btn-primary" type="submit" name="submit" value="Submit">
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="upload.php" class="dropzone"></form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
<?php include("includes/footer.php"); ?>