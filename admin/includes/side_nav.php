<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li>
            <?php if($session->isAdmin()) :?>
            <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard </a>
            <?php endif;?>
        </li>
        <li>
            <?php if($session->isAdmin()) :?>
            <a href="./users.php"><i class="fa fa-fw fa-bar-chart-o"></i> Users </a>
            <?php endif;?>
        </li>
        <li>
            <a href="./upload.php"><i class="fa fa-fw fa-table"></i> Upload </a>
        </li>
        <li>
            <a href="./your_photos.php"><i class="fa fa-fw fa-table"></i> Your Photos </a>
        </li>
        <li>
            <?php if($session->isAdmin()) :?>
            <a href="./photos.php"><i class="fa fa-fw fa-table"></i> Photos </a>
            <?php endif;?>
        </li>
        <li>
            <?php if($session->isAdmin()) :?>
            <a href="./comments.php"><i class="fa fa-fw fa-edit"></i> Comments </a>
            <?php endif;?>
        </li>
    </ul>
</div>