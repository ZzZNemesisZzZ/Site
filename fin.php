<?php
$file2 = fopen('num.txt', 'a+');
$file = file('num.txt');
$num = (int)$file[count($file)-1]+1;
$string = file('orders.txt');
$fname = fopen('names.txt', 'a+');
$name = [];
$fdet = fopen('details.txt', 'a+');
$details = file('details.txt');
for ($i = 0; $i < count($string); $i++)
{
	fseek($fname,0,0);
	$a = $string[$i];
	for ($j = 1;$j < $a; $j++)
	{
		fgets($fname);
	}
	$name[$i] = trim(fgets($fname));
}
fwrite($file2,$num."\r\n");
fclose($file2);
$qty = file('qty.txt');
if ($_POST['type'] == 1)
{
	$info1 = fopen('delivery.txt', 'a+');
	fwrite($info1, "Заказ№ ".$num."\r\n");
	for($i = 0; $i < count($string); $i++)
	{
		if ($string[$i] == 1)
		{
			if ($i == count($string)-1)
			{
				fwrite($info1, $name[$i]." x".$qty[$i]."\r\n");
			}
			else
			{
				fwrite($info1, $name[$i]." x".$qty[$i]);
			}
			for ($j = 0; $j < 3; $j++)
			{
				fwrite($info1, $details[$j]);
			}
		}
		else if ($string[$i] == 2)
		{
			if ($i == count($string)-1)
			{
				fwrite($info1, $name[$i]." x".$qty[$i]."\r\n");
			}
			else
			{
				fwrite($info1, $name[$i]." x".$qty[$i]);
			}
			for ($j = 0; $j < 3; $j++)
			{
				fwrite($info1, $details[$j]);
			}
		}
		else if ($string[$i] == 3)
		{
			if ($i == count($string)-1)
			{
				fwrite($info1, $name[$i]." x".$qty[$i]."\r\n");
			}
			else
			{
				fwrite($info1, $name[$i]." x".$qty[$i]);
			}
			for ($j = 0; $j < 3; $j++)
			{
				fwrite($info1, $details[$j]);
			}
		}
		else if ($string[$i] == 4)
		{
			if ($i == count($string)-1)
			{
				fwrite($info1, $name[$i]." x".$qty[$i]."\r\n");
			}
			else
			{
				fwrite($info1, $name[$i]." x".$qty[$i]);
			}
			for ($j = 0; $j < 2; $j++)
			{
				fwrite($info1, $details[$j]);
			}
		}
		else if ($string[$i] == 5)
		{
			if ($i == count($string)-1)
			{
				fwrite($info1, $name[$i]." x".$qty[$i]."\r\n");
			}
			else
			{
				fwrite($info1, $name[$i]." x".$qty[$i]);
			}
			for ($j = 0; $j < 3; $j++)
			{
				fwrite($info1, $details[$j]);
			}
		}
		else if ($string[$i] == 6)
		{
			if ($i == count($string)-1)
			{
				fwrite($info1, $name[$i]." x".$qty[$i]."\r\n");
			}
			else
			{
				fwrite($info1, $name[$i]." x".$qty[$i]);
			}
			for ($j = 0; $j < 5; $j++)
			{
				fwrite($info1, $details[$j]);
			}
		}
		else if ($string[$i] == 7)
		{
			if ($i == count($string)-1)
			{
				fwrite($info1, $name[$i]." x".$qty[$i]."\r\n");
			}
			else
			{
				fwrite($info1, $name[$i]." x".$qty[$i]);
			}
			for ($j = 0; $j < 7; $j++)
			{
				fwrite($info1, $details[$j]);
			}
		}
		else if ($string[$i] == 8)
		{
			if ($i == count($string)-1)
			{
				fwrite($info1, $name[$i]." x".$qty[$i]."\r\n");
			}
			else
			{
				fwrite($info1, $name[$i]." x".$qty[$i]);
			}
			for ($j = 0; $j < 2; $j++)
			{
				fwrite($info1, $details[$j]);
			}
		}
		else
		{
			fwrite($info1, $name[$i]." x".$qty[$i]);
		}
	}
	for ($i = 0; $i < 7; $i++)
	{
		fwrite($info1, $_POST[$i]."\r\n");
	}
	fclose($info1);
}
else if ($_POST['type'] == 2)
{
	$info2 = fopen('pickup.txt', 'a+');
	fwrite($info2, "Заказ№ ".$num."\r\n");
	for($i = 0; $i < count($string); $i++)
	{
		if ($string[$i] == 1)
		{
			if ($i == count($string)-1)
			{
				fwrite($info2, $name[$i]." x".$qty[$i]."\r\n");
			}
			else
			{
				fwrite($info2, $name[$i]." x".$qty[$i]);
			}
			for ($j = 0; $j < 3; $j++)
			{
				fwrite($info2, $details[$j]);
			}
		}
		else if ($string[$i] == 2)
		{
			if ($i == count($string)-1)
			{
				fwrite($info2, $name[$i]." x".$qty[$i]."\r\n");
			}
			else
			{
				fwrite($info2, $name[$i]." x".$qty[$i]);
			}
			for ($j = 0; $j < 3; $j++)
			{
				fwrite($info2, $details[$j]);
			}
		}
		else if ($string[$i] == 3)
		{
			if ($i == count($string)-1)
			{
				fwrite($info2, $name[$i]." x".$qty[$i]."\r\n");
			}
			else
			{
				fwrite($info2, $name[$i]." x".$qty[$i]);
			}
			for ($j = 0; $j < 3; $j++)
			{
				fwrite($info2, $details[$j]);
			}
		}
		else if ($string[$i] == 4)
		{
			if ($i == count($string)-1)
			{
				fwrite($info2, $name[$i]." x".$qty[$i]."\r\n");
			}
			else
			{
				fwrite($info2, $name[$i]." x".$qty[$i]);
			}
			for ($j = 0; $j < 2; $j++)
			{
				fwrite($info2, $details[$j]);
			}
		}
		else if ($string[$i] == 5)
		{
			if ($i == count($string)-1)
			{
				fwrite($info2, $name[$i]." x".$qty[$i]."\r\n");
			}
			else
			{
				fwrite($info2, $name[$i]." x".$qty[$i]);
			}
			for ($j = 0; $j < 3; $j++)
			{
				fwrite($info2, $details[$j]);
			}
		}
		else if ($string[$i] == 6)
		{
			if ($i == count($string)-1)
			{
				fwrite($info2, $name[$i]." x".$qty[$i]."\r\n");
			}
			else
			{
				fwrite($info2, $name[$i]." x".$qty[$i]);
			}
			for ($j = 0; $j < 5; $j++)
			{
				fwrite($info2, $details[$j]);
			}
		}
		else if ($string[$i] == 7)
		{
			if ($i == count($string)-1)
			{
				fwrite($info2, $name[$i]." x".$qty[$i]."\r\n");
			}
			else
			{
				fwrite($info2, $name[$i]." x".$qty[$i]);
			}
			for ($j = 0; $j < 7; $j++)
			{
				fwrite($info2, $details[$j]);
			}
		}
		else if ($string[$i] == 8)
		{
			if ($i == count($string)-1)
			{
				fwrite($info2, $name[$i]." x".$qty[$i]."\r\n");
			}
			else
			{
				fwrite($info2, $name[$i]." x".$qty[$i]);
			}
			for ($j = 0; $j < 2; $j++)
			{
				fwrite($info2, $details[$j]);
			}
		}
		else
		{
			fwrite($info2, $name[$i]." x".$qty[$i]);
		}
	}
	for ($i = 0; $i < 2; $i++)
	{
		fwrite($info2, $_POST[$i]."\r\n");
	}
	fclose($info2);
}
?>
<html>
<head>
<title>
Dodo Pizza Beta
</title>
<meta charset = "utf-8">
<link = rel = "stylesheet" type = "text/css" href = "css/fin.css">
</style>
</head>
<body>
<div id = "core">
<div id = "head">
<a href = "main.html"><img id = "logo" src = "img/logo.png" width = 185px height = 70%></a>
<p id = "h1">Доставка пиццы<font color = orange> Волгоград</font></p>
</div>
<?php
if ($_POST['type'] == 1)
{
	echo "<p id = 'h3'>Ваш заказ принят. Курьер доставит его в течение часа.</p>";
}
else if ($_POST['type'] == 2)
{
	echo "<p id = 'h3'>Ваш заказ принят. Номер вашего заказа $num. <br>Скажите его на пункте самовывоза.</p>";
}
file_put_contents('orders.txt','');
file_put_contents('qty.txt','');
?>
</div>
</body>
</html>