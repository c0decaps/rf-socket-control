# RF socket control :electric_plug:
A tool to control RF sockets working on 433MHz.

### This project is based on 2 parts:
  * **host:** webserver, basically emulating a typical control that comes with such remote sockets
  * **client:** connected to an 433MHz antenna and to wifi/lan it receives commands from the host which command to send utilizing `RCSwitch.h`
  
  
### Requirements: 
  * Host device (e.g. RaspberryPi) with a webserver, curl, php and permissions for `www-data` to write to `data/config`.
  * Client device, e.g. ESP8266 with a 433MHz antenna
  
  
### Details:
These sockets typically, independent of the brand work by setting dip switches (10 on the sockets, 5 on the transmitter) to control the switches individually and to prevent interference. The 5 dip switches on the transmitter select which switches of which group are to be controlled (`groupID`). 5 of the 10 dip switches on the socket select the group the socket is in and the other 5 select the individual ID of the switch (`switchID`). The `switchID` translates to the letters like the following: `10000->A`, `01000->B`, `00001->E`.

When a group is selected in the webinterface and a on/off button is clicked on, a form gets submitted to `switch.php` where a curl request to a client gets submitted following this format: 

http://`client`/groupID*g*`groupID`switchID*s*`switchID`cmdID`cmdID`

where `client` is the corresponding clients IP address/hostname, *g* is the *character length* of `groupID`, *s* is the *character length* of `switchID` and `cmdID` is `0` for off and `1` for on.

A webserver running on the client tries to parse the `groupID`, the `switchID` and the `cmdID` of the incoming requests. If this succeeds, call `switchOn(groupID, switchID)` or `siwtchOff(groupID, switchID)` in respect to `cmdID` to send the corresponding RF signal.


##### TODO:
  * implement the option to set timejobs :clock1030:
  * in switch.php, use curl instead of `shell_exec(...)`
  * option to set up multiple clients if the reach is not sufficient
  * visualization of the group selection so one does not have to know how to read binary to get how the group selection works 
  * makros
  * printable QR codes (?)
  * dynamic cheatsheet response on clients
  
