<?php
include 'db.php';

if (!isset($_SESSION['id']))
{
    echo "로그인 후 이용 가능합니다.";
    echo "<a href=login.php>Go to Login</a>";
    exit;
}

if ($_SERVER['REQUEST_METHOD']==="POST")
{
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author = $_SESSION['id'];

    $mysqli->query("INSERT INTO posts (title, content, author) VALUES ('$title', '$content', '$author')");
    echo "등록이 성공적으로 되었습니다.";
    echo "<a href=read.php></a>";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Create</title>
    <body>
        <h2>Write new posts!</h2>
        <form method="post">
            <p><input type="text" name="title" placeholder="Title"></p>
            <p>
                <textarea name="description"
                placeholder="Description"></textarea>
            </p>
            <p><button type="submit">submit</button></p>
    </body>
</html>