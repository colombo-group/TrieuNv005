<!DOCTYPE html>
<html>
<head>
	<title>Bai2</title>
</head>
<body style="text-align: center;">

	<form style="margin: auto;">
		<input type="text" name="country" placeholder="Tên nước: ">
		<input type="number" name="percen" max="100" min="0" placeholder="Phần trăm: " style="width: 150px;">
		<input type="submit" name="add" value="Thêm">
		<input type="submit" name="del" value="Xóa">

	</form>
	<div style="margin: auto; width: 1000px; padding: 15px;">
		<?php

			if (isset($_COOKIE['country'])) {
				$cookie = $_COOKIE['country'];
				$cookie = stripslashes($cookie);
				$countries = json_decode($cookie, true);

			}else{
				$countries = [];
			}

			$r = "";
			if(isset($_GET['add'])){
				
				if(isset($_GET['country']) && isset($_GET['percen'])){
					if ($_GET['country'] != "") {
		
						$countries[$_GET['country']] = $_GET['percen'];
						$json = json_encode($countries);
						setcookie('country', $json);
					}
					foreach ($countries as $key => $value) {
						$r .= $key .": ". $value ."%" ."</br>";
					}
				}
				echo $r;
			}
			if(isset($_GET['del'])){
				unset($countries[$_GET['country']]);
					$json = json_encode($countries);
					setcookie('country', $json);

				if ($_GET['country'] == "") {
					array_splice($countries, 0, 1);
					$json = json_encode($countries);
					setcookie('country', $json);
				}

				foreach ($countries as $key => $value) {
					$r .= $key .": ". $value ."%" ."</br>";
				}
				echo $r;
			}

		?>
	</div>
	<form>
			<input type="submit" name="paint" value="Vẽ">
	</form>
	<div style="margin: auto; width: 1000px; padding: 15px;">
		<table style="margin: auto;">
			<?php
				if (isset($_GET['paint'])) {
				
					foreach ($countries as $key => $value) {
						echo createR($key, $value);
					}
				}

				function createDiv($percen){
					return "<div class='p' style='width:" ."$percen" ."px'></div>";
				}
				function createTdp($st){
					return "<td class='p'>" .createDiv($st). "</td>";
				}
				function createTdc($st){
					return "<td class='c'>" .$st. "</td>";
				}
				function createR($x1, $x2){
					return "<tr>" .createTdc($x1) .createTdp(2 * $x2) ."<td>" .$x2 .'%' ."</td>" ."</tr>";
				}
			?>
		</table>
	</div>
</body>
<style type="text/css">
	div.p{
		background-color: #f00;
		height: 100%;
	}
	td.p{
		height: 20px;
		width: 220px;
		border: 1px solid #bbb;
	}
	td.c{
		height: 20px;
		width: 100px;
		border: 1px solid #bbb;
	}
	td{
		margin-top: 5px;
	}
</style>
</html>