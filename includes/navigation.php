<?php $login_user = User::findById($session->user_id);?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Visit Home Page</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <?php if($session->isAdmin()) :?>
                        <a href="admin">Admin</a>
                    <?php endif;?>
                </li>
                <li>
                    <a href="admin/upload.php"><i class="fa fa-fw fa-user"></i> Upload </a>
                </li>
                <li>
                    <a href="admin/your_photos.php"><i class="fa fa-fw fa-user"></i> Your Photos </a>
                </li>
                <li>
                    <a href="admin/profile.php"><i class="fa fa-fw fa-user"></i> Profile </a>
                </li>
                <li>
                    <a href="admin/logout.php"><i class="fa fa-fw fa-power-off"></i> Logout </a>
                </li>
                <li>
                    <a><?php echo $login_user->username;?></a>
                </li>
            </ul>
                
        </div>
        
    </div>
    <!-- /.container -->
</nav>