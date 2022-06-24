<?php include('db.php');?>
<?php include('read_movies.php') ?>
<?php include('pick_movie.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css" type="text/css">
    <title>Document</title>
</head>
<body>
    <?php include('header.php') ?>
    <div class="main-container">
        <div class="pick-movie-container">
            
            <form action="index.php" method="post">
                <select name="pelicula" class="select-movies">
                    <option value="">Seleccione una pelicula</option>
                    <?php foreach($movies as $movie){ ?>
                    <option value="<?php echo $movie['nombre'] ?>"><?php echo $movie['nombre'] ?></option>
                    <?php } ?>
                </select>
                <br>
                <button type="submit" name="buscar" value="Buscar" class="search-button">Buscar</button>
            </form>
        </div>

        <?php include('search.php');?> 
        <?php if(isset($pelicula)){ ?>

            <div class="main-search-container">
                <div class="secondary-search-container">
                    <h4>Pelicula</h4>
                    <ul>
                        <li><?php echo $pelicula ?></li>
                    </ul>
                </div>
                <div class="secondary-search-container">
                    <h4>Directores</h4>
                    <ul>
                        <?php foreach($directores as $director){ ?>
                            <li><?php echo $director['nombre'] ?></li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="secondary-search-container">
                    <h4>Actores</h4>
                    <ul>
                        <?php foreach($actores as $actor){ ?>
                            <li><?php echo $actor['actores'] ?></li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="secondary-search-container">
                    <h4>Año</h4>
                    <ul>
                        <li><?php echo $fecha['anio'] ?></li>
                    </ul>
                </div>
            </div>

        <?php } ?>
        <?php if(!isset($pelicula)){ ?>
        <div class="main-search-container">
            <table class="read-table">
                <tr>
                    <th>Nombre</th>
                    <th>Año</th>
                </tr>
                <?php foreach($all_movies as $movies){ ?>
                        <tr>
                            <td><?php echo $movies['nombre'] ?></td>
                            <td><?php echo $movies['anio'] ?></td>
                        </tr>
                <?php } ?>
            </table>
        </div>
        <?php } ?>
    </div>
</body>
</html>