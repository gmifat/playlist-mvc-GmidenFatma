<?php
function getSongs($albumId = false){

    $db = dbConnect();
    if($albumId != false){
        $query = $db->prepare("SELECT * FROM song where album_id = ?");
        if ($query->execute(array($albumId))) {
            $songs = $query->fetchAll();
            return $songs;
        }

        return false;
    }
    else{
        $query = $db->query('SELECT * FROM song');
        $songs = $query->fetchAll();
        return $songs;
    }
}

function getSong($id){
    $db = dbConnect();

    $query = $db->query("SELECT * FROM song where id = $id");
    $song = $query->fetch();
    return $song;
}
