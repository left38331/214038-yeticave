<?php 

require_once('mysql_helper.php');

// функция подключения шаблона и параметров
function renderTemplate($path, $array) {
	if (file_exists($path)) {
		ob_start('ob_gzhandler');
		extract($array, EXTR_SKIP);
		require_once($path);
		$html = ob_get_clean();
		return $html;
	} else {
		return "";
	}
}

// функция вывода времени в формате ЧЧ:ММ, с учетом добавления 0 перед цифрой, если цифра меньше 10
function time_add_zero($start, $end) {
	$remaining_seconds = $end - $start;
	$remaining_hours_integer = floor($remaining_seconds / 3600);
	$remaining_minusts_integer = floor($remaining_seconds / 60) - $remaining_hours_integer * 60;
	if ($remaining_hours_integer < 10) {
		$remaining_hours_integer = '0' . $remaining_hours_integer;
	}
	if ($remaining_minusts_integer < 10) {
		$remaining_minusts_integer = '0' . $remaining_minusts_integer;
	}
	return $remaining_hours_integer . ':' . $remaining_minusts_integer;
}

// функция проверки мыла, в списке доступных
function searchUserByEmail($email, $users)
{
	$result = null;
	foreach ($users as $user) {
		if ($user['email'] == $email) {
			$result = $user;
			break;
		}
	}
	return $result;
}

// функция  выводы времени 
function format_time($array_time) {
	$time_now = strtotime('now');
	$diff_time = $time_now - $array_time;
	if ($diff_time > 86400) {
		$time_lost = date("m.d.y в H:i", $array_time);
	}
	else if ($diff_time < 3600) {
		$time_lost = floor($diff_time/60) . " минут назад";
	}
	else {
		$time_lost = floor($diff_time/3600) . " часов назад";
	}
	return $time_lost;
}


// функция получения данных, выполнения запроса SELECT
function select_data($con, $sql, $data = []) {
	$rows = [];
	$stmt = db_get_prepare_stmt($con, $sql, $data);
	
	if ($stmt) {
		$execute = mysqli_stmt_execute($stmt);
		if ($execute) {
			$result = mysqli_stmt_get_result($stmt);
			if ($result) {
				$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
			}
		}
	}
	return $rows;
}

// функция вставки данных, выполнения запроса INSERT
function insert_data($con, $table, $data) {
	
	$column_names = [];
	$values = [];
	$count_values = [];
	
	foreach ($data as $key => $value) {
		$column_names[] = $key;
		$values[] =$value;
		$count_values[] = '?';
	}
	
	// записываем элементы массива в строку через запятую
	$count_values_string = implode(",", $count_values);
	$column_names_string = implode(",", $column_names);
	
	$sql = 'INSERT INTO' . $table . '(' . $column_names . ')  VALUES  (' . $count_values . ')' ;
	
	$stmt = db_get_prepare_stmt($con, $sql, $values);
	
	if ($stmt) {
		$execute = mysqli_stmt_execute($stmt);
		if ($execute) {
			$last_id = mysqli_insert_id($con);
			return $last_id;
		}
	} esle {
		return false;
	}
}

// функция произвольного запроса, кроме SELECT и INSERT
function query_execute($con, $sql, $data = []) {
	$stmt = db_get_prepare_stmt($con, $sql, $data);
	
	if ($stmt) {
		$execute = mysqli_stmt_execute($stmt);
		if ($execute) {
			return true;
		}
	}
	return false;
}
?>