<!DOCTYPE html>
<html>
<head>
	<title>Bai 7</title>
</head>
<body>

	<?php
		$listMonth = ['January', 'February', 'March', 'April', 'May', 'June', 'Junly', 'August', 'September','October', 'November','December' ];
		$thismonth = date('d')  ." ".$listMonth[date('m')];
		$thisyear = date('Y');

/*		$month = $thismonth;
		$year = $thisyear;*/

		$first_date = date('N',strtotime('first day of this month'));
		$last_date = date('d',strtotime('last day of this month'));

		$f = 1;
		$tr = "<tr>";
		for ($i = 1; $i < 8; $i ++) { 
			if ($i < $first_date) {
				$tr = $tr .mktd("..");
			}else{

				$tr = $tr .mktd("$f");
				$f ++;
			}
		}
		$tr = $tr ."</tr>";
		while (1) {
			$tr = $tr ."<tr>";
			for ($i=1; $i < 8; $i++) { 
				$tr = $tr .mktd("$f");
				$f ++;

				if ($f > $last_date) {
					break;
				}
			}

			$tr = $tr ."</tr>";
			if ($f > $last_date) {
					break;
				}
		}
		//echo $tr;
		function mktd($str){
			if (date('d') == $str) {
				return "<td id='day'>" .$str. "</td>";
			}else{
				return "<td>" .$str. "</td>";
			}
			
		}
	 ?>
	<div style="width: 1000px; min-height: 600px; text-align: center; margin: auto; padding-top: 30px; border: 1px dotted #000">
		<table style="margin: auto; border: 2px solid #aaa; border-bottom: none;">
			<tr>
				<th id="th1" colspan="7"><?php echo $thismonth; ?></th>
			</tr>
			<tr>
				<td colspan="3">
				<button id="bt1" type="submit"><<</button>
				<button id="bt2" type="submit">[]</button>
				<button id="bt3" type="submit">>></button></td>
				<th id="th2" colspan="4"><?php echo $thisyear; ?></th>

			</tr>
			<tr>
				<td class="r1">M</td>
				<td class="r1">Tu</td>
				<td class="r1">W</td>
				<td class="r1">Th</td>
				<td class="r1">F</td>
				<td class="r1">Sa</td>
				<td class="r1">Su</td>
			</tr>
		</table>

		<table id="tb2">
			<?php echo $tr; ?>

		</table>
	</div>
</body>
	<style type="text/css">
		th#th1{
			font-family: Courier;
			height: 50px;
			font-size: 45px;
			text-align: left;
		}
		th#th2{
			height: 45px;
			font-size: 34px;
			text-align: right;
			padding-right: 10px;
		}
		td.r1{
			background-color: #777;
			color: #fff;
			font-weight: bold;
		}
		td#day{
			background-color: #bbb;
			color: #f00;
			font-weight: bold;
		}
		td{
			height: 40px;
			width: 40px;
		}
		td button{
			background-color: #eee;
			border: 1px solid #aaa;
			height: 30px;
			width: 30px;
			color: #bbb;
		}
		table#tb2{
			border: 2px solid #aaa;
			border-top: none;
			margin: auto;
		}
	</style>
</html>