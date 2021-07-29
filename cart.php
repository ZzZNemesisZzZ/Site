<html>
<head>
<title>
Dodo Pizza Beta
</title>
<meta charset = "utf-8">
<link = rel = "stylesheet" type = "text/css" href = "css/cart.css">
</head>
<body>
<div id = "core">
<div id = "head">
<a href = "main.html"><img id = "logo" src = "img/logo.png" width = 185px height = 70%></a>
<p id = "h1">Доставка пиццы<font color = orange> Волгоград</font></p>
<div id = "nav">
<ul>
<li id = "li2"><a id = "main_menu_combo" href = "main.html#combo"> Комбо</a></li>
<li id = "li2"><a id = "main_menu" href = "main.html#pizza"> Пиццы</a></li>
<li id = "li2"><a id = "main_menu" href = "main.html#snacks"> Закуски</a></li>
<li id = "li2"><a id = "main_menu" href = "main.html#desserts"> Дессерты</a></li>
<li id = "li2"><a id = "main_menu" href = "main.html#drinks"> Напитки</a></li>
<li id = "li2"><a id = "main_menu" href = "promo.html"> Акции</a></li>
<li id = "li2"><a id = "main_menu" href = "contacts.html"> Контакты</a></li>
<li id = "li2"><a id = "main_menu" href = "about_us.html"> О нас</a></li>
</ul>
</div>
</div>
<div id = "list">
<?php
file_put_contents('details.txt','');
if (isset($_POST['del']) == true)
{
	$del = [];
	foreach ($_POST['del'] as $i)
	{
		$del[] = $i;
	}
	$temp_file = file('orders.txt');
	for ($i = 0; $i < count($del); $i++)
	{
		unset($temp_file[$del[$i]]);
	}
	file_put_contents('orders.txt',implode("",$temp_file));
	$temp_qty = file('qty.txt');
	for ($i = 0; $i < count($del); $i++)
	{
		unset($temp_qty[$del[$i]]);
	}
	file_put_contents('qty.txt',implode('',$temp_qty));
	foreach ($del as $i)
	{
		$GLOBALS['del'] = NULL;
	}
	$replace = ["\r\n","\r","\n"," ","<br>"];
	$smth = file('orders.txt');
	if (count($smth) > 0)
	{
	 $smth[count($smth)-1] = str_replace($replace,'',$smth[count($smth)-1]);
	}
	file_put_contents('orders.txt',$smth);
	$smth = file('qty.txt');
	if (count($smth) > 0)
	{
		$smth[count($smth)-1] = str_replace($replace,'',$smth[count($smth)-1]);
	}
	file_put_contents('qty.txt',$smth);
}
$string = [];
$name = [];
$price = [];
$file = fopen('orders.txt', 'a+');
while (!feof($file))
{
	$string[] = fgets($file);
}
fseek($file,0,0);
$file2 = fopen('names.txt', 'a+');
for ($i = 0; $i < count($string); $i++)
{
	fseek($file2,0,0);
	$a = $string[$i];
	for ($j = 1;$j < $a; $j++)
	{
		fgets($file2);
	}
	$name[$i] = fgets($file2);
}
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
$qty = file('qty.txt');
while (count($qty) < count($string))
{
	$qty[] = 1;
}
fclose($file3);
fclose($file2);
fclose($file);
if ($string[0] != '')
{
	echo "<table border = 1 cellpadding = 10 width = 100% rules = 'rows'";
	for ($i = 0; $i < count($string); $i++)
	{
		echo "<tr>";
		echo "<td width = 100><img src = 'img/cart/img$string[$i].jpg' width = 100 height = 100></td>";
		echo "<td><p id = 'description'>$name[$i]</p>";
		echo "<form action = 'location.php' method = 'POST'>";
		if ($string[$i] == 1)
		{
			echo "<select name = 'pizza1'>
				<option disabled>Пицца#1</option>
				<option value = 'Деревенская'>Деревенская</option>
				<option value = 'Аррива'>Аррива!</option>
				<option value = '3Пепперони Фреш с томатами'>Пепперони Фреш с томатами</option>
				<option value = 'Пепперони Фреш с перцем'>Пепперони Фреш с перцем</option>
				<option value = 'Пепперони'>Пепперони</option>
				</select>
				<p></p>
				<select name = 'pizza2'>
				<option disabled>Пицца#2</option>
				<option value = 'Деревенская'>Деревенская</option>
				<option value = 'Аррива!'>Аррива!</option>
				<option value = 'Пепперони Фреш с томатами'>Пепперони Фреш с томатами</option>
				<option value = 'Пепперони Фреш с перцем'>Пепперони Фреш с перцем</option>
				<option value = 'Пепперони'>Пепперони</option>
				</select>
				<p></p>
				<select name = 'snack1'>
				<option disabled>Закуска</option>
				<option value = 'Картофель из печи большой'>Картофель из печи большой</option>
				<option value = 'Картофельные оладьи, 8 шт'>Картофельные оладьи, 8 шт</option>
				</select>";
		}
		else if ($string[$i] == 2)
		{
			echo "<select name = 'pizza3'>
				<option disabled>Пицца</option>
				<option value = 'Деревенская'>Деревенская</option>
				<option value = 'Аррива!'>Аррива!</option>
				<option value = 'Пепперони Фреш с томатами'>Пепперони Фреш с томатами</option>
				<option value = 'Пепперони Фреш с перцем'>Пепперони Фреш с перцем</option>
				<option value = 'Пепперони'>Пепперони</option>
				</select>
				<p></p>
				<select name = 'snack2'>
				<option disabled>Закуска#1</option>
				<option value = 'Картофель из печи большой'>Картофель из печи большой</option>
				<option value = 'Картофельные оладьи, 8 шт'>Картофельные оладьи, 8 шт</option>
				</select>
				<p></p>
				<select name = 'snack3'>
				<option disabled>Закуска#2</option>
				<option value = 'Картофель из печи большой'>Картофель из печи большой</option>
				<option value = 'Картофельные оладьи, 8 шт'>Картофельные оладьи, 8 шт</option>
				</select>";
		}
		else if ($string[$i] == 3)
		{
			echo "<select name = 'pizza4'>
				<option disabled>Пицца#1</option>
				<option value = 'Деревенская'>Деревенская</option>
				<option value = 'Аррива!'>Аррива!</option>
				<option value = 'Пепперони Фреш с томатами'>Пепперони Фреш с томатами</option>
				<option value = 'Пепперони Фреш с перцем'>Пепперони Фреш с перцем</option>
				<option value = 'Пепперони'>Пепперони</option>
				</select>
				<p></p>
				<select name = 'pizza5'>
				<option disabled>Пицца#2</option>
				<option value = 'Деревенская'>Деревенская</option>
				<option value = 'Аррива!'>Аррива!</option>
				<option value = 'Пепперони Фреш с томатами'>Пепперони Фреш с томатами</option>
				<option value = 'Пепперони Фреш с перцем'>Пепперони Фреш с перцем</option>
				<option value = 'Пепперони'>Пепперони</option>
				</select>
				<p></p>
				<select name = 'pizza6'>
				<option disabled>Пицца#3</option>
				<option value = 'Деревенская'>Деревенская</option>
				<option value = 'Аррива!'>Аррива!</option>
				<option value = 'Пепперони Фреш с томатами'>Пепперони Фреш с томатами</option>
				<option value = 'Пепперони Фреш с перцем'>Пепперони Фреш с перцем</option>
				<option value = 'Пепперони'>Пепперони</option>
				</select>";
		}
		else if ($string[$i] == 4)
		{
			echo "<select name = 'snack4'>
				<option disabled>Закуска</option>
				<option value = 'Картофель из печи большой'>Картофель из печи большой</option>
				<option value = 'Картофельные оладьи, 8 шт'>Картофельные оладьи, 8 шт</option>
				</select>
				<p></p>
				<select name = 'drink1'>
				<option disabled>Напиток</option>
				<option value = 'Fuzetea Черный с лимоном и лемонграссом'>Fuzetea Черный с лимоном и лемонграссом</option>
				<option value = 'Fuzetea Зеленый с манго и ромашкой'>Fuzetea Зеленый с манго и ромашкой</option>
				<option value = 'FuzeTea Улун малина и мята'>FuzeTea Улун малина и мята</option>
				<option value = 'Добрый Pulpy Апельсин'>Добрый Pulpy Апельсин</option>
				</select>";
		}
		else if ($string[$i] == 5)
		{
			echo "<select name = 'pizza7'>
				<option disabled>Пицца#1</option>
				<option value = 'Деревенская'>Деревенская</option>
				<option value = 'Аррива!'>Аррива!</option>
				<option value = 'Пепперони Фреш с томатами'>Пепперони Фреш с томатами</option>
				<option value = 'Пепперони Фреш с перцем'>Пепперони Фреш с перцем</option>
				<option value = 'Пепперони'>Пепперони</option>
				</select>
				<p></p>
				<select name = 'pizza8'>
				<option disabled>Пицца#2</option>
				<option value = 'Деревенская'>Деревенская</option>
				<option value = 'Аррива!'>Аррива!</option>
				<option value = 'Пепперони Фреш с томатами'>Пепперони Фреш с томатами</option>
				<option value = 'Пепперони Фреш с перцем'>Пепперони Фреш с перцем</option>
				<option value = 'Пепперони'>Пепперони</option>
				</select>
				<p></p>
				<select name = 'drink2'>
				<option disabled>Напиток</option>
				<option value = 'Fuzetea Черный с лимоном и лемонграссом'>Fuzetea Черный с лимоном и лемонграссом</option>
				<option value = 'Fuzetea Зеленый с манго и ромашкой'>Fuzetea Зеленый с манго и ромашкой</option>
				<option value = 'FuzeTea Улун малина и мята'>FuzeTea Улун малина и мята</option>
				<option value = 'Добрый Pulpy Апельсин'>Добрый Pulpy Апельсин</option>
				</select>";
		}
		else if ($string[$i] == 6)
		{
			echo "<select name = 'pizza9'>
				<option disabled>Пицца#1</option>
				<option value = 'Деревенская'>Деревенская</option>
				<option value = 'Аррива!'>Аррива!</option>
				<option value = 'Пепперони Фреш с томатами'>Пепперони Фреш с томатами</option>
				<option value = 'Пепперони Фреш с перцем'>Пепперони Фреш с перцем</option>
				<option value = 'Пепперони'>Пепперони</option>
				</select>
				<p></p>
				<select name = 'pizza10'>
				<option disabled>Пицца#2</option>
				<option value = 'Деревенская'>Деревенская</option>
				<option value = 'Аррива!'>Аррива!</option>
				<option value = 'Пепперони Фреш с томатами'>Пепперони Фреш с томатами</option>
				<option value = 'Пепперони Фреш с перцем'>Пепперони Фреш с перцем</option>
				<option value = 'Пепперони'>Пепперони</option>
				</select>
				<p></p>
				<select name = 'pizza11'>
				<option disabled>Пицца#3</option>
				<option value = 'Деревенская'>Деревенская</option>
				<option value = 'Аррива!'>Аррива!</option>
				<option value = 'Пепперони Фреш с томатами'>Пепперони Фреш с томатами</option>
				<option value = 'Пепперони Фреш с перцем'>Пепперони Фреш с перцем</option>
				<option value = 'Пепперони'>Пепперони</option>
				</select>
				<p></p>
				<select name = 'pizza12'>
				<option disabled>Пицца#4</option>
				<option value = 'Деревенская'>Деревенская</option>
				<option value = 'Аррива!'>Аррива!</option>
				<option value = 'Пепперони Фреш с томатами'>Пепперони Фреш с томатами</option>
				<option value = 'Пепперони Фреш с перцем'>Пепперони Фреш с перцем</option>
				<option value = 'Пепперони'>Пепперони</option>
				</select>
				<p></p>
				<select name = 'pizza13'>
				<option disabled>Пицца#5</option>
				<option value = 'Деревенская'>Деревенская</option>
				<option value = 'Аррива!'>Аррива!</option>
				<option value = 'Пепперони Фреш с томатами'>Пепперони Фреш с томатами</option>
				<option value = 'Пепперони Фреш с перцем'>Пепперони Фреш с перцем</option>
				<option value = 'Пепперони'>Пепперони</option>
				</select>";
		}
		else if ($string[$i] == 7)
		{
			echo "<select name = 'pizza14'>
				<option disabled>Пицца#1</option>
				<option value = 'Деревенская'>Деревенская</option>
				<option value = 'Аррива!'>Аррива!</option>
				<option value = 'Пепперони Фреш с томатами'>Пепперони Фреш с томатами</option>
				<option value = 'Пепперони Фреш с перцем'>Пепперони Фреш с перцем</option>
				<option value = 'Пепперони'>Пепперони</option>
				</select>
				<p></p>
				<select name = 'pizza15'>
				<option disabled>Пицца#2</option>
				<option value = 'Деревенская'>Деревенская</option>
				<option value = 'Аррива!'>Аррива!</option>
				<option value = 'Пепперони Фреш с томатами'>Пепперони Фреш с томатами</option>
				<option value = 'Пепперони Фреш с перцем'>Пепперони Фреш с перцем</option>
				<option value = 'Пепперони'>Пепперони</option>
				</select>
				<p></p>
				<select name = 'pizza16'>
				<option disabled>Пицца#3</option>
				<option value = 'Деревенская'>Деревенская</option>
				<option value = 'Аррива!'>Аррива!</option>
				<option value = 'Пепперони Фреш с томатами'>Пепперони Фреш с томатами</option>
				<option value = 'Пепперони Фреш с перцем'>Пепперони Фреш с перцем</option>
				<option value = 'Пепперони'>Пепперони</option>
				</select>
				<p></p>
				<select name = 'pizza17'>
				<option disabled>Пицца#4</option>
				<option value = 'Деревенская'>Деревенская</option>
				<option value = 'Аррива!'>Аррива!</option>
				<option value = 'Пепперони Фреш с томатами'>Пепперони Фреш с томатами</option>
				<option value = 'Пепперони Фреш с перцем'>Пепперони Фреш с перцем</option>
				<option value = 'Пепперони'>Пепперони</option>
				</select>
				<p></p>
				<select name = 'pizza18'>
				<option disabled>Пицца#5</option>
				<option value = 'Деревенская'>Деревенская</option>
				<option value = 'Аррива!'>Аррива!</option>
				<option value = 'Пепперони Фреш с томатами'>Пепперони Фреш с томатами</option>
				<option value = 'Пепперони Фреш с перцем'>Пепперони Фреш с перцем</option>
				<option value = 'Пепперони'>Пепперони</option>
				</select>
				<p></p>
				<select name = 'pizza19'>
				<option disabled>Пицца#6</option>
				<option value = 'Деревенская'>Деревенская</option>
				<option value = 'Аррива!'>Аррива!</option>
				<option value = 'Пепперони Фреш с томатами'>Пепперони Фреш с томатами</option>
				<option value = 'Пепперони Фреш с перцем'>Пепперони Фреш с перцем</option>
				<option value = 'Пепперони'>Пепперони</option>
				</select>
				<p></p>
				<select name = 'pizza20'>
				<option disabled>Пицца#7</option>
				<option value = 'Деревенская'>Деревенская</option>
				<option value = 'Аррива!'>Аррива!</option>
				<option value = 'Пепперони Фреш с томатами'>Пепперони Фреш с томатами</option>
				<option value = 'Пепперони Фреш с перцем'>Пепперони Фреш с перцем</option>
				<option value = 'Пепперони'>Пепперони</option>
				</select>";
		}
		else if ($string[$i] == 8)
		{
			echo "<select name = 'pizza21'>
				<option disabled>Пицца#1</option>
				<option value = 'Деревенская'>Деревенская</option>
				<option value = 'Аррива!'>Аррива!</option>
				<option value = 'Пепперони Фреш с томатами'>Пепперони Фреш с томатами</option>
				<option value = 'Пепперони Фреш с перцем'>Пепперони Фреш с перцем</option>
				<option value = 'Пепперони'>Пепперони</option>
				</select>
				<p></p>
				<select name = 'pizza22'>
				<option disabled>Пицца#2</option>
				<option value = 'Деревенская'>Деревенская</option>
				<option value = 'Аррива!'>Аррива!</option>
				<option value = 'Пепперони Фреш с томатами'>Пепперони Фреш с томатами</option>
				<option value = 'Пепперони Фреш с перцем'>Пепперони Фреш с перцем</option>
				<option value = 'Пепперони'>Пепперони</option>
				</select>";
		}
		echo "<td>";
		echo "<input type = 'number' name = 'qty[$i]' min = 1 max = 99 step = 1 value = $qty[$i]></input>
			 <font id = 'description'>Количество</font></td>";
		echo "<td>
			 Цена за шт. $price[$i] ₽</td>";
	}
	echo "</table>";
	echo "<div id = 'promo'>
		 <p id = 'name'>Промокод
		 <input type = 'text' name = 'code'></input></p>
		 <input id = 'sub_button' type = 'submit' value = 'Подтвердить заказ'></input>
		 </form>
		 </div>
		 <form action = 'del.php' method = 'post'>
		 <input id = 'sub_button2' type = 'submit' value = 'Изменить заказ'></input>
		 </form>";
}
else
{
	echo "<p align = center id = 'h3'>Сейчас ваша корзина пуста. Используйте меню, чтобы добавить продукты в ваш заказ</p>";
}
?>
</div>
</div>
<div id = "bottom">
<a href = "https://vk.com/messed_up_k1d" id = "end">Created by</a>
<p id = "end">8-999-999-99-99</p>
<p id = "end">Звонок бесплатный</p>
</div>
</body>
</html>