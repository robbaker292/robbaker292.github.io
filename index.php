<?php

function findFlag($nat) {
	$nat = strtoupper($nat);
	if ($nat == "EN") {
		$nat = "eng";
	}

	return "http://bakerbirdbox.co.uk:8008/music/V2/images/flag/".$nat.".png";

}

?>
<!DOCTYPE html>
<head>
	<title>FM 2012</title>
	<meta charset="UTF-8">
	<style type="text/css">

		body {

			font-family: sans-serif;
			
		}

		table, .info {
			text-align: center;
			font-size: 0.7em;
		}

		td {
			padding-top: 0.3em;
			padding-bottom: 0.3em;
			text-align: center;
			vertical-align: middle;
		}	

		#matches {
			float: left;
		}		

		#players {
			float: right;
			width: 25%;
			font-size: 1.2em;
		}

		.player {
			/*
			margin-left: 0.7em;
			margin-right: 0.7em;

*/
			vertical-align: middle;
			font-weight: bold;
			

			margin: auto;
			border-radius: 50%;
			width: 2.5em;
			height: 2.2em;
			background-color: blue;
			color: white; 
			/* width and height can be anything, as long as they're equal */



		}

		.playerTitle {
			width: 2.5em;
		
		}

		.gk {
			background-color: green;
		}

		.sub {
			background-color: black;
		}

		.playerNum {
			font-weight: bold;
		}

		.unselected {
			opacity: 0.5;
		}

		.highlighted {
			background-color: #AAAAAA !important;
		}

		#players > table {
			
		}

		#players tr:nth-child(even) {background-color: #DDDDDD}
		#players tr:nth-child(odd) {background-color: #EEEEEE}

	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

	<script type="text/javascript">

	var clicked = false;

	function showPlayer(number, hover) {

		if (!(hover && clicked)) {

			if (!hover) {
				clicked = true;
			}

			//console.log($("#players tr"));
			$(".player").addClass("unselected");
			$(".p" + number).removeClass("unselected");
			$("#players tr").removeClass("highlighted");
			$("#players .p"+number).addClass("highlighted");
		}
	}

	function reset() {
		clicked=false;
		$(".player").removeClass("unselected");
		$("#players tr").removeClass("highlighted");
	}


	</script>

</head>
<body>
<?php

require("db_connect.php");

?>

<div id="matches">
<table>
<tr><th>Opposition</th><th>&nbsp;</th><th>Competition</th><th>Score</th>
	<th class="playerTitle">GK</th><th class="playerTitle">D L</th><th class="playerTitle">D R</th><th class="playerTitle">D C</th><th class="playerTitle">D C</th><th class="playerTitle">DM</th><th class="playerTitle">M C</th><th class="playerTitle">AM L</th><th class="playerTitle">AM R</th><th class="playerTitle">AM C</th><th class="playerTitle">ST</th>
	<th class="playerTitle">S1</th><th class="playerTitle">S2</th><th class="playerTitle">S3</th><th class="playerTitle">S4</th><th class="playerTitle">S5</th><th class="playerTitle">S6</th><th class="playerTitle">S7</th>
<?php

