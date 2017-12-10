<?php
   
function HookRs_multi_selectEditReplacemultisave() {
global $baseurl,$baseurl_short,$collection; 

		$tempcoll=sql_value("select name as value from collection where ref='$collection'",0);
		
		$save_errors=save_resource_data_multi($collection);
		
		if(!is_array($save_errors) && !hook("redirectaftermultisave"))
		{
		if (trim($tempcoll) == 'tempcollection') {
		sql_query("delete from collection_resource where collection='$collection'");
		sql_query("delete from collection where ref='$collection'");
		redirect($baseurl_short."pages/search.php?refreshcollectionframe=true");
		} else {
		redirect($baseurl_short."pages/search.php?refreshcollectionframe=true&search=!collection" . $collection);
		}		
		}      
		$show_error=true;
}


?>


