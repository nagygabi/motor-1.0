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
		<article id="center">
			<!------------------------------------------------------------------------------------>
			<?php
			include 'db_kapcsolat.php';
			include 'fuggv_ossz.php';
			$Id_valasztott = ($_POST["Id"]);
			?>
			<form method="post" action="modosit_3.php">
				<!-- Formba irjuk az adatbázisból Id szerint kiválasztott angol és magyar szót, mint értéket-->
				<fieldset>
					<legend>
						<h4>Angol és magyar szavak módositása az adatbázisban </h4>
					</legend>
					Id: <input type="text" name="Id" value="<?php print $Id_valasztott; ?>" size=4>
					</br></br>
					Angol: <input type="text" name="angol" id="focus" value="<?php Id_szerint_angol($Id_valasztott); ?>" size=70>
					<br><br>
					Magyar: <input type="text" name="magyar" value="<?php Id_szerint_magyar($Id_valasztott); ?>" size=70>
					<br><br>
					Szófaj:
					<select name="szofaj">
						<option value="1">főnév</option>
						<option value="2">ige</option>
						<option value="3">melléknév</option>
						<option value="4">határozószó</option>
						<option value="5">egyéb</option>
					</select>
					<br><br>
				</fieldset>
				</br></br>
				<input type="submit" name="submit" id="button" value="Küld">
				<br><br>
			</form>
		</article>
		<!------------------------------------------------------------------------------------>
		<footer id="foot">
			<p>valami</p>
		</footer>
</body>

</html>