<?php
   
function HookRs_multi_selectSearchEndofsearchpage() {
global $baseurl,$css_reload_key; ?>
<script src="<?php echo $baseurl;?>/plugins/rs_multi_select/js/multiselector.min.js?css_reload_key=<?php echo $css_reload_key?>" type="text/javascript"></script>
<script>
    jQuery(document).ready(function()
    {
        jQuery(".TopInpageNavLeft").append("<a href='' id='multibutton' style='display:none;'>Edit</a>");
        jQuery("#CentralSpaceResources").multiSelector({
            selector:'.ResourcePanel',
            onSelectionEnd: function(list, parent, element) //Callback
            {
                var qry = [];
                for (let value of list) {
                qry.push(value.id.substring(13))
				}
				var newselurl;
				qstrings = qry.join('&resources[]=');
				newselurl = '/plugins/rs_multi_select/pages/temp_collection.php?resources[]=' + qstrings
				jQuery('#multibutton').attr('href',newselurl);
				if (list.length>0) {
				jQuery('#multibutton').show();
				} else {
				jQuery('#multibutton').hide();
				}
               
            }
        });
    });
</script> <style>
       #multibutton {
       background-color: #3498DB !important; color: white;
       clear:left !important;  padding-left:9px;padding-right:10px; margin-right:20px;
       z-index:100000;float:left; border-radius:5px; height:25px;line-height:24px;font-size:13px;
       }
       #multibutton:hover {
       text-decoration: none;
       background-color:black !important;
       }
    .ResourcePanel.ms-selected{
            /*color: blue;*/
            background-color: #3498DB !important;
        }
    </style>
<?php 
}


?>


