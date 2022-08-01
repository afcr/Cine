<?php include('db.php') ?>
<?php include('fill_edit_movie_form.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Document</title>
</head>
<body>
    <?php include('header.php') ?>
    <div class="main-container">
        <form action="edit_movie.php" method="post">
            <input type="hidden" name="movieId" value="<?php echo $id ?>">
            <input type="text" name="name" value="<?php echo $resultadop['nombre'] ?>">
            <br><br>
            <input type="text" name="year" value="<?php echo $resultadop['anio'] ?>">
            <br><br><hr><br>

            <?php foreach($allDirectores as $adirectores){ ?>
            <input 
                type="checkbox" 
                name="selectedDirectors[]" 
                value="<?php echo $adirectores['nombre']; ?>" 
                <?php echo in_array($adirectores['nombre'], $directores) ? 'checked' : ''; ?>
            >
            <label><?php echo $adirectores['nombre']; ?></label><br>
            <?php } ?> 
            <br><hr><br>

            <?php foreach($allActores as $aactores){ ?>
            <input 
                type="checkbox" 
                name="selectedActors[]" 
                value="<?php echo $aactores['nombre']; ?>" 
                <?php echo in_array($aactores['nombre'], $actores) ? 'checked' : ''; ?>
            >
            <label><?php echo $aactores['nombre']; ?></label><br>
            <?php } ?>
            <br><br>
            <button type="submit">Guardar</button>
        </form>
    </div>
</body>
</html>