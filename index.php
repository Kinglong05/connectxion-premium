<?php
// Main landing gate for ConnectXion on Render
require_once 'db.php';

if (isset($_SESSION['user_id'])) {
      header("Location: home.php");
} else {
      header("Location: login.php");
}
exit();
?>


