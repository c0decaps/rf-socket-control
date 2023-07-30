<?php

$db = new SQLite3('data/rf.db');
if(isset($_POST["new_groupname"]) && isset($_POST["group_to_change"])) {
	$query = "UPDATE groups SET group_name='".$_POST["new_groupname"]."' WHERE group_id='".bindec($_POST["group_to_change"])."'";
	echo $query;
	$res = $db->exec($query);
	if ($res = true) {
		echo "<br> Query executed.";
		header('Location: http://'.$_SERVER['HTTP_HOST'].'/');
	} else {
		echo "<br> Query not executed";
	}
} else {
	echo "no groupname set";
	header('Location: http://'.$_SERVER['HTTP_HOST'].'/');
}
?>
