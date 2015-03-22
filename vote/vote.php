<?php
header("Content-type:text/html;charset=utf-8");
require_once("../config.inc.php");
require_once('../db.inc.php');
$db     = new DBSQL();
$name   = $_POST['name'];
$voteId = $_POST['voteid'];
$items  = $_POST['items'];
if(empty($name) || empty($voteId) || empty($items) ) {
    exit('数据不完整');
}
foreach($items as $key => $item) {
    $sql    = "insert into resu(name, vote_id, item_id) values('" . $name . "', $voteId, $item)";
    $db->insert($sql);
}
echo "thanks ";
header("Location:index.php");
?>


