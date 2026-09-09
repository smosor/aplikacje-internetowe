<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wybór z bazy</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="card">
        <h1>Wybierz frazę</h1>
        <form action="" method="post">
            <label for="dane">Dostępne frazy w bazie:</label>
            <select name="dane" id="dane">
                <?php
                    $db = mysqli_connect('localhost', 'root', '', '5b1');
                    $sql = mysqli_query($db, "SELECT * FROM dane");
                    while($row = mysqli_fetch_array($sql)){
                        echo "<option value='{$row['query']}'>{$row['query']}</option>";
                    }
                    mysqli_close($db);
                ?>
            </select>
            <button type="submit">Wybierz</button>
        </form>
    </div>
</body>
</html>