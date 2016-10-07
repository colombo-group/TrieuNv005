<!DOCTYPE html>
<html>
<head>
	<title>Bai 5</title>
	<meta charset="utf-8">
</head>
<body>

	<div style="margin: auto; min-height: 500px; width: 1000px; text-align: center;">

		<form>
			<input type="number" name="height" max="50" min="0" style="width: 150px" placeholder="Số dòng muốn in :" value="<?php echo $_GET['height']; ?>;" >
			<input type="submit" name="paint" value="in">
		</form>

		<div style="margin: auto; width: 800px; padding: 50px; border: 1px dotted #000; text-align: center;">
			<?php
				$number =  isset($_GET['height']) ? $_GET['height'] : 0;


				for ($i = 0; $i < $number; $i++) {

					$value = $i + 1;
					$start = 0;
					$row = array("");
					for ($k=0; $k < $i + 1; $k++) { 
						$row[$k] = "";
					}

					for ($j = $i; $j >= $start ; $j --) { 
						$row[$start] = $value % 10;
						$row[$j] = $row[$start];

						$value --;
						$start ++;
					}

					foreach ($row as $x) {
						echo $x . " &nbsp";
					}
					echo "<br>";
				}
			?>
		</div>
	</div>
</body>
</html>