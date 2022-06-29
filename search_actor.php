<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $actors = isset($_REQUEST['actor']) ? $_REQUEST['actor'] : '';

    $query = 'SELECT id FROM actores WHERE nombre = :nombre';
    $resultado = $db->prepare($query);
    $resultado->bindParam(':nombre', $actors);
    $resultado->execute();
    $actor = $resultado->fetch();

    $queryPeliculas = 'select peliculas.nombre from peliculas
    inner join actores_peliculas as ap on ap.pelicula_id = peliculas.id 
    where ap.actor_id  = (select id from actores where nombre = :nombre)';
    $resultadop = $db->prepare($queryPeliculas);
    $resultadop->bindParam(':nombre', $actors);
    $resultadop->execute();
    $peliculas = $resultadop->fetchAll();

}

?>