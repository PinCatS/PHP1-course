<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Homework 2</title>
	<style>
		footer {
			position: absolute;
			bottom: 0;
			left: 0;
			width: 100%;
			height: 50px;
		}

		#task2 {
			display: inline-block;
		}
	</style>
	<?php
		include_once "hw2lib.php";
	?>
</head>
<body>
	<header>
		<h1>Homework 2</h1>
		<hr>
	</header>
	<main>
		<?php
		echo '<h4>Task 1: "Funny calculator"</h4>';
		echo '<p><code>funny_calculator(5, 6);</code> ==> ' . funny_calculator(5, 6, true);
		echo '<p><code>funny_calculator(0, 0);</code> ==> ' . funny_calculator(0, 0, true);
		echo '<p><code>funny_calculator(-2, -4);</code> ==> ' . funny_calculator(-2, -4, true);
		echo '<p><code>funny_calculator(-2, 4);</code> ==> ' . funny_calculator(-2, 4, true) . '</p><br>';

		echo '<h4 id="task2">Task 2: [$a..15]</h4>';
		$a = rand(0, MAX_UPPER_VALUE);
		echo '<span> for a = ' . $a . ';</span><br>';
		rand_start_range( $a );

		echo '<h4>Task 3 and 4: "Calculator"</h4>';
		echo '<p><code>calculator(5, 2, \'+\');</code> ==> ' . calculator(5, 2, '+');
		echo '<p><code>calculator(5, 2, \'-\');</code> ==> ' . calculator(5, 2, '-');
		echo '<p><code>calculator(5, 2, \'*\');</code> ==> ' . calculator(5, 2, '*');
		echo '<p><code>calculator(5, 2, \'/\');</code> ==> ' . calculator(5, 2, '/') . '<br>';
		echo '<p><code>calculator(5, 0, \'/\');</code> ==> ';
		calculator(5, 0, '/');
		echo '<p><code>calculator(5, 2, \'**\');</code> ==> ';
		calculator(5, 2, '**');
		echo '</p><br>';

		echo '<h4>Task 5: "Power"</h4>';
		echo '<p><code>power(2, 3);</code> ==> ' . power(2, 3) . '</p><br>';

		echo '<h4>Task 6: "Transliteration"</h4>';
		$text = 'Сергей';
		$res =  transliterate($text, $cyrillic_to_latin_map);
		echo $text . ' ==> ' . $res;
		
		?>
	</main>
	<footer>
		<hr>
		<?php
			echo get_date_in_russian('Europe/Moscow');
		?>
	</footer>
</body>
</html>