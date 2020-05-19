<?php


    function getAllLabes()
    {
        $db = dbConnect();
        $query = $db->query('SELECT * FROM labels');
        $labels = $query->fetchAll();

        return $labels;
    }

    function getArtistById($id)
    {
        $db = dbConnect($id);
        $query = $db->query('SELECT * FROM labels WHERE  id = :id');
        $label = $query->fetch();
        return $label;
    }
