
<?php
	$hoten;
	$ho;
	$hodem;
	$tendem;
	$ten;
	if (isset($_POST['tach']) && isset($_POST['hoten'])){
		$hoten = trim($_POST['hoten']);
		$split_string = explode(" ", $hoten);
		$ho = array_shift($split_string);
		$ten = array_pop($split_string);
		$tendem = implode(" ",$split_string);
		
		
	}
?>
<html>
<head>
	<title> Tách tên </title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
</head>
<body>
<form method = "POST" action="<?=$PHP_SELF ?>">
<table>
<tr>
<td> Họ và tên </td>
<td><input type='text' value="<?= $hoten ?>" name='hoten'/></td>
</tr>
<tr>
<td>Họ</td>
<td><input type="text" value="<?= $ho ?>" /></td>
</tr>
<tr>
<td>Tên đệm</td>
<td><input type="text" value="<?= $tendem ?>" /></td>
</tr>
<tr>
<td>Tên</td>
<td><input type="text" value="<?= $ten ?>" /></td>
</tr>
<tr>
<td colspan="2"  align="center"><input type="submit" value="Tách họ và tên" name='tach'/></td>
</tr>
</table>
</form>
</body>
</html>
