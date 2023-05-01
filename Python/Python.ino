#include <Keypad.h>

const byte ROWS = 4;
const byte COLS = 4;
char keys[ROWS][COLS] = {
  {'1','2','3','A'},
  {'4','5','6','B'},
  {'7','8','9','C'},
  {'*','0','#','D'}
};
byte rowPins[ROWS] = {9, 8, 7, 6};
byte colPins[COLS] = {5, 4, 3, 2};
Keypad keypad = Keypad(makeKeymap(keys), rowPins, colPins, ROWS, COLS);
int ledPin = 13;
void setup() {
  pinMode(ledPin, OUTPUT);
  Serial.begin(9600);
}

void loop() {
  char input[9]; // 8 digits + '\0'
  int i = 0;
  while (i < 8) {
    char key = keypad.getKey();
    if (key != NO_KEY) {
      input[i++] = key;
      //Serial.print(key);
    }
  }
  input[8] = '\0'; 
  Serial.print("The Password is: ");
  Serial.println(input);

  if (Serial.available() > 0) {
      char command = Serial.read();
      if (command == '1') {
          digitalWrite(ledPin, HIGH);
          Serial.println("LED ON");
      }else if (command == '0') {
          digitalWrite(ledPin, LOW);
          Serial.println("LED OFF");
      }
   }
}
