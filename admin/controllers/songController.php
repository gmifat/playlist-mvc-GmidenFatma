<?php

    require_once 'models/Song.php';
    require_once 'models/Artist.php';
    require_once 'models/Album.php';

    switch ($_GET['action'])
    {
        case 'list':
            //lister tous les artistes
            //aller chercher tous les artistes via une fonction du model
            $songs = getAllSongs();
            $view = 'views/song/songList.php';
            break;
        case 'new':
            //formulaire vide
            $artists = getAllArtists();
            $albums = getAllAlbums();
            $view = 'views/song/addSongForm.php';

            break;

        case 'add':
            //ajout song
            if (empty($_POST['title']) || empty($_POST['artist_id']))
            {
                if(empty($_POST['title']))
                {
                    $_SESSION['messages'][] = 'Le titre de la chanson est obligatoire !';
                }
                if(empty($_POST['artist_id']))
                {
                    $_SESSION['messages'][] = "L'artiste de la chanson est obligatoire !";
                }

                $_SESSION['old_inputs'] = $_POST;
                header('Location:index.php?controller=songs&action=new');
                exit;
            }
            else
            {
                $resultAdd = addSong($_POST['title'], $_POST['artist_id'], $_POST['album_id']);
                if($resultAdd)
                {
                    $_SESSION['messages'][] = 'Chanson enregistrée !';
                }
                else
                {
                    $_SESSION['messages'][] = "Erreur lors de l'enregistreent de la chanson.";
                }
                header('Location:index.php?controller=songs&action=list');
                exit;
            }
            break;

        case 'edit':
            //aller chercher l'artiste en question pour préremlpissage du formulaire ci-dessous
            if (isset($_GET['id']) && !empty($_GET['id']))
            {

                if (!isset($_SESSION['old_inputs']))
                {
                    $song = getSongById($_GET['id']);
                }
                else
                {
                    $song = $_SESSION['old_inputs'];
                }

                if ($song == false)
                {
                    $_SESSION['messages'][] = 'Chanson non trouvée !';
                    header('Location:index.php?controller=songs&action=list');
                    exit;
                }

                $artists = getAllArtists();
                $albums = getAllAlbums();
                $view = 'views/song/editSongForm.php';
            }
            else if (isset($_POST['id']) && !empty($_POST['id']))
            {
                if (empty($_POST['title']) || empty($_POST['artist_id']))
                {
                    if(empty($_POST['title']))
                    {
                        $_SESSION['messages'][] = 'Le titre de la chanson est obligatoire !';
                    }
                    if(empty($_POST['artist_id']))
                    {
                        $_SESSION['messages'][] = "L'artiste de la chanson est obligatoire !";
                    }

                    $_SESSION['old_inputs'] = $_POST;
                    header('Location:index.php?controller=songs&action=edit&id='.$_POST['id']);
                    exit;
                }

                $update = updateSong($_POST['id'], $_POST['title'], $_POST['artist_id'], $_POST['album_id']);
                if ($update == true)
                {
                    $_SESSION['messages'][] = 'Chanson modifié !';
                }
                else
                {
                    $_SESSION['messages'][] = "Erreur lors de l'enregistrement de la chanson.";
                }

                header('Location:index.php?controller=songs&action=list');
                exit;
            }
            else
            {
                header('Location:index.php?controller=artists&action=list');
                exit;
            }


            break;

        case 'delete':

            //appeler la fonction de suppression de l'artiste en question
            //la fonction de suppression doit être codée dans le model
            if (isset($_GET['id']) && !empty($_GET['id']))
            {
                $song = getSongById($_GET['id']);
                if ($song == false)
                {
                    $_SESSION['messages'][] = 'Chanson non trouvé !';
                    header('Location:index.php?controller=songs&action=list');
                    exit;
                }

                $artist = getArtistById($song['artist_id']);
                $album = getAlbum($song['album_id']);
                $view = 'views/song/deleteSong.php';

            }
            else if (isset($_POST['id'])) {
                $result = deleteSong($_POST['id']);
                if ($result == true) {
                    $_SESSION['messages'][] = 'Chanson supprimée !';
                    //afficher la variable $message dans la vue souhaitée
                } else {
                    $_SESSION['messages'][] = 'Erreur lors de la suppression... :(';
                }
                header('Location:index.php?controller=songs&action=list');
                exit;
            }
            else
            {
                header('Location:index.php?controller=songs&action=list');
                exit;
            }
            break;

        default:
            header('Location:index.php');
            exit;
            break;
    }
