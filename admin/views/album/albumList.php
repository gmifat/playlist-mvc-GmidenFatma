    <?php require ('views/partials/header.php'); ?>

    <?php require ('views/partials/menu.php'); ?>


    <?php if (isset ($_SESSION['messages'])) : ?>
        <div class="alert alert-success" role="alert">
            <?php foreach ($_SESSION['messages'] as $message) : ?>
                <?= $message ; ?><br>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <h2>Liste des albums</h2>

    <a href="index.php?controller=albums&action=new"><img alt="Ajouter" src="../assets/images/add.png" /> Ajouter un album</a>

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Nom de l'album</th>
            <th class="table-center" scope="col">Modifier</th>
            <th class="table-center">Supprimer</th>
        </tr>
        </thead>
        <tbody>
            <?php if (isset($albums)) :?>
                <?php foreach ($albums as $album) :?>
                    <tr>
                        <td><?= $album['name']; ?></td>
                        <td class="table-center"><a href="index.php?controller=albums&action=edit&id=<?= $album['id']; ?>"><img class="action-img" alt="Modifier" src="../assets/images/edit.png" /></a></td>
                        <td class="table-center"><a href="index.php?controller=albums&action=delete&id=<?= $album['id']; ?>"><img class="action-img" alt="Supprimer" src="../assets/images/delete.png" /></a></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>


