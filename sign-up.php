<?php
session_start();

require_once('functions.php');
require_once('init.php');

if (isset($_SESSION['user'])) {
	$user = $_SESSION['user'];
}


$class_form = 'form container';
$class_item_email = 'form__item';
$class_item_message = 'form__item';
$class_item_password = 'form__item';
$class_item_name = 'form__item';
$error_text = '';
$class_file = 'form__item form__item--file form__item--last';
$email_error = '';

$email= $_POST['email'];
$name = $_POST['name'];
$message = $_POST['message'];
$password = $_POST['password'];

$required = ['email', 'password', 'name', 'message'];
$errors = [];

$date_now = strtotime('now');

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

		$new_lots[$key] = $value; // записываем в массив все переданные ключи с их значениями
	}

	

	// проверка на загружаемый файл
	if (isset($_FILES['image']['name'])) {
		$uploadfile = "img/".$_FILES['image']['name'];
		$file_name = $_FILES['image']['name'];
		$filetype = substr($file_name, strlen($file_name) - 3); 

		// проверка на тип файла
		if ($filetype == "jpg" or 
				$filetype == "gif" or
				$filetype == "jpeg" or 
				$filetype == "png") 
		{
			if($_FILES['image']['size'] != 0 
				 AND $_FILES['image']['size']<=200000)  
			{
				//проверяем функцией is_uploaded_file - против злоумышленников 
				if(is_uploaded_file($_FILES['image']['tmp_name']))  
				{ 
					// проверяется перемещение файла  в файловую систему хостинга 
					if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile))  
					{ 
						// выводим 
						//						echo 'Файл '.basename($_FILES['image']['name']). 
						//							' был успешно загружен'; 
						$class_file = 'form__item form__item--file form__item--last form__item--uploaded';
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
		$url_adress = 'img/'.$_FILES['image']['name']; // адресс загруженной картинки

	}
	else {
		print("Загрузите картинку в формате png, jpg, jpeg, gif");

		$errors[] = $key;
	}
	
	

	
	$sql_email = 'SELECT email
	FROM users
	WHERE email = ?
	';
	
	$email_selected = select_data($con, $sql_email, [$email]);
	
	if($email_selected) {
		$class_form = 'form--add-lot container form--invalid';
		$class_item_email = 'form__item form__item--invalid';
		$email_error = 'Такой пользователь уже существует';
		$errors[] = $key;
	}
	
	
	if (!count($errors)) {
		$insertet_user = insert_data($con, $users, 
		[
			'name' => $name,
			'email' => $email,
			'user_password' => password_hash($password, PASSWORD_DEFAULT),
			'avatar' => $url_adress,
			'contacts' => $message,
			'date_registration' => date('Y-m-d H:i:s')
		]);
		
//		if ($insertet_user) {
//			$name_cuca = "login_password"; 
//			setcookie($name_cuca, 1, time()+5 );
//			header("Location: /login.php");
//		}
	}

	
	

//	if (!count($errors)) {
//		
//	}
}




$content = renderTemplate('templates/sign-up.php', ['equipment' => $lot_info, '$categories' => $categories, 'lot_time_remaining' => $lot_time_remaining, 'lot_id' => $lot_id, 'bets' => $bets, 'is_auth' => $user, 'lot_page' => $lot_page, 'exist' => $exist, 'categories' => $categories, 'class_form' => $class_form, 'class_item_email' => $class_item_email, 'class_item_password' => $class_item_password, 'class_item_message' => $class_item_message, 'class_item_name' => $class_item_name, 'error_text' => $error_text, 'email' => $email, 'name' => $name, 'message' => $message, 'password' => $password, 'class_file' => $class_file, 'email_info' => 	$email_info, 'email_error' => $email_error]);

$layout_content = renderTemplate('templates/layout.php',['title' => 'Регистрация', 'user_name' => $user['name'], 'is_auth' => $user, 'user_avatar' => $user_avatar, 'link' => 'href="index.php"', 'content' => $content, 'categories' => $categories]);

print($layout_content);

?>