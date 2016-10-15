<!DOCTYPE html>
<html>
<head>
	<title>String</title>
</head>
<body>
		<?php
			$txt = "";
			$str = "";
			$chars = [];

			if($_SERVER["REQUEST_METHOD"] == "POST"){
				$txt = $_POST['txt'];
				$str = $_POST['str'];
				$chars = explode(" ", $txt);
			}

			function total(){
				global $txt, $str;
				$chars = str_split($txt);
				$count=0;

				foreach($chars as &$x)
				{
				    if($x===$str){
				  		$count++;
				    }
				}
				return $count;
			}

			 
			function findIndex(){
				global $txt, $str, $chars;

				$index = [];
				$j = 0;
				$length = count($chars);
				for ($i=0; $i < $length; $i++) { 
					$value = str_split($chars[$i]);
					foreach ($value as $key => $x) {
						if ($x === $str) {
							$index[$j++] = $i;
						}
					}
				}
				return $index;
			}

			function findChar(){
				global $chars;
				$arr = findIndex();
				$l = count($arr);
				for ($i=0; $i < $l; $i++) {
					for ($j=0; $j <= $i; $j++) { 
						if ($chars[$arr[$i]] === $chars[$arr[$j]] && $j < $i) {
							break;
						}
						if($i == $j){
							echo ($chars[$arr[$i]]);
							echo " &nbsp";
						}
					}

				}
			}

			function printtxt(){
				global $chars;
				$b = $chars;
				$arr = findIndex();
				$l = count($arr);
				for ($i=0; $i < $l; $i++) {
					$b[$arr[$i]] ="<b>" .$b[$arr[$i]] ."</b>";
				}
				echo implode(" ", $b);
			}

			function printAchar(){
				global $chars, $str;
				$b = $chars;
				$arr = findIndex();
				$l = count($arr);

				for ($i=0; $i < $l; $i++) {

					$c =str_split($b[$arr[$i]]);
					$len = count($c);
					for ($j=0; $j < $len; $j++) { 
						if ($c[$j] === $str) {
							$c[$j] = "<b>" .$c[$j] ."</b>";
						}
					}
					$b[$arr[$i]] = implode("", $c);
				}
				echo implode(" ", $b);
			}
		?>
	<div style="text-align: center; margin: auto; width: 1000px; border: 1px dotted #444; min-height: 400px;">
		<form method="post">
			 <textarea name="txt" style="max-height:300px; min-height: 300px; width: 100%;"><?php echo isset($_POST['txt']) ? $_POST['txt'] : "Nhập văn bản tại đây !" ?></textarea>
			 <br>
			 <label style="background-color: #eee;">Kí tự a :</label>
			 <input type="text" name="str" value="<?php echo isset($_POST['str']) ? $_POST['str'] : "" ?>">
			 <input type="submit" name="seach" value="Phân tích">
		</form>

		<div id="d1" style="margin: auto; width: auto; border: 1px dotted #444; min-height: 400px; text-align: left; padding: 10px;">
			<h3>Sỗ lần xuất hiện của a : </h3>
			<?php echo total(); ?>
			<br>
			<h3>Danh sách các từ chứa ký tự a : </h3>
			<?php findChar() ?>
			<br>
			<h3>Đoạn văn bản b với các ký tự a được bôi đậm : </h3>
			<?php printAchar(); ?>
			<br>
			<h3>Đoạn văn bản b với các từ có ký tự a được bôi đậm : </h3>
			<?php printtxt(); ?>
			<br>
		</div>
	</div>
</body>
<style type="text/css">
	*{
		font-family: arial;
	}
	h3{
		color: #444;
	}
	b{
		color: #f00;
	}
	div#d1 p{
		display: inline;
	}
</style>
</html>