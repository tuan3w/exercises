<?php
	$num = "";
	function digit2Char($dig){
		switch ($dig) {
			case '0':
				return "không";
				break;
			case 1:
				return "Một";
				break;
			case 2:
				return "Hai";
				break;
			case 3:
				return "Ba";
				break;
			case 4:
				return "Bốn";
				break;
			case 5:
				return "Năm";
				break;
			case 6:
				return "Sáu";
				break;
			case 7:
				return "Bảy";
				break;
			case 8:
				return "Tám";
				break;
			case 9:
				return "Chín";
				break;
		}
	}

	function num2String($num){
		//return "Test";
		if ($num < 10)
			return digit2Char($num);
		else if ($num <100){
			if ($num == 10)
				return "Mười";
			if ($num % 10 == 0)
				return digit2Char(floor($num/10))." Mươi";
			else if ( floor($num /10) ==1)
				return "Mười " . digit2Char($num %10);
				return digit2Char(floor($num / 10))." Mươi ".digit2Char($num % 10);
		}
		else {
			$dv = $num  %10;
			$chuc = floor(($num % 100)/10);
			$tram = floor( $num / 100);

			if ($chuc == 0) {
				if ($dv == 0)
					return digit2Char($tram). " Trăm";
				else
					return digit2Char($tram). " Trăm Linh ". digit2Char($dv);
			}
			else if ($dv == 0) 
				return digit2Char($tram). " Trăm ". digit2Char($chuc). " Mươi";
			else if ($chuc == 1)
				return digit2Char($tram). " Trăm Mười ". digit2Char($dv);
			else
				return digit2Char($tram). " Trăm ". digit2Char($chuc). " Mươi ". digit2Char($dv);
		}
	}

	if (isset($_POST['read_num']) && isset($_POST['num'])){
		$num = $_POST['num'];
		echo is_float($num);
		if ( $num > 999 || $num < 0 || !is_numeric($num) || strval(intval($num)) != $num ){
			$error = true;
			$text = "";
		}else {
			$error = false;
			$text = num2String($num);
		}
	}else {
		$error = false;
		$text = "";
	}
?>
<html>
<head>
	<title> Đọc số </title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
</head>
<body>
<form action="<?= $PHP_SELF; ?>" method="POST">
	<table>
		<tr>
			<td>Nhập số (0->999)</td>
			<td><input type='text'  name='num'  value="<?= $num ?>"/></td>
			<td><input type='submit' value='Đọc số' name='read_num' /></td>
		</tr>
		<tr>
			<td> Bằng chữ </td>
			<td> <input type='text' value="<?= $text ?>"/> </td>
		</tr>
	</table>
</form>
<div id='info' style='color: red;'>
	<?php if ($error) echo "Vui lòng nhập sô nguyên từ 0->999" ?> 
</div>
</body>
</html>
