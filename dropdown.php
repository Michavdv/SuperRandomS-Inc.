<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	
		
	<div class="dropdown">
	<li><a onclick="myFunction()" id="tabs" class="dropbtn"><?php echo $welkom ?></a>
  	<div id="myDropdown" class="dropdown-content">
    	<a href="Oefen.html" style="color: black;">Uitloggen</a>
    	
  	</div>
  	</li>
	</div>
  <script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>

</body>
</html>