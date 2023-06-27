//#include <SoftwareSerial.
//const byte rxPin = 2;
//const byte txPin = 3;
//SoftwareSerial mySerial (rxPin, txPin)

char arr[8]={" "};
char reading=0;
byte counter=0;
void setup()
{
  Serial.begin(1200);
 
}

void loop()
{
  if(Serial.available()>0){
  reading=Serial.read();
    arr[counter]=reading;
    delay(10);
    if(counter >= 8){
      counter=0;
        Serial.print(arr);
    }
        counter++;
  }
}
