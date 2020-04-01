<?php


    function getArtist($artistId = null)
    {
        $db = dbConnect();
        $query = $db->query('SELECT * FROM artist');
        $artists = $query->fetchAll();

        return $artists;
    }

    function delete($id)
    {
        //requette pour delate le row en question
        $query = $db->prepare('DELETE FROM artist WHERE id = ?');
        $result = $query->execute([$id]);
        return $result;
    }