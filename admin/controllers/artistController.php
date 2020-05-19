<?php

    require_once 'models/Artist.php';
    require_once 'models/Label.php';

    switch ($_GET['action'])
    {
        case 'list':
            //lister tous les artistes
            //aller chercher tous les artistes via une fonction du model
            $artists = getAllArtists();
            $view = 'views/artist/artistList.php';
            // require ('views/artist/artistList.php');
        break;

        case 'new':
            //formulaire vide
            $labels = getAllLabels();
            // require ('views/artist/artistForm.php');
            $view = 'views/artist/artistForm.php';

        break;

        case 'add':
             //ajout artist
           if (empty($_POST['name']) || empty($_POST['label_id']))
            {
                if(empty($_POST['name']))
                {
                    $_SESSION['messages'][] = 'Le champ nom est obligatoire !';
                }
                if(empty($_POST['label_id']))
                {
                    $_SESSION['messages'][] = 'Le champ label est obligatoire !';
                }

                $_SESSION['old_inputs'] = $_POST;
                header('Location:index.php?controller=artists&action=new');
                exit;
            }
           else
           {
               $resultAdd = addArtist($_POST);
               if($resultAdd)
               {
                   $_SESSION['messages'][] = 'Artiste enregistré !';
               }
               else
               {
                   $_SESSION['messages'][] = "Erreur lors de l'enregistreent de l'artiste.";
               }
               header('Location:index.php?controller=artists&action=list');
               exit;
           }
         break;

        case 'edit':
            //aller chercher l'artiste en question pour préremlpissage du formulaire ci-dessous
            if (isset($_GET['id']) && !empty($_GET['id']))
            {

                if (!isset($_SESSION['old_inputs']))
                {
                    $artist = getArtistById($_GET['id']);
                }
                else
                {
                    $artist = $_SESSION['old_inputs'];
                }

                if ($artist == false)
                {
                    $_SESSION['messages'][] = 'Artiste non trouvé !';
                    header('Location:index.php?controller=artists&action=list');
                    exit;
                }
                $labels = getAllLabels();
                // require ('views/artist/editForm.php');
                $view = 'views/artist/editForm.php';
            }
            else if (isset($_POST['id']) && !empty($_POST['id']))
            {
                if (empty($_POST['name']) || empty($_POST['label_id']))
                {
                    if(empty($_POST['name']))
                    {
                        $_SESSION['messages'][] = 'Le champ nom est obligatoire !';
                    }
                    if(empty($_POST['label_id']))
                    {
                        $_SESSION['messages'][] = 'Le champ label est obligatoire !';
                    }
                    $_SESSION['old_inputs'] = $_POST;
                    header('Location:index.php?controller=artists&action=edit&id='.$_POST['id']);
                    exit;
                }

                $update = updateArtist($_POST['id'], $_POST['name'], $_POST['label_id'], $_POST['biography']);
                if ($update == true)
                {
                    $_SESSION['messages'][] = 'Artiste modifié !';

                }
                else
                {
                    $_SESSION['messages'][] = "Erreur lors de l'enregistreent de l'artiste.";
                }

                header('Location:index.php?controller=artists&action=list');
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
                $artist = getArtistById($_GET['id']);
                if ($artist == false)
                {
                    $_SESSION['messages'][] = 'Artiste non trouvé !';
                    header('Location:index.php?controller=artists&action=list');
                    exit;
                }

                $label = getLabelById($artist['label_id']);
                if (empty($artist['image']))
                {
                    $artist['image'] = 'no_image.PNG';
                }
                // require ('views/artist/deleteArtist.php');
                $view = 'views/artist/deleteArtist.php';
            }
            else if (isset($_POST['id'])) {
                $result = deleteArtist($_POST['id']);
                if ($result == true) {
                    $_SESSION['messages'][] = 'Artiste supprimé !';
                    //afficher la variable $message dans la vue souhaitée
                } else {
                    $_SESSION['messages'][] = 'Erreur lors de la suppression... :(';
                }
                header('Location:index.php?controller=artists&action=list');
                exit;
            }
            else
            {
                header('Location:index.php?controller=artists&action=list');
                exit;
            }
        break;

        default:
            header('Location:index.php');
            exit;
        break;
    }


