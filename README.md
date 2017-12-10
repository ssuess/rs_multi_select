# rs_multi_select
ResourceSpace plugin that allows mass selection and editing of resources in large thumbs view.

## Installation Part I
Download the whole diretory and rename to "rs_multi_select". Then you can install it one of two ways:

1. Upload as rsp file
	* tar.gz it and change the extenstion to ".rsp"
	* upload the rsp file from the plugin config screen in ResourceSpace admin
	* activate the plugin
2. Upload folder to the plugins directory
	* activate the plugin from the plugin config screen in ResourceSpace admin
	
## Installation Part II: VERY IMPORTANT
Because this plugin relies on a hook that is not in ResourceSpace yet, you will need to add this hook in the /pages/edit.php page. 
Find the code that looks like this:

```
$save_errors=save_resource_data_multi($collection);
if(!is_array($save_errors) && !hook("redirectaftermultisave"))
{
redirect($baseurl_short."pages/search.php?refreshcollectionframe=true&search=!collection" . $collection);
}      
$show_error=true;
}
```	
Then add the hook condition so it will all look like this when you are done:

```
if (!hook("replacemultisave")) {
$save_errors=save_resource_data_multi($collection);
if(!is_array($save_errors) && !hook("redirectaftermultisave"))
{
redirect($baseurl_short."pages/search.php?refreshcollectionframe=true&search=!collection" . $collection);
}      
$show_error=true;
} //end hook replacemultisave
}
```
	

## How it works
This plugin will allow you to select multiple items in a thumbs view, and then bulk edit those items. It will create temporary collection (creatively named 'tempcollection'), and then delete that collection after you have made your edits. The main reason for this plugin to exist is to make it easier to mass edit items on the fly (instead of the current way of having to find items, add to to a collection, and then edit all resources in the collection).

## How to Use
1. Perform search or view all resources of a collection
2. Make sure you are in the main thumbs view
3. Select items you want to edit by clicking in the lower left corner of the tile where there is white space (you can use ctrl/cmd and shift keys for multiple selections)
4. Click on the blue edit button
5. Edit your items and save
6. Enjoy life


## Changelog
* `v 1.0` - Initial release
