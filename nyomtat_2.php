<!DOCTYPE html>
<html lang="hu">

<head>
	<meta charset="UTF-8">
	<title>itt_nyomtat</title>
	<style type="text/css">
		table {
			width: 100%;
			border-collapse: separate;
			border-radius: 2px;
			margin: 0 auto;
		}

		td {
			border: 1px solid #282822;
			border-radius: 2px;
			padding: 2px;
			text-align: center;
		}

		#grey {
			background-color: grey;
			color: white;
		}
	</style>
</head>

<body>
	<?php
	include_once 'db_kapcsolat.php';
	include_once 'fuggv_ossz.php';
	$lecke_sorsz = test_input($_POST["lecke_sorsz"]);
	$sql = "
			SELECT *
			from angol
			WHERE lecke=$lecke_sorsz;
			";
	$kiir = "";
	$angol = $MySqliLink->query($sql);
	if ($angol->num_rows == 0) {
		$kiir .= "Nincs ilyen adat";
	} else {
		$kiir .= "<table>";
		$kiir .= "<tr id=\"grey\">
				<td>ID</td>
				<td>Magyar</td>
				<td>Angol</td>
				</tr>";
		while ($sor = $angol->fetch_array(MYSQLI_ASSOC)) :
			$kiir .= "<tr>";
			$kiir .= "<td>" . $sor["Id"] . "</td> ";
			$kiir .= "<td>" . $sor["magyar"] . "</td>";
			$kiir .= "<td>" . $sor["angol"] . "</td>";
			$kiir .= "</tr>";
		endwhile;
		$kiir .=  "</table> <br/> <br/>";
	}
	print $kiir;
	?>
</body>

</html>