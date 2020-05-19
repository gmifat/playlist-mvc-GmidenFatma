
    <?php require ('views/partials/header.php'); ?>

    <?php require ('views/partials/menu.php'); ?>



    <?php if(isset($_SESSION['messages'])): ?>
        <div>
            <?php foreach($_SESSION['messages'] as $message): ?>
                <?= $message ?><br>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <h2>Voulez vous supprimer cet artist</h2>
    <div><?= $artist['name'] ?></div>
    <div><?= $artist['biography'] ?></div>
    <div><?= $label['name']; ?></div>
    <img height="100px" src="../assets/images/artist/<?= $artist['image'] ?>"/>

    <form action="index.php?controller=artists&action=delete" method="post"  enctype="multipart/form-data">
        <div class="form-group row">
            <input name="id" value="<?= $artist['id'] ?>" type="hidden">
        </div>
        <button type="submit" class="btn btn-danger btn-lg"><span class="fa fa-trash-alt"></span>
            Supprimer
        </button>
        <a class="btn btn-info btn-lg" href="index.php?controller=artists&action=list" role="button"><span class="fa fa-window-close"></span> Retour à la liste</a>
    </form>

