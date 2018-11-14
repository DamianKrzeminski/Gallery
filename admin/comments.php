<?php include("includes/header.php");?>
    <?php if(!$session->isSignedIn()){redirect("login.php");}?>
    <?php if(!$session->isAdmin()){redirect("../index.php");}?>
    <?php $comments = Comment::findAll();?>
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
                    <h1 class="page-header">COMMENTS</h1>
                    <p class="bg-success"><?php echo $message;?></p>
                    <div class="col-md-12">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Body</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach($comments as $comment) : ?>
                                <tr>
                                    <td><?php echo $comment->id;?></td>
                                    <td><?php echo $comment->author;?></td>
                                    <td><?php echo $comment->body;?></td>
                                    <td><a class="btn btn-danger" href="delete_comment.php?id=<?php echo $comment->id;?>">Delete</a></td>
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