<?php

require_once('functions.php');

$con = mysqli_connect("yeticave", "root", "","yeticave");

// проверка на наличие ошибок при подключении к БД
if(!$con) {
	
	$error = mysqli_connect_error();
	$content = renderTemplate('templates/error.php', ['error' => $error]);
	
	$layout_content = renderTemplate('templates/layout.php',['title' => 'Ошибка', 'user_name' => $user['name'], 'is_auth' => $user, 'user_avatar' => $user_avatar, 'link' => '', 'content' => $content]);
	
	print($layout_content);
	
	exit();
} 
// выводим категории с БД
else {

	$select_categories = select_data($con, 'SELECT category FROM categories');
	foreach ($select_categories as $value) {
		$categories[] = $value['category'];
	}

	// если ошибка то показываем какая именно
	if (!$select_categories) {
		$error = mysqli_error($con);
		$content = renderTemplate('templates/error.php', ['error' => $error]);

		$layout_content = renderTemplate('templates/layout.php',['title' => 'Ошибка', 'user_name' => $user['name'], 'is_auth' => $user, 'user_avatar' => $user_avatar, 'link' => '', 'content' => $content]);

		print($layout_content);
	}
}



?>