<?php
	if (is_numeric($_POST['start']) && is_numeric($_POST['end'])){
		$startTime = $_POST['start'];
		$endTime = $_POST['end'];
		$total ;
		$errorTime = false;
		if ($startTime < 10 || $startTime > 24){
			$errorTime = true;
		}
		if ($endTime > 24 || $endTime < 10) {
			$errorTime = true;
		}
		if ($startTime > $endTime)
			$errorTime = true;
		if ($errorTime)
			$total = "";
		else
		if ($endTime > 17){
			if ($startTime > 17)
				$total = ($endTime - $startTime) * 45000;
			else
				$total = ($endTime - 17)* 45000 + (17-$startTime) * 20000;
		}
		else
			$total = ($endTime - $startTime) * 20000;
	}
	else $total = "";
?>
<!DOCTYPE html>
<html>

<head>
	<title> Tính tiền </title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
</head>
<body>
	<form action="<?= $PHP_SELF ?>" method="POST">
	<table>
	<tr>
		<td>Giờ bắt đầu:</td>
		<td><input type='text' name='start' <?php if(isset($startTime)) echo "value='$startTime'"; ?>/>(h)</td>
	</tr>
	<tr>
		<td>Giờ kết thúc:</td>
		<td><input type='text' name='end'  <?php if(isset($endTime)) echo "value='$endTime'"; ?> />(h)</td>
	</tr>
	<tr>
		<td>Tiền thanh toán: </td>
	<?php
		echo "<td><input type='text' name='total' value='$total'/>(VND)</td>";
	?>
	</tr>
	<tr >
		<td colspan='2' align='center'><input type='submit' value='Tinh tien' /></td>
	</tr>
	</table>
	</form>
	<div id='info' style='color: red;'>
		<?php if ($errorTime == true) echo "Vui long kiem tra lai thoi gian"; ?>
	</div>
</body>
</html>
