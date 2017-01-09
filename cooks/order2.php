<?php
if($_POST['instructions'])
	mail('georgemedley@gmail.com','CCML Order: Instructions',
			"Instructions for order: ".$_SESSION['user']."\n\n".$_POST['instructions']);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
<title>Cooks of Country Market Labels - Order Confirmation</title>
<link rel='stylesheet' type='text/css' href='style.css'/>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
</head>
<body>
<div id='banner'></div>
<div id='wrapper'>
<a href='index.html'><< Go Back to the Home Page</a>
<h1>Confirm and Pay for your order</h1><h4>
Please check this information is correct:</h4>
<?

$js = intval($_POST['js']);
$jl = intval($_POST['jl']);
$cs = intval($_POST['cs']);
$cl = intval($_POST['cl']);
$r = intval($_POST['r']);
$firstClass = ($_POST['delivery'] == 'first') ? true : false;

$total = ($js + $jl + $cs + $cl + $r) * 0.6;

echo "<table>
<tr><td width='300'><h3>Your Order:</h3></td><td></td></tr>";
echo ($js > 0) ? "<tr><td>Small Jar Labels @ 60p / sheet: </td><td>" . $js . " - Total: £" . number_format($js*0.6,2) . "</td></tr>" : "";
echo ($jl > 0) ? "<tr><td>Large Jar Labels @ 60p / sheet: </td><td>" . $jl . " - Total: £" . number_format($jl*0.6,2) . "</td></tr>" : "";
echo ($cs > 0) ? "<tr><td>Small Cake Labels @ 60p / sheet: </td><td>" . $cs . " - Total: £" . number_format($cs*0.6,2) . "</td></tr>" : "";
echo ($cl > 0) ? "<tr><td>Large Cake Labels @ 60p / sheet: </td><td>" . $cl . " - Total: £" . number_format($cl*0.6,2) . "</td></tr>" : "";
echo ($r  > 0) ? "<tr><td>Round Labels @ 60p / sheet: </td><td>" . $r . " - Total: £" . number_format($r*0.6,2) . "</td></tr>" : "";
if($firstClass)
	{
	$ship = true;
	echo "<tr><td><h3>Delivery</h3> - First Class</td><td><h3>£5.00</h3></td></tr>";
	$total += 5.0;
	}
else if($total < 30)
	{
	$ship = true;
	echo "<tr><td><h3>Delivery</h3> - Standard (Free for orders over £30)</td><td><h3>£3.00</h3></td></tr>";
	$total += 3.0;
	}
else{
	echo "<tr><td><h3>Delivery</h3> - Standard (Free for orders over £30)</td><td><h3>Free</h3></td></tr>";
	}

echo "<tr><td><h2>Total</h2></td><td><h2>£" . number_format($total,2) . "</h2></td></tr>";
echo "<tr><td><a href=\"javascript:history.back(-1)\"><h2 class='submit'>Go Back</h2></a></td><td>";
$gc = "Google Wallet: <form style='display:inline;' action='https://checkout.google.com/cws/v2/Merchant/504267268818759/checkoutForm' id='BB_BuyButtonForm' method='post' name='BB_BuyButtonForm'>";
$pp = "PayPal: <form style='display:inline;' action='https://www.paypal.com/cgi-bin/webscr' method='post'>

<input type='hidden' name='cmd' value='_cart'>
<input type='hidden' name='upload' value='1'>
<input type='hidden' name='business' value='george@georgemedley.com'>
<input type='hidden' name='currency_code' value='GBP'>";
$i = 1;
if($js > 0)
	{
	$gc .= "<input name='item_name_$i' type='hidden' value='Small Jar Labels'/>
    <input name='item_description_$i' type='hidden' value='A4 Sheet'/>
    <input name='item_quantity_$i' type='hidden' value='$js'/>
    <input name='item_price_$i' type='hidden' value='0.6'/>
    <input name='item_currency_$i' type='hidden' value='GBP'/>";
	
	$pp .= "<input type='hidden' name='item_name_$i' value='Small Jar Labels' />
    <input type='hidden' name='amount_$i' value='0.6' />
    <input type='hidden' name='quantity_$i' value='$js' />";
	$i++;
	}
