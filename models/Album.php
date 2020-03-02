<?php
function getAlbums($artistId = false){
    $db = dbConnect();

  if($artistId != false){

      $query = $db->prepare("SELECT * FROM album where artist_id = ?");
      if ($query->execute(array($artistId))) {
          $albums = $query->fetchAll();
          return $albums;
      }

      return false;
  }
  else{
      $query = $db->query('SELECT * FROM album');
      $albums = $query->fetchAll();
      return $albums;
  }
}

function getAlbum($id){
    $db = dbConnect();

    $query = $db->prepare("SELECT * FROM album where id = ?");
    if ($query->execute(array($id))) {
        $album = $query->fetch();
        return $album;
    }

    return false;
}
