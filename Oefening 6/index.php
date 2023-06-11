<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
    <title>Oefening 6 - Sessies</title>
</head>

<body>
    <nav>
        <ul>
            <li><a href="../Oefening 1/">Oefening 1</a></li>
            <li><a href="../Oefening 2/">Oefening 2</a></li>
            <li><a href="../Oefening 3/">Oefening 3</a></li>
            <li><a href="../Oefening 4/">Oefening 4</a></li>
            <li><a href="../Oefening 5/">Oefening 5</a></li>
            <li><a href="../Oefening 6/">Oefening 6</a></li>
            <li><a href="../Oefening 7/">Oefening 7</a></li>
            <li><a href="../Oefening 8/">Oefening 8</a></li>
        </ul>
    </nav>
    <h1>Sessies</h1>
    <form action="authenticate.php" method="post">
        <label for="user">Gebruikersnaam</label>
        <input type="text" name="user" placeholder="Gebruikersnaam" required />

        <label for="password">Wachtwoord</label>
        <input type="password" name="password" placeholder="Wachtwoord" required />

        <input type="submit" name="submit" value="Log in" />
    </form>
</body>

</html>