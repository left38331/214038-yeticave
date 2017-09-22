<?php 
session_start();

require_once('functions.php');
require_once('init.php');



// проверка на существование сессии
if (isset($_SESSION['user'])) {
	$user = $_SESSION['user'];
}

// классы чтобы корректно отображались картинки в навигации категорий
$class_for_category = ['boots', 'boards', 'tools', 'attachment', 'clothing ', 'other'];

$sql = 'SELECT lot_name, 
bet_start, 
image,
date_end,
IFNULL(MAX(bets.cost), lots.bet_start) as bet_price,
COUNT(bets.lot_id) as bets_count, 
categories.category
FROM lots
JOIN categories
ON categories.id = lots.category_id
LEFT JOIN bets
ON bets.lot_id = lots.id
WHERE lots.date_end > NOW() 
GROUP BY lots.id
ORDER BY lots.date_end DESC 

';

$lots_list = select_data($con, $sql);



$content = renderTemplate('templates/index.php', ['equipment' => $equipment, 'categories' => $categories, 'lot_time_remaining' => $lot_time_remaining, 'class_for_category' => $class_for_category, 'equipment' => $lots_list]);


$layout_content = renderTemplate('templates/layout.php',['title' => 'Главная', 'user_name' => $user['name'], 'is_auth' => $user, 'user_avatar' => $user_avatar, 'link' => '', 'categories' => $categories, 'content' => $content]);

print($layout_content);
?>