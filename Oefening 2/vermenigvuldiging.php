<html>
	<head>
        <link rel="stylesheet" href="style.css">
		<title>PHP Test</title>
	</head>
	<body>
		<?php

        echo "<table>";

        for ($i = 0; $i <= 10; $i++) {
            echo "<tr>";

            for ($x = 0; $x <= 10; $x++) {
                echo "<td>" . $i * $x . "</td>";
            }
        }

        echo "</table>"

		?>
	</body>
</html>