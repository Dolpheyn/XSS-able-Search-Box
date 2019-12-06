<?php
$languages = array(
	"java"=>"James Gosling",
	"c++"=>"Bjarne Stroustrup",
	"c#"=>"Microsoft",
	"php" => "Rasmus Lerdorf",
	"javascript" => "Brendan Eich");

$query = $_GET['search'];

if(array_key_exists(strtolower($query), $languages)){
	//found
}
else{
	//not found
}
