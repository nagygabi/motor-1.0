<?php
include_once("db_kapcsolat.php");
$angol = $_POST['angol'];
$valasz_magyar = $_POST['valasz_magyar'];
$magyar = $_POST['magyar'];
$lecke_sorsz = $_POST['lecke_sorsz'];
$id = $_POST['id'];
if ($valasz_magyar == $magyar || $valasz_magyar == "m") { //ha jó a válasz
	print "<p class=\"ok\">OK!</p>";
	$UpdateStr = "UPDATE angol SET jo_valasz_szam = 1  WHERE ID=$id";
	if (!mysqli_query($MySqliLink, $UpdateStr)) {
		die("MySqli hiba (" . mysqli_errno($MySqliLink) . "): " . mysqli_error($MySqliLink));
	} //kiírja: OK!, jó_válasz_számot 1-esre állítja	
} else {
	print "<p class=\"valasz\">A jó válasz: " . $magyar . "</p></br></br>";
} //egyébként kiírja mi lett volna jó
include_once("kikerdez_a_2.php");
