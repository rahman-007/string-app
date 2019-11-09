<?php

require 'vendor/autoload.php';

$mongo_connection = new MongoDB\Client('mongodb://db:27017');

if(isset($_POST['submit'])){

    $string_db = $mongo_connection->string_db;
    $string_collection = $string_db->string_collection;
    
    $current_datetime = date('d m Y @ H:i:s', time()); 
	
    $document = array(
	'first_name' => $_POST['name'], 
	'full_name' => $_POST['name'].' last_name', 
	'date' => $current_datetime
	);

    $insert_string = $string_collection->insertOne($document);

    if($string_collection->insertOne($insert_string)){
	echo "your full name is inserted";
    }
    else{
	echo "try again";		
    }
}
	
?>
