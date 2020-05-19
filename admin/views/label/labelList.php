    <?php require ('views/partials/header.php'); ?>

    <?php require ('views/partials/menu.php'); ?>

    <?php if(isset($_SESSION['messages'])): ?>

        <?php foreach($_SESSION['messages'] as $message): ?>
            <?= $message ?><br>
        <?php endforeach; ?>

    <?php endif; ?>

    <h2>Liste des labels</h2>
    <a href="index.php?controller=labels&action=new"><img alt="Ajouter" src="../assets/images/add.png" /> Ajouter un label</a>

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Nom du label</th>
            <th class="table-center" scope="col">Modifier</th>
            <th class="table-center">Supprimer</th>
        </tr>
        </thead>
        <tbody>
        <?php if (isset($labels)) :?>
            <?php foreach ($labels as $label) :?>
                <tr>
                    <td><?= $label['name']; ?></td>
                    <td class="table-center"><a href="index.php?controller=labels&action=edit&id=<?= $label['id']; ?>"><img class="action-img" alt="Modifier" src="../assets/images/edit.png" /></a></td>
                    <td class="table-center"><a href="index.php?controller=labels&action=delete&id=<?= $label['id']; ?>"><img class="action-img" alt="Supprimer" src="../assets/images/delete.png" /></a></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>


