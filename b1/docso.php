<?php

	function digit2Char($dig){
		switch ($dig) {
			case '0':
				return "khong";
				break;
			case 1:
				return "Mot";
				break;
			case 2:
				return "Hai";
				break;
			case 3:
				return "Ba";
				break;
			case 4:
				return "Bon";
				break;
			case 5:
				return "Nam";
				break;
			case 6:
				return "Sau";
				break;
			case 7:
				return "Bay";
				break;
			case 8:
				return "Tam";
				break;
			case 9:
				return "Chin";
				break;
		}
	}

	function num2String($num){
		//return "Test";
		if ($num < 10)
			return digit2Char($num);
		else if ($num <100){
			if ($num == 10)
				return " Muoi";
			if ($num % 10 == 0)
				return digit2Char(floor($num/10))." Muoi";
			else if ( floor($num /10) ==1)
				return "Muoi " . digit2Char($num %10);
				return digit2Char(floor($num / 10))." Muoi ".digit2Char($num % 10);
		}
		else {
			$dv = $num  %10;
			$chuc = floor(($num % 100)/10);
			$tram = floor( $num / 100);

			if ($chuc == 0) {
				if ($dv == 0)
					return digit2Char($tram). " Tram";
				else
					return digit2Char($tram). " Tram Linh ". digit2Char($dv);
			}
			else if ($dv == 0) 
				return digit2Char($tram). " Tram ". digit2Char($chuc). " Muoi";
			else if ($chuc == 1)
				return digit2Char($tram). " Tram Muoi ". digit2Char($dv);
			else
				return digit2Char($tram). " Tram ". digit2Char($chuc). " Muoi ". digit2Char($dv);
		}
	}

	if (isset($_POST['read_num'])){
		$num = $_POST['num'];
		if (!is_numeric($num) || $num > 999 || $num < 0 || is_integer($num)){
			$error = true;
			$text = "";
		}else {
			$error = false;
			$text = num2String($num);
		}
	}else {
		echo "error";
		$error = false;
		$text = "";
	}
?>

<form action="<?= $PHP_SELF; ?>" method="POST">
	<table>
		<tr>
			<td>Nhap so (0->999)</td>
			<td><input type='text' value='' name='num' /></td>
			<td><input type='submit' value='Doc so' name='read_num'/></td>
		</tr>
		<tr>
			<td> Bang chu </td>
			<td> <input type='text' value="<?= $text ?>"/> </td>
		</tr>
	</table>
</form>
<div id='info' style='color: red;'>
	<?php if ($error) echo "Vui long nhap lai so 0->999" ?>
</div>