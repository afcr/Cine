<?php

$query = 'SELECT nombre FROM actores';
$resultadoa = $db->prepare($query);
$resultadoa->execute();
$all_actors = $resultadoa->fetchAll();

?>