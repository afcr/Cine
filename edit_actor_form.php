<?php include('db.php') ?>
<?php include('edit_actor.php') ?>
<?php include('fill_edit_actor_form.php') ?>
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
        <form action="edit_actor_form.php?id=<?php echo $id ?>" method="post">
            <input type="hidden" name="actorId" value="<?php echo $id ?>">
            <input type="text" name="name" value="<?php echo $actorInfo['nombre'] ?>">
            <br><br>
            <button type="submit">Guardar</button>
        </form>
    </div>
</body>
</html>