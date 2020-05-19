    <?php require ('views/partials/header.php'); ?>
    <?php require ('views/partials/menu.php'); ?>

    <?php if (isset ($_SESSION['messages'])) : ?>
        <div class="alert alert-danger" role="alert">
            <?php foreach ($_SESSION['messages'] as $message) : ?>
                <?= $message ; ?><br>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <h2>Modifier un album</h2>

    <form action="index.php?controller=albums&action=edit" method="post"  enctype="multipart/form-data">

        <input name="id" value="<?= $album['id'] ?>" type="hidden">

        <div class="form-group row">
            <label class="col-sm-2 col-form-label col-form-label-lg" for="name">Nom de l'abum:</label>
            <input class="col-sm-10" type="text" name="name" id="name" value="<?= $album['name'] ?>"><br>
        </div>
        <div class="form-group row">
            <label  class="col-sm-2 col-form-label col-form-label-lg" for="year">Année de l'abum:</label>
            <input  class="col-sm-10"  type="text" name="year" id="year" class="form-control mx-sm-3" aria-describedby="yearHelpInline" value="<?= $album['year'] ?>" /><br>

        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label col-form-label-lg"  for="artist_id">Nom de l'artiste:</label>
            <select class="col-sm-10" type="text" name="artist_id" id="artist_id">
                <option value="">--Merci de choisir un artiste--</option>
                <?php foreach ($artists as $artist): ?>
                    <option <?= ($album['artist_id'] == $artist['id']) ? 'selected' : '' ?> value="<?= $artist['id'] ; ?>"><?= $artist['name'] ; ?></option>
                <?php endforeach; ?>
            </select>

        </div>

        <button type="submit" class="btn btn-primary btn-lg"><span class="fa fa-save"></span>
            Enregistrer
        </button>
        <a class="btn btn-info btn-lg" href="index.php?controller=albums&action=list" role="button"><span class="fa fa-window-close"></span> Retour à la liste</a>

    </form>
