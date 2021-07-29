<?php
$a = 0;
$warning = '';
if ($_POST['1'] != '')
{
	$a = $_POST['1'];
	$file = fopen('orders.txt', 'a+');
	fseek($file,0,0);
	while (!feof($file))
	{
		if (fgets($file) == $a)
		{
			$warning = "Данный продукт уже есть в вашей корзине. Для увеличения количества используйте корзину";
			goto end;
		}
	}
	if ($a != 0)
	{
		$file = fopen('orders.txt', 'a+');
		fseek($file,0,0);
		if (fgets($file) == '')
		{
			fwrite($file, $a);
		}
		else
		{
			fseek($file,0,2);
			fwrite($file, "\r\n".$a);
		}
	}
	end: fclose($file);
}
?>
<html>
<head>
<title>
Dodo Pizza Beta
</title>
<meta charset = "utf-8">
<link = rel = "stylesheet" type = "text/css" href = "css/confirm.css">
</head>
<body>
<div id = "core">
<div id = "head">
<a href = "main.html"><img id = "logo" src = "img/logo.png" width = 185px height = 70%></a>
<p id = "h1">Доставка пиццы<font color = orange> Волгоград</font></p>
</div>
<div id = "list">
<?php
if ($warning == '')
{
	echo "<p align = center id = 'h2'>Успешно добавлено в корзину!</p>";
}
else
{
	echo "<p align = center id = 'h2'>$warning</p>";
}
?>
<div id = 'stock1'>
<div id = 'sub_button'><a id = 'choice' href = 'cart.php'>К корзине</a></div>
</div>
<div id = 'stock2'>
<div id = 'sub_button2'><a id = 'choice' href = 'main.html'>Вернуться в меню</a></div>
</div>
</div>
</div>
</body>
</html>