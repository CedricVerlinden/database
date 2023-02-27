<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekenoefeningen</title>
</head>
<body>
    <?php 
        session_start();

        if(!isset($_SESSION["score"])){
            $_SESSION["score"] = 0;
        }

        if(!isset($_SESSION["count"])){
            $_SESSION["count"] = 0;
        }

        if(isset($_POST['submit'])){
        $solution = $_POST["answer"];
        $correct_answer = $_SESSION["correct_answer"];

        if($solution == $correct_answer){
            $_SESSION["score"]++;
        }

        $_SESSION["count"]++;

            if($_SESSION["count"] >= 10){
                session_destroy();
                echo "Eindresultaat: ".$_SESSION["score"]. "/10";
                echo "<br><br><input type='submit' name='reset' value='Reset'>";
                exit;
            }
        }

        $getal1 = rand(0,100);
        $getal2 = rand(0,100);
        $bewerkingen = array("+","-","*","/");
        $bewerking = $bewerkingen[array_rand($bewerkingen)];

        switch ($bewerking) {
            case "+":
                $uitkomst = $getal1 + $getal2;
                break;
            case "-":
                $uitkomst = $getal1 - $getal2;
                break;
            case "*":
                $uitkomst = $getal1 * $getal2;
                break;
            case "/":
                while($getal2 == 0){
                    $getal2 = rand(0,100);
                }
                
                $uitkomst = floor($getal1 / $getal2);
                break;
        }

        $_SESSION["correct_answer"] = $uitkomst;

    ?>

    <p>Oefening <?php echo $_SESSION["count"] + 1; ?></p>
    <form action="" method="post">
        <?php echo $getal1." ".$bewerking." ".$getal2." = "; ?>
        <input type="text" name="answer">
        <input type="submit" name="submit" value="Volgende">
    </form>
</body>
</html>