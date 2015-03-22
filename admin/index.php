<?php
header("Content-type:text/html;charset=utf-8");
require_once("../config.inc.php");
require_once('../db.inc.php');
$db     = new DBSQL();
?>
<html>
<head>
    <title>vote</title>
    <script src="../js/jquery.js"></script>
</head>
<body>
    <form action="items.php" method="post" id="myform">
        deccription:<input type="text" name="name"> <button id="ok">ok</button><br>
        item:　　　<input type="text" name="item"> <button id="add">add</button><br>
        <div id="items">
            
        </div>
    </form>
<hr>

<div>
   current result:<br>
    <?php
        $sql    = "select * from vote order by id desc";
$voted  = $db->select($sql);
if($voted) {
    $sql = "SELECT a.name as item, COUNT(b.id) as num,group_concat(b.name) as name FROM `item` a left join resu b on a.id = b.item_id and a.`parent_id` = " . $voted[0]['id'] . " and b.vote_id = " . $voted[0]['id'] . " GROUP by a.name order by num desc";
    $result = $db->select($sql);
    foreach($result as $data) {
        echo $data['item'] .  ' - ' . $data['num'] . '   (' . $data['name'] . ' ) <br>';
    }
}
    ?> 
</div>
    <script >
        $(document).ready(function() {
            $('#add').click(function() {
                var item    = $('input[name="item"]').val();
                if("" == item) {
                    alert('请输入选项');
                    return false;
                }
                var itemnum = 0;
                itemnum =$('.ims').length;
                $('#items').append("<p class='ims'> <input type='hidden' name='items[]' value= "  + item + " >" + (itemnum + 1) + "　" + item +  "　" + "<button class='edit'>edit</button>　<button class='delete'>delete</button></p>");
                $('.delete').click(function() {
                    $(this).parent().remove();
                    return false;
                });
                $('.edit').click(function() {
                    $(this).parent().remove();
                    return false;
                });
                return false;
            }); 
        });
        $('#ok').click(function() {
            $('#myform').submit();
        });
    </script>
</body>
</html>

