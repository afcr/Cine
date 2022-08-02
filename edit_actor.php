<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $actorId = $_REQUEST['actorId'];
    $actorName = $_REQUEST['name'];

    $updateActorQuery = 'UPDATE actores SET nombre = :nombre WHERE id = :id';
    $updateActor = $db->prepare($updateActorQuery);
    $updateActor->bindParam(':nombre', $actorName);
    $updateActor->bindParam(':id', $actorId);
    $updateActor->execute();
}

?>