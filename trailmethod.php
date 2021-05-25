<!DOCTYPE html>
<html>
	
<head>
	<title>
		How to call PHP function
		on the click of a Button ?
	</title>
</head>

<body style="text-align:center;">
	
	<h1 style="color:green;">
		GeeksforGeeks
	</h1>
	
	<h4>
		How to call PHP function
		on the click of a Button ?
	</h4>
	
	<?php
	$var="9H";
	        for($i=0;$i<52;$i+=1)
{

$myarray = array("C","D","H","S");
$tempo=strval($i%13+2).$myarray[$i/13];

if(array_key_exists('9H', $_POST)) {
			echo 'yahoo';
		}
		}
		if(array_key_exists($var.'_y', $_POST)) {
			button1();
		}
		
		else if(array_key_exists($var.'_x', $_POST)) {
			button2();
		}
		function button1() {
			echo "This is Button1 that is selected";
		}
		function button2() {
			echo "This is Button2 that is selected";
		}
	?>

	<form method="post">
		<input type="submit" name="button1"
				 value="Button1" />
		
		<input type="image" name="9H" src="src/cards/7D.jpg"
				value="9H" />
	</form>
</head>

</html>

