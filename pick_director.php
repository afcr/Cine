<?php

$query = 'SELECT nombre FROM directores';
$resultadod = $db->prepare($query);
$resultadod->execute();
$all_directors = $resultadod->fetchAll();

?>