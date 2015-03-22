<?php
header("Content-type:text/html;charset=utf-8");
require_once("../config.inc.php");
require_once('../db.inc.php');
$db     = new DBSQL();
$sql    = "select * from vote order by id desc ";
$data   = $db->select($sql);
if($data) {
    $sql = "select * from item where parent_id = " . $data[0]['id'];
    $itemData = $db->select($sql);
        
}
?>
<html>
<head>
    <title>vote</title>
    <script src="../js/jquery.js"></script>
</head>
<body>
    <form action="vote.php" method="post" id="myform">
        yourname:<input type="text" name="name"> <br>
        <?php
            if($data) {
                echo "<p>" . $data[0]['name'] . "</p><input type='hidden' name='voteid' value='" . $data[0]['id'] . "'>";
                foreach($itemData as $key => $item) {
                    ?>
                    <input type="checkbox" value="<?php echo $item['id']; ?>" name="items[]"><?php echo $item['name']; ?><br>
                    <?
                }
            }
        ?>
        <input type="submit" value="submit">
    </form>
    <script >
        $(document).ready(function() {
        });
    </script>
</body>
</html>

