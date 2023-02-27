<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sessies</title>
</head>
<body>
    <form action="authenticate.php" method="post">
        <label for="user">Gebruikersnaam</label>
        <input type="text" name="user" placeholder="Joske" required />

        <br />
        <label for="password">Wachtwoord</label>
        <input type="password" name="password" required />

        <br /><br />
        <input type="submit" name="submit" value="Log in" />
    </form>
</body>
</html>