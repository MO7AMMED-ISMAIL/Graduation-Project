void setup() {
  pinMode(13, OUTPUT);
  Serial.begin(9600);
}

void loop() {
  if (Serial.available() > 0) {
    int state = Serial.read();
    digitalWrite(13, state);
  }
}
