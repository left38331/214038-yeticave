<?php 
session_start();

require_once('functions.php');

require_once('init.php');

require_once('data.php');

if (isset($_SESSION['user'])) {
	$user = $_SESSION['user'];
}

if (isset($_COOKIE['visitcount'])) {
	
	$decode_array = json_decode($_COOKIE['visitcount'], true);
	
	foreach ($decode_array as $key => $value) {
		$decode_array[$key]['pass_time'] =  strtotime('now') - $decode_array[$key]['time'].' секунд назад';
		$decode_array[$key]['time'] = date('H:i:s',$decode_array[$key]['time']);
	}
	
} else {
	print("no");
}


$bet_add = renderTemplate('templates/mylots.php', ['decode_array' => $decode_array]);

$layout_content = renderTemplate('templates/layout.php',['title' => 'Мои ставки', 'user_name' => $user['name'], 'is_auth' => $user, 'user_avatar' => $user_avatar, 'link' => 'href="index.php"', 'bet_add' => $bet_add]);

print($layout_content);



?>