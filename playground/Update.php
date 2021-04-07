<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'codephp62';

$myconn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    if ($myconn->connect_errno) {
        printf("Connect failed: %s\n", $myconn->connect_error);
        exit();
    }
$id_user = " ";
$username = " ";
$status = " ";
if ($_SERVER["REQUEST_METHOD"] == "GET") {


    $id_user = "";
    if(isset($_GET["id"]) && $_GET["id"] != ''){
      $username = $_GET["user_name"];
      $status = $_GET["status"];
    }else{
        echo " id is null ";
    }
    
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = "";
    if (isset($_GET["id"]) && $_GET["id"] != '');
    $id = $_GET["id"];
    $username = $_GET["username"];
    $status = $_GET["status"];
} else {
    //echo "id is null";
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $status = "";
    $id = $_GET["id"];
    $username = $_POST["username"];
    $status = $_POST["status"];
    //echo $username . " _ _ " .$status;
    $strSQL = "UPDATE user SET username`='" . $username . "',status`=" . $status . " WHERE id=" . $id;
    if (($username == "") && ($status == "")); {
        //echo "ผิดพลาด";

        $result = $myconn->query($strSQL);
        if ($result) {
            echo "success";
        } else {
            echo "error";
        }
    }
}


?>
<body>
    <form action="update.php?id=<?= $id ?>" method="post">
        <table border="10">
            <tr>
                <td>username</td>
                <td><input type="text" name="username" value="<?= $username ?>"></td>
            </tr>
            <tr>
                <td>status</td>
                <td><input type="text" name="status" value="<?= $status ?>"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="save"></td>
            </tr>
        </table>
        <a href="insert.php">เพิ่มผู้ใช้</a>
        <?php
        include 'template/header.html';
        ?>
    </form>
</body>

</html>