<?php

$query = 'SELECT id, nombre FROM directores';
$resultadod = $db->prepare($query);
$resultadod->execute();
$all_directors = $resultadod->fetchAll();

?>