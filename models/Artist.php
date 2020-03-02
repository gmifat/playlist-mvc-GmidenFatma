<?php
function getArtists($artistId = null){
    $db = dbConnect();

    if ($artistId != null) {
       return getArtist($artistId);
    }
    else {
        $query = $db->query('SELECT * FROM artist');
        $artists = $query->fetchAll();
        return $artists;
    }
}

function getArtist($id){
    $db = dbConnect();

    $query = $db->prepare("SELECT * FROM artist where id = ?");
    if ($query->execute(array($id))) {
        $artist = $query->fetch();
        return $artist;
    }

    return false;
}
