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

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Post</title>
</head>
<body>
    <h2>Edit Post</h2>
    <form method="post">
        <p><input type="text" name="title" value="<?php echo htmlspecialchars($row['title']); ?>"></p>
        <p><textarea name="content"><?php echo htmlspecialchars($row['content']); ?></textarea></p>
        <button type="submit">Update</button>
    </form>
    <p><a href="view.php?id=<?php echo $post_id; ?>"><button type="button">Cancel</button></a></p>
</body>
</html>