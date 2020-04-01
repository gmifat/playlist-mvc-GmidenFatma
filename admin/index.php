<?php

    require ('../helpers.php');

    if (isset($_GET['controller']))
    {

        switch ($_GET['controller'])
        {
            case 'artists':
                require 'controllers/artistController.php';
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
