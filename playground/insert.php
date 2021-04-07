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
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $frmUsername = $frmPassword = "";
        $frmUsername = $_POST["username"];
        $frmPassword = $_POST["password"];
    
        if ($frmUsername && $frmPassword); {
            $strSQL = "INSERT INTO user (username, password_hash, status)";
            $strSQL .= "VALUES ('" . $frmUsername . "', '" . $frmPassword . "',0)";
    
            $result = $myconn->query($strSQL);
            if ($result) {
    ?>
                <a href="select.php">กลับหน้ารายชื่อ</a>
    <?php
            } else {
                echo "ไม่สามารถเพิ่มข้อมูลได้";
            }
        }
    }
    ?>
    
    <body>
        <form action="insert.php" method="post">
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="username">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                <label for="floatingPassword">Password</label>
            </div>
            <button type="submit" class="btn btn-primary">save</button>
        </form>
        <?php
        include 'template/header.html';
        ?>
    </body>
    
    </html>
    