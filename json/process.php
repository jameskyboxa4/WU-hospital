<?php
$folder = "/WU-hospital";
define('ROOT_PATH',$_SERVER['DOCUMENT_ROOT'].$folder); //an example
include(ROOT_PATH  ."/server.php");

include_once (ROOT_PATH . '/models/users.php');
$db = new DB_Users();

$users = $db->fecth_all_users();

echo json_encode($users,JSON_UNESCAPED_UNICODE);