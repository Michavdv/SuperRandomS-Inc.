<?php
					
	session_start();
	 include "db_inc.php";
	 
	 $mysql = mysqli_connect($db_server,$db_user,$db_password);
	 $database = mysqli_select_db($mysql,$db_name);
 
	 //inloggen
	 if (isset($_POST["inloggen"])) {
	  $username = $_POST['username'];
	  $password = $_POST['password'];
	  
	  $query = "SELECT * FROM `personen` WHERE username = '$username' AND password = '$password'";
	  $result = mysqli_query($mysql,$query);
	  if(mysqli_num_rows($result) == 1) {
	   include "Doorstuursite.html";
	   die;
	  } 
	  else {
	   echo "<script>
	     alert(\"Gebruikersnaam en/of wachtwoord zijn incorrect. Klik op OK om opnieuw te proberen.\");
	     window.history.go(-1);
	      </script>";
	   die;
	  }
	 }	


	 //registreren
	 if (isset($_POST["registreren"])) {
	  $voornaam = $_POST['voornaam'];
	  $achternaam = $_POST['achternaam'];
	  $gender = $_POST['Geslacht'];
	  $username = $_POST['username'];
	  $email = $_POST['email'];
	  $password = $_POST['password'];
	  //$date = $_POST['date'];
	  
	  
	  $query = "SELECT username FROM `personen` WHERE username = '$username'";
	  $result = mysqli_query($mysql,$query);
	  if(mysqli_num_rows($result) == 1) {

	   echo "<script>
	     alert(\"JAMMER PIK DEZE GEGEVENS ZIJN AL IN GEBRUIK\");
	     window.history.go(-1);
	      </script>";
	   die;

	   } else {
	   	  $query = "INSERT INTO `personen` (`voornaam`, `achternaam`, `gender`, `username`, `email`, `password`) values('$voornaam', '$achternaam', '$gender', '$username', '$email', '$password')";
	  	  $result = mysqli_query($mysql,$query);
	  	  
		   echo "<script>
		     alert(\"De gegevens zijn succesvol geregistreerd!\");
		      </script>";
		    include "inlog.html";
	  } 
	  
	  }
	 				
?>
