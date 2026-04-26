<?php
require_once 'db.php';
$error = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $email = trim($_POST['email']);
      $password = $_POST['password'];
      if (empty($email) || empty($password)) {
                $error = "All fields are required";
      } else {
                $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ? OR username = ?");
                $stmt->execute([$email, $email]);
                $user = $stmt->fetch();
                if ($user && password_verify($password, $user['password'])) {
                              $_SESSION['user_id'] = $user['id'];
                              $_SESSION['username'] = $user['username'];
                              header("Location: home.php");
                              exit();
                } else {
                              $error = "Invalid credentials";
                }
      }
}
?>
<!DOCTYPE html>
<html>
  <head>
        <title>LOGIN - CONNECTXION</title>title>
        <link rel="stylesheet" href="assets/css/hyper-flux.css">
  </head>he<body>
        <div class="login-container">
                  <h1>PLAYER LOGIN</h1>h1>
                  <form method="POST">
                                <div class="input-group">
                                                  <label>GAad>
  
  </head>
</html>
