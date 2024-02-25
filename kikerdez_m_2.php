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
				    <li><a href="attekint.php" title="Adatok áttekintése">Adatok áttekintése</br></br></a></li>
					<li><a href="attekint_ossz.php" title="Összes adat áttekintése">Összes adat áttekintése</br></br></a></li>
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
		<article>
			<?php
			include 'db_kapcsolat.php';
			include 'fuggv_ossz.php';
			// VÁLTOZÓT FOGAD_________________________________________ 
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$lecke_sorsz = test_input($_POST["lecke_sorsz"]);
			}
			$sql = random_kerdes($lecke_sorsz);
			$magyar = $MySqliLink->query($sql);
			$sor = $magyar->fetch_array(MYSQLI_ASSOC);
			$m_valasz = $sor["magyar"];
			$angol = $MySqliLink->query($sql);
			if ($angol->num_rows == 0) {
				$a_valasz = "Nincs a keresésnek megfelelő szó.(Vagy elfogyott, amit nem tudtál)";
			} else {
				$sor = $angol->fetch_array(MYSQLI_ASSOC);
				$a_valasz = $sor["angol"];
			}
			$id = $MySqliLink->query($sql);
			$sor = $id->fetch_array(MYSQLI_ASSOC);
			$id_valasz = $sor["Id"];
			?>
			<form action="kikerdez_m_3.php" method="post" autocomplete="off">
				<fieldset>
					<legend>Új lecke/szófaj választása(kérdés: magyar)</legend>
					Választott lecke sorszáma: <input type="text" name="lecke_sorsz" value="<?php print $lecke_sorsz; ?>" size="4">
					</br>
					Kérdés (magyar): <input type="text" name="magyar" value="<?php print $m_valasz; ?>" size="70">
					</br>
					Ide írd a választ (angol), vagy egy <b>a</b> betűt, ha tudod: <input type="text" name="valasz_angol" id="focus" maxlength="200" size="70">
					</br>
					<div class="rejtett"><!--REJTETT------------------------------------------------------------>
						Jó válasz angolul: <input type="text" name="angol" value="<?php print $a_valasz; ?>" size="70">
						</br></br>
						Id: <input type="text" name="id" value="<?php print $id_valasz; ?>" size="70">
						</br></br>
					</div><!--EDDIG---REJTETT------------------------------------------------------------>
				</fieldset></br></br>
				<input type="submit" name="submit" id="button" value="Küld">
				</br></br>
			</form></br></br>
		</article>
		<aside id="right">
			<img id="flag" src="flag.jpg" />
		</aside>
	</div>
	<footer id="foot">
		<p>valami</p>
	</footer>
</body>

</html>