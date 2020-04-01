<?php

    require_once 'models/Artist.php';

    switch ($_GET['action'])
    {
        case 'list':
            //lister tous les artistes
            //aller chercher tous les artistes via une fonction du model
            $artists = getAllArtists();
            require ('views/artist/artistList.php');
            break;

        case 'new':
            //formulaire vide


            if (!empty($_POST['name']) && !empty($_POST['biography']))
            {
                $result = addArtist($_POST['name'], $_POST['biography']);
                if ($result == true)
                {
                    header('Location:index.php?controller=artists&action=list');
                    exit;
                }
            }

            require ('views/artist/artistForm.php');
            break;

        case 'edit':
            //aller chercher l'artiste en question pour préremlpissage du formulaire ci-dessous
            require ('views/artist/artistForm.php');
            break;

        case 'delete':
            //appeler la fonction de suppression de l'artiste en question
            //la fonction de suppression doit être codée dans le model
            $result = delete($_GET['id']);
            if ($result == true)
            {
                $message = 'Artist suprimé';
                //afficher la variable $message dans la vue souhaitée
            }
            break;

        default:
            require 'admin/index.php';
            break;
    }


    /* if ($_GET['action'] == 'list')
    {
        require ('views/artistList.php');
     }
    /* elseif($_T['action'] == 'new')
     {
         require ('views/artistForm.php');
     }
     elseif($_GET['action'] == 'edit')
     {
         //aller chercher l'artiste en question pour préremlpissage du formulaire ci-dessous
         require ('views/artistForm.php');
     }
     elseif($_GET['action'] == 'delate')
     {
         //appeler la fonction de suppression de l'artiste en question

 }*/