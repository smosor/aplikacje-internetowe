<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wyszukiwarka</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="card">
        <h1>Wyszukiwarka</h1>

        <?php
        $q = isset($_GET['query']) ? trim($_GET['query']) : null;
        ?>

        <form action="index.php" method="get" class="search-form">
            <input type="text" name="query" id="query" placeholder="Wpisz frazę do wyszukiwania" value="<?= htmlspecialchars($q ?? '') ?>">
            <button type="submit">Szukaj</button>
        </form>

        <?php
        if ($q !== null) {
            if ($q === '') {
                echo "<div class='brak-wynikow'>Wpisz frazę w pole wyszukiwania.</div>";
            } else {
                echo "<h2>Szukasz: <span>" . htmlspecialchars($q) . "</span></h2>";

                $db = @mysqli_connect('localhost', 'root', '', '5b1');
                if (!$db) {
                    $db = @mysqli_connect('localhost', 'root', '', '5b_1');
                }

                if (!$db) {
                    die("<p class='error'>Błąd połączenia z bazą danych: " . mysqli_connect_error() . "</p>");
                }

                $q_escaped = mysqli_real_escape_string($db, $q);
                $odp = mysqli_query($db, "SELECT * FROM dane WHERE query LIKE '%$q_escaped%'");

                echo "<div class='wyniki'>";
                $has_results = false;
                while ($dane = mysqli_fetch_array($odp)) {
                    $has_results = true;
                    echo "<div class='wynik'>" . htmlspecialchars($dane['query']) . "</div>";
                }
                if (!$has_results) {
                    echo "<div class='brak-wynikow'>Brak wyników dla podanej frazy.</div>";
                }
                echo "</div>";

                mysqli_close($db);
            }
        }
        ?>
    </div>
</body>
</html>