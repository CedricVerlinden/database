<html>
	<head>
		<title>PHP Test</title>
	</head>
	<body>
		<?php
		$a = 0;
		$b = 1;

		echo "$a, $b";

		while ($a + $b < 1000) {
			$c = $a + $b;
			$a = $b;
			$b = $c;

			echo ", $c";
		}

		?>
	</body>
</html>