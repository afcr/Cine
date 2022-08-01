<?php 

//if($_SERVER['REQUEST_METHOD'] === 'GET'){

    $id = $_REQUEST['id'];

    $query_pelicula = 'SELECT nombre, anio FROM peliculas WHERE id = :id';
    $resultado_pelicula = $db->prepare($query_pelicula);
    $resultado_pelicula->bindParam(':id', $id);
    $resultado_pelicula->execute();
    $resultadop = $resultado_pelicula->fetch();

    $queryDirectores = 'select directores.nombre from directores
    inner join directores_peliculas as dp on dp.director_id = directores.id
    where dp.pelicula_id = :id';
        
    $resultado = $db->prepare($queryDirectores);
    $resultado->bindParam(':id', $id);
    $resultado->execute();

    $directores = $resultado->fetchAll();
    $directores = makeArray($directores);

    $queryAllDirectores = 'SELECT nombre FROM directores';
    $resultado2 = $db->prepare($queryAllDirectores);
    $resultado2->execute();

    $allDirectores = $resultado2->fetchAll();
    
    $queryActores = 'select actores.nombre from actores
    inner join actores_peliculas as ap on ap.actor_id = actores.id
    where ap.pelicula_id = :id';

    $resultadoa = $db->prepare($queryActores);
    $resultadoa->bindParam(':id', $id);
    $resultadoa->execute();

    $actores = $resultadoa->fetchAll();
    $actores = makeArray($actores);

    $queryAllDirectores = 'SELECT nombre FROM actores';
    $resultadoa2 = $db->prepare($queryAllDirectores);
    $resultadoa2->execute();

    $allActores = $resultadoa2->fetchAll();

//}

    function makeArray($array){
        $arreglo = array();
        foreach($array as $d){
            array_push($arreglo, $d['nombre']);
        }

        return $arreglo;
    }

?>