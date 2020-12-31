<?php
$host1 = "192.168.100.23"; # ADJUST FOR YOUR NEEDS HERE
#$host2 = "192.168.100.26"; # SECOND CLIENT IF REACH OF ONE DOES NOT SUFFICE
if(isset($_POST['groupID'])) {
	echo "Group: ".$_POST['groupID']."(len: ".strlen($_POST['groupID']).") ";
	if(isset($_POST['switchID'])) {
		echo "Switch: ".$_POST['switchID']."(len: ".strlen($_POST['switchID']).") ";
		if(isset($_POST['cmdID'])) {
			echo "command: ".$_POST['cmdID']."(len: ".strlen($_POST['cmdID']).") ";
			$groupID = $_POST["groupID"];
			$switchID= $_POST["switchID"];
			$cmdID 	 = $_POST["cmdID"];
			$host = $host1;
			#
			# UNCOMMENT IF YOU NEED A SECOND CLIENT
			#
			#if (($groupID == "11000") && ($switchID == "01000")) { # draussen B
			#	$host = $host2;
			#}
			#if (($groupID == "11100") && ($switchID == "01000")) { # test B
			#	$host = $host2;
			#}
			#if (($groupID == "11100") && ($switchID == "10000")) { # test A
			#	$host = $host2;
			#}
			#if (($groupID == "11000") && ($switchID == "00100")) {
			#	$host = $host2;
			#}
			$url = "http://".$host."/groupID".strlen($groupID).$groupID."switchID".strlen($switchID).$switchID."cmdID".$cmdID;
			echo " <br> final url: ".$url;
			if(substr($command, -1) == '~') {
				$command = substr($command, 0, strlen($command)-1);
			}
			$curl = curl_init($url);
			$result = curl_exec($curl);
			curl_close($curl);
			setcookie("last_group", $groupID, time()+(86400*150), "/");
			#shell_exec('echo "host: '.$host.' at '.date("Y-m-d h:i:sa").'" >> /tmp/switch_log');
		}
	}
}
header('Location: http://'.$_SERVER['HTTP_HOST'].'/');
?>
