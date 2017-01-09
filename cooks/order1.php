<?php

if($_POST['submit'])
	{
	if($_POST['action'] == 'cooks')
		{
		//send cooks login details
		mail('georgemedley@gmail.com','CCML Order: Login Details',"An order has been placed on cooksofcountrymarketlabels.co.uk, with the following login details:\n\nUsername: ".$_POST['cl']."\nPassword: ".$_POST['cp']."\n\nFurther details will arrive via Google Checkout/Paypal once the order has been placed.");
		$_SESSION['user'] = $_POST['cl'];
		}
	else if($_POST['action'] == 'label')
		{
		//send label details
		mail('georgemedley@gmail.com','CCML Order: Label Details',"An order has been placed on cooksofcountrymarketlabels.co.uk, with the following label requirements:

Name: ".$_POST['name']."
Address:".$_POST['address']."

Phone Number: ".$_POST['phone']."
		
Type: ".$_POST['type']."
Title: ".$_POST['title']."
Description: ".$_POST['description']."
Colour: ".$_POST['colour']."
Ingredients: ".$_POST['ingredients']."

Sugar Content: ".$_POST['sugar']."
Sugar Percentage: ".$_POST['percentage']."
Best Before Type: ".$_POST['bestbefore']."
Best Before Location: ".$_POST['bestbeforeloc']."
Minimum Amount: ".$_POST['weight']."

Further details will arrive via Google Checkout/Paypal once the order has been placed.");
		$_SESSION['user'] = $_POST['name'];
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
<title>Order Form | Cooks of Country Market Labels</title>
<link rel='stylesheet' type='text/css' href='order-style.css'/>
<link rel='stylesheet' type='text/css' href='style.css'/>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-526122-13']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>
<body>
<div id='wrap'>
<div id='header'>
<a href='index.html' title='Country Market Labels'><img src='images/banner.png' alt='Country Market Labels' /></a>
</div>
<ul id='navbar'>
<li><a href='index.html'>Home</a></li>
<li><a href='labels.html'>Labels</a></li>
<li><a href='prices.html'>Prices</a></li>
<li><a href='contact.html'>Contact Us</a></li>
<li><a href='order.html' class='selected'>Order Online</a></li>
</ul>
<form action='order2.php' method='post'>
<table border='0'>
<tr><td width='200'><h4>Label Type</h4></td><td><h4>Number of Sheets Required</h4></td></tr>
<tr><td>Jar Labels (large)</td><td><input size='2' type='text' name='jl'/> @ 60p / sheet</td></tr>
<tr><td>Jar Labels (small)</td><td><input size='2' type='text' name='js'/> @ 60p / sheet</td></tr>
<tr><td>Cake Labels (large)</td><td><input size='2' type='text' name='cl'/> @ 60p / sheet</td></tr>
<tr><td>Cake Labels (small)</td><td><input size='2' type='text' name='cs'/> @ 60p / sheet</td></tr>
<tr><td>Round Labels</td><td><input size='2' type='text' name='r'/> @ 60p / sheet</td></tr>
<tr><td><b>Instructions</b><br/>Please tell us which of your designs you would like on your labels.</td><td><textarea name='instructions' style='width:450px;height:200px;'></textarea></td></tr>
<tr><td><h3>Delivery</h3></td><td>Standard (free for orders over £30) - £3.00<input type='radio' name='delivery' value='standard' checked='checked'/><br/>First Class - £5.00:<input type='radio' name='delivery' value='first'/></td></tr>
<tr><td></td><td><input type='submit' name='submit' value='Next' class='submit'/></td></tr>
</table>
</form>
</div>
</body>
</html>
