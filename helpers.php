<?php

function dbConnect()
{
    try{
        $db = new PDO('mysql:host=localhost:3306;dbname=dv19gmiden;charset=utf8', 'dv19gmiden', 'Yp00$q2ZgQvzehun', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch (Exception $exception) //$e contiendra les éventuels messages d’erreur
    {
        die( 'Erreur : ' . $exception->getMessage() );
    }

    return $db;
}

//la fonction die arrête le script et peut afficher un message
//le catch n’est appelé que si une erreur survient au try