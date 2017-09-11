<?php 
session_start();

require_once('functions.php');
require_once('lots_list.php');
require_once('data.php');

// проверка на существование сессии
if (isset($_SESSION['user'])) {
	$user = $_SESSION['user'];
}

$content = renderTemplate('templates/index.php', ['equipment' => $equipment, 'categories' => $categories, 'lot_time_remaining' => $lot_time_remaining]);

$layout_content = renderTemplate('templates/layout.php',['title' => 'Главная', 'user_name' => $user['name'], 'is_auth' => $user, 'user_avatar' => $user_avatar, 'link' => '', 'content' => $content]);

print($layout_content);
?>