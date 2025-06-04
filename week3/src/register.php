<?php
include 'db.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Register</title>
    <body>
        <h2>Register</h2>
        <form method="post">
            <p><input type="text" name="id" placeholder="ID"></p>
            <p><input type="password" name="pw" placeholder="PW"></p>
            <p><button type="submit">Register</button></p>
        </form>

        <p><a href="index.php">← 메인으로</a></p>

        <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST") 
        {
            $id = $_POST['id'];
            $pw = password_hash($_POST['pw'], PASSWORD_DEFAULT);

            // 이미 존재하는 아이디인지 확인
            $check = $mysqli->query("SELECT * FROM users WHERE id='$id'");

            if ($check->num_rows > 0) 
            {
                echo "<p style='color:red;'> 이미 존재하는 아이디입니다.</p>";
            } else 
            {
                // 새 사용자 추가
                $mysqli->query("INSERT INTO users (id, pw) VALUES ('$id', '$pw')");
                echo "<p style='color:green;'> 회원가입 성공!</p> <a href='login.php'>로그인하러 가기</a>";
                exit;
            }
        }
        ?>
    </body>
</html>