
    <?php (require 'views/partials/header.php'); ?>
    <?php (require 'views/partials/menu.php'); ?>


    <?php if (isset ($_SESSION['messages'])) : ?>
        <div class="alert alert-danger" role="alert">
            <?php foreach ($_SESSION['messages'] as $message) : ?>
                <?= $message ; ?><br>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>


    <h2>Ajuter un album</h2>
    <form method="post" action="index.php?controller=albums&action=add">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label col-form-label-lg" for="name">Nom</label>
            <input class="col-sm-10" type="text" name="name" id="name" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['name'] : '' ?>" /><br>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label col-form-label-lg" for="date">Date</label>
            <input class="col-sm-10" type="text" name="year" id="year" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['year'] : '' ?>" /><br>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label col-form-label-lg" for="artist_name">Nom de l'artiste</label>
            <select class="col-sm-10" type="text" name="artist_id" id="artist_id" >
                <option value="">--Merci de choisir un artiste--</option>
                <?php foreach ($artists as $artist): ?>
                    <option <?= (isset($_SESSION['old_inputs']) && $_SESSION['old_inputs']['artist_id'] == $artist['id']) ? 'selected' : '' ?> value="<?= $artist['id'] ; ?>"><?= $artist['name'] ; ?></option>
                <?php endforeach; ?>
            </select><br>
        </div>
        <button type="submit" class="btn btn-primary btn-lg"><span class="fa fa-save"></span>
            Ajouter
        </button>
        <a class="btn btn-info btn-lg" href="index.php?controller=albums&action=list" role="button"><span class="fa fa-window-close"></span> Retour à la liste</a>
    </form>

