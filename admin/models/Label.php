<?php

    function getAllLabels()
    {
        $db = dbConnect();
        $query = $db->query('SELECT * FROM labels');
        $labels = $query->fetchAll();

        return $labels;
    }

    function getLabelById($id)
    {
        $db = dbConnect();
        $query = $db->prepare('SELECT * FROM labels WHERE id=:id');
        $result = $query->execute([
            ':id' => $id]);
        if($result)
        {
            return $query->fetch();
        }

        return false;
    }

    function addLabel($name)
    {
        $db = dbConnect();

        $query = $db->prepare("INSERT INTO labels (name ) VALUES( :name)");
        return $query->execute([
            ':name' => $name
        ]);
    }

    function updateLabel($id, $name)
    {
        $db = dbConnect();

        $query = $db->prepare("UPDATE labels SET name = :name  WHERE id=:id");
        return $query->execute([
            ':id' => $id,
            ':name' => $name
        ]);
    }

    function deleteLabel($id)
    {
        $db = dbConnect();

        $query = $db->prepare("DELETE FROM labels WHERE id=:id");
        $result = $query->execute([
            ':id' => $id]);

        return $result;
    }
