<?php
// Session configuration for Render/Docker
ini_set('session.cookie_httponly', 1);
ini_set('session.use_only_cookies', 1);
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
      ini_set('session.cookie_secure', 1);
}

session_start();

// Use Environment Variables for Supabase/Render
$host = getenv('SUPABASE_DB_HOST');
$dbname = getenv('SUPABASE_DB_NAME');
$user = getenv('SUPABASE_DB_USER');
$pass = getenv('SUPABASE_DB_PASSWORD');
$port = getenv('SUPABASE_DB_PORT') ?: '5432';

try {
      $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";
      $pdo = new PDO($dsn, $user, $pass, [
                             PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                             PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                         ]);
} catch (PDOException $e) {
      die("Database Connection failed: " . $e->getMessage());
}
?>
