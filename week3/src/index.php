<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Main Page</title>
        <style>
            ul {
                list-style-type: none;
                padding: 0;
            }
        </style>
    </head>
    <body>     
        <?php if (isset($_SESSION['id'])): ?>
            <h1>Hello, <?php echo htmlspecialchars($_SESSION['id']); ?>!</h1>

            <ul>
                <li><a href="create.php"> New </a></li>
                <li><a href="read.php"> 게시판 보기 </a></li>
            </ul>            

            <form action="logout.php" method="post">
                <button type="submit">Logout</button>
            </form>

        <?php else: ?>
            <h1>Welcome to my site!</h1>
            <ul>
                <li><a href="read.php"> 게시판 구경하기 </a></li>
                <li><a href="login.php"> Login </a></li>
                <li><a href="register.php"> Register </a></li>
            </ul>

        <?php endif; ?>
    </body>
</html>