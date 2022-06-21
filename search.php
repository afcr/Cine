<?php


if($_SERVER['REQUEST_METHOD'] === 'POST'){

        
        $pelicula = isset($_REQUEST['pelicula']) ? $_REQUEST['pelicula'] : '';
        
        $q = 'SELECT id from peliculas WHERE nombre = "' .$pelicula. '"';
        $r = $db->prepare($q);
        $r->execute();
        $peli = $r->fetch();
        
        $queryFecha = 'SELECT anio FROM peliculas WHERE id = :id';

        $resultadoy = $db->prepare($queryFecha);
        $resultadoy->bindParam(':id', $peli['id']);
        $resultadoy->execute();
        $fecha = $resultadoy->fetch();

        $queryDirectores = 'select directores.nombre from directores
        inner join directores_peliculas as dp on dp.director_id = directores.id
        where dp.pelicula_id = :id';
        
        $resultado = $db->prepare($queryDirectores);
        $resultado->bindParam(':id', $peli['id']);
        $resultado->execute();

        $directores = $resultado->fetchAll();
        
        $queryActores = 'select actores.nombre as actores from actores
        inner join actores_peliculas as ap on ap.actor_id = actores.id
        where ap.pelicula_id = :id';

        $resultadoa = $db->prepare($queryActores);
        $resultadoa->bindParam(':id', $peli['id']);
        $resultadoa->execute();

        $actores = $resultadoa->fetchAll();


}
?>