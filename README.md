# About

Fork of the [rcswitch-pi](https://github.com/r10r/rcswitch-pi) library. Use for controlling rc remote controlled power sockets with the raspberry pi. This fork has been slightly changed to work specificially with the 'Watts Clever' outlets as sold by Jaycar Electroncis in Australia. Kudos to the original projects: rcswitch-pi, rc-switch and wiringpi.


## Usage

First you have to install the [wiringpi](https://projects.drogon.net/raspberry-pi/wiringpi/download-and-install/) library.
After that you can compile the example program *send* by executing *make*. 
You can then send a command using:
`sudo ./send <pin> <unitNumber> <command>`

For example, to turn unit 4 on when the transmitter is connected to wiring pi pin 9:
`sudo ./send 9 4 1`
