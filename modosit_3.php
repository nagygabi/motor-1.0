
<!DOCTYPE html>
<html lang="hu">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="author" content="Valami.hu">
	<link rel="stylesheet" href="dinamic_sample.css" type="text/css">
	<script type="text/javascript" src="jquery-2.1.0.min.js"></script>
	<script type="text/javascript" src="kikerdez.js"></script>
</head>

<body>
	<header id="top">
		<h1>Kikérdező</h1>
	</header>
	<div id="body_content">
		<section id="left">
			<div class="gray_bg">
				<ul>
					<li><a href="attekint.php" title="Adatok áttekintése és módosítása">Adatok áttekintése</br></br></a></li>
					<li><a href="kikerdez_a_1.php" title="Hányadik leckéből kérdezze a szavakat">Kérdés angolul, válasz magyar</br></br></a></li>
					<li><a href="kikerdez_a_2.php" title="Angol szavakat kérdez"></a></li>
					<li><a href="kikerdez_m_1.php" title="Hányadik leckéből kérdezze a szavakat">Kérdés magyarul, válasz angol</br></br></a></li>
					<li><a href="kikerdez_m_2.php" title="Magyar szavakat kérdez"></a></li>
					<li><a href="feltolt_1.php" title="Lecke számának megadása">Űrlapból tölt fel</br></br></a></li>
					<li><a href="feltolt_2.php" title="Szavak megadása"></a></li>
					<li><a href="nullaz_1.php" title="A lecke szavait újra kérdezi">Újra kérdez minden szót.</br></br></a></li>
					<li><a href="hangfajl_1.php" title="Hangfájlt tölt mappába">Hangfájlt tölt mappába</br></br></a></li>
					<li><a href="nyomtat_1.php" title="Nyomtatható formátum.">Nyomtatható formátum</br></br></a></li>
					<li><a href="torol_1.php" title="Rekordot töröl">Rekordot töröl</br></br></a></li>
					<li><a href="modosit_1.php" title="Rekordot modosit">Rekordot módosít</br></br></a></li> 
				</ul>
			</div>
		</section>
		<article id="center">
<?php
include_once("db_kapcsolat.php");
include_once("fuggv_ossz.php");
//adatot fogad, kiir
$Id = ($_POST["Id"]);
$angol = ($_POST["angol"]);
$magyar = ($_POST["magyar"]);
$szofaj = ($_POST["szofaj"]);
print 'Ezek a szavak íródtak be:<br>';
print $Id. '<br>';
print $angol ;
print $magyar . '<br>';
print $szofaj . '<br>';
//módosít


felulir($Id, $angol, $magyar, $szofaj);
?>
<footer id="foot">
			<p>valami</p>
		</footer>
</body>

</html>
