//temperature
#include <dht.h>
dht DHT;
#define DHT11_PIN 2


//CO2 Sensor
#include "Adafruit_CCS811.h"


Adafruit_CCS811 ccs;

//light sensor
int photocellPin = 1; // the cell and 10K pulldown are connected to a0
int photocellReading; // the analog reading from the sensor divider
int LEDpin = 11; // connect Red LED to pin 11 (PWM pin) (this is not needed to use the sensor but if you have one laying around it could add a cool affect! This can be bought at your local Radio Shack.)
int LEDbrightness; //


void setup(void) {
 Serial.begin(115200);    // We'll send debugging information via the Serial monitor so if you can read it   without using a led
  
 Serial.println("CCS811 test");
  
  if(!ccs.begin()){
    Serial.println("Failed to start sensor! Please check your wiring.");
    //while(1);  
    }
    
}
 
void loop(void) {

    if(ccs.available()){
   // float temp = ccs.calculateTemperature();
    if(!ccs.readData()){
      Serial.print("CO2: ");
      Serial.println(ccs.geteCO2());
     }
    else{
      Serial.println("ERROR!");
      //while(1);
    }
  }
  int chk = DHT.read11(DHT11_PIN);
  Serial.println(chk);
  Serial.print("Temperature = ");
  Serial.println(DHT.temperature);
  Serial.print("Humidity = ");
  Serial.println(DHT.humidity);
     
   photocellReading = analogRead(photocellPin);
   Serial.print("Light = ");
   Serial.println(photocellReading);
 
   delay(30000);        
}

