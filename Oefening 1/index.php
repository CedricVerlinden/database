<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="stylesheet" href="style.css">
	<title>Oefening 1 - Fibonacci</title>
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
	<h1>Fibonacci</h1>
	<?php
	$fib = [0, 1];

	for ($i = 2; $fib[$i - 1] + $fib[$i - 2] <= 1000; $i++) {
		$fib[$i] = $fib[$i - 1] + $fib[$i - 2];
	}

	echo implode(", ", $fib);
	?>
</body>

</html>