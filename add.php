<?php
session_start();

require_once('functions.php');
require_once('data.php');



$class_form = 'form form--add-lot container';
$class_item_lot_name = 'form__item';
$class_item_message = 'form__item';
$class_item_lot_rate = 'form__item';
$class_item_lot_step = 'form__item';
$class_item_lot_date = 'form__item';
$error_text = '';

$class_form_cat = 'form__item';
$class_file = 'form__item form__item--file';

$name = $_POST['lot-name'];
$message = $_POST['message'];
$rate = $_POST['lot-rate'];
$step= $_POST['lot-step'];
$date= $_POST['lot-date'];

$selected_1 = '';
$selected_2 = '';
$selected_3 = '';
$selected_4 = '';
$selected_5 = '';
$selected_6 = '';
$selected_7 = '';

$category= $_POST['category'];

function validate_number($value) {
	return is_numeric($value);
}

$required = ['lot-name', 'message', 'lot-rate', 'lot-step', 'lot-date'];
$rules = ['lot-rate', 'lot-step'];
$errors = [];

// проверяем зарегистрирован ли пользователь, если "да" - то показываем ему страничку
if (isset($_SESSION['user'])) {
	$user = $_SESSION['user'];
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		foreach ($_POST as $key => $value) {
			if (in_array($key, $required) && $value == '') {
				// добавление класса ошибка формы, если какое-то поле неправильно заполнено
				$class_form = 'form--add-lot container form--invalid';

				// назначение динамической имени переменной в зависимости от ключа
				$variable = str_replace("-","_",$key); // замена "-" на "_" т.к. наименование переменной недопускает символа "-"
				${'class_item_'.$variable} = 'form__item form__item--invalid';

				// вывод ошибки конкретному полю, если оно не заполнено
				$error_text = 'Заполните это поле';
				$errors[] = $key;
			}

			// проверка вводимых значений на число
			if (in_array($key, $rules) and validate_number($value) == !true) {
				$result = call_user_func('validate_number', $value);
				$class_form = 'form form--add-lot container form--invalid';
				$variable = str_replace("-","_",$key); 
				${'class_item_'.$variable} = 'form__item form__item--invalid';
				$error_text = 'Пожалуйста, введите число';
				$errors[] = $key;
			}

			$new_lots[$key] = $value; // записываем в массив все переданные ключи с их значениями
		}

		// проверка, чтобы была выбранна категория
		if ($new_lots['category'] == 'Выберите категорию') {
			$class_form = 'form form--add-lot container form--invalid';
			$class_form_cat = 'form__item form__item--invalid';
			$error_text_cat = 'Пожалуйста, выберите категорию';
			$errors[] = $key;	


		}

		if ($new_lots['category'] == 'Доски и лыжи') {
			$selected_1 = 'selected';
		}
		if ($new_lots['category'] == 'Крепления') {
			$selected_2 = 'selected';
		}
		if ($new_lots['category'] == 'Ботинки') {
			$selected_3 = 'selected';
		}
		if ($new_lots['category'] == 'Одежда') {
			$selected_4 = 'selected';
		}
		if ($new_lots['category'] == 'Инструменты') {
			$selected_5 = 'selected';
		}
		if ($new_lots['category'] == 'Разное') {
			$selected_6 = 'selected';
		}

		// проверка на загружаемый файл
		if (isset($_FILES['lot-image']['name'])) {
			$uploadfile = "img/".$_FILES['lot-image']['name'];
			$file_name = $_FILES['lot-image']['name'];
			$filetype = substr($file_name, strlen($file_name) - 3); 

			// проверка на тип файла
			if ($filetype == "jpg" or 
					$filetype == "gif" or
					$filetype == "jpeg" or 
					$filetype == "png") 
			{
				if($_FILES['lot-image']['size'] != 0 
					 AND $_FILES['lot-image']['size']<=200000)  
				{
					//проверяем функцией is_uploaded_file - против злоумышленников 
					if(is_uploaded_file($_FILES['lot-image']['tmp_name']))  
					{ 
						// проверяется перемещение файла  в файловую систему хостинга 
						if (move_uploaded_file($_FILES['lot-image']['tmp_name'], $uploadfile))  
						{ 
							// выводим 
							//						echo 'Файл '.basename($_FILES['lot-image']['name']). 
							//							' был успешно загружен'; 
							$class_file = 'form__item form__item--file form__item--uploaded';
						}
					}
				}
				else {
					$class_form = 'form form--add-lot container form--invalid';
					print("Максимальный размер файла: 200Кб");
					$errors[] = $key;
				}
			}
			else {
				$class_form = 'form form--add-lot container form--invalid';
				print("Загрузите картинку в формате png, jpg, jpeg, gif");
				$errors[] = $key;
			}
			$url_adress = 'img/'.$_FILES['lot-image']['name']; // адресс загруженной картинки

		}
		else {
			print("Загрузите картинку в формате png, jpg, jpeg, gif");

			$errors[] = $key;
		}

		if (!count($errors)) {
			// подключаем шаблон лота, если нет ошибок
			$add_lot = renderTemplate('templates/lot_add.php', ['new_lots' => $new_lots, 'url_adress' => $url_adress]);
			$condition = 1;
			// подключаем к лойауту и выводим этот шаблон вместо формы
			$layout_content = renderTemplate('templates/layout.php',['title' => 'Новый лот', 'is_auth' => $is_auth, 'user_name' => $user_name, 'user_avatar' => $user_avatar, 'link' => 'href="index.php"', 'add_lot' => $add_lot, 'is_auth' => $user, 'user_name' => $user['name'], 'user_avatar' => $user_avatar ]);
			print($layout_content);
		}
	}

	// подключаем шаблон формы 
	$add_form = renderTemplate('templates/add.php', ['class_form' => $class_form, 'class_item_lot_name' => $class_item_lot_name, 'class_item_message' => $class_item_message, 'class_item_lot_rate' => $class_item_lot_rate, 'class_item_lot_step' => $class_item_lot_step, 'class_item_lot_date' => $class_item_lot_date, 'error_text' => $error_text, 'error_text_cat' => $error_text_cat, 'name' => $name, 'message' => $message, 'rate' => $rate, 'step' => $step, 'class_form_cat' => $class_form_cat, 'date' => $date, 'selected_1' => $selected_1, 'selected_2' => $selected_2, 'selected_3' => $selected_3, 'selected_4' => $selected_4, 'selected_5' => $selected_5, 'selected_6' => $selected_6, 'category' => $category, 'class_file' => $class_file]);
	// выводим его с лойаутом и отображаем
	$layout_content = renderTemplate('templates/layout.php',['title' => 'Добавить лот', 'is_auth' => $user, 'user_name' => $user['name'], 'user_avatar' => $user_avatar, 'link' => 'href="index.php"', 'add_form' => $add_form]);
	print($layout_content);
}
// если "нет" - то выводим надпись такую
else {
	header('Content-Type: text/html; charset=utf-8'); // чтобы надпись на русском выводилась корректно, а не краказябры
	header("HTTP/1.0 403 Not Found");
	print 'Ошибка 403';
	die();
}

?>
