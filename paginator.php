<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>paginator</title>
</head>
<body>
	<?php
		$pages = 0;
		$curpage = 0;
		$endpage = 0;

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$_SESSION['a'] = $_POST['numa'];
			$_SESSION['b'] = $_POST['numb'];
			$_SESSION['c'] = $_POST['numc'];
			
		}

		function totalPages(){ //tinh tong so trang
			global $pages;

			if ($_SESSION['b'] <= 0 || $_SESSION['c'] <= 0) {
				$pages = 1;
				return;
			}


			$count = 0;
			for ($i = $_SESSION['b']; $i <= $_SESSION['a']; $i++) { 
				if ($i % $_SESSION['b'] == 0) {
					$count ++;
				}
			}
			
			$pages = ceil($count / $_SESSION['c']);
			if ($pages == 0) {
				$pages = 1;
			}
		}
		if (isset($_SESSION['b'])) {
			totalPages(); //tinh tong so trang
		}


		//lay trang hien tai
		if(isset($_GET['page'])){
			$curpage = $_GET['page'];
		}else{
			$curpage = 1;
		}
		if ($curpage < 1) {
			$curpage = 1;
		}
		if ($curpage > $pages) {
			$curpage = $pages;
		}
	?>
	<div style="text-align: center;width: 1000px; margin: auto;">
		<form style="margin: auto; border: 1px dotted #bbb; padding: 20px;" method="post">
			<input type="number" name="numa" placeholder="Nhập a" value="<?php echo isset($_SESSION['a']) ? $_SESSION['a']:""; ?>">
			<input type="number" name="numb" min="1" placeholder="Nhập b" value="<?php echo isset($_SESSION['b']) ? $_SESSION['b']:""; ?>">
			<input type="number" name="numc" min="0" placeholder="Nhập c" value="<?php echo isset($_SESSION['c']) ? $_SESSION['c']:""; ?>">
			<input type="submit" name="show" value="Hiển thị">
		</form>
		<div style="width: 1000px; margin: auto; border: 1px dotted #eee; min-height: 50px;">
			<?php

			if (isset($_SESSION['c'])){
				for ($i=0; $i < $_SESSION['c']; $i++) { 
					$out = ($curpage - 1) * $_SESSION['c'] * $_SESSION['b'] + $_SESSION['b'] * $i;
					if ($out > $_SESSION['a']) {
						break;
					}
					echo $out;
					echo " &nbsp";
				}
			}
			?>
		</div>
		<div id="list" style="margin: auto; margin-top: 10px;">
			<?php
				echo '<a href="'.$_SERVER['PHP_SELF'].'?page='."0".'">'."Đầu".'</a>';
				echo '<a href="'.$_SERVER['PHP_SELF'].'?page='.($curpage - 1).'">'."Trước".'</a>';
			
				
				for ($i=1; $i < $pages + 1; $i++) { 
					echo '<a href="'.$_SERVER['PHP_SELF'].'?page='.$i.'">'."$i".'</a>';
				}
				echo '<a href="'.$_SERVER['PHP_SELF'].'?page='.($curpage + 1).'">'."Sau".'</a>';
				echo '<a href="'.$_SERVER['PHP_SELF'].'?page='.($pages).'">'."Cuối".'</a>';
			?>
		</div>
	</div>
</body>
	<style type="text/css">
		a{	
			padding: 1px;
			text-decoration: none;
		}
		div#list a:link {
		    color: #000;
		}
		div#list a:hover{
			font-weight: bold;
		}
		div#list a:visited {
		    color: blue;
		}
		div#list a:active{
			font-weight: bold;
			color: hotpink;
		}
	</style>
</html>