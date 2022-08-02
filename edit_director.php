<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $directorId = $_REQUEST['directorId'];
    $directorName = $_REQUEST['name'];

    $updateDirectorQuery = 'UPDATE directores SET nombre = :nombre WHERE id = :id';
    $updateDirector = $db->prepare($updateDirectorQuery);
    $updateDirector->bindParam(':nombre', $directorName);
    $updateDirector->bindParam(':id', $directorId);
    $updateDirector->execute();
}

?>