<?php require APPROOT .'/views/includes/header.php' ?>
<h1><?php echo $data['title']; ?></h1>
<!-- <h2><?php echo APPROOT;?></h2> -->
<!-- <h2><?php echo URLROOT;?></h2> -->
<ul>
    <?php 
        foreach($data['posts'] as $post) :
    ?>
    <li>

            <?php echo $post->title;?>

    </li>
    <?php endforeach;?>
</ul>






<?php require APPROOT .'/views/includes/footer.php' ?>