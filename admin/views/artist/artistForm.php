
    <?php require ('views/partials/header.php'); ?>

    <?php require ('views/partials/menu.php'); ?>


    <?php if(isset($_SESSION['messages'])): ?>
        <div>
            <?php foreach($_SESSION['messages'] as $message): ?>
                <?= $message ?><br>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

        <h2>Ajouter un artist</h2>
        <!--<form action="index.php?controller=artists&action=add" method="post" enctype="multipart/form-data">-->
        <form action="index.php?controller=artists&action=<?= isset($artist) || isset($_SESSION['old_inputs']) && $_GET['action'] == 'edit'? 'edit&id='. $_GET['id'] : 'add' ?>" method="post" enctype="multipart/form-data">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label col-form-label-lg" for="name">Nom</label>
                <input class="col-sm-10" type="text" name="name" id="name" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['name'] : '' ?>" /><br>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label col-form-label-lg" for="label_id">Label :</label>
                <select class="col-sm-10" name="label_id" id="label_id">
                    <?php foreach($labels as $label): ?>
                        <option value="<?= $label['id']; ?>"><?= $label['name']; ?></option>
                    <?php endforeach; ?>
                </select><br>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label col-form-label-lg" for="biography">Biography</label>
                <textarea class="col-sm-10" name="biography" id="biography"><?= isset($_SESSION['old_values']) ? $_SESSION['old_values']['biography'] : '' ?></textarea></br>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label col-form-label-lg" for="image">Image</label>
                <input type="file" name="image" id="image" /><br>
            </div>
            <button type="submit" class="btn btn-primary btn-lg"><span class="fa fa-save"></span>
                Ajouter
            </button>
            <a class="btn btn-info btn-lg" href="index.php?controller=artists&action=list" role="button"><span class="fa fa-window-close"></span> Retour à la liste</a>

        </form>