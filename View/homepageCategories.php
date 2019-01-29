<div class="container categories">
    <div class="row">
        <?php foreach($categories as $category){?>
            <div class="col-sm-4">
                 <a href=<?php echo $category['link']?> > <?php echo'<img src="public/images/'.$category['image'].'">' ?></a>
                    <a href=<?php echo $category['link']?> ><?php echo $category['name']?></a>
                <p><?= $category['description'] ?></p>
            </div>
        <?php } ?>
    </div>
</div>

