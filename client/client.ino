#include <ESP8266WiFi.h>
#include <RCSwitch.h>

const char* ssid = "SSID_PLACEHOLDER";
const char* password = "PASSWORD_PLACEHOLDER";

#define groupIDlen  10
#define switchIDlen 10
char groupID[groupIDlen] = "";
char switchID[switchIDlen] = "";

RCSwitch mySwitch = RCSwitch();

#define transmit_data_pin 2 // D4 on WeMos D1/Nodemcu
WiFiServer server(80);
 
void setup() {
  Serial.begin(115200);
  mySwitch.enableTransmit(transmit_data_pin);
  delay(10);

  Serial.print("Connecting to ");
  Serial.println(ssid);
 
  WiFi.begin(ssid, password);
 
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("");
  Serial.println("WiFi connected");
 
  // Start the server
  server.begin();
  Serial.println("Server started");
 
  // Print the IP address
  Serial.print("Use this URL to connect: ");
  Serial.print("http://");
  Serial.print(WiFi.localIP());
  Serial.println("/");
 
}
 
void loop() {
  // Check if a client has connected
  WiFiClient client = server.available();
  if (!client) {
    return;
  }
 
  // Wait until the client sends some data
  Serial.println("new client");
  while(!client.available()){
    delay(1);
  }
 
  // Read the first line of the request
  String request = client.readStringUntil('\r');
  Serial.println(request);
  client.flush();
 
  // Match the request
  String groupID_identifier = "groupID"; 
  String switchID_identifier = "switchID";
  String command_identifier = "cmdID";
  int group_len= request.charAt(request.indexOf(groupID_identifier)+groupID_identifier.length()) - '0';
  int switch_len= request.charAt(request.indexOf(groupID_identifier)+groupID_identifier.length()) - '0';
  if ((request.indexOf(groupID_identifier) != -1)  && (request.indexOf(groupID_identifier) != -1) && (request.indexOf(command_identifier) != -1)) {
    // get index of character where the data starts
    int group_id_starting = request.indexOf(groupID_identifier)+groupID_identifier.length()+1;
    int switch_id_starting = request.indexOf(switchID_identifier)+switchID_identifier.length()+1;
    // get actual data
    String group_id_string = request.substring(group_id_starting, group_id_starting+group_len);
    group_id_string.toCharArray(groupID, groupIDlen);
    String switch_id_string = request.substring(switch_id_starting, switch_id_starting+switch_len);
    switch_id_string.toCharArray(switchID, switchIDlen);
    int command_id_starting = request.indexOf(command_identifier)+command_identifier.length();
    if(request.substring(command_id_starting,command_id_starting+1) == "1") {
      mySwitch.switchOn(groupID, switchID);
      Serial.print("turning ON switch ");
    } else {
      Serial.println("turning OFF switch ");
      mySwitch.switchOff(groupID, switchID);
    }
    Serial.print(switchID);
    Serial.print(" in group ");
    Serial.print(groupID);
    Serial.println("");
  }
 
  // Return the response
  client.println("HTTP/1.1 200 OK");
  client.println("Content-Type: text/html");
  client.println(""); //  do not forget this one
  client.println("<!DOCTYPE HTML>");
  client.println("<html>");
  client.println("<link rel=\"icon\" href=\"data:;base64,=\">"); //test to avoid favicon.ico request ( https://stackoverflow.com/questions/1321878/how-to-prevent-favicon-ico-requests )
  client.println("<center>");
  client.println("<h1>syntax: ");
  client.print("http://");
  client.print(WiFi.localIP());
  client.println("/groupID510000switchID500001cmdID1 </h1>");
  client.println("<br><br><h3>to turn on switch 00001 in group 10000</h3>");
  client.println("</html>");
 
  delay(100);
  Serial.println("Client disonnected");
  Serial.println("");
}