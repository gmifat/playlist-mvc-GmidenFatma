<?php


    function getAllAlbums()
    {
        $db = dbConnect();

        $query=$db->query('SELECT * FROM  albums');
        $albums = $query->fetchAll();
        return $albums;
    }


    function getAlbum($id)
    {
        $db = dbConnect();

        $query = $db->prepare('SELECT * FROM albums WHERE id = :id');
        $result = $query->execute([
            ':id' => $id
        ]);

        if ($result)
        {
            $album = $query->fetch();
            return $album;
        }
        return false;
    }

    function addAlbum($name, $year, $artist_id)
    {
        $db = dbConnect();

        $query = $db->prepare('INSERT INTO albums (name, year, artist_id) VALUES (:name, :year, :artist_id)');
        $result = $query->execute([
            ':name' => $name,
            ':year' =>$year,
            ':artist_id' =>$artist_id
        ]);
        return $result;
    }

    function updateAlbum($id, $name, $year, $artist_id)
    {
        $db = dbConnect();

        $query = $db->prepare('UPDATE albums SET name = :name, year = :year, artist_id = :artist_id WHERE id = :id');
        $result = $query->execute([
            ':id' => $id,
            ':name' => $name,
            ':year' => $year,
            ':artist_id' => $artist_id
        ]);
        return $result;
    }
    function deleteAlbum($id)
    {
        $db = dbConnect();

        $query = $db->prepare("DELETE FROM albums WHERE id=:id");
        $result = $query->execute([
            ':id' => $id]);

        return $result;
    }