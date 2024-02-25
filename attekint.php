<?php
include 'db_kapcsolat.php';
include 'fuggv_ossz.php';
?>
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
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
				<fieldset>
					<legend>
						<h4>Válaszd ki, milyen adatokat szeretnél látni:</h4>
					</legend>					
					</br>
					Lecke száma:
					<?php
					$lecke_sorsz = 0;
					print lecke_szur(); //legördülő lista a létező leckékbők	
					?>
					<input type="submit" name="submit" id="button" value="Küld">
					</br>					
				</fieldset>
			</form>
			</br>
			<?php
			//___ADATOKAT FOGADJA_____________________________________________        
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$lecke_sorsz = test_input($_POST["lecke_sorsz"]);
			}
			if ($lecke_sorsz == 0) {
				print "<b><p>Legnagyobb számú lecke szavai: </p></b>" . utolso_lecke_kiir();
				//ha még nincs lekért lecke: az utolsó az alapértelmezett
			} else {
				print "<b><p>Kért lecke szavai: </p></b>" . lecke_kiir($lecke_sorsz);
			} //egyébként, azt íratjuk ki, amit a felhasználó kér.			
			?>
		</article>
		<aside id="right">
			<img id="flag" src="flag.jpg" />
		</aside>
	</div>
	<footer id="foot">
		<p></p>
	</footer>
</body>

</html>