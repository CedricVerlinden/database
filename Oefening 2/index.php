<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
    <title>Oefening 2 - Vermenigvuldiging</title>
</head>

<body>
    <nav>
        <ul>
            <li><a href="../Oefening 1/">Oefening 1</a></li>
            <li><a href="../Oefening 2/">Oefening 2</a></li>
            <li><a href="../Oefening 3/">Oefening 3</a></li>
            <li><a href="../Oefening 4/">Oefening 4</a></li>
            <li><a href="../Oefening 5/">Oefening 5</a></li>
        </ul>
    </nav>
    <h1>Vermenigvuldiging</h1>
    <?php
    $table = [];

    for ($i = 0; $i <= 10; $i++) {
        $row = [];
        for ($x = 0; $x <= 10; $x++) {
            $row[] = "<td>" . $i * $x . "</td>";
        }
        $table[] = "<tr>" . implode("", $row) . "</tr>";
    }

    echo "<table>" . implode("", $table) . "</table>";
    ?>
</body>

</html>