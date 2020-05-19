<?php


    function getAllArtists($artistId = null)
    {
        $db = dbConnect();
        $query = $db->query('SELECT * FROM artists ORDER BY name');
        $artists = $query->fetchAll();

        return $artists;
    }


    function addArtist($informations)
    {

        $db = dbConnect();

        $query = $db->prepare("INSERT INTO artists (name, label_id, biography ) VALUES( :name, :label, :biography)");
        $result = $query->execute([
            ':name' => $informations['name'],
            ':biography' => $informations['biography'],
            ':label' => $informations['label_id']
        ]);

        if($result)
        {
            $artistId = $db->lastInsertId();

            $allowed_extensions = array( 'jpg' , 'jpeg' , 'gif', 'png' );
            $my_file_extension = pathinfo( $_FILES['image']['name'] , PATHINFO_EXTENSION);

            if (in_array($my_file_extension , $allowed_extensions))
            {
                $new_file_name = $artistId . '.' . $my_file_extension;
                $destination = '../assets/images/artist/' . $new_file_name;
                $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

                $db->query("UPDATE artists SET image = '$new_file_name' WHERE id = $artistId");
            }
        }

        return $result;

    }

    function updateArtist($id, $name, $label, $biography)
    {
         $db = dbConnect();
            $query = $db->prepare("UPDATE artists SET name = :name, label_id = :label_id, biography =:biography WHERE id = :id");
            $result =  $query->execute([
                ':id' => $id,
                ':name' => $name,
                ':label_id' =>$label,
                ':biography' => $biography]);

        if($result)
        {
            $allowed_extensions = array( 'jpg' , 'jpeg' , 'gif', 'png' );
            $my_file_extension = pathinfo( $_FILES['image']['name'] , PATHINFO_EXTENSION);

            if (in_array($my_file_extension , $allowed_extensions))
            {
                $new_file_name = $id . '.' . $my_file_extension;
                $destination = '../assets/images/artist/' . $new_file_name;
                $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

                $db->query("UPDATE artists SET image = '$new_file_name' WHERE id = $id");
            }
        }
    }

    function getArtistById($id)
    {
        //requette pour recuperer l'artiste
        $db = dbConnect();
        $query = $db->prepare('SELECT * FROM artists WHERE id = ?');
        if ($query->execute([$id]))
        {
            $artist = $query->fetch();
            $query->closeCursor();
            return $artist;
        }

        return false;
    }

    function deleteArtist($id)
    {
        //requette pour delate le row en question
        $artist = getArtistById($id);
        //ontest false parce que fetch rend tableau
        if ($artist == false)
        {
            return false;
        }

        $db = dbConnect();
        $query = $db->prepare('DELETE FROM artists WHERE id = :id');
        $result = $query->execute([
            ':id' => $id]);

        if ($result)
        {
            if (!empty($artist['image']))
            {
                $fichier ='../assets/images/artist/' . $artist['image'];
                if (file_exists($fichier))
                {
                    unlink($fichier);
                }
            }

        }
        return $result;
    }

