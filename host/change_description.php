<?php

$db = new SQLite3('data/rf.db');
if(isset($_POST["socketName"]) && isset($_POST["groupID"]) && isset($_POST["descr"])) {
	$query = "UPDATE sockets SET socket_descr = '".$_POST['descr']."' WHERE socket_name = '".$_POST['socketName']."' AND group_id = '".bindec($_POST["groupID"])."'";
	echo $query;
	$res = $db->exec($query);
	if ($res = true) {
		echo "<br> Query executed.";
		header('Location: http://'.$_SERVER['HTTP_HOST'].'/');
	} else {
		echo "<br> Query not executed";
	}
}

?>
