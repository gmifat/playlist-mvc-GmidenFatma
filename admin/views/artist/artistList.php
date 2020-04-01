
    <?php require ('partials/header.php'); ?>

    <?php require ('partials/menu.php'); ?>

        <h2>ici la liste complète des artistes</h2>
    <?php if(isset($artists))
    {
        foreach ($artists as $artist) : ?>
            <div><?= $artist['name'] ;?></div>

        <?php  endforeach;
    } ?>
