
    <?php require ('views/partials/header.php'); ?>

    <?php require ('views/partials/menu.php'); ?>

        <h2>Liste complète des artistes</h2>
    <?php if(isset($artists))
    {
        foreach ($artists as $artist) : ?>
            <div><?= $artist['name'] ;?></div>

        <?php  endforeach;
    } ?>
