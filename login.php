<?php
session_start();

require_once('functions.php');

require_once('init.php');

require_once('userdata.php');
require_once('data.php');




$class_form = 'form form--add-lot container';
$class_item_email = 'form__item';
$class_item_password = 'form__item form__item--last';

$email = $_POST['email'];
$password = $_POST['password'];

$error_email = 'Введите e-mail';
$error_password = 'Введите пароль';

$required = ['email', 'password'];
$errors = [];

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
	}
	
	
	if (!count($errors)) {
		
//		print("ffff");
		
		session_start();
		
		if ($user = searchUserByEmail($email, $users)) {
			if (password_verify($password, $user['password'])) {

				$_SESSION['user'] = $user;
				header("Location: /index.php");
				print($user['name']);

			}
			
			else {
				$error_password = 'Вы ввели неверный пароль';
				$class_form = 'form--add-lot container form--invalid';
				$class_item_password = 'form__item form__item--last form__item--invalid';
			}


		} else {
			$error_email = 'Данного пользователя не существует';
			$class_form = 'form--add-lot container form--invalid';
			$class_item_email = 'form__item form__item--invalid';
		}
	}
}

// показываем надпись, что теперь вы можете зарегистрироваться введя логин и пароль
if (isset($_COOKIE['login_password'])) {
	print("yes");
	$is_login_password = 1;
}


$enter = renderTemplate('templates/login.php', ['users' => $users, 'class_form' => $class_form, 'class_item_email' => $class_item_email, 'class_item_password' => $class_item_password, 'email' => $email, 'password' => $password, 'error_password' => $error_password, 'error_email' => $error_email, 'categories' => $categories, 'is_login_password' => $is_login_password]);

$layout_content = renderTemplate('templates/layout.php',['title' => 'Вход', 'link' => 'href="index.php"', 'enter' => $enter, 'user_name' => $user['name'], 'is_auth' => $user, 'user_avatar' => $user_avatar, 'categories' => $categories  ]);

print($layout_content);

?>