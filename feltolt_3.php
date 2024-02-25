<?php
include_once("db_kapcsolat.php");
include_once("fuggv_ossz.php");

$angol = test_input($_POST["angol"]);
$magyar = test_input($_POST["magyar"]);
$lecke = test_input($_POST['lecke']);
$szofaj = test_input($_POST['szofaj']);

//__ELLENŐRZÉS________________________________
echo $lecke;
echo "<br>";
echo $angol;
echo "<br>";
echo $magyar;
echo "<br>";
echo $szofaj;
echo "<br>";

feltolt($lecke, $angol, $magyar, $szofaj);
include_once("feltolt_2.php");
