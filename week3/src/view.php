<?php
include 'db.php';

$id = $_GET['id'];
$result = $mysqli->query("SELECT * FROM posts WHERE id = $id");

$row = $result->fetch_assoc();

if (!$row)
{
    echo "No posts.";
    exit;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>View Post</title>
    </head>
    <body>
        <h2><?php echo $row['title']; ?></h2>
        <p><strong>Writer:</strong> <?php echo $row['author']; ?></p>
        <p><strong>Create Time:</strong> <?php echo $row['created_at']; ?></p>
        <p><strong>Content</strong></p>
        <p><?php echo nl2br($row['content']); ?></p>

        <a href="read.php"><button type="submit">Go to List</button></a>

        <?php
        if ($_SESSION['id']===$row['author'])
        {
            echo '<a href="update.php?id=' . $row['id'] . '"><button type="submit">Edit</button></a>';
            echo '&nbsp;';
            echo '<a href="delete.php?id=' . $row['id'] . '"><button type="submit">Delete</button></a>';
        }
        ?>
        
    </body>
</html>