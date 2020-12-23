<?php
include 'functions.php';

if(isset($_POST["new_groupname"]) && isset($_POST["group_to_change"])) {
	$names_config_file = "data/config/names.ini";
	$group_num = bindec($_POST["group_to_change"]) + 1;	
	config_set($names_config_file, "group_names", "group".$group_num, $_POST["new_groupname"]);	
	echo "config file ".$names_config_file." should now show ".bindec($_POST["group_to_change"])." as ".$_POST["new_groupname"];
	header('Location: http://'.$_SERVER['HTTP_HOST'].'/');
} else {
	echo "no groupname set";
	header('Location: http://'.$_SERVER['HTTP_HOST'].'/');
}
?>
