<?
session_start();
	
require_once('site_core.php');

echo_head("Admin Login");
echo '<div class="container">';
echo '<h2>Admin Login</h2>';
if ($_SESSION['authenticated']) {
  echo '
    <div class="alert alert-info">Already logged in</div>
    <a href="admin_logout.php" class="btn btn-primary">Logout</a>';
}
else {
  if ($_POST[userid] == "Scranton" && $_POST[passwd] == "Strangler") {
  $_SESSION['authenticated'] = true;
  $_SESSION['admin'] = true;
  echo '<div class="alert alert-success">Admin Login Successful</div>';
  echo    '<a class="btn btn-info" href="/project3/?">Home Page</a>';
  echo    '<a class="btn btn-light" href="/project3/control_panel.php?table=wj18sawy_pages">Control Panel</a>';
  }
  else if ($_POST) {
      
      echo '
                    <div class="alert alert-danger" role="alert">
                        Username or password invalid. 
                        Please try again.
                    </div>';
      
      echo '
        <form action="admin_login.php" method="post">
        <label>Username: <input type="text" class="form-control" name="userid"></label>
        <label>Password: <input type="password" class="form-control" name="passwd"></label>
        <input type="submit" class="btn btn-primary">	
        </form>';
      
  }
else{

    echo '
        <form action="admin_login.php" method="post">
        <label>Username: <input type="text" class="form-control" name="userid"></label>
        <label>Password: <input type="password" class="form-control" name="passwd"></label>
        <input type="submit" class="btn btn-primary">	
        </form>';
  }
}	



echo '</div>';
echo_foot();	
?>