if($jl > 0)
	{
	$gc .= "<input name='item_name_$i' type='hidden' value='Large Jar Labels'/>
    <input name='item_description_$i' type='hidden' value='A4 Sheet'/>
    <input name='item_quantity_$i' type='hidden' value='$jl'/>
    <input name='item_price_$i' type='hidden' value='0.6'/>
    <input name='item_currency_$i' type='hidden' value='GBP'/>";
	
	$pp .= "<input type='hidden' name='item_name_$i' value='Large Jar Labels' />
    <input type='hidden' name='amount_$i' value='0.6' />
    <input type='hidden' name='quantity_$i' value='$jl' />";
	$i++;
	}
if($cs > 0)
	{
	$gc .= "<input name='item_name_$i' type='hidden' value='Small Cake Labels'/>
    <input name='item_description_$i' type='hidden' value='A4 Sheet'/>
    <input name='item_quantity_$i' type='hidden' value='$cs'/>
    <input name='item_price_$i' type='hidden' value='0.6'/>
    <input name='item_currency_$i' type='hidden' value='GBP'/>";
	
	$pp .= "<input type='hidden' name='item_name_$i' value='Small Cake Labels' />
    <input type='hidden' name='amount_$i' value='0.6' />
    <input type='hidden' name='quantity_$i' value='$cs' />";
	$i++;
	}
if($cl > 0)
	{
	$gc .= "<input name='item_name_$i' type='hidden' value='Large Cake Labels'/>
    <input name='item_description_$i' type='hidden' value='A4 Sheet'/>
    <input name='item_quantity_$i' type='hidden' value='$cl'/>
    <input name='item_price_$i' type='hidden' value='0.6'/>
    <input name='item_currency_$i' type='hidden' value='GBP'/>";
	
	$pp .= "<input type='hidden' name='item_name_$i' value='Large Cake Labels' />
    <input type='hidden' name='amount_$i' value='0.6' />
    <input type='hidden' name='quantity_$i' value='$cl' />";
	$i++;
	}
if($r > 0)
	{
	$gc .= "<input name='item_name_$i' type='hidden' value='Round Labels'/>
    <input name='item_description_$i' type='hidden' value='A4 Sheet'/>
    <input name='item_quantity_$i' type='hidden' value='$r'/>
    <input name='item_price_$i' type='hidden' value='0.6'/>
    <input name='item_currency_$i' type='hidden' value='GBP'/>";
	
	$pp .= "<input type='hidden' name='item_name_$i' value='Round Labels' />
    <input type='hidden' name='amount_$i' value='0.6' />
    <input type='hidden' name='quantity_$i' value='$r' />";
	$i++;
	}
	
if($ship)
	{
	$type = ($firstClass) ? "First Class" : "Standard";
	$price = ($firstClass) ? 5.0 : 3.0;
	$gc .= "<input name='item_name_$i' type='hidden' value='Delivery'/>
    <input name='item_description_$i' type='hidden' value='$type Delivery'/>
    <input name='item_quantity_$i' type='hidden' value='1'/>
    <input name='item_price_$i' type='hidden' value='$price' />
    <input name='item_currency_$i' type='hidden' value='GBP'/>";
	
	$pp .= "<input type='hidden' name='item_name_$i' value='$type Delivery' />
    <input type='hidden' name='amount_$i' value='$price' />
    <input type='hidden' name='quantity_$i' value='1' />";
	
	$i++;
	}

    $gc .= "<input name=\"_charset_\" type=\"hidden\" value=\"utf-8\"/>
    <input alt=\"\" src=\"https://checkout.google.com/buttons/buy.gif?merchant_id=504267268818759&amp;w=117&amp;h=48&amp;style=white&amp;variant=text&amp;loc=en_US\" type=\"image\"/>
</form>";

	$pp .= "<input type='image' src='https://www.paypal.com/en_US/i/btn/btn_buynow_LG.gif' name='submit' alt='Make payments with PayPal - it's fast, free and secure!'>
</form>";

echo $gc;
echo $pp;
echo "</td>
</tr></table>";
?>
</div>
</body>
</html>