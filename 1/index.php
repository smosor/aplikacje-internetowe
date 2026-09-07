<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wyszukiwarka</title>
</head>
<body>
    <h1>Wyszukiwarka</h1>
    <?php
    $q = $_GET['query'] ?? null;
    if ($q) {
        echo "<h2>Szukasz: " . htmlspecialchars($q) . "</h2>";
    }
    ?>

    <form action="index.php" method="get">
        <input type="text" name="query" id="query" placeholder="Wpisz frazę do wyszukiwania" value="<?= htmlspecialchars($q ?? '') ?>">
        <button type="submit">Szukaj</button>
    </form>

    <?php
        $db = mysqli_connect('localhost', 'root', '', '5b1');
        if (!$db){
            die("Bład połączenia z bd");
        }

        if($q){
            $q_escaped = mysqli_real_escape_string($db, $q);
            $odp = mysqli_query($db, "SELECT * FROM dane WHERE query LIKE '%$q_escaped%'");
            while($dane = mysqli_fetch_array($odp)){
                echo "<div>" . htmlspecialchars($dane['query']) . "</div>";
            }
        }

        mysqli_close($db);
    ?>
</body>
</html>