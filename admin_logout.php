<?
session_start();
session_destroy();	

require_once('site_core.php');

echo_head("Admin Logout");

echo '
<div class="container">
  <div class="alert alert-danger">Session destroyed. You are logged out.</div>
  <a href="admin_login.php" class="btn btn-primary">Login</a>
</div>';

echo_foot();	
?>