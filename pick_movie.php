<?php
    //include('db.php');
    $query = 'SELECT nombre FROM peliculas';
    $resultado = $db->prepare($query);
    $resultado->execute();
    $movies = $resultado->fetchAll();
?>