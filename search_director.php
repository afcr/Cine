<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $directors = isset($_REQUEST['directors']) ? $_REQUEST['directors'] : '';

    $query = 'SELECT id FROM directores WHERE nombre = :nombre';
    $resultado = $db->prepare($query);
    $resultado->bindParam(':nombre', $directors);
    $resultado->execute();
    $director = $resultado->fetch();

    $queryPeliculas = 'select peliculas.nombre from peliculas
    inner join directores_peliculas as dp on dp.pelicula_id = peliculas.id 
    where dp.director_id  = (select id from directores where nombre = :nombre)';
    $resultadop = $db->prepare($queryPeliculas);
    $resultadop->bindParam(':nombre', $directors);
    $resultadop->execute();
    $peliculas = $resultadop->fetchAll();

}
?>