<?php
if(!isset($_GET['number']))
	exit();

function check_prime($number)
{
	if($number == 0 || $number == 1)
		return false;

	for($i = 2; $i < $number; $i ++)
	{
		if($number % $i == 0)
			return false;
	}
	return true;
}	

$number = $_GET['number'];

if(!is_numeric($number))
	echo '<div style="color:red">The parameter is not a number</div>';
else if($number < 0 || $number > 19999)
	echo '<div style="color:red">The parameter is not within the range [0,19999]</div>';
else
{	
	if(check_prime($number))
		echo '<div style="color:black"">The number ',$number, ' is prime !</div>';
	else
		echo '<div style="color:blue">The number ',$number, ' is NOT prime !</div>';
	$prime = true;
}
?>