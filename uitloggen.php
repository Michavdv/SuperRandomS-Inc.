<!DOCTYPE html>
<html>
<button id="knop" name="uitloggen" type = "submit"></button>

<?php

$uitloggen = $_POST['uitloggen'];

if (isset($_POST["uitloggen"])) {
	include "Oefen.html"
} 

session_destroy();

?>

</html>
