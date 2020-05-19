<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css"/>
    <script src="https://kit.fontawesome.com/2cf3ba0c41.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" type="image/png" href="assets/images/logo.png"/>
    <title>Playlist</title>
</head>
    <body>

        <?php


        require_once ('helpers.php');

        if(isset($_GET['p'])):
            switch ($_GET['p']):
                case 'album' :
                    require 'controllers/albumController.php';
                    break;

                case 'artist' :
                    require 'controllers/artistController.php';
                    break;

                case 'song' :
                    require 'controllers/songController.php';
                    break;
                case 'label' :
                    require 'controllers/labelController.php';
                    break;

                default :
                    require 'controllers/indexController.php';
            endswitch;
        else:
            require 'controllers/indexController.php';
        endif;



        ?>
        <a class="btn btn-info" role="button" href="admin/index.php"><img src="assets/images/admin.png" width="30" height="30"> Se connecter à l'admin</a>
    </body>
</html>
