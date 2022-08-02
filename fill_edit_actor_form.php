<?php

$id = $_REQUEST['id'];

$fillActorQuery = 'SELECT nombre FROM actores WHERE id = :id';
$fillActor = $db->prepare($fillActorQuery);
$fillActor->bindParam(':id', $id);
$fillActor->execute();
$actorInfo = $fillActor->fetch();

?>