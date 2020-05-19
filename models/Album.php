<?php
function getAlbums($artistId = false){
    $db = dbConnect();

  if($artistId != false){

      $query = $db->prepare("SELECT * FROM albums WHERE artist_id = ?");
      if ($query->execute(array($artistId))) {
          $albums = $query->fetchAll();
          return $albums;
      }

      return false;
  }
  else{
      $query = $db->query('SELECT * FROM albums');
      $albums = $query->fetchAll();
      return $albums;
  }
}

function getAlbum($id)
{
    $db = dbConnect();

    $query = $db->prepare("SELECT * FROM albums WHERE id = ?");
    if ($query->execute(array($id)))
    {
        $album = $query->fetch();
        return $album;
    }

    return false;
}
