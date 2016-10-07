<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body style="text-align: center;">
	<div id="div1">
		<?php 
			for ($i=1; $i < 11 ; $i++) {
				if($i == 6){
					echo "<div id = 'div11' style='clear: both;'>";
				}else{
					echo "<div id = 'div11'>";
				}
				
				for ($j=1; $j < 11; $j++) { 
					echo "<p> $i x $j = " . $i*$j . "</p>";
				}
				echo "</div>";
			}
		 ?>
		 <div style="clear: both;"></div>
	</div>
</body>
<style type="text/css">
	div#div1{
		margin: auto;
		width: 1000px;
		min-height: 500px;
		border: 2px dotted #aaa;
	}
	#div1 div#div11{
		float: left;
		border: 1px solid #000;
		padding: 5px;
		width: 100px;
		margin: 5px;
		text-align: left;
	}
	#div11 p{
		margin: 5px;
	}
</style>
</html>