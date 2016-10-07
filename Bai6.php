<!DOCTYPE html>
<html>
<head>
	<title>Bai 6</title>
</head>
<body>
	<div style="width: 1000px; text-align: center; margin: auto; border: 2px dotted #eee; min-height: 200px">
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
			<input type="number" name="num1" placeholder="Số thứ nhất">
			<input type="submit" name="sum" value="+">
			<input type="submit" name="sub" value="-">
			<input type="submit" name="multip" value="x">
			<input type="submit" name="div" value="/">
			<input type="submit" name="power" value="^">
			<input type="number" name="num2" placeholder="Số thứ hai">
			<label> = </label>
		<?php

			//if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$result = 0;
				if (isset($_POST['sum'])) $result = $_POST['num1'] + $_POST['num2'];
				if (isset($_POST['sub'])) $result = $_POST['num1'] - $_POST['num2'];
				if (isset($_POST['multip'])) $result = $_POST['num1'] * $_POST['num2'];			
				if (isset($_POST['div'])) {
					if ($_POST['num2'] == 0) {
						$result = "Không thể chia cho 0";
					}else{
						$result = $_POST['num1'] / $_POST['num2'];
					}
				}
				if (isset($_POST['power'])) $result = $_POST['num1'] ** $_POST['num2'];
				echo $result;
			//}
		?>
		</form>


	</div>
</body>
</html>