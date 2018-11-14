<?php include("includes/header.php"); ?>
    <?php if(!$session->isSignedIn()){redirect("login.php");}?>
    <?php if(!$session->isAdmin()){redirect("../index.php");}?>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <?php include("includes/top_nav.php");?>
        <?php include("includes/side_nav.php");?>
        <!-- /.navbar-collapse -->
    </nav>
    <div id="page-wrapper">
        <?php include("includes/admin_content.php");?>
    </div>
    <!-- /#page-wrapper -->
<?php include("includes/footer.php"); ?>