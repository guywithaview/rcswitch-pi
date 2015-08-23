/*
 Usage: ./send <systemCode> <unitCode> <command>
     <systemCode> not used
     <unitCode> should be 0, 1, 2, ... etc
     <command> is 0 for OFF and 1 for ON
 */

#include "RCSwitch.h"
#include <stdlib.h>
#include <stdio.h>

int main(int argc, char *argv[]) {
    
    /*
     output PIN is hardcoded for testing purposes
     see https://projects.drogon.net/raspberry-pi/wiringpi/pins/
     for pin mapping of the raspberry pi GPIO connector
     */
    int PIN = 8;
    char* systemCode = argv[1];
    int unitCode = atoi(argv[2]);
    int command  = atoi(argv[3]);
    long baseAddr = 14649346;
    
    if (wiringPiSetup () == -1) return 1;
	printf("sending systemCode[%s] unitCode[%i] command[%i]\n", systemCode, unitCode, command);
	RCSwitch mySwitch = RCSwitch();
	mySwitch.enableTransmit(PIN);
	mySwitch.setPulseLength(342);
	mySwitch.setRepeatTransmit(10);
    
    switch(command) {
        case 1:
            mySwitch.send(baseAddr + unitCode*16 + 8, 24);
            //mySwitch.switchOn(systemCode, unitCode);
            break;
        case 0:
            mySwitch.send(baseAddr + unitCode*16, 24);
            //mySwitch.switchOff(systemCode, unitCode);
            break;
        default:
            printf("command[%i] is unsupported\n", command);
            return -1;
    }
	return 0;
}
