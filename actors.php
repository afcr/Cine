<?php include('db.php') ?>
<?php include('pick_actor.php') ?>
<?php include('search_actor.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Actors</title>
</head>
<body>
    <?php include('header.php') ?>
    <div class="main-container">
        <div class="pick-movie-container">
            <form action="actors.php" method="post">
                <select name="actor" class="select-movies">
                    <option value="">Seleccione el actor</option>
                    <?php foreach($all_actors as $actor){ ?>
                    <option value="<?php echo $actor['nombre'] ?>"><?php echo $actor['nombre'] ?></option>
                    <?php } ?>
                </select>
                <button type="submit" value="buscar" class="search-button">Buscar</button>
            </form>
        </div>
        <?php if(isset($actors)){ ?>

            <div class="main-search-container">
                <div class="secondary-search-container">
                    <h4>Actor</h4>
                    <ul>
                        <li><?php echo $actors ?></li>
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
            <?php if(!isset($actors)){ ?>
            <div class="main-search-container">
            <table class="read-table">
                <tr>
                    <th>Nombre</th>
                    <th></th>
                </tr>
                <?php foreach($all_actors as $actor){ ?>
                        <tr>
                            <td><?php echo $actor['nombre'] ?></td>
                            <td>
                                <a href="edit_actor_form.php?id=<?php echo $actor['id'] ?>" >
                                    <img src="icons/pen-solid.svg" class="crud-icons">
                                </a>
                                <a href="" >
                                    <img src="icons/trash-can-solid.svg" class="crud-icons">
                                </a>
                            </td>
                        </tr>
                <?php } ?>
            </table>
            </div>
        <?php } ?>
    </div>
</body>
</html>