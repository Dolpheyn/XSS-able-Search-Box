<?php
$languages = array(
	"java"=>"James Gosling",
	"c++"=>"Bjarne Stroustrup",
	"c#"=>"Microsoft",
	"php" => "Rasmus Lerdorf",
	"javascript" => "Brendan Eich");

$query = $_GET['search'];

if(array_key_exists(strtolower($query), $languages)){
	$o = $query . " is designed by " . $languages[$query];
}
else{
	$o = $query . " not found.";
}?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>XSS-able Search Box</title>
	<link rel="stylesheet" href="styles.css">
	<script>
	function search(){
		var query = document.getElementById('search').value;
		var url = "http://localhost:8080/search.php?search=";
		//console.log(url + query);
		var xhr = new XMLHttpRequest();
		xhr.onreadystatechange = function() {
           		 if (this.readyState == 4 && this.status == 200) {
                		document.getElementById('output').innerHTML = this.responseText;
			 	console.log(this.responseText);   
			 }
		};
		xhr.open("GET", url+query, true);
		xhr.send();
	}
	</script>
</head>
<body>
<div class="topnav">
  <a>Home</a>
  <a>About</a>
  <a>Contact</a>
  <div class="login-container">
    <form action="#">
      <input type="text" placeholder="Username" name="username" id="username">
      <input type="password" placeholder="Password" name="psw" id="password">
      <button type="submit">Login</button>
    </form>
  </div>
</div>

<div class="wrap">
	<form action="http://localhost:8080" method="GET">
	   <div class="search">

		<input name = "search" type="text" id="search" class="searchTerm" placeholder="Find a programming language">
		<button type="submit" class="searchButton">Search</button>

	   </div>
	</form>
   </br> </br>
   <div id="output"><?if(isset($_GET['search']))echo $o;?></div>
</div>
</body>
</html>