foreach($db->query('SELECT * from game') as $row) {
	echo "<tr>";
	echo "<td>". $row['opposition'] ."</td>";
	echo "<td>". $row['venue'] ."</td>";
	echo "<td>". $row['competition'] ."</td>";
	echo "<td>". $row['score'] ."</td>";
	echo "<td class=\"player gk p". $row['gk']. " p". $row['gk']. "\" onclick=\"showPlayer(" . $row['gk'] . ")\" onmouseover=\"showPlayer(" . $row['gk'] . ",true)\">". $row['gk'] ."</td>";
	echo "<td class=\"player p". $row['dl']. "\" onclick=\"showPlayer(" . $row['dl'] . ",false)\" onmouseover=\"showPlayer(" . $row['dl'] . ",true)\" >". $row['dl'] ."</td>";
	echo "<td class=\"player p". $row['dr']. "\" onclick=\"showPlayer(" . $row['dr'] . ",false)\" onmouseover=\"showPlayer(" . $row['dr'] . ",true)\" >". $row['dr'] ."</td>";
	echo "<td class=\"player p". $row['dc1']. "\" onclick=\"showPlayer(" . $row['dc1'] . ",false)\" onmouseover=\"showPlayer(" . $row['dc1'] . ",true)\" >". $row['dc1'] ."</td>";
	echo "<td class=\"player p". $row['dc2']. "\" onclick=\"showPlayer(" . $row['dc2'] . ",false)\" onmouseover=\"showPlayer(" . $row['dc2'] . ",true)\" >". $row['dc2'] ."</td>";
	echo "<td class=\"player p". $row['dm']. "\" onclick=\"showPlayer(" . $row['dm'] . ",false)\" onmouseover=\"showPlayer(" . $row['dm'] . ",true)\" >". $row['dm'] ."</td>";
	echo "<td class=\"player p". $row['mc']. "\" onclick=\"showPlayer(" . $row['mc'] . ",false)\" onmouseover=\"showPlayer(" . $row['mc'] . ",true)\" >". $row['mc'] ."</td>";
	echo "<td class=\"player p". $row['aml']. "\" onclick=\"showPlayer(" . $row['aml'] . ",false)\" onmouseover=\"showPlayer(" . $row['aml'] . ",true)\" >". $row['aml'] ."</td>";
	echo "<td class=\"player p". $row['amr']. "\" onclick=\"showPlayer(" . $row['amr'] . ",false)\" onmouseover=\"showPlayer(" . $row['amr'] . ",true)\" >". $row['amr'] ."</td>";
	echo "<td class=\"player p". $row['amc']. "\" onclick=\"showPlayer(" . $row['amc'] . ",false)\" onmouseover=\"showPlayer(" . $row['amc'] . ",true)\" >". $row['amc'] ."</td>";
	echo "<td class=\"player p". $row['st']. "\" onclick=\"showPlayer(" . $row['st'] . ",false)\" onmouseover=\"showPlayer(" . $row['st'] . ",true)\" >". $row['st'] ."</td>";
	echo "<td class=\"player sub p". $row['sub1']. "\" onclick=\"showPlayer(" . $row['sub1'] . ",false)\" onmouseover=\"showPlayer(" . $row['sub1'] . ",true)\" >". $row['sub1'] ."</td>";
	echo "<td class=\"player sub p". $row['sub2']. "\" onclick=\"showPlayer(" . $row['sub2'] . ",false)\" onmouseover=\"showPlayer(" . $row['sub2'] . ",true)\" >". $row['sub2'] ."</td>";
	echo "<td class=\"player sub p". $row['sub3']. "\" onclick=\"showPlayer(" . $row['sub3'] . ",false)\" onmouseover=\"showPlayer(" . $row['sub3'] . ",true)\" >". $row['sub3'] ."</td>";
	echo "<td class=\"player sub p". $row['sub4']. "\" onclick=\"showPlayer(" . $row['sub4'] . ",false)\" onmouseover=\"showPlayer(" . $row['sub4'] . ",true)\" >". $row['sub4'] ."</td>";
	echo "<td class=\"player sub p". $row['sub5']. "\" onclick=\"showPlayer(" . $row['sub5'] . ",false)\" onmouseover=\"showPlayer(" . $row['sub5'] . ",true)\" >". $row['sub5'] ."</td>";
	echo "<td class=\"player sub p". $row['sub6']. "\" onclick=\"showPlayer(" . $row['sub6'] . ",false)\" onmouseover=\"showPlayer(" . $row['sub6'] . ",true)\" >". $row['sub6'] ."</td>";
	echo "<td class=\"player sub p". $row['sub7']. "\" onclick=\"showPlayer(" . $row['sub7'] . ",false)\" onmouseover=\"showPlayer(" . $row['sub7'] . ",true)\" >". $row['sub7'] ."</td>";
	echo "</tr>";
}
?>
</table>
</div>
<div id="players">
	<div class="info">
		To see players easier, hover over their details below, or their number in the match lineups.<br>
		Clicking on a player will stop players highlighting when hovering.<br>
		Then, either click another player or Reset.<br>
	</div>
<span onclick="reset()">Reset</span>
<table>
<?php

foreach ($db->query('SELECT * from player') as $row) {
	
	echo "<tr onclick=\"showPlayer(" . $row['number'] . ",false)\" onmouseover=\"showPlayer(" . $row['number'] . ",true)\" class=\"playerNum p". $row['number']. "\">";	

	echo "<td>" . $row['number']. "</td>";
	echo "<td>" . $row['first_name'] . " " . $row['last_name']. "</td>";
	echo "<td><img src=\"". findFlag($row['nat']). "\" alt=\"flag\"></td>";
	echo "<td>" . $row['position']. "</td>";
	echo "</tr>";
}
?>
</table>


</div>
</body>
</html>
