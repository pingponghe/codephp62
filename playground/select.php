
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
    
    $strSQL = "SELECT id, username, status FROM user";
    $result = $myconn->query($strSQL);
    
    
    ?>
    <!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css
    " integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
        <title>Document</title>
    </head>
    
    <body>
        <table border="5" width="100%">
            <tr>
                <td> ลำดับ</td>
                <td> ชื่อผู้ใช้</td>
                <td> สถานะ</td>
                <td> แก้ไข</td>
                <td> ลบ</td>
            </tr>
            <?php
            while ($row = $result->fetch_array()) {
                //echo $row["username"] . "<br>";
            ?>
                <tr>
                    <td><?php echo $row["id"] ?></td>
                    <td><?php echo $row["username"] ?></td>
                    <td><?php echo $row["status"] ?></td>
                    <td><a href="update.php?id=<?php echo $row["id"] ?>&username=<?php echo $row["username"] ?>&status=<?php echo $row["status"] ?>"><i class="fas fa-cog"></i></td>
                    <td><a href="delete.php?id=<?php echo $row["id"] ?>"><i class="fas fa-trash"></i></a></td>
                </tr>
            <?php
            }
            ?>
        </table>
        <a href="insert.php">เพิ่มผู้ใช้</a>
        <?php
        include 'template/footer.html';
        ?>
    </body>
    
    </html>