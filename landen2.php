<form action="landen2.php" method="post" style="margin: 15px; font-family: verdana">
	
Zoek op dit land: <input type="text" name="land"><input type="submit"
name="actie" value="zoek op">
	
</form>
<br><br>
<div style="margin: 15px; font-family: verdana; border: 2px solid gray; padding: 10px; width: 600px;">

<?php

if (isset($_POST['actie'])) {

		$land = $_POST['land'];

		include "db_inc.php"; # inlezen van de database gegevens

		// Stap 1 en 2:  connectie maken met mysql server en de juiste database
		// .. de gegevens (bijvoorbeeld $db_server) zijn gedefinieerd in de file db_inc.php.
		// .. op die manier hoef je die gegevens maar in 1 bestand te noteren.

		$mysql = mysqli_connect($db_server,$db_user, $db_password, $db_name) or die ("Contact met database niet mogelijk.") ;

		// Stap 3: query opbouwen
		$query = "SELECT * FROM bbc WHERE name = '$land'";
		
		// Stap 4: query uitvoeren
		$resultaat = mysqli_query($mysql,$query) ;


		// Stap 5: resultaat verwerken
		// mysql_fetch_assoc haalt rij voor rij uit $resultaat met veldnamen
		while ($rij = mysqli_fetch_assoc($resultaat)) {

			// in $rij zit alle informatie van een land. Hieronder wordt die uitgeprint
			// onder gebruik making van de veldnamen (dat mag ivm mysqli_fetch_assoc)
				
				if ($rij['name']=="The Netherlands") {
					echo "<h1 style='color: red'>$rij[name] :</h1>";
				} else {
					echo "<h2>$rij[name] :</h2>";	
				}
				
				echo "<p style=\"text-indent: 10px\">regio: $rij[region]</p>";
				echo "<p style=\"text-indent: 10px\">oppervlakte: $rij[area] km<sup>2</sup></p>";
				echo "<p style=\"text-indent: 10px\">bevolking: $rij[population]</p>";
				echo "<p style=\"text-indent: 10px\">bbp: $ $rij[gdp]</p>";
			
			
		}

		// Stap 6: verbinding verbreken
		mysqli_close($mysql);

}

?>

</div>