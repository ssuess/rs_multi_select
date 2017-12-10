<?php

include "../../../include/db.php";
include "../../../include/authenticate.php"; if (!checkperm("c")) {exit ("Permission denied.");}
// include "../../..//include/general.php";
include "../../../include/resource_functions.php";
include "../../../include/collections_functions.php";


$resources = $_GET["resources"]; // [value1, value2, value3]
// echo is_array($foo); // true

// function create_and_edit_collection($userref,$resources) {
// global $userref;

# Create new collection
		$name = "tempcollection";
		$new=create_collection ($userref,$name);
		set_user_collection($userref,$new);
		
		foreach ($resources as $resource) {
		// Add each of our resources to a new collection
		sql_query("insert into collection_resource(resource,collection) values ('$resource','$new')");
		}
redirect($baseurl_short."pages/edit.php?tempcoll=true&collection=" . $new);
// }

?>