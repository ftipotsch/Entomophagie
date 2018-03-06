//temperature
#include <dht.h>
dht DHT;
#define DHT11_PIN    2


//CO2 Sensor
#include "Adafruit_CCS811.h"

Adafruit_CCS811 ccs;

//light sensor
int photocellPin = 1; 
int photocellReading;


void setup(void) {
 Serial.begin(9600);    
  
 Serial.println("CCS811 test");
  
  if(!ccs.begin()){
    Serial.println("Failed to start sensor! Please check your wiring.");
    while(1);  
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
      while(1);
    }
  }

  int chk = DHT.read11(DHT11_PIN);
  Serial.print("Temperature = ");
  Serial.println(DHT.temperature);
  Serial.print("Humidity = ");
  Serial.println(DHT.humidity);
     
   photocellReading = analogRead(photocellPin);
   Serial.print("Light = ");
   Serial.println(photocellReading);
 
   delay(3000);        
    }
