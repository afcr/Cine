<?php include('db.php');?>
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
    <?php include('pick_movie.php') ?>
    <form action="index.php" method="post">
        <select name="pelicula">
            <option value="">Seleccione una pelicula</option>
            <?php foreach($movies as $movie){ ?>
            <option value="<?php echo $movie['nombre'] ?>"><?php echo $movie['nombre'] ?></option>
            <?php } ?>
        </select>
        <br>
        <button type="submit" name="buscar" value="Buscar">Buscar</button>
    </form>
    <br>
    <br>
    <br>
    <?php include('search.php');?> 
    <?php if(isset($pelicula)){ ?>

        <div class="main-container">
            <div class="secondary-container">
                <h4>Pelicula</h4>
                <ul>
                    <li><?php echo $pelicula ?></li>
                </ul>
            </div>
            <div class="secondary-container">
                <h4>Directores</h4>
                <ul>
                    <?php foreach($directores as $director){ ?>
                        <li><?php echo $director['nombre'] ?></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="secondary-container">
                <h4>Actores</h4>
                <ul>
                    <?php foreach($actores as $actor){ ?>
                        <li><?php echo $actor['actores'] ?></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="secondary-container">
                <h4>Año</h4>
                <ul>
                    <li><?php echo $fecha['anio'] ?></li>
                </ul>
            </div>
        </div>

    <?php } ?>
</body>
</html>