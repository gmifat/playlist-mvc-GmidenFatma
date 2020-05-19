
    <?php require ('views/partials/header.php'); ?>

    <?php require ('views/partials/menu.php'); ?>


    <?php if (isset ($_SESSION['messages'])) : ?>
        <div class="alert alert-danger" role="alert">
            <?php foreach ($_SESSION['messages'] as $message) : ?>
                <?= $message ; ?><br>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <h2>Modifier un label</h2>
    <form action="index.php?controller=labels&action=edit" method="post" enctype="multipart/form-data">

        <input class="col-sm-10" name="id" value="<?= $label['id'] ?>" type="hidden">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label col-form-label-lg" for="name">Nom:</label>
            <input class="col-sm-10" type="text" name="name" id="name" value="<?= $label['name']?>" />
        </div>
        <button type="submit" class="btn btn-primary btn-lg"><span class="fa fa-save"></span>
            Enregistrer
        </button>

        <a class="btn btn-info btn-lg" href="index.php?controller=labels&action=list" role="button"><span class="fa fa-window-close"></span> Retour à la liste</a>

    </form>