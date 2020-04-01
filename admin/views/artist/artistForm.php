
    <?php require ('views/partials/header.php'); ?>

    <?php require ('views/partials/menu.php'); ?>

    <h2>Formulaire</h2>
    <form action="index.php?controller=artists&action=new" method="post">

        <label>Nom</label>
        <input type="text" name="name" id="name">
        <label>Biography</label>
        <input type="text" name="biography" id="biography">
        <input type="submit" value="Ajouter">

    </form>