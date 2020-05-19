
    <?php require ('views/partials/header.php'); ?>

    <?php require ('views/partials/menu.php'); ?>


    <?php if(isset($_SESSION['messages'])): ?>
        <div>
            <?php foreach($_SESSION['messages'] as $message): ?>
                <?= $message ?><br>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <h2>Ajouter une chanson</h2>
    <!--<form action="index.php?controller=artists&action=add" method="post" enctype="multipart/form-data">-->
    <form action="index.php?controller=songs&action=add" method="post" >
        <div class="form-group row">
            <label class="col-sm-2 col-form-label col-form-label-lg" for="title">Titre de la chanson</label>
            <input class="col-sm-10" type="text" name="title" id="title" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['title'] : '' ?>" /><br>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label col-form-label-lg" for="artist_id">Nom de l'artiste</label>
            <select class="col-sm-10" type="text" name="artist_id" id="artist_id" >
                <option value="">--Merci de choisir un artiste--</option>
                <?php foreach ($artists as $artist): ?>
                    <option <?= (isset($_SESSION['old_inputs']) && $_SESSION['old_inputs']['artist_id'] == $artist['id']) ? 'selected' : '' ?> value="<?= $artist['id'] ; ?>"><?= $artist['name'] ; ?></option>
                <?php endforeach; ?>
            </select><br>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label col-form-label-lg" for="album_id">Nom de l'album</label>
            <select class="col-sm-10" type="text" name="album_id" id="album_id" >
                <option value="">--Merci de choisir un album--</option>
                <?php foreach ($albums as $album): ?>
                    <option <?= (isset($_SESSION['old_inputs']) && $_SESSION['old_inputs']['album_id'] == $album['id']) ? 'selected' : '' ?> value="<?= $album['id'] ; ?>"><?= $album['name'] ; ?></option>
                <?php endforeach; ?>
            </select><br>
        </div>
        <button type="submit" class="btn btn-primary btn-lg"><span class="fa fa-save"></span>
            Ajouter
        </button>
        <a class="btn btn-info btn-lg" href="index.php?controller=artists&action=list" role="button"><span class="fa fa-window-close"></span> Retour à la liste</a>

    </form>