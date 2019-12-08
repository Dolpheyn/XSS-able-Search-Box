<?php
$languages = array(
	"java"=>"James Gosling",
	"c++"=>"Bjarne Stroustrup",
	"c#"=>"Microsoft",
	"php" => "Rasmus Lerdorf",
	"javascript" => "Brendan Eich");

$query = $_POST['search'];

if(array_key_exists(strtolower($query), $languages)){
	echo $query . " is designed by " . $languages[$query];
}
else{
	echo $query . " not found.";
}
