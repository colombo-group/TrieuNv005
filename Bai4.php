<!DOCTYPE html>
<html>
<head>
	<title>Bai 4</title>
	<meta charset="utf-8">
</head>
<body>

	<div style="margin: auto; min-height: 500px; width: 1000px; text-align: center;">

		<form>
			<input type="number" name="height" max="50" min="0" style="width: 150px" placeholder="Số dòng muốn in :" value="<?php echo $_GET['height']; ?>;" >
			<input type="submit" name="paint" value="in">
		</form>

		<div style="margin: auto; width: 800px; padding: 50px; border: 1px dotted #000; text-align: left;">
			<?php
				$number =  isset($_GET['height']) ? $_GET['height'] : 0;

				for ($i = 1; $i <= $number; $i++) { 
					for ($j = $i; $j > 0; $j--) { 
						echo $j % 10 . " &nbsp";
					}
					echo "<br>";
				}
			?>
		</div>
	</div>
</body>
</html>