<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="dane"></label>
        <select name="dane" id="dane">
            <?php
                $db = mysqli_connect('localhost', 'root', '', '5b1');
                $sql = mysqli_query($db, "SELECT * FROM dane");
                while($row = mysqli_fetch_array($sql)){
                    echo "<option value='{$row['query']}'>{$row['query']}</option>";
                }
                mysqli_close($db);
            ?>
            <option value=""></option>
        </select>
    </form>
</body>
</html>