<?php
//include('db.php');

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $movieId = $_REQUEST['movieId'];

    if(isset($_REQUEST['name'])){

        $name = $_REQUEST['name'];

        $searchNameQuery = 'UPDATE peliculas SET nombre = :nombre WHERE id = :movieId';
        $searchName = $db->prepare($searchNameQuery);
        $searchName->bindParam(':nombre', $name);
        $searchName->bindParam(':movieId', $movieId);
        $searchName->execute();
    }

    if(isset($_REQUEST['year'])){

        $year = $_REQUEST['year'];

        $searchYearQuery = 'UPDATE peliculas SET anio = :anio WHERE id = :movieId';
        $searchYear = $db->prepare($searchYearQuery);
        $searchYear->bindParam(':anio', $year);
        $searchYear->bindParam(':movieId', $movieId);
        $searchYear->execute();
    }

    if(!empty($_REQUEST['selectedDirectors'])){

        $selectedDirectors = $_REQUEST['selectedDirectors'];

        $deleteAsociatedDirectorsQuery = 'DELETE FROM directores_peliculas WHERE pelicula_id = :movieId';
        $deleteAsociatedDirectors = $db->prepare($deleteAsociatedDirectorsQuery);
        $deleteAsociatedDirectors->bindParam(':movieId', $movieId);
        $deleteAsociatedDirectors->execute();

        $searchAsociatedDirectorsQuery = 'SELECT id FROM directores WHERE '. createDirectorsQuery($selectedDirectors);
        $searchAsociatedDirectors = $db->prepare($searchAsociatedDirectorsQuery);
        $searchAsociatedDirectors->execute();
        $asociatedDirectors = $searchAsociatedDirectors->fetchAll();

        $aggregateAsociatedDirectorQuery = 'INSERT INTO directores_peliculas(pelicula_id, director_id)
            VALUES' . createDirectorsMoviesQuery($asociatedDirectors, $movieId);
        $aggregateAsociatedDirector = $db->prepare($aggregateAsociatedDirectorQuery);
        $aggregateAsociatedDirector->execute();
    }

    if(!empty($_REQUEST['selectedActors'])){

        $selectedActors = $_REQUEST['selectedActors'];

        $deleteAsociatedActorsQuery = 'DELETE FROM actores_peliculas WHERE pelicula_id = :movieId';
        $deleteAsociatedActors = $db->prepare($deleteAsociatedActorsQuery);
        $deleteAsociatedActors->bindParam(':movieId', $movieId);
        $deleteAsociatedActors->execute();

        $searchAsociatedActorsQuery = 'SELECT id FROM actores WHERE '. createDirectorsQuery($selectedActors);
        $searchAsociatedActors = $db->prepare($searchAsociatedDirectorsQuery);
        $searchAsociatedActors->execute();
        $asociatedActors = $searchAsociatedActors->fetchAll();

        $aggregateAsociatedActorQuery = 'INSERT INTO actores_peliculas(pelicula_id, actor_id)
            VALUES' . createDirectorsMoviesQuery($asociatedActors, $movieId);
        $aggregateAsociatedActor = $db->prepare($aggregateAsociatedActorQuery);
        $aggregateAsociatedActor->execute();
    }
}

//investigar si map funciona mejor aqui o con un for normal
function createDirectorsQuery($array){
    $stringSql = '';
    foreach($array as $director){
        //if($director->next()){
        if(end($array) !== $director){
            $stringSql = $stringSql .' nombre = "'. $director .'" OR';
        }else{
            $stringSql = $stringSql .' nombre = "'. $director .'"';
        }
    }

    return $stringSql;
}

function createDirectorsMoviesQuery($stdObjectIGuess, $movieId){
    $stringSql = '';
    foreach($stdObjectIGuess as $sto){
        //if($stdObjectIGuess->next()){
        if(end($stdObjectIGuess) !== $sto){
            $stringSql = $stringSql .' (' .$movieId. ',' .$sto['id']. '),';
        }else{
            $stringSql = $stringSql .' (' .$movieId. ',' .$sto['id']. ')';
        }
    }

    return $stringSql;
}

?>