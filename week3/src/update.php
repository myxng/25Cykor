<?php
include "db.php";

$post_id = $_GET['id'];
$result = $mysqli->query("SELECT * FROM posts WHERE id='$post_id'");
$row = $result->fetch_assoc();

if ($row['author']!==$_SESSION['id'])
{
    echo "No permission";
    exit;
}

if ($_SERVER['REQUEST METHOD']==='POST')
{
    $title = $_POST['title'];
    $content = $_POST['content'];

    $update = $mysqli->query("UPDATE posts SET title='$title', content='$content' WHERE id=$post_id");

    if ($update)
    {
        header("Location: view.php?id=$post_id");
        exit;
    }
    else
    {
        echo "수정 실패";
    }
}
?>
