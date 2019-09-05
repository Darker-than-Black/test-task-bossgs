<?php
$cars=[];
$models = array('audi','reno','ford','BMW', 'tesla', 'cherry', null);
$years=array(2005, 2007, 2008, 2009, 2010, null);
$colors=array('red', 'blue', 'green', 'white', 'gray', 'black', null);
$audio=array(true, false, null);

for ($i=0; $i <6; $i++) { 
	$car["model"]=$models[rand(0,6)];
	$car["year"]=$years[rand(0,5)];
	$car["color"]=$colors[rand(0,7)];
	$car["audiosystem"]=$audio[rand(0,2)];
	if(rand(0, 1)) {
		$car["extra_field"]='extra data';
	}
	array_push($cars, $car);
}

echo json_encode($cars);
?>