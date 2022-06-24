<?php include('db.php') ?>
<?php include('pick_director.php') ?>
<?php include('search_director.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Directors</title>
</head>
<body>
<?php include('header.php') ?>
<div class="main-container">
    <div class="pick-movie-container">
        <form action="directors.php" method="post">
            <select name="directors" class="select-movies">
                <option value="">Seleccione un director</option>
                <?php foreach($all_directors as $director){ ?>
                <option value="<?php echo $director['nombre'] ?>"><?php echo $director['nombre'] ?></option>
                <?php } ?>
            </select>
            <button type="submit" name="buscar" class="search-button">Buscar</button>
        </form>
    </div>
    <?php if(!isset($directors)){ ?>
        <div class="main-search-container">
            <table class="read-table">
                <tr>
                    <th>Nombre</th>
                </tr>
                <?php foreach($all_directors as $director){ ?>
                        <tr>
                            <td><?php echo $director['nombre'] ?></td>
                        </tr>
                <?php } ?>
            </table>
        </div>
    <?php } ?>
    <?php if(isset($directors)){ ?>
        <div class="main-search-container">
            <div class="secondary-search-container">
                <h4>Director</h4>
                <ul>
                    <li><?php echo $directors ?></li>
                </ul>
            </div>
            <div class="secondary-search-container">
                <h4>Peliculas</h4>
                <ul>
                    <?php foreach($peliculas as $pelicula){ ?>
                        <li><?php echo $pelicula['nombre'] ?></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    <?php } ?>
</div>
</body>
</html>