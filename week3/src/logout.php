<?php
include 'db.php';

session_unset();

if (ini_get("session.use_cookies"))
{
    $params = session_get_cookie_params();
    setcookie(
        session_name(), '', time()-42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

session_destroy();
?>

<script>
    alert("Logout. See U Later!");
    location.replace('index.php');
</script>