<?php include("includes/header.php");?>
    <?php
    $page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
    $items_per_page = 4;
    $items_total_count = Photo::countAll();
    $paginate = new Paginate($page, $items_per_page, $items_total_count);
    $sql = "SELECT * FROM photos ";
    $sql .= "LIMIT {$items_per_page} ";
    $sql .= "OFFSET {$paginate->offset()}";
    $photos = Photo::findByQuery($sql);
    ?>
    <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-12">
            <div class="thumbnails row">
                <?php foreach($photos as $photo):?>
                <div class="col-xs-6 col-md-3">
                    <a class="thumbnail" href="photo.php?id=<?php echo $photo->id;?>">
                        <img class="img-responsive home-page-photo" src="admin/<?php echo $photo->picturePath();?>" alt="">
                    </a>
                </div>
                <?php endforeach;?>
            </div>
            <div class="row">
                <ul class="pagination">
                    <?php
                    if($paginate->pageTotal()>1){
                        if($paginate->hasPrevious()){
                            echo "<li class='previous'><a href='index.php?page={$paginate->previous()}'>Previous</a></li>";
                        }
                        for($i=1;$i<=$paginate->pageTotal();$i++){
                            if($i == $paginate->current_page){
                                echo "<li class='active'><a href='index.php?page={$i}'>{$i}</a></li>";
                            }else{
                                echo "<li><a href='index.php?page={$i}'>{$i}</a></li>";
                            }
                        }
                        if($paginate->hasNext()){
                            echo "<li class='next'><a href='index.php?page={$paginate->next()}'>Next</a></li>";
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
        <!-- Blog Sidebar Widgets Column -->
    <!--
        <div class="col-md-4">
            <?php //include("includes/sidebar.php"); ?>
        </div>
    -->
        <!-- /.row -->
<?php include("includes/footer.php"); ?>