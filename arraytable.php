<?php
	$color= array("red","yellow","blue");
	echo"<table border=1>";
	echo"<tr>";
	echo"<th>id</th>";
	echo"<th>Color</th>";
	echo"</tr>";
	for($i=0;$i<sizeof($color);$i++){
		echo"<tr>";
		echo"<td>$i</td>";
		echo"<td>$color[$i]</td>";
		echo "<tr>";
	}
	echo"</table>";