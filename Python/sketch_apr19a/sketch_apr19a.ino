void setup() {
  Serial.begin(9600);
}

void loop() {
  //Serial.print("Received:=== ");
  if (Serial.available() > 0) {
    char received = Serial.read();
    Serial.print("Received: ");
    Serial.println(received);
  }
}
