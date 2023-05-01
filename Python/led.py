import serial
import time

# Open the serial connection
ser = serial.Serial('COM3', 9600)

# Wait for the connection to initialize
time.sleep(2)

# Turn the LED on
ser.write(b'1')

# Wait for 1 second
time.sleep(1)

# Turn the LED off
ser.write(b'0')

# Close the serial connection
ser.close()