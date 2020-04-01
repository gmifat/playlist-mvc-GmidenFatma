<?php


    function getAllArtists($artistId = null)
    {
        $db = dbConnect();
        $query = $db->query('SELECT * FROM artist');
        $artists = $query->fetchAll();

        return $artists;
    }


    function addArtist( $name, $biography)
    {
        $db = dbConnect();
        $query = $db->prepare('INSERT INTO artist (name, biography) VALUES( :name, :biography)');
        $result = $query->execute([
            ':name' => $name,
            ':biography' => $biography
        ]);
        return $result;
    }

    function delete($id)
    {
        //requette pour delate le row en question
        $db = dbConnect();
        $query = $db->prepare('DELETE FROM artist WHERE id = ?');
        $result = $query->execute([$id]);
        return $result;
    }