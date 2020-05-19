<?php require ('views/partials/header.php'); ?>

<?php require ('views/partials/menu.php'); ?>



    <?php if (isset ($_SESSION['messages'])) : ?>
        <div>
            <?php foreach ($_SESSION['messages'] as $message) : ?>
                <?= $message ; ?><br>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <h2>Supprimer album</h2>
    <div><?= $album['name'] ?></div>
    <div><?= $album['year'] ?></div>
    <div><?= $artist['name'] ?></div>

    <form action="index.php?controller=albums&action=delete" method="post"  enctype="multipart/form-data">
        <div class="form-group row">
            <input name="id" value="<?= $album['id'] ?>" type="hidden">
        </div>
        <button type="submit" class="btn btn-danger btn-lg"><span class="fa fa-trash-alt"></span>
            Supprimer
        </button>
        <a class="btn btn-info btn-lg" href="index.php?controller=albums&action=list" role="button"><span class="fa fa-window-close"></span> Retour à la liste</a>
    </form>

