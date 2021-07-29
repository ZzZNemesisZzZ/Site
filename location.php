<?php
$string = [];
$name = [];
$price = [];
$warning = NULL;
$file = fopen('orders.txt', 'a+');
while (!feof($file))
{
	$string[] = fgets($file);
}
fseek($file,0,0);
$file3 = fopen('prices.txt', 'a+');
for ($i = 0; $i < count($string); $i++)
{
	fseek($file3,0,0);
	$a = $string[$i];
	for ($j = 1; $j < $a; $j++)
	{
		fgets($file3);
	}
	$price[$i] = fgets($file3);
}
fclose($file3);
fclose($file);
$amounts = [];
foreach ($_POST['qty'] as $i)
{
	if (count($_POST['qty'])-1 == count($amounts))
	{
		$amounts[] = $i;
	}
	else
	{
		$amounts[] = $i."\r\n";
	}
}
$qty1 = file('qty.txt');
$qty2 = fopen('qty.txt', 'a+');
fseek($qty2,0,0);
file_put_contents('qty.txt', $amounts);
fclose($qty2);
$total_price = 0;
for ($i = 0; $i < count($string); $i++)
{
	$total_price += (int)$price[$i] * (int)$amounts[$i];
}
$code = file('codes.txt');
for ($i = 0; $i < count($code); $i++)
{
	$code[$i] = trim($code[$i]);
}
if ($_POST['code'] != NULL)
{
	if ($_POST['code'] == $code[0] and $total_price >=3000)
	{
		$total_price = $total_price * 0.75;
	}
	else if ($_POST['code'] == $code[1])
	{
		for ($i = 0; $i < count($string); $i++)
		{
			if ($string[$i] == 16 and $amounts[$i] == 2)
			{
				$total_price = $total_price - (int)$price[$i] * (int)$amounts[$i] * 0.2;
			}
		}
	}
	else
	{
		$warning = 'Вы ввели неправильный промокод или ваш заказ не соотвестувет необходимым условиям для примененния промокода';
	}
}
if ($total_price < 475)
{
	$warning = 'Недостаточная сумма заказа. Минимальная сумма заказа составляет 475 ₽ с учетом скидок.';
}
$details = fopen ('details.txt', 'a+');
for ($i = 0; $i < count($string); $i++)
{
	if ($string[$i] == 1)
	{
		for ($j = 1; $j <= 2; $j++)
		{
			fwrite($details, $_POST['pizza'.$j]."\r\n");
		}
		fwrite($details, $_POST['snack1']."\r\n");
	}
	else if ($string[$i] == 2)
	{
		fwrite($details, $_POST['pizza3']."\r\n");
		for ($j = 2; $j <= 3; $j++)
		{
			fwrite($details, $_POST['snack'.$j]."\r\n");
		}
	}
	else if ($string[$i] == 3)
	{
		for ($j = 4; $j <= 6; $j++)
		{
			fwrite($details, $_POST['pizza'.$j]."\r\n");
		}
	}
	else if ($string[$i] == 4)
	{
		fwrite($details, $_POST['snack4']."\r\n");
		fwrite($details, $_POST['drink1']."\r\n");
	}
	else if ($string[$i] == 5)
	{
		for ($j = 7; $j <= 8; $j++)
		{
			fwrite($details, $_POST['pizza'.$j]."\r\n");
		}
		fwrite ($details, $_POST['drink2']."\r\n");
	}
	else if ($string[$i] == 6)
	{
		for ($j = 9; $j <= 13; $j++)
		{
			fwrite($details, $_POST['pizza'.$j]."\r\n");
		}
	}
	else if ($string[$i] == 7)
	{
		for ($j = 14; $j <= 20; $j++)
		{
			fwrite($details, $_POST['pizza'.$j]."\r\n");
		}
	}
	else if ($string[$i] == 8)
	{
		for ($j = 21; $j <= 22; $j++)
		{
			fwrite($details, $_POST['pizza'.$j]."\r\n");
		}
	}
}
?>
<html>
<head>
<title>
Dodo Pizza Beta
</title>
<meta charset = "utf-8">
<link = rel = "stylesheet" type = "text/css" href = "css/location.css">
</head>
<body>
<div id = "core">
<div id = "head">
<a href = "main.html"><img id = "logo" src = "img/logo.png" width = 185px height = 70%></a>
<p id = "h1">Доставка пиццы<font color = orange> Волгоград</font></p>
</div>
<?php
if ($warning != NULL)
{
	echo "<p align = center id = 'h4'>$warning</p>
	<div id = 'sub_button4'><a id = 'choice2' href = 'cart.php'>К корзине</a></div>";
}
else
{
	echo "<div id = 'list'>
	<p id = 'h3'>Стоимость вашего заказа<br> с учетом скидок составляет: $total_price ₽</p>
	<p id = 'h3'>Куда доставить?</p>
	<div id = 'menu'>
	<ul>
	<li id = 'li3'><a id = 'main_menu' href = 'delivery.html' target = 'frame'>Доставка</a></li>
	<li id = 'li3'><a id = 'main_menu' href = 'pickup.html' target = 'frame'>Самовывоз</a></li>
	</ul>
	</div>
	<iframe id = 'new_frame' name = 'frame' src = 'delivery.html' scrolling = 'no' height = 100% width = 100%></iframe>
	<div id = 'sub_button3'><a id = 'choice' href = 'cart.php'>Назад</a></div>
	</div>
	</div>
	</div>";
}
?>
</body>
</html>