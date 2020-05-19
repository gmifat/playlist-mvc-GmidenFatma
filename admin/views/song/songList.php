    <?php require ('views/partials/header.php'); ?>

    <?php require ('views/partials/menu.php'); ?>

    <?php if(isset($_SESSION['messages'])): ?>

        <?php foreach($_SESSION['messages'] as $message): ?>
            <?= $message ?><br>
        <?php endforeach; ?>

    <?php endif; ?>

    <h2>Liste des chansons</h2>


    <a href="index.php?controller=songs&action=new"><img alt="Ajouter" src="../assets/images/add.png" /> Ajouter une chanson</a>

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Nom de la chanson</th>
            <th class="table-center" scope="col">Modifier</th>
            <th class="table-center">Supprimer</th>
        </tr>
        </thead>
        <tbody>
        <?php if (isset($songs)) :?>
            <?php foreach ($songs as $song) :?>
                <tr>
                    <td><?= $song['title']; ?></td>
                    <td class="table-center"><a href="index.php?controller=songs&action=edit&id=<?= $song['id']; ?>"><img class="action-img" alt="Modifier" src="../assets/images/edit.png" /></a></td>
                    <td class="table-center"><a href="index.php?controller=songs&action=delete&id=<?= $song['id']; ?>"><img class="action-img" alt="Supprimer" src="../assets/images/delete.png" /></a></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>

