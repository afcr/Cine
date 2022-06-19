<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="post">
        <input type="text" name="pelicula">
        <br>
        <button type="submit" name="buscar" value="Buscar">Buscar</button>
    </form>
    <br>
    <br>
    <br>
    <?php include('search.php');?> 
    <?php if(isset($pelicula)){ ?>
    <table>
        <thead>
            <tr>
                <th>Pelicula</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $pelicula ?></td>
            </tr>
        </tbody>
    </table>
    <table>
        <thead>
            <tr>
                <th>Directores</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($directores as $director){ ?>
            <tr>
                <td><?php echo $director['nombre'] ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <table>
        <thead>
            <tr>
                <th>Actores</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($actores as $actor){ ?>
            <tr>
                <td><?php echo $actor['actores'] ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <?php } ?>
</body>
</html>