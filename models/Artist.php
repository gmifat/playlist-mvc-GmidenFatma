<?php
    function getArtists($artistId = null)
    {
        $db = dbConnect();

        if ($artistId != null) {
           return getArtist($artistId);
        }
        else {
            $query = $db->query('SELECT * FROM artists');
            $artists = $query->fetchAll();
            return $artists;
        }
    }

    function getArtist($id)
    {
        $db = dbConnect();

        $query = $db->prepare("SELECT * FROM artists where id = ?");
        if ($query->execute(array($id))) {
            $artist = $query->fetch();
            return $artist;
        }

        return false;
    }

    function getArtist_label($label_id = false)
    {
        $db = dbConnect();
        if ($label_id)
        {
            $query = $db->prepare('SELECT * FROM artists a INNER JOIN artists_label al ON a.id= al.artist_id WHERE al.label_id = ?');
            $artist_label = $query->execute([$label_id]);
        }
        else
        {
            $artists = getArtists($artistId = null);
        }
    }


