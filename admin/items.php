<?php
header("Content-type:text/html;charset=utf-8");
require_once("../config.inc.php");
require_once('../db.inc.php');
$db     = new DBSQL();
if($_POST) {
    $name   = $_POST['name'] ;
    if(empty($name)) {
        exit('description 不能为空');
    }
    $items  = $_POST['items'];
    $sql    = "insert into vote(name) values('" . $name . "') ";
    $insertId = $db->insert($sql);
    if(0 > $insertId) {
        exit('服务器繁忙，请稍后再试');
    }
    if(!empty($items)) {
        foreach($items as $key => $item) {
            $sql = "insert into item(name, parent_id) values('" . $item . "', " . $insertId . ")";
            $db->insert($sql);
        }
    }
    header("Location:index.php");
}
?>

