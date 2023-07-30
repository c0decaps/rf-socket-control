<!DOCTYPE html>
<?php 
include 'functions.php';
$db = new SQLite3("data/rf.db");
$names_conf_file   = 'data/config/names.ini';
$settings_conf_file= 'data/config/settings.ini';
$settings_conf=parse_ini_file($settings_conf_file,true);
$general_conf_file = 'data/config/config_'.$settings_conf["settings"]["language"].'.ini';
$names_conf  = parse_ini_file($names_conf_file, true);
$general_conf= parse_ini_file($general_conf_file, true);
$groupBin = "00000";
if(isset($_COOKIE["last_group"])) {
	$groupBin = $_COOKIE["last_group"];
}
$groupNum = bindec($groupBin);
?>
	<head>
	   <title><?php echo $general_conf["strings"]["TITLE"] ?></title>
	   <link rel="stylesheet" href="data/css/general.css">
	   <link rel="stylesheet" href="data/css/buttons.css">
	   <meta name="viewport" content="width=device-width, initial-scale=1">
	   <link rel="icon" href="data/images/home.svg">
	</head>
	<body>
		<center>
			<div id="content">
			<div class="background"></div>
				<div id="table">
				<table>
<?php
for($i = 0; $i < 5; $i++) {
	$socket_descr = "";
	$socket_name = "";
	$query ="SELECT socket_descr, socket_name FROM sockets WHERE socket_id = ".$groupNum*5 + $i;
	#echo "QUERY: ".$query;
	$result = $db->query($query);
	while($data = $result->fetchArray()) {
		$socket_descr = $data['socket_descr'];
		$socket_name = $data['socket_name'];
	}
	$dip_code = str_repeat('0', $i).'1'.str_repeat('0', 5-$i-1); # first socket is 10000, second 01000, etc.
	# On Button
	echo "<tr>\n <form action='socket.php' method='POST'>\n <td><input class='submit_button on-button' type='submit' value='".$general_conf["strings"]["ON_BUTTON_TEXT"]."'></input>\n";
	echo "<input type='hidden' name='socketID' value='".$dip_code."'></input>\n";
	echo "<input type='hidden' name='cmdID' value='1'></input>\n";
	echo "<input class='group_selector' type='hidden' name='groupID' value='00000'></input></td></form>\n";
	# Description
	echo "<td>\n <form action='change_description.php' method='POST'>\n";
	echo "<input type='hidden' class='socket_name' name='socketName' value='".$socket_name."'><h6>".$socket_name."</h6>\n";
	echo "<input type='hidden' class='group_selector'  name='groupID' value='00000'>\n";
	echo "<input type='text' onchange='this.form.submit()' class='description' name='descr' onchange='this.form.submit()' placeholder='".$socket_descr."'>\n </form></td>\n";
	# Off Button
	echo "<form action='socket.php' method='POST'>\n <td><input class='submit_button off-button' type='submit' value='".$general_conf["strings"]["OFF_BUTTON_TEXT"]."'></input>\n";
	echo "<input type='hidden' name='socketID' value='".$dip_code."'></input>\n";
	echo "<input type='hidden' name='cmdID' value='0'></input>\n";
	echo "<input class='group_selector' type='hidden' name='groupID' value='00000'></input></td>\n </form></tr>\n";

}
?>
			</table>			
			</div>
			<select name="groupID" id="group_select" onchange="group_changed()">
					<?php 
					for($i = 0; $i < 32; $i++) {
						$group_id_bin = decbin($i);
						if(strlen($group_id_bin) < 5) {
							$group_id_bin = str_repeat('0', 5-strlen($group_id_bin)).$group_id_bin;
						}
						$query = "SELECT group_name FROM groups WHERE group_id=".$i;
						$result = $db->query($query);
						while($data = $result->fetchArray()) {							
							echo "			<option value='".$group_id_bin."' id='".$group_id_bin."'>".$data['group_name']."</option>\n";
						}
					}	
					?>
							
				</select> <img onclick='edit_groupname()' class='edit-icon' src='data/images/edit.svg'></img>
				<div id='enter_groupname'>
				<form method='POST' action='change_groupname.php'>
					 <input type='text' name='new_groupname' id='new_groupname' placeholder='<?php echo $general_conf["strings"]["NEW_GROUPNAME_PLACEHOLDER_TEXT"] ?>'></input>
					 <input class='groupname_change_submit' value='<?php echo $general_conf["strings"]["STORE_GROUPNAME_CONFIRM_BUTTON_TEXT"] ?>' type='submit'></input>
					 <input name="group_to_change" class="group_selector" type="hidden" value="" id="change_groupname_groupID"></input>
				</div>  
	</body>
	<?php
		if($settings_conf["settings"]["show_github_link"] == "true") {
			echo '<div class="github_link"><a href="https://github.com/c0decaps/rf-socket-control">github</a></div>';
		}
	?>
	<script>
	function update_group() {
		console.log('change of group detected');
		group_selectors = document.getElementsByClassName('group_selector');
		Array.prototype.forEach.call(group_selectors, function(group) {
			console.log("changing group from ");
			console.log(document.getElementById("group_select").value)
			group.value = document.getElementById("group_select").value;
			document.cookie = "last_group="+group.value;
			//window.location.reload(true); 
		})
	}
	function group_changed() {
		update_group();
		window.location.reload(true); // reload page to update socket descriptions
	}
	function edit_groupname() {
		var enter_groupname = document.getElementById("enter_groupname");
		if (enter_groupname.style.visibility == 'visible') {
			enter_groupname.style.visibility = 'hidden';
		} else {
			enter_groupname.style.visibility = 'visible';
			
		}
	}
	</script>
	<script>
		var value_or_null = (document.cookie.match(/^(?:.*;)?\s*last_group\s*=\s*([^;]+)(?:.*)?$/)||[,null])[1];
		if (value_or_null != null) {
			console.log("last cookie found: ");
			console.log(value_or_null);
			document.getElementById('group_select').selectedIndex=<?php echo bindec($_COOKIE['last_group']); ?>;
			update_group();
		}
	</script>
	</html>
