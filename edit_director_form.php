<?php include('db.php') ?>
<?php include('edit_director.php') ?>
<?php include('fill_edit_director_form.php') ?>
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
        <form action="edit_director_form.php?id=<?php echo $id ?>" method="post">
            <input type="hidden" name="directorId" value="<?php echo $id ?>">
            <input type="text" name="name" value="<?php echo $directorInfo['nombre'] ?>">
            <br><br>
            <button type="submit">Guardar</button>
        </form>
    </div>
</body>
</html>