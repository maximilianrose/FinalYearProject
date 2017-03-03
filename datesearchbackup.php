AND CURRENTLYBOOKED = '0'





not exists ( select * from bookings 
where vehicle.vehicleID = bookings.vehicleID AND
STARTDATE < '$startdate' AND
ENDDATE> '$enddate')