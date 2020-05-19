<?php

    function getAllSongs()
    {
        $db = dbConnect();

        $query = $db->query('SELECT * FROM songs');
        $songs = $query->fetchAll();
        return $songs;
    }

    function getSongById($id)
    {
        $db = dbConnect();
        $query = $db->prepare('SELECT * FROM songs WHERE id=:id');
        $result = $query->execute([
            ':id' => $id]);
        if($result)
        {
            return $query->fetch();
        }

        return false;
    }

    function addSong($title, $artist_id, $album_id)
    {
        $db = dbConnect();

        if (!empty($album_id)) {
            $query = $db->prepare("INSERT INTO songs (title, artist_id, album_id) VALUES(:title, :artist_id, :album_id)");
            return $query->execute([
                ':title' => $title,
                ':artist_id' => $artist_id,
                ':album_id' => $album_id
            ]);
        }
        else{
            $query = $db->prepare("INSERT INTO songs (title, artist_id) VALUES(:title, :artist_id)");
            return $query->execute([
                ':title' => $title,
                ':artist_id' => $artist_id,
            ]);
        }
    }

    function updateSong($id, $title, $artist_id, $album_id)
    {
        $db = dbConnect();

        if (!empty($album_id)) {
            $query = $db->prepare("UPDATE songs SET title = :title, artist_id = :artist_id, album_id=:album_id WHERE id=:id");
            return $query->execute([
                ':id' => $id,
                ':title' => $title,
                ':artist_id' => $artist_id,
                ':album_id' => $album_id
            ]);
        }
        else{
            $query = $db->prepare("UPDATE songs SET title = :title, artist_id = :artist_id WHERE id=:id");
            return $query->execute([
                ':id' => $id,
                ':title' => $title,
                ':artist_id' => $artist_id,
            ]);
        }
    }

    function deleteSong($id)
    {
        $db = dbConnect();

        $query = $db->prepare("DELETE FROM songs WHERE id=:id");
        $result = $query->execute([
            ':id' => $id]);

        return $result;
    }
