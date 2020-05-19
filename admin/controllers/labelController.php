<?php

    require_once 'models/Label.php';

    switch ($_GET['action'])
    {
        case 'list':
            //lister tous les artistes
            //aller chercher tous les artistes via une fonction du model
            $labels = getAllLabels();
            $view = 'views/label/labelList.php';
            break;
        case 'new':

            $view = 'views/label/addLabelForm.php';

            break;

        case 'add':
            //ajout artist
            if (empty($_POST['name']))
            {
                $_SESSION['messages'][] = 'Le champ nom est obligatoire !';
                $_SESSION['old_inputs'] = $_POST;
                header('Location:index.php?controller=labels&action=new');
                exit;
            }
            else
            {
                $resultAdd = addLabel($_POST['name']);
                if($resultAdd)
                {
                    $_SESSION['messages'][] = 'Label ajouté !';
                }
                else
                {
                    $_SESSION['messages'][] = "Erreur lors de l'ajout du label !";
                }
                header('Location:index.php?controller=labels&action=list');
                exit;
            }
            break;

        case 'edit':
            if (isset($_GET['id']) && !empty($_GET['id']))
            {
                if (!isset($_SESSION['old_inputs']))
                {
                    $label = getLabelById($_GET['id']);
                }
                else
                {
                    $label = $_SESSION['old_inputs'];
                }

                if ($label == false)
                {
                    $_SESSION['messages'][] = 'Label non trouvé !';
                    header('Location:index.php?controller=labels&action=list');
                    exit;
                }

                $view = 'views/label/editLabelForm.php';
            }
            else if (isset($_POST['id']) && !empty($_POST['id']))
            {
                if (empty($_POST['name']))
                {
                    $_SESSION['messages'][] = 'Le champ nom est obligatoire !';
                    $_SESSION['old_inputs'] = $_POST;
                    header('Location:index.php?controller=labels&action=edit&id='.$_POST['id']);
                    exit;
                }

                $update = updateLabel($_POST['id'], $_POST['name']);
                if ($update == true)
                {
                    $_SESSION['messages'][] = 'Label modifié !';

                }
                else
                {
                    $_SESSION['messages'][] = "Erreur lors de l'enregistrement du label.";
                }

                header('Location:index.php?controller=labels&action=list');
                exit;
            }
            else
            {
                header('Location:index.php?controller=labels&action=list');
                exit;
            }


            break;

        case 'delete':

            //appeler la fonction de suppression de l'artiste en question
            //la fonction de suppression doit être codée dans le model
            if (isset($_GET['id']) && !empty($_GET['id']))
            {
                $label = getLabelById($_GET['id']);
                if ($label == false)
                {
                    $_SESSION['messages'][] = 'Label non trouvé !';
                    header('Location:index.php?controller=labels&action=list');
                    exit;
                }

                $view = 'views/label/deleteLabelForm.php';

            }
            else if (isset($_POST['id'])) {
                $result = deleteLabel($_POST['id']);
                if ($result == true) {
                    $_SESSION['messages'][] = 'Label supprimé !';
                    //afficher la variable $message dans la vue souhaitée
                } else {
                    $_SESSION['messages'][] = 'Erreur lors de la suppression... :(';
                }
                header('Location:index.php?controller=labels&action=list');
                exit;
            }
            else
            {
                header('Location:index.php?controller=labels&action=list');
                exit;
            }
            break;

        default:
            header('Location:index.php');
            exit;
            break;
    }



