<!DOCTYPE html>
<?php 
include 'functions.php';
$names_conf_file   = 'data/config/names.ini';
$general_conf_file = 'data/config/config_de.ini';
$names_conf  = parse_ini_file($names_conf_file, true);
$general_conf= parse_ini_file($general_conf_file, true);
$groupBin = "00000";
if(isset($_COOKIE["last_group"])) {
	$groupBin = $_COOKIE["last_group"];
}
$groupNum = bindec($groupBin)+1;
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
							<table>
				<tr>
				<div id="table">
					<form action="switch.php" method="POST">
					<td><input class="submit_button on-button" type="submit" value=<?php echo $general_conf["strings"]["ON_BUTTON_TEXT"] ?>>
								</input><input type="hidden" name="switchID" value="10000"></input>
								<input type="hidden" name="cmdID" value="1"></input>
								<input class="group_selector" type="hidden" name="groupID" value="00000"></input></td>
					</form>
					<td>
						<form action="change_description.php" method="POST">
						<input type="hidden" class="socket_name" name="socketName" value="A"><h6>A</h6>
							<input type="hidden" class="group_selector" name="groupID" value="00000">
							<input type="text" onchange="this.form.submit()" class="description" name="descr" placeholder=<?php echo $names_conf["group".$groupNum]["A"] ?>>
						</form>
					</td>
						<form action="switch.php" method="POST">
						<td><input class="submit_button off-button" type="submit" value=<?php echo $general_conf["strings"]["OFF_BUTTON_TEXT"] ?>>
									</input><input type="hidden" name="switchID" value="10000"></input>
									<input type="hidden" name="cmdID" value="0"></input>
									<input class="group_selector" type="hidden" name="groupID" value="00000"></input></td>
						</form>
				</tr>
				<tr>
					<form action="switch.php" method="POST">
						<td><input class="submit_button on-button" type="submit" value=<?php echo $general_conf["strings"]["ON_BUTTON_TEXT"] ?>>
						</input><input type="hidden" name="switchID" value="01000"></input>
								<input type="hidden" name="cmdID" value="1"></input>
								<input class="group_selector" type="hidden" name="groupID" value="00000"></input></td>
					</form>
					<td>
						<form action="change_description.php" method="POST">
						<input type="hidden" class="socket_name" name="socketName" value="B"><h6>B</h6>
							<input type="hidden" class="group_selector" name="groupID" value="00000">
							<input type="text" class="description" name="descr" placeholder=<?php echo $names_conf["group".$groupNum]["B"] ?>>
						</form>	
					</td>
						<form action="switch.php" method="POST">
							<td><input class="submit_button off-button" type="submit" value=<?php echo $general_conf["strings"]["OFF_BUTTON_TEXT"] ?>>
							</input><input type="hidden" name="switchID" value="01000"></input>
									<input type="hidden" name="cmdID" value="0"></input>
									<input class="group_selector" type="hidden" name="groupID" value="00000"></input></td>
						</form>
				</tr>
				<tr>
					<form action="switch.php" method="POST">
						<td><input class="submit_button on-button" type="submit" value=<?php echo $general_conf["strings"]["ON_BUTTON_TEXT"] ?>>
						</input><input type="hidden" name="switchID" value="00100"></input>
								<input type="hidden" name="cmdID" value="1"></input>
								<input class="group_selector" type="hidden" name="groupID" value="00000"></input></td>
					</form>
					<td>
						<form action="change_description.php" method="POST">
						<input type="hidden" class="socket_name" name="socketName" value="C"><h6>C</h6>
							<input type="hidden" class="group_selector" name="groupID" value="00000">
							<input type="text" class="description" name="descr" placeholder=<?php echo $names_conf["group".$groupNum]["C"] ?>>
						</form>	
					</td>
						<form action="switch.php" method="POST">
							<td><input class="submit_button off-button" type="submit" value=<?php echo $general_conf["strings"]["OFF_BUTTON_TEXT"] ?>>
							</input><input type="hidden" name="switchID" value="00100"></input>
									<input type="hidden" name="cmdID" value="0"></input>
									<input class="group_selector" type="hidden" name="groupID" value="00000"></input></td>
						</form>
				</tr>
				<tr>
					<form action="switch.php" method="POST">
						<td><input class="submit_button on-button" type="submit" value=<?php echo $general_conf["strings"]["ON_BUTTON_TEXT"] ?>>
						</input><input type="hidden" name="switchID" value="00010"></input>
								<input type="hidden" name="cmdID" value="1"></input>
								<input class="group_selector" type="hidden" name="groupID" value="00000"></input></td>
					</form>
					<td>
						<form action="change_description.php" method="POST">
						<input type="hidden" class="socket_name" name="socketName" value="D"><h6>D</h6>
							<input type="hidden" class="group_selector" name="groupID" value="00000">
							<input type="text" class="description" name="descr" placeholder=<?php echo $names_conf["group".$groupNum]["D"] ?>>
						</form>	
					</td>
						<form action="switch.php" method="POST">
							<td><input class="submit_button off-button" type="submit" value=<?php echo $general_conf["strings"]["OFF_BUTTON_TEXT"] ?>>
							</input><input type="hidden" name="switchID" value="00010"></input>
									<input type="hidden" name="cmdID" value="0"></input>
									<input class="group_selector" type="hidden" name="groupID" value="00000"></input></td>
						</form>
				</tr>
				<tr>
					<form action="switch.php" method="POST">
						<td><input class="submit_button on-button" type="submit" value=<?php echo $general_conf["strings"]["ON_BUTTON_TEXT"] ?>>
						</input><input type="hidden" name="switchID" value="00001"></input>
								<input type="hidden" name="cmdID" value="1"></input>
								<input class="group_selector" type="hidden" name="groupID" value="00000"></input></td>
					</form>
					<td>
						<form action="change_description.php" method="POST">
						<input type="hidden" class="socket_name" name="socketName" value="E"><h6>E</h6>
							<input type="hidden" class="group_selector" name="groupID" value="00000">
							<input type="text" class="description" name="descr" placeholder=<?php echo $names_conf["group".$groupNum]["E"] ?>>
						</form>	

					</td>
						<form action="switch.php" method="POST">
							<td><input class="submit_button off-button" type="submit" value=<?php echo $general_conf["strings"]["OFF_BUTTON_TEXT"] ?>>
							</input><input type="hidden" name="switchID" value="00001"></input>
									<input type="hidden" name="cmdID" value="0"></input>
									<input class="group_selector" type="hidden" name="groupID" value="00000"></input></td>
						</form>
						</div>
				</tr>
				</table>
			</div>
			<select name="groupID" id="group_select" onchange="group_changed()">
					<option value='00000' id='00000'><?php echo $names_conf["group_names"]["group1"] ?></option>
					<option value='00001' id='00001'><?php echo $names_conf["group_names"]["group2"] ?></option>
					<option value='00010' id='00010'><?php echo $names_conf["group_names"]["group3"] ?></option>
					<option value='00011' id='00011'><?php echo $names_conf["group_names"]["group4"] ?></option>
					<option value='00100' id='00100'><?php echo $names_conf["group_names"]["group5"] ?></option>
					<option value='00101' id='00101'><?php echo $names_conf["group_names"]["group6"] ?></option>
					<option value='00110' id='00110'><?php echo $names_conf["group_names"]["group7"] ?></option>
					<option value='00111' id='00111'><?php echo $names_conf["group_names"]["group8"] ?></option>
					<option value='01000' id='01000'><?php echo $names_conf["group_names"]["group9"] ?></option>
					<option value='01001' id='01001'><?php echo $names_conf["group_names"]["group10"] ?></option>
					<option value='01010' id='01010'><?php echo $names_conf["group_names"]["group11"] ?></option>
					<option value='01011' id='01011'><?php echo $names_conf["group_names"]["group12"] ?></option>
					<option value='01100' id='01100'><?php echo $names_conf["group_names"]["group13"] ?></option>
					<option value='01101' id='01101'><?php echo $names_conf["group_names"]["group14"] ?></option>
					<option value='01110' id='01110'><?php echo $names_conf["group_names"]["group15"] ?></option>
					<option value='01111' id='01111'><?php echo $names_conf["group_names"]["group16"] ?></option>
					<option value='10000' id='10000'><?php echo $names_conf["group_names"]["group17"] ?></option>
					<option value='10001' id='10001'><?php echo $names_conf["group_names"]["group18"] ?></option>
					<option value='10010' id='10010'><?php echo $names_conf["group_names"]["group19"] ?></option>
					<option value='10011' id='10011'><?php echo $names_conf["group_names"]["group20"] ?></option>
					<option value='10100' id='10100'><?php echo $names_conf["group_names"]["group21"] ?></option>
					<option value='10101' id='10101'><?php echo $names_conf["group_names"]["group22"] ?></option>
					<option value='10110' id='10110'><?php echo $names_conf["group_names"]["group23"] ?></option>
					<option value='10111' id='10111'><?php echo $names_conf["group_names"]["group24"] ?></option>
					<option value='11000' id='11000'><?php echo $names_conf["group_names"]["group25"] ?></option>
					<option value='11001' id='11001'><?php echo $names_conf["group_names"]["group26"] ?></option>
					<option value='11010' id='11010'><?php echo $names_conf["group_names"]["group27"] ?></option>
					<option value='11011' id='11011'><?php echo $names_conf["group_names"]["group28"] ?></option>
					<option value='11100' id='11100'><?php echo $names_conf["group_names"]["group29"] ?></option>
					<option value='11101' id='11101'><?php echo $names_conf["group_names"]["group30"] ?></option>
					<option value='11110' id='11110'><?php echo $names_conf["group_names"]["group31"] ?></option>
					<option value='11111' id='11111'><?php echo $names_conf["group_names"]["group32"] ?></option>
			
				</select> <img onclick='edit_groupname()' class='edit-icon' src='data/images/edit.svg'></img>
				<div id='enter_groupname'>
				<form method='POST' action='change_groupname.php'>
					 <input type='text' name='new_groupname' placeholder='<?php echo $general_conf["strings"]["NEW_GROUPNAME_PLACEHOLDER_TEXT"] ?>'></input>
					 <input class='groupname_change_submit' value='<?php echo $general_conf["strings"]["STORE_GROUPNAME_CONFIRM_BUTTON_TEXT"] ?>' type='submit'></input>
					 <input name="group_to_change" class="group_selector" type="hidden" value="" id="change_groupname_groupID"></input>
				</div>  
	</body>
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
			document.getElementById('group_select').selectedIndex=document.getElementById(<?php echo $_COOKIE['last_group']; ?>).index;
			update_group();
		}
	</script>
	</html>
