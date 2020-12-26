<?php
include 'functions.php';

if(isset($_POST["socketName"]) && isset($_POST["groupID"]) && isset($_POST["descr"])) {
	$names_config_file = "data/config/names.ini";
	$descr = $_POST["descr"];
	$socket_name = $_POST["socketName"];
	$group_num = bindec($_POST["groupID"]) + 1;
	config_set($names_config_file, "group".$group_num, $socket_name, $descr);
	echo "config file ".$names_config_file." should now contain ".$descr." as description for ".$socket_name." in group ".$group_num;	
} else {
	echo "not enough parameters set";
}
header('Location: http://'.$_SERVER['HTTP_HOST'].'/');
?>
