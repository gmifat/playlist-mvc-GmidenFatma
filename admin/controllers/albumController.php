<?php


    require_once 'models/Album.php';
    require_once  'models/Artist.php';


    switch ($_GET['action'])
    {
        case 'list' :
            $albums = getAllAlbums();
            $view = 'views/album/albumList.php';
        break;

        case  'new' :
            $artists = getAllArtists();
            $view = 'views/album/newAlbum.php';
        break;
        case 'add' :
            $canAddAlbum = true;
            if (empty($_POST['name']))
            {
                $_SESSION['messages'][] = "Le nom de l'album est obligatoire";
                $canAddAlbum = false;
            }
            if (empty($_POST['year']))
            {
                $_SESSION['messages'][]  = "L'année de sortie de l'album est obligatoire";
                $canAddAlbum = false;
            }
            if (empty($_POST['artist_id']))
            {
                $_SESSION['messages'][]  = "L'artist de l'album est obligatoire";
                $canAddAlbum = false;
            }

            if ($canAddAlbum)
            {
                $result = addAlbum($_POST['name'], $_POST['year'], $_POST['artist_id']);
                if ($result)
                {
                    $_SESSION['messages'][] = "Album ajouté";
                    header('Location:index.php?controller=albums&action=list');
                    exit;
                }
                else
                {
                    $_SESSION['old_inputs'] = $_POST;
                    $_SESSION['messages'][] = "Une erreur s'est produite lors de l'enregistrement de l'album";
                    header('Location:index.php?controller=albums&action=new');
                    exit;
                }
            }
            else
            {
                $_SESSION['old_inputs'] = $_POST;
                header('Location:index.php?controller=albums&action=new');
                exit;
            }

        break;



        case 'edit' :
            if (isset($_GET['id']) && !empty($_GET['id']))
            {
                if (!isset($_SESSION['old_inputs']))
                {
                    $album = getAlbum($_GET['id']);
                }
                else
                {
                    $album = $_SESSION['old_inputs'];
                }

                if ($album == false)
                {
                    $_SESSION['messages'][] = 'Album non trouvé !';
                    header('Location:index.php?controller=albums&action=list');
                    exit;
                }

                $artists = getAllArtists();
                $view = 'views/album/editAlbum.php';
            }
            else if (isset($_POST['id']) && !empty($_POST['id']))
            {
                $canEditAlbum = true;
                if (empty($_POST['name']))
                {
                    $_SESSION['messages'][] = "Le nom de l'album est obligatoire";
                    $canEditAlbum = false;
                }
                if (empty($_POST['year']))
                {
                    $_SESSION['messages'][]  = "L'année de sortie de l'album est obligatoire";
                    $canEditAlbum = false;
                }
                if (empty($_POST['artist_id']))
                {
                    $_SESSION['messages'][]  = "L'artist de l'album est obligatoire";
                    $canEditAlbum = false;
                }
                if ($canEditAlbum)
                {
                    $update = updateAlbum($_POST['id'], $_POST['name'], $_POST['year'], $_POST['artist_id']);
                    if ($update == true)
                    {
                        $_SESSION['messages'][] = 'Album modifié !';

                    }
                    else
                    {
                        $_SESSION['messages'][] = "Erreur lors de l'enregistreent de l'album.";
                    }

                    header('Location:index.php?controller=albums&action=list');
                    exit;
                }
                else
                {
                    $_SESSION['old_inputs'] = $_POST;
                    header('Location:index.php?controller=albums&action=edit&id='.$_POST['id']);
                    exit;
                }


            }
            else
            {
                header('Location:index.php?controller=albums&action=list');
                exit;
            }
        break;

        case 'delete':

            //appeler la fonction de suppression de l'artiste en question
            //la fonction de suppression doit être codée dans le model
            if (isset($_GET['id']) && !empty($_GET['id']))
            {
                $album = getAlbum($_GET['id']);
                if ($album == false)
                {
                    $_SESSION['messages'][] = 'Album non trouvé !';
                    header('Location:index.php?controller=albums&action=list');
                    exit;
                }

                $artist = getArtistById($album['artist_id']);

                $view = 'views/album/deleteAlbum.php';

            }
            else if (isset($_POST['id'])) {
                $result = deleteAlbum($_POST['id']);
                if ($result == true) {
                    $_SESSION['messages'][] = 'Album supprimé !';
                    //afficher la variable $message dans la vue souhaitée
                } else {
                    $_SESSION['messages'][] = 'Erreur lors de la suppression... :(';
                }
                header('Location:index.php?controller=albums&action=list');
                exit;
            }
            else
            {
                header('Location:index.php?controller=albums&action=list');
                exit;
            }
            break;

        default:
            header('Location:index.php');
            exit;
            break;
    }


