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

if ($_SERVER['REQUEST_METHOD']==='POST')
{
    $title = $_POST['title'];
    $content = $_POST['content'];

    $delete = $mysqli->query("DELETE FROM posts WHERE id=$post_id");

    if ($delete)
    {
        header("Location: view.php?id=$post_id");
        exit;
    }
    else
    {
        echo "삭제 실패";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Delete Post</title>
</head>
<body>
    <h2>정말 삭제하시겠습니까?</h2>
    <form method="post">
        <button type="submit">삭제</button>
        <a href="view.php?id=<?php echo $post_id; ?>"><button type="button">취소</button></a>
    </form>
</body>
</html>