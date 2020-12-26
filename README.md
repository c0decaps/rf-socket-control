# RF socket control :satellite: :electric_plug:
A tool to control RF sockets working on 433MHz.

### This project is based on 2 parts:
  * **host:** webinterface, basically emulating a typical control that comes with such remote sockets
  * **client:** connected to an 433MHz antenna and to wifi/lan it receives orders from the host which command to send utilizing `RCSwitch.h`


### Requirements:
  * Host device (e.g. RaspberryPi) with a webserver, curl, php and permissions for `www-data` to write to `data/config`.
  * Client device, e.g. ESP8266 with a 433MHz antenna


### Details:
These sockets typically work the same independent of the brand. To use them you usually have to set dip switches (10 on the sockets, 5 on the transmitter) to control the switches individually and to prevent interference. The 5 dip switches on the transmitter select which switches of which group are to be controlled (`groupID`). 5 of the 10 dip switches on the socket select the group the socket is in and the other 5 select the individual ID of the switch (`switchID`). The `switchID` translates to the letters like the following: `10000->A`, `01000->B`, `00001->E`.

When a group is selected in the webinterface and a on/off button is clicked on, a form gets submitted to `switch.php` where a curl request to a client gets submitted following this format:

http://`client`/groupID*g*`groupID`switchID*s*`switchID`cmdID`cmdID`

where `client` is the corresponding clients IP address/hostname, *g* is the *character length* of `groupID`, *s* is the *character length* of `switchID` and `cmdID` is `0` for off and `1` for on.

A webserver running on the client tries to parse the `groupID`, the `switchID` and the `cmdID` of the incoming requests. If this succeeds, call `switchOn(groupID, switchID)` or `switchOff(groupID, switchID)` in respect to `cmdID` to send the corresponding RF signal.


##### TODO:
  * implement the option to set timejobs/timers :clock1030:
  * add changeable descriptions to each socket similar to the changeable groupnames
  * in switch.php, use curl instead of `shell_exec(...)`
  * maybe get the project to work only on ESPs (would probably mean to get rid of PHP :frowning:)
  * option to set up multiple clients if the reach is not sufficient
  * visualization of the group selection so one does not have to know how to read binary to get how the group selection works
  * macros
  * printable QR codes (?)
  * get consistent naming (`switchID` should be `socketID`)
  * dynamic cheatsheet response on clients

###### other projects used:
  * [feather icons](https://github.com/feathericons/feather)
  * [RCSwitch library](https://github.com/sui77/rc-switch)
