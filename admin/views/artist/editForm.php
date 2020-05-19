
     <?php require ('views/partials/header.php'); ?>

    <?php require ('views/partials/menu.php'); ?>

     <?php if(isset($_SESSION['messages'])): ?>
         <div>
             <?php foreach($_SESSION['messages'] as $message): ?>
                 <?= $message ?><br>
             <?php endforeach; ?>
         </div>
     <?php endif; ?>

    <h2>Modifier un artist</h2>
    <form action="index.php?controller=artists&action=edit" method="post"  enctype="multipart/form-data">

        <input name="id" value="<?= $artist['id'] ?>" type="hidden">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label col-form-label-lg"  for="name">Nom</label>
            <input class="col-sm-10" type="text" name="name" id="name" value="<?= $artist['name'] ?>"></br>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label col-form-label-lg"  for="label_id">Label :</label>
            <select class="col-sm-10" name="label_id" id="label_id">
                <?php foreach($labels as $label): ?>
                    <option <?=  $label['id'] == $artist['label_id'] ? 'selected' : '' ?> value="<?= $label['id']; ?>"><?= $label['name']; ?></option>
                <?php endforeach; ?>
            </select><br>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label col-form-label-lg"  for="biography">Biography:</label>
            <textarea class="col-sm-10" name="biography" id="biography" ><?= $artist['biography'] ?></textarea></br>
        </div>

        <div class="form-group row">

            <label class="col-sm-2 col-form-label col-form-label-lg" for="image">Image:</label>
            <di>
                <img height="100px" src="../assets/images/artist/<?= $artist['image'] ?>"/></br>
                <input type="file" name="image" id="image">
            </di>
        </div>

        <button type="submit" class="btn btn-primary btn-lg"><span class="fa fa-save"></span>
            Enregistrer
        </button>

        <a class="btn btn-info btn-lg" href="index.php?controller=artists&action=list" role="button"><span class="fa fa-window-close"></span> Retour à la liste</a>

    </form>

