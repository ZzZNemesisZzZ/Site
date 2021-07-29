<?php
$line = [];
for ($i = 0; $i < 2; $i++)
{
	$line[$i] = $_POST[$i];
}
$file = fopen('feedback.txt', 'a+');
for ($i = 0; $i < 2; $i++)
{
	fwrite($file, $line[$i]."\r\n");
}
fclose($file);
?>
<html>
<head>
<title>
Dodo Pizza Beta
</title>
<meta charset = "utf-8">
<link = rel = "stylesheet" type = "text/css" href = "css/review.css">
</head>
<body>
<div id = "core">
<div id = "head">
<a href = "main.html"><img id = "logo" src = "img/logo.png" width = 185px height = 70%></a>
<p id = "h1">Доставка пиццы<font color = orange> Волгоград</font></p>
</div>
<div id = "list">
<p id = "h2">Ваш отзыв был успешно отправлен. Спасибо, что остаетесь с нами!</p>
<div id = 'sub_button'><a id = 'choice' href = 'main.html'>В главное меню</a></div>
</div>
</div>
</body>
</html>