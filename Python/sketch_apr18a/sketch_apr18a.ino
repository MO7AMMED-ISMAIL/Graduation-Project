
int ledPin = 13;
void setup() {
  // put your setup code here, to run once:
  pinMode(ledPin, OUTPUT);
}

void loop() {
  //digitalWrite(ledPin, HIGH);
  // put your main code here, to run repeatedly:
      int command = Serial.read();
      if (command == '1') {
          digitalWrite(ledPin, HIGH);
      }else if (command == '0'){
          digitalWrite(ledPin, LOW);
      }
}
