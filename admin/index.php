<?php
        session_start();
    require ('../helpers.php');

    if (isset($_GET['controller']))
    {

        switch ($_GET['controller'])
        {
            case 'artists':
                require 'controllers/artistController.php';
                break;
            case 'albums':
                require 'controllers/albumController.php';
                break;
            case 'labels':
                require 'controllers/labelController.php';
                break;
            case 'songs':
                require 'controllers/songController.php';
                break;

            default:
                require 'controllers/indexController.php';
                break;
        }
    }
    else
    {
        require 'controllers/indexController.php';
    }

?>
    <!doctype html>
    <html lang="fr">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <link rel="stylesheet" type="text/css" href="../assets/css/style.css"/>
            <link rel="stylesheet" type="text/css" href="../assets/css/admin.css"/>
            <link rel="shortcut icon" type="image/png" href="../assets/images/logo.png"/>
            <script src="https://kit.fontawesome.com/2cf3ba0c41.js" crossorigin="anonymous"></script>
            <title>Playlist</title>
        </head>
        <body>
        <?php
            include ($view);
        ?>
        </body>
    </html>
<?php

    if(isset($_SESSION['messages'])){
        unset($_SESSION['messages']);
    }
    if(isset($_SESSION['old_inputs'])){
        unset($_SESSION['old_inputs']);
    }
