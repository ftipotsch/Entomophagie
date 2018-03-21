/*
 *  This sketch sends data via HTTP GET requests to data.sparkfun.com service.
 *
 *  You need to get streamId and privateKey at data.sparkfun.com and paste them
 *  below. Or just customize this script to talk to other HTTP servers.
 *
 */
//temperature
//DHT Sensor
#include "DHT.h"
#define DHTPIN 2     // what digital pin we're connected to
#define DHTTYPE DHT11   // DHT 11
DHT dht(DHTPIN, DHTTYPE);

//Adafruit
#include "Adafruit_CCS811.h"
Adafruit_CCS811 ccs;


//Hebel
int xPin = A1;
int yPin = A0;

int xPosition = 0;
int yPosition = 0;


//servo 
#include <Servo.h>
int co2Min = 0;
int servoPin = 9;
Servo servo;  
int servoAngle = 0; 



//light sensor
int photocellPin = 1; // the cell and 10K pulldown are connected to a0
int photocellReading; // the analog reading from the sensor divider
int LEDpin = 11; // connect Red LED to pin 11 (PWM pin) (this is not needed to use the sensor but if you have one laying around it could add a cool affect! This can be bought at your local Radio Shack.)
int LEDbrightness; //




<<<<<<< HEAD
=======


>>>>>>> 29e9cd106eabb3e649d693a2af0d0b3a7e569dcf
void setup() {
 Serial.begin(115200); 
 //DHT

 digitalWrite(DHTPIN, HIGH);
 delayMicroseconds(40);
 dht.begin();


 //Adafruit
 Serial.println("CCS811 test");
  if(!ccs.begin()){
    Serial.println("Failed to start sensor! Please check your wiring.");
    //while(1);  
    }
  delay(10);

  //Hebel
  pinMode(xPin, INPUT);
  pinMode(yPin, INPUT);
  
  //Servo
  servo.attach(servoPin);

}



void loop() {

  // Adafruit
  delay(2000);
    if(ccs.available()){
        if(!ccs.readData()){
          Serial.print("CO2: ");
          Serial.println(ccs.geteCO2());
         }
        else{
          Serial.println("ERROR!");
          //while(1);
        }
    }
  
    
  //DHT
      float h = dht.readHumidity();
    // Read temperature as Celsius (the default)
    float t = dht.readTemperature();
  
  
    // Check if any reads failed and exit early (to try again).
    if (isnan(h) || isnan(t)) {
      Serial.println("Failed to read from DHT sensor!");
      //return;
    }
    Serial.print("Humidity: ");
    Serial.print(h);
    Serial.print(" %\t");
    Serial.print("Temperature: ");
    Serial.print(t);
    Serial.print(" *C ");
  
      
  // Light Reading 
     photocellReading = analogRead(A0);
     Serial.print("Light = ");
     Serial.println(photocellReading);
   
     delay(3000); 
  
  
  //Servo
      if(ccs.geteCO2() <= co2Min){
        
      //move the micro servo from 0 degrees to 180 degrees
      for(;servoAngle < 180; servoAngle++) {       
           servo.write(servoAngle);              
            delay(10);
         } 
      } if (ccs.geteCO2() > co2Min && servoAngle != 0){
          servo.write(45); 
          servoAngle = 0;
          Serial.println("RETURN");
      }
  
  //Hebel

  xPosition = analogRead(xPin);
  Serial.print("X: ");
  Serial.println(xPosition);
<<<<<<< HEAD
       
}
=======
      
  

    
  
 }
>>>>>>> 29e9cd106eabb3e649d693a2af0d0b3a7e569dcf



