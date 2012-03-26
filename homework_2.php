<?php
$array = range(20, 1000, 37);

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

function find_3_prime()
{
	global $array;
	$count = 0;

	foreach($array as $number)
	{
		if(check_prime($number))
			$count++;
		if($count == 3)
		{
			echo $number;
			break;
		}
	}
}

function check_exists()
{
	global $array;
	$numbers = array(146, 284, 871);

	foreach($numbers as $value)
	{
		if(in_array($value, $array))
			$exist = '';
		else
			$exist = ' does not ';

		echo 'The number '.$value.$exist.' exist in the array';	
	}
}

// find_3_prime();
// check_exists();
?>