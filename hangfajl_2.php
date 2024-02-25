
<?php
include_once("db_kapcsolat.php");
include 'fuggv_ossz.php';

// ____________________________________________________________________________
//Hangfájokat tölt le, és tesz a mappába: UK
// ____________________________________________________________________________
function getSound_UK($word, $folder = './UK/')
{	//Ha feltöltesz, ./h után / jel
	/*	  
	  //megkeresi az oldalt, ahol a kért szó van
	  $tartalom = file_get_contents('http://dictzone.com/english-hungarian-dictionary/'.$word);
	  
	  if($tartalom==false){ die("Not found!");//ha hiba
	  }
	  else{	//ha nincs hiba 
	  preg_match('/(\/s\/en-UK.*\.mp3)/Uim', $tartalom, $matches); 
	  */
	//kiveszi a hangfájlt 
	$hangfajl = file_get_contents('https://d1qx7pbj0dvboc.cloudfront.net/' . $word . '.mp3');

	//beleteszi a tartalmat a (paraméterként) megadott mappába: $folder.$word néven
	file_put_contents($folder . $word . '.mp3', $hangfajl);

	//függvény visszatérési értéke a link	  
	return '<a href="' . $folder . $word . '.mp3' . '">HANG-LINK_UK</a>';
}
//___________________________________________________________
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$min_id = test_input($_POST["min_id"]);
	$max_id = test_input($_POST["max_id"]);
}

//KIÍRJA AZ ANGOL SZAVAKAT____________________________
function tombbe_ir($min_id, $max_id)
{
	global $MySqliLink;
	$sql = "
			SELECT angol
			from angol
            where ID<=$max_id and ID>=$min_id 			
			";
	$kiir = "";
	$angol = $MySqliLink->query($sql);
	while ($sor = $angol->fetch_array(MYSQLI_ASSOC)) :
		$kiir .= "|" . $sor["angol"];
	endwhile;
	return $kiir;
}
$angol = tombbe_ir($min_id, $max_id);
print $angol . "</br></br>";
//______________CIKLUS BEOLVAS_________________________________	
$tomb = explode("|", $angol);

print "<h3>Tömbelem száma: " . count($tomb) . "</h3></br></br>";
print_r($tomb);

for ($j = 1; $j < (count($tomb)); $j++) {
	$van_szokoz = strpos($tomb[$j], " ");
	if ($van_szokoz == false) {
		print ($tomb[$j]) . "</br>";
		print getSound_UK($tomb[$j]) . "</br>";
	}
}

?>


