<?php

$query = 'SELECT id, nombre, anio FROM peliculas';
$resultadorm = $db->prepare($query);
$resultadorm->execute();
$all_movies = $resultadorm->fetchAll();

?>