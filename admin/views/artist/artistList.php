
    <?php require ('views/partials/header.php'); ?>

    <?php require ('views/partials/menu.php'); ?>

    <?php if(isset($_SESSION['messages'])): ?>

    <?php foreach($_SESSION['messages'] as $message): ?>
        <?= $message ?><br>
    <?php endforeach; ?>

    <?php endif; ?>

    <h2>Liste des artistes</h2>
    <a href="index.php?controller=artists&action=new"><img alt="Ajouter" src="../assets/images/add.png" /> Ajouter un artist</a>

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Image</th>
            <th scope="col">Nom de l'artiste</th>
            <th class="table-center" scope="col">Modifier</th>
            <th class="table-center">Supprimer</th>
        </tr>
        </thead>
        <tbody>
        <?php if (isset($artists)) :?>
            <?php foreach ($artists as $artist) :?>
                <tr>
                    <td><img height="100px" src="../assets/images/artist/<?= !empty($artist['image']) ? $artist['image'] :  'no_image.PNG' ?>"/></td>
                    <td><?= $artist['name']; ?></td>
                    <td class="table-center"><a href="index.php?controller=artists&action=edit&id=<?= $artist['id']; ?>"><img class="action-img" alt="Modifier" src="../assets/images/edit.png" /></a></td>
                    <td class="table-center"><a href="index.php?controller=artists&action=delete&id=<?= $artist['id']; ?>"><img class="action-img" alt="Supprimer" src="../assets/images/delete.png" /></a></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>

    <script>
        const onDeleteArtist = (id, name) =>
        {
            // onclick="onDeleteArtist(<?= $artist['id'] ?>,'<?= $artist['name'] ?>' )"
            let ret = confirm("Voulez-vous supprimer l'artiste : "+name);
            if (ret == true)
            {
                location.href="index.php?controller=artists&action=delete&id="+id;
            }
        }
    </script>








