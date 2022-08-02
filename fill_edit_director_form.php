<?php

$id = $_REQUEST['id'];

$fillDirectorQuery = 'SELECT nombre FROM directores WHERE id = :id';
$fillDirector = $db->prepare($fillDirectorQuery);
$fillDirector->bindParam(':id', $id);
$fillDirector->execute();
$directorInfo = $fillDirector->fetch();

?>